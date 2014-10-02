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
        $perfil_list = $this->getModel()->fullList();

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
     * @todo implementar lógica para receber dados do $_POST antes de montar o Objeto
     * Sanitizar entrada de dados
     * @param PessoaFisicaDTO $dto
     */
    public function cadastra(PessoaFisicaDTO $dto) {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {

                $dto->setNmPessoaFisica(Input::get('nm_pessoa_fisica'))
                    ->setCpf('000.000.000-00');

                $this->model->gravar($dto);

            }
        }
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