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
        $this->tabela = 'pessoa';
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
            'foto' => FILTER_DEFAULT,
            'nome' => FILTER_SANITIZE_STRING,
            'email' => FILTER_SANITIZE_EMAIL,
            'tel_fixo' => FILTER_SANITIZE_STRING,
            'tel_cel' => FILTER_SANITIZE_STRING,
            'obs' => FILTER_SANITIZE_STRING,
            'data_atualizado' => FILTER_DEFAULT
        ];

        $this->dados = filter_var_array($dados, $filtros);
    }

    public function fullList()
    {
        $this->db->select('pessoa', null, null, null, 'data_cadastro DESC');
        return $this->db->getResultado();
    }

    public function getPerfil($id = '')
    {
        $this->db->get('pessoa', "id = {$id}");
        if ($this->db->getNumRegistros() > 0) {
            return $this->db->first();
        }
        Session::flash('fail', 'Pefil não encontrado');
        Redirect::to(SITE_URL . 'Perfil');
    }

}