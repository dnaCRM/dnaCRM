<?php

class Hash {

    public static function make($senha, $usuario) {
        return 'md5'. md5($senha . $usuario);
    }

    public static function verify($senha, $usuario, $hash) {
        return self::make($senha, $usuario) == $hash ? true : false;
    }

    /**
     * Gera um hash através de um uniqid()
     * @return hashcode
     */
    public static function unique() {
        return uniqid();
    }

}
