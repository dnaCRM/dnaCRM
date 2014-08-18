<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 02/08/14
 * Time: 19:14
 */
class PerfilModel extends Model
{

    private $fotoPerfil = false;
    private $imgFolder;


    public function __construct()
    {
        $this->db = DB::getInstance();
        $this->tabela = 'pessoa_fisica_tb';
        $this->pk = 'cd_pessoa_fisica';
        $this->imgFolder = IMG_UPLOADS_FOLDER . "{$this->tabela}\\";
    }

    public function setFotoPerfil($foto)
    {
        $this->fotoPerfil = $foto;
    }

    /**
     * @return string
     */
    public function getImgFolder()
    {
        return $this->imgFolder;
    }

    public function create($campos = array())
    {
        $this->filtrarDados($campos);

        if (!$this->db->insert($this->tabela, $this->dados)) {
            throw new Exception('Não foi possível realizar o cadastro.');
        }

        $this->gravarFoto($this->db->first()[$this->pk]);

    }

    public function updatePerfil($id, array $campos)
    {
        $this->filtrarDados($campos);

        if (!$this->db->update($this->tabela, $this->dados, "{$this->pk} = {$id}")) {
            throw new Exception('Não foi possível atualizar o cadastro.');
        }

        $this->gravarFoto($id);
        $this->getPerfilFoto($id);

    }

    public function deletePerfil($id)
    {
        if (!$this->db->delete($this->tabela, "{$this->pk} = {$id}")) {
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

    }

    public function fullList()
    {
        $this->db->select($this->tabela, null, null, null, "{$this->pk} DESC");
        return $this->db->getResultado();
    }

    public function getPerfil($id = '')
    {
        $this->db->get($this->tabela, "{$this->pk} = {$id}");
        if ($this->db->getNumRegistros() > 0) {
            return $this->db->first();
        }
        Session::flash('fail', 'Pefil não encontrado');
        Redirect::to(SITE_URL . 'Perfil');
    }

    /**
     * Testa se uma foto foi enviada
     * caso positivo, a foto será gravada no banco
     * @todo verificar necessidade de fazer a gravação dos dados dentro de uma transaction
     */
    private function gravarFoto($id)
    {
        if ($this->fotoPerfil) {

            $file = SITE_ROOT . IMG_UPLOADS_FOLDER . $this->fotoPerfil;
            $pdo = $this->db->getPDO();

            $stmt = $pdo->prepare("UPDATE {$this->tabela} SET im_foto = lo_import('{$file}') WHERE {$this->pk} = {$id}");

            $pdo->beginTransaction();
            $stmt->execute();
            $pdo->commit();

        }

    }

    /**
     * Recebe a chave primária do perfil,
     * Resgata a imagem da tabela no BD
     * Testa se uma pasta com o nome da tabela existe
     * Casa não exista, a pasta é criada para receber a imagem exportada
     *
     * @param $id = id do perfil
     */
    public function getPerfilFoto($id)
    {

        if (!file_exists($this->imgFolder)) {
            mkdir($this->imgFolder);
        }

        $foto = SITE_ROOT . $this->imgFolder . $id . '.jpg';

        $pdo = $this->db->getPDO();
        $state = $pdo->prepare("select lo_export(im_foto, '{$foto}') from {$this->tabela} where {$this->pk} = {$id}");

        $pdo->beginTransaction();
        $state->execute();
        $pdo->commit();
    }

}