<?php
/**
 * Classe para abstração de retorno de valores das variáveis globais
 * $_POST E $_GET
 */

class Input {
    /**
     * Descobre se $_POST ou $_GET estão definidos
     * @param string $type = tipo de array, 'post' ou 'get'
     * @return bool
     */
    public static function exists($type = 'post') {
        switch ($type) {
            case 'post':
                return (!empty($_POST)) ? true : false;
                break;
            case 'get':
                return (!empty($_GET)) ? true : false;
                break;
            case 'files':
                return (!empty($_FILES)) ? true : false;
                break;
            default:
                return false;
                break;
        }
    }
    /**
     * Retorna um valor armazenado em $_POST ou $_GET
     * @param mixed $item = nome do valor
     * @return mixed
     */
    public static function get($item) {
        if (isset($_POST[$item])) {
            return $_POST[$item];
        }
        else if (isset($_GET[$item])) {
            return $_GET[$item];
        }
        return '';
    }

}
