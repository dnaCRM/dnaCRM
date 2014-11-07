<?php

/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 01/10/14
 * Time: 18:54
 */
class UsuarioDAO extends DataAccessObject
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_usuario';
        $this->primaryKey = 'cd_usuario';
        $this->dataTransfer = 'UsuarioDTO';
    }


    public function gravar(UsuarioDTO $usuario, $atualizar)
    {
        if ($atualizar) {
            $sql = "SELECT fc_criar_usuario(null,:senha,:nivel,:status,:pessoa_fisica, :login)";
        } else {
            $sql = "SELECT fc_criar_usuario(:login,:senha,:nivel,:status,:pessoa_fisica, null)";
        }

        //fc_criar_usuario(login,senha,nivel,status,cd_pessoa_fisica,login_trocar)
        try {
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':login', $usuario->getLogin());
            $stmt->bindValue(':senha', $usuario->getSenha());
            $stmt->bindValue(':nivel', $usuario->getNivel());
            $stmt->bindValue(':status', $usuario->getIeStatus());
            $stmt->bindValue(':pessoa_fisica', $usuario->getCdUsuario());
            $stmt->execute();

            return $stmt->fetch();

            //Session::flash('usuario_cadastrado', 'Usuário registrado.', 'success');
            //return true;
        } catch (PDOException $e) {
            $this->success = false;
            CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            return false;
        }

    }

    public function findByLogin(UsuarioDTO $usuario)
    {
        $where = "login = '{$usuario->getLogin()}'";
        $this->resultado = $this->get($where);
        if ($this->resultado) {
            return $this->resultado[0];
        }
        return false;
    }
} 