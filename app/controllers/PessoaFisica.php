<?php

/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 29/09/14
 * Time: 10:25
 */
class PessoaFisica extends Controller
{

    public function __construct()
    { //o método é herdado da classe pai 'Controller'
        $this->setModel(new PessoaFisicaDAO());
    }

    public function start()
    { //Pega a lista completa de perfis
        $perfil_list = (array)$this->model->fullList();

        $this->exportaImagens($perfil_list);

        $dados = array(
            'pagesubtitle' => '',
            'pagetitle' => 'Perfis',
            'list' => $perfil_list
        );

        $this->view = new View('PessoaFisica', 'start');
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
            /** @var PessoaFisicaDTO */
            $perfilarr = $this->findById($id);

            $nasc = new DateTime($perfilarr->getDtNascimento());
            $perfilarr->setDtNascimento($nasc->format('d/m/Y'));

            $dados = array(

                'pagetitle' => $perfilarr->getNmPessoaFisica(),
                'pagesubtitle' => 'Atualizar Perfil.',
                'id' => $id,
                'perfil' => $perfilarr
            );
        } else {
            $perfil = new PessoaFisicaDTO();
            $dados = array(
                'pagetitle' => 'Cadastro de Perfil',
                'pagesubtitle' => 'Pessoa Física.',
                'id' => null,
                'perfil' => $perfil
            );
        }

        $this->view = new View('PessoaFisica', 'formperfil');
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

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $perfilarr->getEmail(),
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $perfilarr->getNmPessoaFisica(),
            //todos os atributos do perfil
            'perfil' => $perfilarr
        );

        $this->view = new View('PessoaFisica', 'visualizar');
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
            'pagesubtitle' => $perfilarr->getEmail(),
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $perfilarr->getNmPessoaFisica(),
            'perfil' => $perfilarr
        );

        $this->view = new View('PessoaFisica', 'confirmDelete');
        $this->view->output($dados);
    }

    /**
     * @todo Sanitizar entrada de dados
     */
    public function cadastra() {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {

                $pessoaFisica = $this->setDados();

                try {
                    $this->model->gravar($pessoaFisica);
                    Session::flash('sucesso_salvar_pf', 'Cadastro salvo!', 'success');
                } catch (Exception $e) {
                    CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
                }
            }
        }

    }

    private function setDados()
    {
        $dto = new PessoaFisicaDTO();

        $dto->setCdPessoaFisica(Input::get('cd_pessoa_fisica'))
        ->setNmPessoaFisica(Input::get('nm_pessoa_fisica'))
        ->setCdPessoaJuridica(Input::get('cd_pessoa_juridica'))
        ->setCdProfissao(Input::get('cd_profissao'))
        ->setCpf(Input::get('cpf'))
        ->setRg(Input::get('rg'))
        ->setEmail(Input::get('email'))
        ->setDtNascimento(Input::get('dt_nascimento'))
        ->setIeSexo(Input::get('ie_sexo'))
        ->setCdUsuarioCriacao(Session::get('user'))
        ->setDtUsuarioCriacao('now()')
        ->setCdUsuarioAtualiza(Session::get('user'))
        ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

    public function removerPessoaFisica(PessoaFisicaDTO $dto) {
        if (Input::exists()) {

            if (Token::check(Input::get('token'))) {

                //$this->model->delete($dto);
                echo 'Deletou perfil';

            }
        }
    }
}