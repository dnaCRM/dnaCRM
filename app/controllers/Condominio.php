<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 16/10/14
 * Time: 02:07
 */

class Condominio extends Controller
{

    public function __construct()
    { //o método é herdado da classe pai 'Controller'
        $this->setModel(new CondominioDAO());
    }


    public function start()
    { //Pega a lista completa de perfis
        $condominio_list = (array)$this->model->fullList();

        // Exporta imagens de perfil
        $this->exportaImagens($condominio_list);

        $dados = array(
            'pagesubtitle' => '',
            'pagetitle' => 'Condominio',
            'list' => $condominio_list
        );

        $this->view = new View('Condominio', 'start');
        $this->view->output($dados);
    }

    /**
     * @param int $id = Caso receba um id retorna um array
     * para a view com os dados do condominio. Este array irá popular o formulário
     * permitindo editar dados do condominio e gravar no banco
     * Se não receber um id o formulário estará vazio e permitirá registrar
     * um novo condominio
     */
    public function formcondominio($id = null)
    {
        $estado = (new CategoriaValorDAO())->get('cd_categoria = 2');

        if ($id) {
            /** @var CondominioDTO */
            $condominioarr = $this->findById($id);

            $dados = array(

                'pagetitle' => $condominioarr->getNmCondominio(),
                'pagesubtitle' => 'Atualizar Condominio.',
                'id' => $id,
                'estado' => $estado,
                'condominio' => $condominioarr
            );
        } else {
            $condominio = new CondominioDTO();
            $dados = array(
                'pagetitle' => 'Cadastro de condominio',
                'pagesubtitle' => '',
                'id' => null,
                'estado' => $estado,
                'condominio' => $condominio
            );
        }

        $this->view = new View('Condominio', 'formcondominio');
        $this->view->output($dados);
    }

    /**
     * @param string $id = id(chave primária da tabela de condominio)
     * O método recebe o id e monta respecttiva a tela de condominio
     */
    public function visualizar($id = null)
    {
        $id = (int)$id;
        $condominioarr = $this->findById($id);

        // Exporta imagem de perfil
        $this->exportaImagens($condominioarr);

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => '',
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $condominioarr->getNmCondominio(),
            //todos os atributos do perfil
            'condominio' => $condominioarr
        );

        $this->view = new View('Condominio', 'visualizar');
        $this->view->output($dados);
    }

    /**
     * Este método monta a tela de confirmação antes de apagar
     * o condominio
     * @param $id = id do condominio a ser deletado
     */
    public function confirmDelete($id)
    {
        $id = (int)$id;

        $condominioarr = $this->findById($id);

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $condominioarr->getNmCondominio(),
            //o campo 'nome' vai ser o título da página
            'pagetitle' => '',
            'condominio' => $condominioarr
        );

        $this->view = new View('Condominio', 'confirmDelete');
        $this->view->output($dados);
    }

    /**
     * @todo Sanitizar entrada de dados
     */
    public function cadastra() {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {

                $condominio = $this->setDados();

                try {
                    $this->model->gravar($condominio);
                    Session::flash('sucesso_salvar_condominio', 'Cadastro salvo!', 'success');
                } catch (Exception $e) {
                    CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
                }
            }
        }

    }

    private function setDados()
    {
        $dto = new CondominioDTO();

        $dto->setCdCondominio(Input::get('cd_condominio'))
            ->setNmCondominio(Input::get('nm_condominio'))
            ->setCep(Input::get('cep'))
            ->setRua(Input::get('rua'))
            ->setNumero(Input::get('numero'))
            ->setBairro(Input::get('bairro'))
            ->setCidade(Input::get('cidade'))
            ->setCdCatgEstado(2)

            ->setCdVlCatgEstado(Input::get('estado'))


            ->setCdVlCatgEstado(2)

            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

    public function removerCondominio(CondominioDTO $dto) {
        if (Input::exists()) {

            if (Token::check(Input::get('token'))) {

                $this->model->delete($dto);
                echo 'Deletou condominio';

            }
        }
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

    /**
     * Deve receber um array contento objetos do tipo PessoaFisicaDTO
     * Percorre os objetos testando se as imagens já foram exportadas
     * e exporta caso necessário
     */
    protected function exportaImagens($arr_condominio)
    {
        if (is_array($arr_condominio)) {
            foreach ($arr_condominio as $condominio) {
                if ($condominio->getImPerfil()
                    && !file_exists($this->model->getImgFolder() . $condominio->getCdCondominio() . '.jpg')
                ) {
                    $this->model->exportaFoto($condominio->getCdCondominio());
                }
            }
        } else {
            if ($arr_condominio->getImPerfil()
                && !file_exists($this->model->getImgFolder() . $arr_condominio->getCdCondominio() . '.jpg')
            ) {
                $this->model->exportaFoto($arr_condominio->getCdCondominio());
            }
        }
    }
}