<?php

class UserModel extends Model
{
    private $sessionName;
    private $cookieName;
    private $isLoggedIn;
    private $perfil;

    /**
     *
     * @param type $user
     */
    public function __construct($user = null)
    {
        $this->tabela = 'usuario_tb';
        $this->primary_key = 'cd_usuario';
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
     * @param array $campos
     * @throws Exception
     */
    public function create($campos = array())
    {
        $this->filtrarDados($campos);

        if (!$this->db->insert($this->tabela, $this->dados)) {
            throw new Exception('Não foi possível cadastrar usuário.');
        }
    }

    /**
     *
     * @param array $campos
     * @param string $id
     * @throws Exception
     */
    public function updateUser($id = null, $campos = array())
    {

        if (!$id && $this->isLoggedIn()) {
            $id = $this->dados['id_usuario'];
        }

        $this->filtrarUpdateDados($campos);

        if (!$this->db->update($this->tabela, $this->dados, "{$this->primary_key} = {$id}")) {
            throw new Exception('Não foi possível atualizar.');
        }
    }

    private function filtrarUpdateDados($dados)
    {
        $filtros = array(
            'login' => FILTER_SANITIZE_STRING,
            'senha' => null,
            'nivel' => FILTER_DEFAULT,
            'cd_usuario_atualiza' => FILTER_SANITIZE_NUMBER_INT,
            'dt_usuario_atualiza' => FILTER_DEFAULT
        );

        $this->dados = filter_var_array($dados, $filtros);
        $this->emptyToNull();
    }

    private function filtrarDados($dados)
    {
        $filtros = array(
            'cd_pessoa_fisica' => FILTER_SANITIZE_NUMBER_INT,
            'login' => FILTER_SANITIZE_STRING,
            'senha' => null,
            'nivel' => FILTER_DEFAULT,
            'ie_status' => FILTER_DEFAULT,
            'cd_usuario_criacao' => FILTER_SANITIZE_NUMBER_INT,
            'dt_usuario_criacao' => FILTER_DEFAULT,
            'cd_usuario_atualiza' => FILTER_SANITIZE_NUMBER_INT,
            'dt_usuario_atualiza' => FILTER_DEFAULT
        );

        $this->dados = filter_var_array($dados, $filtros);
        $this->emptyToNull();
    }

    /**
     *
     * @param type $user
     * @return boolean
     */
    public function find($user = null)
    {
        if ($user) {
            $field = (is_numeric($user)) ? $this->primary_key : 'login';
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
    public function getUsuario($id = '')
    {
        $this->db->get($this->tabela, "{$this->primary_key} = {$id}");

        if ($this->db->getNumRegistros() > 0) {
            $usuario_dados = (array)$this->db->first();
            $usuario_dados['perfil'] = (new PerfilModel())->getPerfil($usuario_dados['cd_pessoa_fisica']);
            return $usuario_dados;
        }
        Session::flash('fail', 'Usuário não encontrado', 'danger');
        Redirect::to(SITE_URL . 'User');
    }

    /**
     *
     * @param string $usuario
     * @param string $senha
     * @return boolean
     */
    public function login($usuario = null, $senha = null)
    {

        if (!$usuario && !$senha && $this->exists()) {
            Session::put($this->sessionName, $this->dados[$this->primary_key]);
            Session::put('login', $this->dados['login']);
        } else {
            $user = $this->find($usuario);
            if ($user) {
                if ($this->dados['senha'] === Hash::verify($senha, $this->dados['senha'])) {
                    Session::put($this->sessionName, $this->dados[$this->primary_key]);
                    Session::put('login', $this->dados['login']);

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
        $group = $this->db->get('nivel', 'id' . '=' . $this->dados['nivel']);

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
        $this->db->select($this->tabela, null, null, null, 'dt_usuario_atualiza DESC');
        return $this->db->getResultado();
    }

    /**
     * @param mixed $perfil
     */
    public function setPerfil(PerfilModel $perfil)
    {
        $this->perfil = $perfil;
    }

    /**
     * @return mixed
     */
    public function getPerfil()
    {
        return $this->perfil;
    }


}
