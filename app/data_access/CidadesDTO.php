<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 04/02/15
 * Time: 23:28
 */

class CidadesDTO extends DataTransferObject
{
    private $id;
    private $nome;
    private $codigo_ibge;
    private $estado_id;
    private $populacao_2010;
    private $densidade_demo;
    private $gentilico;
    private $area;

    /** @var  array */
    private $reflex;

    public function __construct()
    {
        $this->reflex = array(
            'id' => 'getId',
            'nome ' => 'getNome',
            'codigo_ibge' => 'getCodigoIbge',
            'estado_id' => 'getEstadoId',
            'populacao_2010' => 'getPopulacao2010',
            'densidade_demo' => 'getDensidadeDemo',
            'gentilico' => 'getGentilico',
            'area' => 'getArea'
        );
    }
    /**
     * Deve retornar um array associativo onde os índices são as colunas da tabela
     * e os valores são os métodos 'Getter' da respectiva coluna
     * @return array
     */
    public function getReflex()
    {
        return $this->reflex;
    }

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @return mixed
     */
    public function getCodigoIbge()
    {
        return $this->codigo_ibge;
    }

    /**
     * @return mixed
     */
    public function getDensidadeDemo()
    {
        return $this->densidade_demo;
    }

    /**
     * @return mixed
     */
    public function getEstadoId()
    {
        return $this->estado_id;
    }

    /**
     * @return mixed
     */
    public function getGentilico()
    {
        return $this->gentilico;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getPopulacao2010()
    {
        return $this->populacao_2010;
    }

    /**
     * @param $area
     * @return $this
     */
    public function setArea($area)
    {
        $this->area = $area;
        return $this;
    }

    /**
     * @param $codigo_ibge
     * @return $this
     */
    public function setCodigoIbge($codigo_ibge)
    {
        $this->codigo_ibge = $codigo_ibge;
        return $this;
    }

    /**
     * @param $densidade_demo
     * @return $this
     */
    public function setDensidadeDemo($densidade_demo)
    {
        $this->densidade_demo = $densidade_demo;
        return $this;
    }

    /**
     * @param $estado_id
     * @return $this
     */
    public function setEstadoId($estado_id)
    {
        $this->estado_id = $estado_id;
        return $this;
    }

    /**
     * @param $gentilico
     * @return $this
     */
    public function setGentilico($gentilico)
    {
        $this->gentilico = $gentilico;
        return $this;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $nome
     * @return $this
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @param $populacao_2010
     * @return $this
     */
    public function setPopulacao2010($populacao_2010)
    {
        $this->populacao_2010 = $populacao_2010;
        return $this;
    }

}