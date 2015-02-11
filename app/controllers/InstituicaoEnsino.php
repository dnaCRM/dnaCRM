<?php

class InstituicaoEnsino extends Controller
{
    /** @var  InstituicaoEnsinoModel */
    private $instituicaoEnsinoModel;

    public function __construct()
    {
        $this->setModel(new PessoaJuridicaDAO());
        $this->instituicaoEnsinoModel = new InstituicaoEnsinoModel();
    }


    public function start()
    { //Pega a lista completa de perfis
        $perfil_list = (array)$this->model->get('cd_tipo_empresa = 159');
        $relacao = array();
        foreach ($perfil_list as $perfil) {
            $relacao[] = $this->instituicaoEnsinoModel->setDTO($perfil)->getArrayDados();
        }

        // Exporta imagens de perfil
        $this->exportaImagens($perfil_list);

        $dados = array(
            'pagesubtitle' => '',
            'pagetitle' => 'Instituições de Ensino',
            'list' => $relacao
        );

        $this->view = new View('InstituicaoEnsino', 'start');
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
        $dadosCadastrais = $this->instituicaoEnsinoModel->setDTO($empresa)->getArrayDados();

        $telefones = $this->instituicaoEnsinoModel->getTelefones(new PessoaJuridicaTelefoneModel());
        $enderecos = $this->instituicaoEnsinoModel->getEnderecos(new PessoaJuridicaEnderecoModel());
        $infoEstudosModel = new InfoEstudosModel();
        $info_estudos = $infoEstudosModel->getDAO()->get("cd_pessoa_juridica = {$id}");
        $estudantes = array();
        foreach($info_estudos as $ie){
            $estudantes[] = $infoEstudosModel->setDTO($ie)->getArrayDados();
        }

        // Exporta imagem de perfil
        $this->exportaImagens($empresa);

        $dados = array(
            'pagesubtitle' => $dadosCadastrais['desc_ramo_atividade'],
            'pagetitle' => $dadosCadastrais['nm_fantasia'],
            'dados_cadastrais' => $dadosCadastrais,
            'telefones' => $telefones,
            'enderecos' => $enderecos,
            'estudantes' => $estudantes
        );

        $this->view = new View('InstituicaoEnsino', 'visualizar');
        $this->view->output($dados);
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
                    $this->model->exportaFoto($perfil->getCdPessoaJuridica(),$perfil->getImPerfil());
                }
            }
        } else {
            if ($arr_perfil->getImPerfil()
                && !file_exists($this->model->getImgFolder() . $arr_perfil->getCdPessoaJuridica() . '.jpg')
            ) {
                $this->model->exportaFoto($arr_perfil->getCdPessoaJuridica(),$arr_perfil->getImPerfil());
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

} 