<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 12/10/14
 * Time: 21:42
 */

class CategoriaValorDTO {
    private $cd_vl_categoria;
    private $cd_categoria;
    private $desc_vl_catg;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualizacao;
    private $dt_usuario_atualizacao;

    /** @var  array */
    private $reflex;

    public function __construct(){
        $this->reflex = array(
            'cd_vl_categoria' => 'getCdVlCategoria',
            'cd_categoria' => 'getCdCategoria',
            'desc_vl_catg' => 'getDescVlCatg',
            'cd_usuario_criacao' => 'getCdUsuarioCriacao',
            'dt_usuario_criacao' => 'getDtUsuarioCriacao',
            'cd_usuario_atualizacao' => 'getCdUsuarioAtualizacao',
            'dt_usuario_atualizacao' => 'getDtUsuarioAtualizacao',
        );
    }

    /**
     * @return mixed
     */
    public function getReflex(){
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
    public function getCdUsuarioAtualizacao()
    {
        return $this->cd_usuario_atualizacao;
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
    public function getCdVlCategoria()
    {
        return $this->cd_vl_categoria;
    }

    /**
     * @return mixed
     */
    public function getDescVlCatg()
    {
        return $this->desc_vl_catg;
    }

    /**
     * @return mixed
     */
    public function getDtUsuarioAtualizacao()
    {
        return $this->dt_usuario_atualizacao;
    }

    /**
     * @return mixed
     */
    public function getDtUsuarioCriacao()
    {
        return $this->dt_usuario_criacao;
    }

    ################## SETTERS #######################

    /**
     * @param mixed $cd_categoria
     */
    public function setCdCategoria($cd_categoria)
    {
        $this->cd_categoria = $cd_categoria;
    }

    /**
     * @param mixed $cd_usuario_atualizacao
     */
    public function setCdUsuarioAtualizacao($cd_usuario_atualizacao)
    {
        $this->cd_usuario_atualizacao = $cd_usuario_atualizacao;
    }

    /**
     * @param mixed $cd_usuario_criacao
     */
    public function setCdUsuarioCriacao($cd_usuario_criacao)
    {
        $this->cd_usuario_criacao = $cd_usuario_criacao;
    }

    /**
     * @param mixed $cd_vl_categoria
     */
    public function setCdVlCategoria($cd_vl_categoria)
    {
        $this->cd_vl_categoria = $cd_vl_categoria;
    }

    /**
     * @param mixed $desc_vl_catg
     */
    public function setDescVlCatg($desc_vl_catg)
    {
        $this->desc_vl_catg = $desc_vl_catg;
    }

    /**
     * @param mixed $dt_usuario_atualizacao
     */
    public function setDtUsuarioAtualizacao($dt_usuario_atualizacao)
    {
        $this->dt_usuario_atualizacao = $dt_usuario_atualizacao;
    }

    /**
     * @param mixed $dt_usuario_criacao
     */
    public function setDtUsuarioCriacao($dt_usuario_criacao)
    {
        $this->dt_usuario_criacao = $dt_usuario_criacao;
    }
}