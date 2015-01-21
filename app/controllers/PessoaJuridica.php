<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 13/10/14
 * Time: 22:54
 */

class PessoaJuridica extends Controller
{
    /** @var \PessoaJuridicaModel  */
    private $pessoaJuridicaModel;

    public function __construct()
    { //o método é herdado da classe pai 'Controller'
        $this->setModel(new PessoaJuridicaDAO());
        $this->pessoaJuridicaModel = new PessoaJuridicaModel();
    }

    public function start()
    { //Pega a lista completa de perfis
        $perfil_list = (array)$this->model->fullList();
        $relacao = array();
        foreach($perfil_list as $perfil){
            $relacao[] = $this->pessoaJuridicaModel->setDTO($perfil)->getArrayDados();
        }

        // Exporta imagens de perfil
        $this->exportaImagens($perfil_list);

        $dados = array(
            'pagesubtitle' => '',
            'pagetitle' => 'Pessoa Jurídica',
            'list' => $relacao
        );

        $this->view = new View('PessoaJuridica', 'start');
        $this->view->output($dados);
    }

    public function novo()
    {
        echo json_encode($_POST);
    }

    /**
     * @param int $id = Caso receba um id retorna um array
     * para a view com os dados do perfil. Este array irá popular o formulário
     * permitindo editar dados do perfil e gravar no banco
     * Se não receber um id o formulário estará vazio e permitirá registrar
     * um novo perfil
     */
    public function formpessoajuridica($id = null)
    {
        $pj_telefone = (new CategoriaValorDAO())->get('cd_categoria = 6');
        $operadora = (new CategoriaValorDAO())->get('cd_categoria = 10');
        $tipos_empresa = (new CategoriaValorDAO())->get('cd_categoria = 16');
        $ramos_atividade = (new CategoriaValorDAO())->get('cd_categoria = 8');


        if ($id) {
            /** @var PessoaJuridicaDTO */
            $perfilarr = $this->findById($id);

            $telefones = (new PessoaJuridicaTelefoneDAO())->get("cd_pessoa_juridica = {$id}");
            $enderecos = (new PessoaJuridicaEnderecoDAO())->get("cd_pessoa_juridica = {$id}");
            $estados = (new CategoriaValorDAO())->get('cd_categoria = 2');
            $catg_enderecos = (new CategoriaValorDAO())->get('cd_categoria = 9');

            $dados = array(

                'pagetitle' => $perfilarr->getNmFantasia(),
                'pagesubtitle' => 'Atualizar Perfil.',
                'pj_telefone' => $pj_telefone,
                'operadora' => $operadora,
                'telefones' => $telefones,
                'enderecos' => $enderecos,
                'estados' => $estados,
                'catg_enderecos' => $catg_enderecos,
                'tipos_empresa' => $tipos_empresa,
                'ramos_atividade' => $ramos_atividade,
                'id' => $id,
                'perfil' => $perfilarr
            );
        } else {
            $perfil = new PessoaJuridicaDTO();
            $dados = array(
                'pagetitle' => 'Cadastro',
                'pagesubtitle' => 'Pessoa Juridica.',
                'pj_telefone' => $pj_telefone,
                'operadora' => $operadora,
                'tipos_empresa' => $tipos_empresa,
                'ramos_atividade' => $ramos_atividade,
                'id' => null,
                'perfil' => $perfil
            );
        }

        $this->view = new View('PessoaJuridica', 'formpessoajuridica');
        $this->view->output($dados);
    }

    /**
     * @param string $id = id(chave primária da tabela de perfis)
     * O método recebe o id e monta respecttiva a tela de perfil
     */
    public function visualizar($id = null)
    {
        $id = (int)$id;
        $empresa = $this->findById($id);
        $dadosCadastrais = $this->pessoaJuridicaModel->setDTO($empresa)->getArrayDados();

        $telefones = $this->pessoaJuridicaModel->getTelefones(new PessoaJuridicaTelefoneModel());
        $enderecos = $this->pessoaJuridicaModel->getEnderecos(new PessoaJuridicaEnderecoModel());
        $empregados = $this->pessoaJuridicaModel->getEmpregados(new PessoaFisicaModel);

        // Exporta imagem de perfil
        $this->exportaImagens($empresa);

        $dados = array(
            'pagesubtitle' => $dadosCadastrais['email'],
            'pagetitle' => $dadosCadastrais['nm_fantasia'],
            'dados_cadastrais' => $dadosCadastrais,
            'telefones' => $telefones,
            'enderecos' => $enderecos,
            'empregados' => $empregados
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
                    $obj = $this->model->gravar($pessoaJuridica);
                    $this->exportaImagens($obj);
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
        $dto = new PessoaJuridicaDTO();

        $dto->setCdPessoaJuridica(Input::get('cd_pessoa_juridica'))
            ->setCnpj(Input::get('cnpj'))
            ->setNmFantasia(Input::get('nm_fantasia'))
            ->setDescRazao(Input::get('desc_razao'))
            ->setCdCatgTipoEmpresa(16)
            ->setCdTipoEmpresa(Input::get('cd_tipo_empresa'))
            ->setCdCatgRamoAtividade(8)
            ->setCdRamoAtividade(Input::get('cd_ramo_atividade'))
            ->setEmail(Input::get('email'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

    public function removerPessoaJuridica(PessoaJuridicaDTO $dto) {
        if (Input::exists()) {

            if (Token::check(Input::get('token'))) {

                $this->model->delete($dto);

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
    protected function exportaImagens($arr_perfil)
    {
        if (is_array($arr_perfil)) {
            foreach ($arr_perfil as $perfil) {
                if ($perfil->getImPerfil()
                    && !file_exists($this->model->getImgFolder() . $perfil->getCdPessoaJuridica() . '.jpg')
                ) {
                    $this->model->exportaFoto($perfil->getCdPessoaJuridica());
                }
            }
        } else {
            if ($arr_perfil->getImPerfil()
                && !file_exists($this->model->getImgFolder() . $arr_perfil->getCdPessoaJuridica() . '.jpg')
            ) {
                $this->model->exportaFoto($arr_perfil->getCdPessoaJuridica());
            }
        }
    }

    public function checkExisteCNPJ()
    {
        $cnpj = Input::get('cnpj');
        $id = Input::get('cd_pessoa_juridica');

        $return = array(
            'valid' => $this->pessoaJuridicaModel->existeCNPJ($cnpj, $id)
        );

        echo json_encode($return);
    }

    public function checkExisteEmail()
    {
        $email = Input::get('email');
        $id = Input::get('cd_pessoa_juridica');

        $return = array(
            'valid' => $this->pessoaJuridicaModel->existeEmail($email, $id)
        );

        echo json_encode($return);
    }
} 