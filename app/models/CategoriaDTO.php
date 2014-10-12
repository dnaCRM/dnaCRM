<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 11/10/14
 * Time: 21:39
 */

class CategoriaDTO extends DataTransferObject {

    private $cd_categoria;
    private $desc_categoria;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct(){

        $this->reflex = array(
            'cd_categoria' => 'getCategoria',
            'desc_categoria' => 'getDescCategoria',
            'cd_usuario_cricao' => 'getCdUsuarioCriacao',
            'dt_usuario_criacao' => 'getDtUsuarioCriacao',
            'cd_usuario_atualiza' => 'getCdUsuarioAtualiza',
            'dt_usuario_atualiza' => 'getDtUsuarioAtualiza',
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
    public function getCdCategoria()
    {
        return $this->cd_categoria;
    }

    /**
     * @return mixed
     */
    public function getCdUsuarioAtualiza()
    {
        return $this->cd_usuario_atualiza;
    }

    /**
     * @return mixed
     */
    public function getCdUsuarioCriacao()
    {
        return $this->cd_usuario_criacao;
    }

    /**
     * @return mixed
     */
    public function getDescCategoria()
    {
        return $this->desc_categoria;
    }

    /**
     * @return mixed
     */
    public function getDtUsuarioAtualiza()
    {
        return $this->dt_usuario_atualiza;
    }

    /**
     * @return mixed
     */
    public function getDtUsuarioCriacao()
    {
        return $this->dt_usuario_criacao;
    }

    /**
     * @param mixed $cd_categoria
     */
    public function setCdCategoria($cd_categoria)
    {
        $this->cd_categoria = $cd_categoria;
    }

    /**
     * @param mixed $cd_usuario_atualiza
     */
    public function setCdUsuarioAtualiza($cd_usuario_atualiza)
    {
        $this->cd_usuario_atualiza = $cd_usuario_atualiza;
    }

    /**
     * @param mixed $cd_usuario_criacao
     */
    public function setCdUsuarioCriacao($cd_usuario_criacao)
    {
        $this->cd_usuario_criacao = $cd_usuario_criacao;
    }

    /**
     * @param mixed $desc_categoria
     */
    public function setDescCategoria($desc_categoria)
    {
        $this->desc_categoria = $desc_categoria;
    }

    /**
     * @param mixed $dt_usuario_atualiza
     */
    public function setDtUsuarioAtualiza($dt_usuario_atualiza)
    {
        $this->dt_usuario_atualiza = $dt_usuario_atualiza;
    }

    /**
     * @param mixed $dt_usuario_criacao
     */
    public function setDtUsuarioCriacao($dt_usuario_criacao)
    {
        $this->dt_usuario_criacao = $dt_usuario_criacao;
    }

    /**
     * @param array $reflex
     */
    public function setReflex($reflex)
    {
        $this->reflex = $reflex;
    }

    ################## SETTERS #######################








} 