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
        parent::__construct();
        $this->setTabela('tb_usuario');
        $this->setPrimaryKey('cd_usuario');

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

        if (!$this->db->insert($this->getTabela(), $this->getDados())) {
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
            $id = $this->dados[$this->getPrimaryKey()];
        }

        $this->filtrarUpdateDados($campos);

        if (!$this->db->update($this->getTabela(), $this->getDados(), "{$this->getPrimaryKey()} = {$id}")) {
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
        $this->dados = Input::emptyToNull($this->getDados());
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
        $this->dados = Input::emptyToNull($this->getDados());
    }

    /**
     *
     * @param type $user
     * @return boolean
     */
    public function find($user = null)
    {
        if ($user) {
            $field = (is_numeric($user)) ? $this->getPrimaryKey() : 'login';
            $data = $this->db->get($this->getTabela(), "{$field} = '{$user}'");

            if ($data->getNumRegistros()) {
                $this->setDados($data->first());
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
        $this->db->get($this->getTabela(), "{$this->getPrimaryKey()} = {$id}");

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
            Session::put($this->sessionName, $this->dados[$this->primaryKey]);
            Session::put('login', $this->dados['login']);
        } else {
            $user = $this->find($usuario);
            if ($user) {
                if (Hash::verify($senha, $this->getDados()['usuario'],$this->getDados()['senha'])) {
                    Session::put($this->sessionName, $this->getDados()[$this->primaryKey]);
                    Session::put('login', $this->getDados()['login']);

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
        $group = $this->db->get('nivel', 'id' . '=' . $this->getDados()['nivel']);

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
    public function setPerfil($perfil_id)
    {
        $this->perfil = (new PerfilModel())->getPerfil($perfil_id);
    }

    /**
     * @return mixed
     */
    public function getPerfil($perfil_id)
    {
        return (new PerfilModel())->getPerfil($perfil_id);
    }

    /**
     * @return array = Array com todos os registros da tabela
     */
    public function getUserList()
    {
        $list = (array)$this->fullList();

        // Para cada perfil retornado, executa getPerfil('id')
        foreach($list as $item => $user) {
            $list[$item]['cd_pessoa_fisica'] = $this->getPerfil($list[$item]['cd_pessoa_fisica'] );
        }
        return $list;
    }

}
