<?php

class EstadosDTO extends DataTransferObject
{
    private $id;
    private $nome;
    private $sigla;

    /** @var  array */
    private $reflex;

    public function __contruct()
    {
        $this->reflex = array(
            'id' => 'getId',
            'nome ' => 'getNome',
            'sigla' => 'getSigla',''
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
    public function getSigla()
    {
        return $this->sigla;
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
     * @param $sigla
     * @return $this
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
        return $this;
    }


}