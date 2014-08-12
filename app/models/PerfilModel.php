<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 02/08/14
 * Time: 19:14
 */
class PerfilModel extends Model
{

    public function __construct($user = null)
    {
        $this->db = DB::getInstance();
        $this->tabela = 'pessoa_fisica_tb';
    }

    public function create($campos = array())
    {
        $this->filtrarDados($campos);
        if (!$this->db->insert($this->tabela, $this->dados)) {
            throw new Exception('Não foi possível realizar o cadastro.');
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
            'cd_cgc' => FILTER_SANITIZE_STRING,
            'cd_profissao' => FILTER_SANITIZE_STRING,
            'nm_pessoa_fisica' => FILTER_SANITIZE_STRING,
            'email' => FILTER_SANITIZE_EMAIL,
            'cpf' => FILTER_SANITIZE_STRING,
            'rg' => FILTER_SANITIZE_STRING,
            'org_rg' => FILTER_SANITIZE_STRING,
            'fone' => FILTER_SANITIZE_STRING,
            'celular' => FILTER_SANITIZE_STRING,
            'dt_nascimento' => FILTER_SANITIZE_STRING,
            'ie_sexo' => FILTER_DEFAULT
        ];

        $this->dados = filter_var_array($dados, $filtros);
    }

    public function fullList()
    {
        $this->db->select($this->tabela, null, null, null, null);
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

}