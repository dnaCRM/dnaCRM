<?php

class UserModel
{

    private $db;
    private $data;
    private $sessionName;
    private $cookieName;
    private $isLoggedIn;

    /**
     *
     * @param type $user
     */
    public function __construct($user = null)
    {
        $this->db = DB::getInstance();

        $this->sessionName = Config::get('session/session_name');
        $this->cookieName = Config::get('lembrar/cookie_name');

        if (!$user) {
            if (Session::exists($this->sessionName)) {
                $user = Session::get($this->sessionName);

                if ($this->find($user)) {
                    $this->isLoggedIn = true;
                } else {
                    // process Logout
                }
            }
        } else {
            $this->find($user);
        }
    }

    /**
     *
     * @param array $fields
     * @param string $id
     * @throws Exception
     */
    public function update($fields = [], $id = null)
    {

        if (!$id && $this->isLoggedIn()) {
            $id = $this->data()['id_usuario'];
        }

        if (!$this->db->update('usuarios', $id, $fields)) {
            throw new Exception('Não foi possível atualizar.');
        }
    }

    /**
     *
     * @param array $fields
     * @throws Exception
     */
    public function create($fields = array())
    {
        $filters = [
            'usuario' => FILTER_SANITIZE_STRING,
            'senha' => null,
            'salt' => null,
            'nome_usuario' => FILTER_SANITIZE_STRING,
            'data_cadastro' => FILTER_DEFAULT,
            'data_atualizado' => FILTER_DEFAULT,
            'grupo' => FILTER_DEFAULT
        ];

        $fields = filter_var_array($fields, $filters);

        if (!$this->db->insert('usuarios', $fields)) {
            throw new Exception('There was a problem creating an account.');
        }
    }

    /**
     *
     * @param type $user
     * @return boolean
     */
    public function find($user = null)
    {
        if ($user) {
            $field = (is_numeric($user)) ? 'id_usuario' : 'usuario';
            $data = $this->db->get('usuarios', "{$field} = '{$user}'");

            if ($data->getNumRegistros()) {
                $this->data = $data->first();
                return true;
            }

        }
        return false;
    }

    /**
     *
     * @param type $usuario
     * @param type $senha
     * @param type $lembrar
     * @return boolean
     */
    public function login($usuario = null, $senha = null, $lembrar = false)
    {

        if (!$usuario && !$senha && $this->exists()) {
            Session::put($this->sessionName, $this->data()['id_usuario']);
            Session::put('nome_usuario', $this->data()['nome_usuario']);
        } else {
            $user = $this->find($usuario);
            if ($user) {
                if ($this->data()['senha'] === Hash::make($senha, $this->data()['salt'])) {
                    Session::put($this->sessionName, $this->data()['id_usuario']);
                    Session::put('nome_usuario', $this->data()['nome_usuario']);

                    if ($lembrar) {
                        $hash = Hash::unique();
                        $hashCheck = $this->db->get('users_session', "user_id = {$this->data()['id_usuario']}");

                        if (!$hashCheck->getNumRegistros()) {
                            $this->db->insert(
                                'users_session', [
                                    'user_id' => $this->data()['id_usuario'],
                                    'hash' => $hash
                                ]);
                        } else {
                            $hash = $hashCheck->first()['hash'];
                        }

                        Cookie::put($this->cookieName, $hash, Config::get('lembrar/cookie_expiry'));
                    }
                    return true;
                }
            }
        }
        return false;
    }

    /**
     *
     * @param type $key
     * @return boolean
     */
    public function hasPermission($key)
    {
        $group = $this->db->get('grupos', 'id' . '=' . $this->data()['grupo']);

        if ($group->getNumRegistros()) {
            $permissions = json_decode($group->first()['permissions'], true);

            if ($permissions[$key] == true) {
                return true;
            }
        }
        return false;
    }

    /**
     *
     * @return type
     */
    public function exists()
    {
        return (!empty($this->data)) ? true : false;
    }

    /**
     *
     */
    public function logout()
    {

        $this->db->delete('users_session', "user_id = {$this->data()['id_usuario']}");

        Session::delete($this->sessionName);
        Cookie::delete($this->cookieName);
    }

    /**
     *
     * @return type
     */
    public function data()
    {
        return $this->data;
    }

    /**
     *
     * @return type
     */
    public function isLoggedIn()
    {
        return $this->isLoggedIn;
    }

    public function fullList()
    {
        $this->db->select('usuarios', null, null, null, 'data_atualizado DESC');
        return $this->db->getResultado();
    }

}
