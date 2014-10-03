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

    }

    public function criarUsuario(Usuario $usuario)
    {
        //fc_criar_usuario(login,senha,nivel,status,cd_pessoa_fisica,login_trocar)
        try {
            $stmt = $this->con->prepare(
                "SELECT fc_criar_usuario(:login,:senha,:nivel,:status,:pessoafisica, null);
                INSERT INTO tb_usuario (cd_usuario_criacao, dt_usuario_criacao, cd_usuario_atualiza, dt_usuario_atualiza)
                VALUES (:usuario_criacao, :data_criacao, :usuario_atualiza, :data_atualiza");
            $stmt->bindValue(':login', $usuario->getLogin());
            $stmt->bindValue(':senha', $usuario->getSenha());
            $stmt->bindValue(':nivel', $usuario->getNivel());
            $stmt->bindValue(':status', $usuario->getIeStatus());
            $stmt->bindValue(':pessoa_fisica', $usuario->getCdUsuario());
            $stmt->bindValue(':usuario_criacao', $usuario->getCdUsuarioCriacao());
            $stmt->bindValue(':data_criacao', $usuario->getDtUsuarioCriacao());
            $stmt->bindValue(':usuario_atualiza', $usuario->getCdUsuarioAtualiza());
            $stmt->bindValue(':data_atualiza', $usuario->getDtUsuarioAtualiza());

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            $this->success = false;
            CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            return false;
        }

    }

    public function atualizarUsuario(Usuario $usuario)
    {
        //fc_criar_usuario(login,senha,nivel,status,cd_pessoa_fisica,login_trocar)
        try {
            $stmt = $this->con->prepare(
                "SELECT fc_criar_usuario(null,:senha,:nivel,:status,:pessoafisica, :login);
                INSERT INTO tb_usuario (cd_usuario_atualiza, dt_usuario_atualiza)
                VALUES (:usuario_criacao, :data_criacao, :usuario_atualiza, :data_atualiza");
            $stmt->bindValue(':login', $usuario->getLogin());
            $stmt->bindValue(':senha', $usuario->getSenha());
            $stmt->bindValue(':nivel', $usuario->getNivel());
            $stmt->bindValue(':status', $usuario->getIeStatus());
            $stmt->bindValue(':pessoa_fisica', $usuario->getCdUsuario());
            $stmt->bindValue(':usuario_atualiza', $usuario->getCdUsuarioAtualiza());
            $stmt->bindValue(':data_atualiza', $usuario->getDtUsuarioAtualiza());

            $stmt->execute();
            return true;
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