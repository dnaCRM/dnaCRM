<?php

class UserModel extends Model
{
    private $sessionName;
    private $cookieName;
    private $isLoggedIn;

    /**
     *
     * @param type $user
     */
    public function __construct($user = null)
    {
        $this->tabela = 'usuarios';
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
     * @throws Exception
     */
    public function create($campos = array())
    {
        $this->filtrarDados($campos);

        if (!$this->db->insert('usuarios', $this->dados)) {
            throw new Exception('There was a problem creating an account.');
        }
    }

    /**
     *
     * @param array $campos
     * @param string $id
     * @throws Exception
     */
    public function updateUser($id = null, $campos = [])
    {

        if (!$id && $this->isLoggedIn()) {
            $id = $this->dados['id_usuario'];
        }

        $this->filtrarUpdateDados($campos);

        if (!$this->db->update($this->tabela, "id_usuario = {$id}", $this->dados)) {
            throw new Exception('Não foi possível atualizar.');
        }
    }

    private function filtrarUpdateDados($dados)
    {
        $filtros = [
            'senha' => null,
            'salt' => null,
            'nome_usuario' => FILTER_SANITIZE_STRING,
            'data_atualizado' => FILTER_DEFAULT,
        ];

        $this->dados = filter_var_array($dados, $filtros);
    }

    private function filtrarDados($dados)
    {
        $filtros = [
            'usuario' => FILTER_SANITIZE_STRING,
            'senha' => null,
            'salt' => null,
            'nome_usuario' => FILTER_SANITIZE_STRING,
            'data_cadastro' => FILTER_DEFAULT,
            'data_atualizado' => FILTER_DEFAULT,
            'grupo' => FILTER_DEFAULT
        ];

        $this->dados = filter_var_array($dados, $filtros);
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
            $data = $this->db->get($this->tabela, "{$field} = '{$user}'");

            if ($data->getNumRegistros()) {
                $this->dados = $data->first();
                return true;
            }

        }
        return false;
    }

    /**
     * @param string $id = id do usuário
     * @return array = primeiro registro encontrado usando o id informado
     */
    public function getUser($id = '')
    {
        $this->db->get($this->tabela, "id_usuario = {$id}");
        if ($this->db->getNumRegistros() > 0) {
            return $this->db->first();
        }
        Session::flash('fail', 'Usuário não encontrado');
        Redirect::to(SITE_URL . 'User');
    }

    /**
     *
     * @param string $usuario
     * @param string $senha
     * @param boolean $lembrar
     * @return boolean
     */
    public function login($usuario = null, $senha = null, $lembrar = false)
    {

        if (!$usuario && !$senha && $this->exists()) {
            Session::put($this->sessionName, $this->dados['id_usuario']);
            Session::put('nome_usuario', $this->dados['nome_usuario']);
        } else {
            $user = $this->find($usuario);
            if ($user) {
                if ($this->dados['senha'] === Hash::make($senha, $this->dados['salt'])) {
                    Session::put($this->sessionName, $this->dados['id_usuario']);
                    Session::put('nome_usuario', $this->dados['nome_usuario']);

                    if ($lembrar) {
                        $hash = Hash::unique();
                        $hashCheck = $this->db->get('users_session', "user_id = {$this->dados['id_usuario']}");

                        if (!$hashCheck->getNumRegistros()) {
                            $this->db->insert(
                                'users_session', [
                                'user_id' => $this->dados['id_usuario'],
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
        $group = $this->db->get('grupos', 'id' . '=' . $this->dados['grupo']);

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
        return (!empty($this->dados)) ? true : false;
    }

    /**
     *
     */
    public function logout()
    {

        $this->db->delete('users_session', "user_id = {$this->dados['id_usuario']}");

        Session::delete($this->sessionName);
        Cookie::delete($this->cookieName);
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
