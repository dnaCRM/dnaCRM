<?php

/**
 * Classe para abstração de retorno de valores das variáveis globais
 * $_POST E $_GET
 */
class Input
{
    /**
     * Descobre se $_POST ou $_GET estão definidos
     * @param string $type = tipo de array, 'post' ou 'get'
     * @return bool
     */
    public static function exists($type = 'post')
    {
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
    public static function get($item)
    {
        if (isset($_POST[$item])) {
            return ($_POST[$item] == '' ? null : trim($_POST[$item]));
        } else if (isset($_GET[$item])) {
            return $_GET[$item];
        } else if (isset($_FILES[$item])) {
            return $_FILES[$item];
        }
        return '';
    }

    /**
     * Recebe uma string e subtitui caracteres com pontuação
     * ou inválidos para nome de arquivo por traço '-'
     * @param string $nome = String a ser limpa
     * @return string
     */
    public static function limpar($nome)
    {
        $format = array();
        $format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:,\\\'<>°ºª';
        $format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';

        $string = strtr(utf8_decode($nome), utf8_decode($format['a']), $format['b']);
        $string = strip_tags(trim($string));
        $string = str_replace(' ', '-', $string);
        $string = str_replace(array('-----', '----', '---', '--'), '-', $string);

        return strtolower(utf8_encode($string));

    }

    /**
     * Recebe um string e retorna a mesma após remover os caracteres
     * '.', '-', '(', ')', ' '
     * Propósito: Receber um núemro de telefone ou CPF e remover os caracteres não numéricos
     * @param $string
     * @return mixed
     */
    public static function clean($string)
    {
        return str_replace(array('.', '-', '(', ')', ' '), '', $string);
    }

    /**
     * Recebe uma string ou array
     * Caso seja informado um array,
     * verifica se há alguma string vazia ('') e transforma em tipo de dado 'null'
     * Se $dados for somente uma string, verifica se a string é vazia e transforma e null
     * @param mixed $dados
     * @return mixed
     */
    public static function emptyToNull($dados)
    {
        if (is_array($dados)) {
            foreach ($dados as $campo => $conteudo) {
                $dados[$campo] = (!empty($conteudo) ? $conteudo : null);
            }
        } else {
            $dados = (!empty($dados) ? $dados : null);
        }

        return $dados;
    }
}
