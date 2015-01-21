<?php

class JavaScriptLoader
{
    private static $formList = array(
        'formapartamento' => 'apartamento',
        'formcategoria' => 'categoria',
        'formcondominio' => 'condominio',
        'forminstensino' => 'inst_ensino',
        'loginScreen' => 'login',
        'formOcorrencia' => 'ocorrencia',
        'formOrdemServico' => 'ordem_servico',
        'formpessoafisica' => 'pessoa_fisica',
        'formpessoajuridica' => 'pessoa_juridica',
        'formprofissao' => 'profissao',
        'formrelacionamento' => 'relacionamento',
        'formSetor' => 'setor',
        'formuser' => 'usuario',
    );

    public static function load()
    {
        $uri = explode('/', trim($_SERVER['REQUEST_URI'], "/"));
        if (isset($uri[1]) && in_array($uri[1], array_keys(self::$formList))) {
            $method = $uri[1];
            $arquivo = self::$formList[$method];
            echo "<script src=\"js/form_validation/form_{$arquivo}.js\"></script>";
        }
    }
} 