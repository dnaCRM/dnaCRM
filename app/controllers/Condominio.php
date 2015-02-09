<?php

class Condominio extends Controller
{
    /** @var  CondominioModel */
    private $condominioModel;

    public function __construct()
    { //o método é herdado da classe pai 'Controller'
        $this->setModel(new PessoaJuridicaDAO());
        $this->condominioModel = new CondominioModel();
    }


    public function start()
    { //Pega a lista completa de perfis
        $condominio_list = (array)$this->model->get('cd_ramo_atividade = 107');
        $relacao = array();
        foreach ($condominio_list as $perfil) {
            $relacao[] = $this->condominioModel->setDTO($perfil)->getArrayDados();
        }
        // Exporta imagens de perfil
        $this->exportaImagens($condominio_list);

        $dados = array(
            'pagesubtitle' => '',
            'pagetitle' => 'Condomínio',
            'list' => $relacao
        );

        $this->view = new View('Condominio', 'start');
        $this->view->output($dados);
    }

    /**
     * @param string $id = id(chave primária da tabela de condominio)
     * O método recebe o id e monta respecttiva a tela de condominio
     */
    public function visualizar($id = null)
    {
        $id = (int)$id;
        $condominioDTO = $this->findById($id);
        $condominio = $this->condominioModel->setDTO($condominioDTO)->getArrayDados();
        $setores = $this->condominioModel->getSetores(new SetorModel());

        // Exporta imagem de perfil
        $this->exportaImagens($condominioDTO);

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => '',
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $condominio['nm_fantasia'],
            //todos os atributos do perfil
            'condominio' => $condominio,
            'setores' => $setores
        );

        $this->view = new View('Condominio', 'visualizar');
        $this->view->output($dados);
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
}