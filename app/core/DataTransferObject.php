<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 13/09/14
 * Time: 22:40
 */

abstract class DataTransferObject {
    /**
     * Deve retornar um array associativo onde os índices são as colunas da tabela
     * e os valores são os métodos 'Getter' da respectiva coluna
     * @return array
     */
    public abstract function getReflex();
} 