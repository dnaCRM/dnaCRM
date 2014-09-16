<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 13/09/14
 * Time: 22:40
 */

abstract class DataTransferObject {
    /**
     * @return array = Todos os nomes de atributos da classe
     */
    public function Attrs()
    {
        return array_keys(get_class_vars(get_class($this)));
    }

    /**
     * @param string $type = Se não informado, será 'get', informar 'set' se necessário
     * @return array = Todos os métodos da classe de acordo com o tipo informado
     */
    public function methods($type = 'get')
    {
        $type = $type == 'get' || $type == '' ? 'get' : 'set';
        $methods = array();
        foreach(get_class_methods(get_class($this)) as $m) {
            if (strstr($m, $type))
                $methods[] = $m;
        }

        return $methods;
    }

    /**
     * @return array
     */
    public abstract function getReflex();
} 