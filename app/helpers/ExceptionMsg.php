<?php
/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 09/09/14
 * Time: 00:44
 */

class ExceptionMsg {
    private static $constraints = array(
        'uq_pessoa_fisica_cpf' => 'O CPF informado já existe em outro perfil!',
        'uq_pessoa_fisica_email' => 'O e-mail informado já existe em outro perfil!',
        'uq_pessoa_fisica_rg' => 'O e-RG informado já existe em outro perfil!',
        '08006' => 'Impossível conectar. Senha incorreta?',
    );

    public static function msg($mensagem)
    {
        foreach(self::$constraints as $constraint => $msg) {
            $mensagem = strpos($mensagem, $constraint) ? $msg : $mensagem;
        }

        return $mensagem;
    }
}