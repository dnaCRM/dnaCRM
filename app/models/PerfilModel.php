<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 02/08/14
 * Time: 19:14
 */
class PerfilModel extends Model implements IModelComFoto
{

    private $fotoPerfil = false;
    protected $coluna_imagem;// coluna que guarda imagens
    private $image_folder;
    /** @var  ImageModel */
    private $image_manager;


    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'pessoa_fisica_tb';
        $this->coluna_imagem = 'im_foto';
        $this->primary_key = 'cd_pessoa_fisica';
        $this->image_folder = IMG_UPLOADS_FOLDER . "{$this->tabela}/";

        $this->setImageManager();
    }

    public function setFotoPerfil($foto)
    {
        $this->fotoPerfil = $foto;
    }

    public function create($campos = array())
    {
        $this->filtrarDados($campos);

        if (!$this->db->insert($this->tabela, $this->dados)) {
            throw new Exception('Não foi possível realizar o cadastro.');
        }

        $id = $this->db->first()[$this->primary_key];
        $this->setFoto($id);

    }

    public function updatePerfil($id, array $campos)
    {
        $this->filtrarDados($campos);

        if (!$this->db->update($this->tabela, $this->dados, "{$this->primary_key} = {$id}")) {
            throw new Exception('Não foi possível atualizar o cadastro.');
        }

        $this->setFoto($id);
        $this->getFoto($id);

    }

    public function deletePerfil($id)
    {
        if (!$this->db->delete($this->tabela, "{$this->primary_key} = {$id}")) {
            throw new Exception('Não foi possível deletar o cadastro.');
        }
    }

    private function filtrarDados($dados)
    {
        $filtros = array(
            'cd_cgc' => FILTER_SANITIZE_NUMBER_INT,
            'cd_profissao' => FILTER_SANITIZE_NUMBER_INT,
            'nm_pessoa_fisica' => FILTER_SANITIZE_STRING,
            'email' => FILTER_SANITIZE_EMAIL,
            'cpf' => FILTER_DEFAULT,
            'rg' => FILTER_SANITIZE_STRING,
            'org_rg' => FILTER_SANITIZE_STRING,
            'fone' => FILTER_DEFAULT,
            'celular' => FILTER_DEFAULT,
            'dt_nascimento' => FILTER_DEFAULT,
            'ie_sexo' => FILTER_DEFAULT,
        );

        $this->dados = filter_var_array($dados, $filtros);

        $this->emptyToNull();

    }

    public function getPerfil($id = '')
    {
        $this->db->get($this->tabela, "{$this->primary_key} = {$id}");
        if ($this->db->getNumRegistros() > 0) {
            return $this->db->first();
        }
        Session::flash('fail', 'Pefil não encontrado','info');
        Redirect::to(SITE_URL . 'Perfil');
    }

    // Métodos obrigatórios para interface IModelComFoto
    public function getImageFolder()
    {
        return $this->image_folder;
    }

    public function getTabela()
    {
        return $this->tabela;
    }

    public function getColunaImagem()
    {
        return $this->coluna_imagem;
    }

    public function setImageManager()
    {
        $this->image_manager = new ImageModel($this);
    }

    public function getFoto($id)
    {
        $this->image_manager->exportaFoto($id);
    }

    public function setFoto($id)
    {
        $this->image_manager->importaFoto($id);
    }

    public function recebefoto()
    {
        $this->image_manager->uploadFoto();
    }
}