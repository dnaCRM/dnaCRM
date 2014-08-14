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

    public function __construct($user = null)
    {
        $this->db = DB::getInstance();
        $this->tabela = 'pessoa_fisica_tb';
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

        if ($this->fotoPerfil) {
            $id = $this->db->first()['cd_pessoa_fisica'];
            $file = SITE_ROOT . 'img\uploads\\' . $this->fotoPerfil;
            $pdo = $this->db->getPDO();

            $stmt = $pdo->prepare("UPDATE pessoa_fisica_tb SET im_foto = lo_import('{$file}') WHERE cd_pessoa_fisica = {$id}");

            $pdo->beginTransaction();
            $stmt->execute();
            $pdo->commit();

        }

    }

    public function updatePerfil($id, $campos)
    {
        $this->filtrarDados($campos);
        $this->db->update($this->tabela, $id, $this->dados);
    }

    private function filtrarDados($dados)
    {
        $filtros = [
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
        ];



        $this->dados = filter_var_array($dados, $filtros);
        var_dump($this->dados);
    }

    public function fullList()
    {
        $this->db->select($this->tabela, null, null, null, 'cd_pessoa_fisica DESC');
        return $this->db->getResultado();
    }

    public function getPerfil($id = '')
    {
        $this->db->get($this->tabela, "cd_pessoa_fisica = {$id}");
        if ($this->db->getNumRegistros() > 0) {
            return $this->db->first();
        }
        Session::flash('fail', 'Pefil não encontrado');
        Redirect::to(SITE_URL . 'Perfil');
    }

    public function getPerfilFoto($id)
    {
        $foto = SITE_ROOT . 'img\uploads\\'. $id . '.jpg';
        $pdo = $this->db->getPDO();
        $state = $pdo->prepare("select lo_export(im_foto, '{$foto}') from pessoa_fisica_tb where cd_pessoa_fisica = {$id}");

        $pdo->beginTransaction();
        $state->execute();
        $pdo->commit();
    }

}