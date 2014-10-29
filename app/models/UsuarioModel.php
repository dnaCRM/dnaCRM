<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 02/10/14
 * Time: 11:24
 */
class UsuarioModel extends Model
{
    /** @var UsuarioDTO  */
    private $dto;
    /** @var  UsuarioDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new UsuarioDAO();
    }

    public function login($usuario, $senha)
    {
        $this->dto->setLogin($usuario);

        if (!$usuario = $this->dao->findByLogin($this->dto)) {
            Session::flash('msg', 'Usuário inexistente', 'danger');
            Redirect::to(SITE_URL . 'Usuario/loginScreen');
        }
        $login = $usuario->getCdUsuario();

        if ($usuario) {

            try {
                $pdo = new PDO(
                    Config::get('database/sgbd') . ':host=' .
                    Config::get('database/host') . ';dbname=' .
                    Config::get('database/dbname'),
                    $login,
                    $senha);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                Session::put('user', $login);
                Session::put('pass', $senha);
                Session::put('usuario', $usuario->getLogin());
                Session::flash('msg', 'Logado!', 'success');
                return true;
            } catch (PDOException $e) {
                CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
                return false;
            }

        }
    }

    public static function logout()
    {
        Session::delete('user');
        Session::delete('pass');
        Session::delete('usuario');
    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(UsuarioDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
}