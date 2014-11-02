<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 14/10/14
 * Time: 22:39
 */

class Apartamento extends Controller
{
    /** @var  ApartamentoModel */
    private $apartamentoModel;

    public function __construct()
    { //o método é herdado da classe pai 'Controller'
        $this->setModel(new ApartamentoDAO());
        $this->apartamentoModel = new ApartamentoModel();
    }


    public function start()
    { //Pega a lista completa de apartamentos


        $apartamento_list = (array)$this->model->fullList();

        $dados = array(
            'pagesubtitle' => '',
            'pagetitle' => 'Apartamento',
            'list' => $apartamento_list
        );

        $this->view = new View('Apartamento', 'start');
        $this->view->output($dados);
    }

    /**
     * @param int $id = Caso receba um id retorna um array
     * para a view com os dados de apartamento. Este array irá popular o formulário
     * permitindo editar dados do apartamento e gravar no banco
     * Se não receber um id o formulário estará vazio e permitirá registrar
     * um novo apartamento
     */
    public function formapartamento($id = null)
    {
        $setor = (new setorDAO())->fullList();
        $condominios = (new CondominioDAO())->fullList();

        if ($id) {
            /** @var ApartamentoDTO */
            $apartamentoarr = $this->findById($id);


            $dados = array(

                'pagetitle' => 'Atualizar Apartamento.',
                'pagesubtitle' => '',
                'setor' => $setor,
                'id' => $id,
                'apartamento' => $apartamentoarr,
                'condominios' => $condominios

            );
        } else {

            $apartamento = new ApartamentoDTO();
            $dados = array(
                'pagetitle' => 'Cadastro de Apartamento',
                'pagesubtitle' => '',
                'setor' => $setor,
                'id' => null,
                'apartamento' => $apartamento,
                'condominios' => $condominios

            );
        }

        $this->view = new View('Apartamento', 'formapartamento');
        $this->view->output($dados);
    }


    /**
     * @param string $id = id(chave primária da tabela de apartamento)
     * O método recebe o id e monta respectiva a tela de apartamento
     */
    public function visualizar($id = null)
    {
        $id = (int)$id;
        $apartamentoarr = $this->findById($id);
        $this->apartamentoModel->setDTO($apartamentoarr);
        $moradorEnderecoModel = new MoradorEnderecoModel();
        $moradores = $this->apartamentoModel->getMoradores($moradorEnderecoModel);
        $ex_moradores = $this->apartamentoModel->getExMoradores($moradorEnderecoModel);
        $dados = $this->apartamentoModel->getArrayDados();
        // Exporta imagem de perfil

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => 'Condomínio '.$dados['condominio'],
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $dados['desc_apartamento'],
            //todos os atributos do perfil
            'apartamento' => $dados,
            'moradores' => $moradores,
            'ex_moradores' => $ex_moradores
        );

        $this->view = new View('Apartamento', 'visualizar');
        $this->view->output($dados);
    }

    /**
     * Este método monta a tela de confirmação antes de apagar
     * o Apartamento
     * @param $id = id do apartamento a ser deletado
     */
    public function confirmDelete($id)
    {
        $id = (int)$id;

        $apartamentoarr = $this->findById($id);

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $apartamentoarr->getDescApartamento(),
            //o campo 'nome' vai ser o título da página
            'pagetitle' => 'Apartamento',
            'apartamento' => $apartamentoarr
        );

        $this->view = new View('Apartamento', 'confirmDelete');
        $this->view->output($dados);
    }

    /**
     * @todo Sanitizar entrada de dados
     */
    public function cadastra() {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {

                $apartamento = $this->setDados();

                try {
                    $obj = $this->model->gravar($apartamento);
                    return $obj;
                } catch (Exception $e) {
                    CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
                }
                return false;
            }
        }

    }

    private function setDados()
    {
        $dto = new ApartamentoDTO();

        $dto->setCdApartamento(Input::get('cd_apartamento'))
            ->setCdSetor(Input::get('setor'))
            ->setDescApartamento(Input::get('desc_apartamento'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

    public function removerApartamento(ApartamentoDTO $dto) {
        if (Input::exists()) {

            if (Token::check(Input::get('token'))) {

                $this->model->delete($dto);

            }
        }
    }

    /**
     * @param $id
     */
    public function listBySetorId($id)
    {
        $apartamentos = $this->model->get("cd_setor = {$id}");
        $return = '<option value="">Apartamentos</option>';
        foreach ($apartamentos as $apartamento) {
            $return .= "<option value=\"{$apartamento->getCdApartamento()}\">{$apartamento->getDescApartamento()}</option>";
        }

        echo $return;
    }

    protected function findById($id)
    {
        if (!$obj = $this->model->getById($id)) {
            /** Envia mensagem */
            Session::flash('fail', 'Cadastro não encontrado', 'danger');
            /** Redireciona para página de lista de Perfis */
            Redirect::to(SITE_URL . get_called_class());
        }
        return $obj;
    }
} 