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


    public function gravar(UsuarioDTO $usuario)
    {
        if ($usuario->getCdUsuario() == '') {
            $this->insert($usuario);
        } else {
            $this->update($usuario);
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