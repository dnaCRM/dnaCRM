<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 13/10/14
 * Time: 22:54
 */

class PessoaJuridica extends Controller
{

    public function __construct()
    { //o método é herdado da classe pai 'Controller'
        $this->setModel(new PessoaJuridicaDAO());
    }


    public function start()
    { //Pega a lista completa de perfis
        $perfil_list = (array)$this->model->fullList();

        // Exporta imagens de perfil
        //$this->exportaImagens($perfil_list);

        $dados = array(
            'pagesubtitle' => '',
            'pagetitle' => 'Perfis',
            'list' => $perfil_list
        );

        $this->view = new View('PessoaJuridica', 'start');
        $this->view->output($dados);
    }

    /**
     * @param int $id = Caso receba um id retorna um array
     * para a view com os dados do perfil. Este array irá popular o formulário
     * permitindo editar dados do perfil e gravar no banco
     * Se não receber um id o formulário estará vazio e permitirá registrar
     * um novo perfil
     */
    public function formperfil($id = null)
    {
        if ($id) {
            /** @var PessoaJuridicaDTO */
            $perfilarr = $this->findById($id);

            $dados = array(

                'pagetitle' => $perfilarr->getNmPessoaJuridica(),
                'pagesubtitle' => 'Atualizar Perfil.',
                'id' => $id,
                'perfil' => $perfilarr
            );
        } else {
            $perfil = new PessoaJuridicaDTO();
            $dados = array(
                'pagetitle' => 'Cadastro de Perfil',
                'pagesubtitle' => 'Pessoa Juridica.',
                'id' => null,
                'perfil' => $perfil
            );
        }

        $this->view = new View('PessoaJuridica', 'formperfil');
        $this->view->output($dados);
    }

    /**
     * @param string $id = id(chave primária da tabela de perfis)
     * O método recebe o id e monta respecttiva a tela de perfil
     */
    public function visualizar($id = null)
    {
        $id = (int)$id;
        $perfilarr = $this->findById($id);

        // Exporta imagem de perfil
        $this->exportaImagens($perfilarr);

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $perfilarr->getDescRazao(),
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $perfilarr->getNmFantasia(),
            //todos os atributos do perfil
            'perfil' => $perfilarr
        );

        $this->view = new View('PessoaJuridica', 'visualizar');
        $this->view->output($dados);
    }

    /**
     * Este método monta a tela de confirmação antes de apagar
     * o Perfil
     * @param $id = id do Perfil a ser deletado
     */
    public function confirmDelete($id)
    {
        $id = (int)$id;

        $perfilarr = $this->findById($id);

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $perfilarr->getDescRazao(),
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $perfilarr->getNmFantasia(),
            'perfil' => $perfilarr
        );

        $this->view = new View('PessoaJuridica', 'confirmDelete');
        $this->view->output($dados);
    }

    /**
     * @todo Sanitizar entrada de dados
     */
    public function cadastra() {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {

                $pessoaJuridica = $this->setDados();

                try {
                    $this->model->gravar($pessoaJuridica);
                    Session::flash('sucesso_salvar_pj', 'Cadastro salvo!', 'success');
                } catch (Exception $e) {
                    CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
                }
            }
        }

    }

    private function setDados()
    {
        $dto = new PessoaJuridicaDTO();

        $dto->setCdPessoaJuridica(Input::get('cd_pessoa_juridica'))
            ->setCnpj(Input::get('cnpj'))
            ->setNmFantasia(Input::get('nm_fantasia'))
            ->setDescRazao(Input::get('desc_razao'))
            ->setDescAtividade(Input::get('desc_atividade'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

    public function removerPessoaJuridica(PessoaJuridicaDTO $dto) {
        if (Input::exists()) {

            if (Token::check(Input::get('token'))) {

                //$this->model->delete($dto);
                echo 'Deletou perfil';

            }
        }
    }

} 