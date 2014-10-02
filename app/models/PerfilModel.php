<?php

/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 02/08/14
 * Time: 19:14
 */
class PerfilModel extends Model implements IModelComFoto
{

    private $colunaImagem; // coluna que guarda imagens
    private $imgFolder;
    private $fotoDefault;
    /** @var  ImageModel */
    private $imageManager;

    public function __construct()
    {
        parent::__construct();
        $this->setTabela('tb_pessoa_fisica');
        $this->setColunaImagem('im_perfil');
        $this->setPrimaryKey('cd_pessoa_fisica');
        $this->setImageFolder(IMG_UPLOADS_FOLDER . "{$this->getTabela()}/");
        $this->setFotoDefault(IMG_UPLOADS_FOLDER . 'icon-user.jpg');

        $this->setImageManager(new ImageModel($this));
    }

    /**
     * Recebe o array com os dados e faz a limpeza de conteúdo
     * malicioso e caracteres inválidos
     * @param $dados = Dados que serão gravados no banco
     */
    public function setDados($dados)
    {
        $filtros = array(
            'cd_pessoa_juridica' => FILTER_SANITIZE_NUMBER_INT,
            'cd_profissao' => FILTER_SANITIZE_NUMBER_INT,
            'nm_pessoa_fisica' => FILTER_SANITIZE_STRING,
            'email' => FILTER_SANITIZE_EMAIL,
            'cpf' => FILTER_DEFAULT,
            'rg' => FILTER_SANITIZE_STRING,
            'cd_catg_org_rg' => FILTER_SANITIZE_STRING,
            'fone' => FILTER_DEFAULT,
            'celular' => FILTER_DEFAULT,
            'dt_nascimento' => FILTER_DEFAULT,
            'ie_sexo' => FILTER_DEFAULT,
        );

        /** Filtra o array de dados */
        $this->dados = filter_var_array($dados, $filtros);

        /** Pega todos os campos com valor vazio e transforma em tipo 'null' */
        $this->dados  = Input::emptyToNull($this->getDados());

    }

    /**
     * @param array $campos = Dados para criação de um novo Perfil
     * @throws Exception
     */
    public function create($campos = array())
    {
        $this->setDados($campos);

        if (!$this->db->insert($this->getTabela(), $this->getDados())) {
            throw new Exception('Não foi possível realizar o cadastro.');
        }

        $id = $this->db->first()[$this->getPrimaryKey()];
        $this->setFoto($id);

    }

    /**
     * @param $id = Id do Perfil a ser atualizado
     * @param array $campos = Dados do perfil
     * @throws Exception
     */
    public function updatePerfil($id, array $campos)
    {
        $this->filtrarDados($campos);

        if (!$this->db->update($this->getTabela(), $this->getDados(), "{$this->getPrimaryKey()} = {$id}")) {
            throw new Exception('Não foi possível atualizar o cadastro.');
        }
        /** Grava a foto do perfil */
        $this->setFoto($id);
        /** Recupera a foto gravada para ser exibida no Perfil */
        $this->getFoto($id);

    }

    /**
     * @param $id = id do Perfil a ser deletado
     * @throws Exception
     */
    public function deletePerfil($id)
    {
        if (!$this->db->delete($this->getTabela(), "{$this->getPrimaryKey()} = {$id}")) {
            throw new Exception('Não foi possível deletar o cadastro.');
        }
    }

    /**
     * @param string $id
     * @return array = Dados do perfil que possui a id informada
     */
    public function getPerfil($id = '')
    {
        $this->db->get($this->getTabela(), "{$this->getPrimaryKey()} = {$id}");

        if ($this->db->getNumRegistros() > 0) {

            $perfil_dados = (array)$this->db->first();

            $perfil_dados[$this->getColunaImagem()] = $this->getImgUrl($perfil_dados);

            return $perfil_dados;

        } else {
            /** Envia mensagem */
            Session::flash('fail', 'Pefil não encontrado', 'info');
            /** Redireciona para página de lista de Perfis */
            Redirect::to(SITE_URL . 'Perfil');
        }
    }

    /**
     * @return array = Array com todos os registros da tabela
     */
    public function getPerfilList()
    {
        $list = (array)$this->fullList();

        // Para cada perfil retornado, executa getImgUrl('perfil')
        foreach($list as $item => $perfil) {
            $list[$item][$this->getColunaImagem()] = $this->getImgUrl($list[$item]);
        }
        return $list;
    }

    /**
     * Recebe um array com dados do Perfil e testa se ele tem uma imagem gravada
     * @param array $perfil
     * @return string = endereço da imagem do Perfil ou imagem padrão
     */
    private function getImgUrl(array $perfil)
    {
        if (!file_exists($this->getImageFolder() . $perfil[$this->getPrimaryKey()] . '.jpg')) {
            $this->getFoto($perfil[$this->getPrimaryKey()] );
        }
        return $perfil[$this->getColunaImagem()] ?
            $this->getImageFolder() . $perfil[$this->getPrimaryKey()] . '.jpg' : $this->getFotoDefault();
    }

    /**
     * @param string $img_folder
     */
    public function setImageFolder($img_folder)
    {
        $this->imgFolder = $img_folder;
    }

    /**
     * @param mixed $coluna_imagem
     */
    public function setColunaImagem($coluna_imagem)
    {
        $this->colunaImagem = $coluna_imagem;
    }

    /**
     * @param string $foto_default
     */
    public function setFotoDefault($foto_default)
    {
        $this->fotoDefault = $foto_default;
    }

    /**
     * @return string
     */
    public function getFotoDefault()
    {
        return $this->fotoDefault;
    }

    // Métodos obrigatórios para interface IModelComFoto
    public function getImageFolder()
    {
        return $this->imgFolder;
    }

    public function getColunaImagem()
    {
        return $this->colunaImagem;
    }

    public function setImageManager(ImageModel $image_manager)
    {
        $this->imageManager = $image_manager;
    }

    public function getFoto($id)
    {
        $this->imageManager->exportaFoto($id);
    }

    public function setFoto($id)
    {
        $this->imageManager->importaFoto($id);
    }

    public function recebefoto()
    {
        $this->imageManager->uploadFoto();
    }
}