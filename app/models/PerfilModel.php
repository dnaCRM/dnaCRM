<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 02/08/14
 * Time: 19:14
 */
class PerfilModel
{
    private $db;

    public function __construct($user = null)
    {
        $this->db = DB::getInstance();
    }

    public function create($fields = array())
    {

        /*        $fields = [
                    'nome' => Input::get('nome'),
                    'email' => Input::get('email'),
                    'tel_fixo' => Input::get('tel_fixo'),
                    'tel_cel' => Input::get('tel_cel'),
                    'obs' => Input::get('obs'),
                    'data_atualizado' => (new DateTime())->format('Y-m-d H:i:s')
                ];*/

        $filters = [
            'foto' => FILTER_DEFAULT,
            'nome' => FILTER_SANITIZE_STRING,
            'email' => FILTER_SANITIZE_EMAIL,
            'tel_fixo' => FILTER_SANITIZE_STRING,
            'tel_cel' => FILTER_SANITIZE_STRING,
            'obs' => FILTER_SANITIZE_STRING,
            'data_atualizado' => FILTER_DEFAULT
        ];

        $fields = filter_var_array($fields, $filters);
        if (!$this->db->insert('pessoa', $fields)) {
            throw new Exception('Não foi possível realizar o cadastro.');
        }
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
        Session::flash('fail','Pefil não encontrado');
        Redirect::to(SITE_URL.'Perfil');
    }

}