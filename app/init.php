<?php
session_start();
### Função para carregamento automático de classes
function autoload($class)
{
    $folder = ['core', 'dbc', 'helpers', 'models'];

    foreach ($folder as $foldername) {
        if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . $foldername . DIRECTORY_SEPARATOR . $class . '.php')
            && !is_dir(__DIR__ . DIRECTORY_SEPARATOR . $foldername . DIRECTORY_SEPARATOR . $class . '.php')
        ) {
            include_once(__DIR__ . DIRECTORY_SEPARATOR . $foldername . DIRECTORY_SEPARATOR . $class . '.php');
        }
    }
}
// Registra a função na biblioteca padrão do Php
spl_autoload_register('autoload');

### DEFINIÇÃO DE CONSTANTES GLOBAIS #######
//define a url do site para ser usada em endereços relativos
$base_url = str_replace('index.php', '', $_SERVER['PHP_SELF']);
$root_url = str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']);

define('APP_NAME', 'dnaCRM');
define('SITE_URL', $base_url); //'http://localhost/dnacrm/'
define('SITE_ROOT', $root_url); //'C:\htdocs\dnacrm\\'
define('IMG_UPLOADS_FOLDER', 'img/uploads/');

/**
 * Dicionário de campos de tabelas
 */

$dic= array(
    'cd_cgc' => 'Empresa',
    'cd_profissao' => 'Profissão',
    'cd_pessoa_fisica' => 'Cod.',
    'nm_pessoa_fisica' => 'Nome',
    'email' => 'E-mail',
    'cpf' => 'CPF',
    'rg' => 'RG',
    'org_rg' => 'UF',
    'fone' => 'Telefone Fixo',
    'celular' => 'Celular',
    'dt_nascimento' => 'Data de Nascimento',
    'ie_sexo' => 'Sexo',
);

/**
 * Guarda configurações gerais
 */
$GLOBALS['config'] = array(
    'database' => array(
        'sgbd' => 'pgsql',
        'host' =>'127.0.0.1',
        'user' => 'postgres',
        'pass' => '123456',
        'dbname' => 'dnacrm'
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    ),
    'dicionario' => $dic // ver declaração acima
);

//Classes CSS para personalização de mensagens
define('CSS_PRIMARY', 'primary');
define('CSS_WARNING', 'warning');
define('CSS_INFO', 'info');
define('CSS_SUCCESS', 'success');
define('CSS_DANGER', 'danger');

#### Funções para personalização de mensagens de erro do Php

function CodeError($mensagem, $numero)
{
    switch ($numero) {
        case E_USER_NOTICE:
            $classecss = CSS_INFO;
            break;
        case E_USER_WARNING:
            $classecss = CSS_WARNING;
            break;
        case E_USER_ERROR:
            $classecss = CSS_DANGER;
            break;
        default:
            $classecss = CSS_DANGER;
            break;
    }

    echo "<div class=\"alert alert-{$classecss}\">";
    echo "<strong>Erro  :: </strong> {$mensagem}<br>";
    echo "</div>";
}

function CodeFail($numero, $mensagem, $arquivo, $linha)
{
    switch ($numero) {
        case E_USER_NOTICE:
            $classecss = CSS_INFO;
            break;
        case E_USER_WARNING:
            $classecss = CSS_WARNING;
            break;
        case E_USER_ERROR:
            $classecss = CSS_DANGER;
            break;
        default:
            $classecss = CSS_WARNING;
            break;
    }

    echo "<div class=\"alert alert-{$classecss}\">";
    echo "<strong>Erro na Linha: #{$linha} :: </strong> {$mensagem}<br>";
    echo "<small>{$arquivo}</small>";
    echo '</div>';
}
// Define manipulador de erro padrão
set_error_handler('CodeFail');

/**
 * @param $string
 * @return string
 */
function escape($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}
