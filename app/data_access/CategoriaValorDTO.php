<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 13/10/14
 * Time: 22:34
 */

class CategoriaValorDTO extends DataTransferObject
{

    private $cd_vl_categoria;
    private $cd_categoria;
    private $desc_vl_catg;
    private $genero;
    private $cd_grupo;
    private $cd_cat_grupo;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct()
    {

        $this->reflex = array(
            'cd_vl_categoria' => 'getCdVlCategoria',
            'cd_categoria' => 'getCdCategoria',
            'desc_vl_catg' => 'getDescVlCatg',
            'genero' => 'getGenero',
            'cd_grupo' => 'getCdGrupo',
            'cd_cat_grupo' => 'getCdCatGrupo',
            'cd_usuario_criacao' => 'getCdUsuarioCriacao',
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
    public function getCdCatGrupo()
    {
        return $this->cd_cat_grupo;
    }

    /**
     * @return mixed
     */
    public function getCdGrupo()
    {
        return $this->cd_grupo;
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
    public function getGenero()
    {
        return $this->genero;
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

    ################## SETTERS #######################

    /**
     * @param $cd_categoria
     * @return $this
     */
    public function setCdCategoria($cd_categoria)
    {
        $this->cd_categoria = $cd_categoria;
        return $this;
    }

    /**
     * @param $cd_usuario_atualiza
     * @return $this
     */
    public function setCdUsuarioAtualiza($cd_usuario_atualiza)
    {
        $this->cd_usuario_atualiza = $cd_usuario_atualiza;
        return $this;
    }

    /**
     * @param $cd_usuario_criacao
     * @return $this
     */
    public function setCdUsuarioCriacao($cd_usuario_criacao)
    {
        $this->cd_usuario_criacao = $cd_usuario_criacao;
        return $this;
    }

    /**
     * @param $cd_vl_categoria
     * @return $this
     */
    public function setCdVlCategoria($cd_vl_categoria)
    {
        $this->cd_vl_categoria = $cd_vl_categoria;
        return $this;
    }

    /**
     * @param $desc_vl_catg
     * @return $this
     */
    public function setDescVlCatg($desc_vl_catg)
    {
        $this->desc_vl_catg = $desc_vl_catg;
        return $this;
    }

    /**
     * @param $dt_usuario_atualiza
     * @return $this
     */
    public function setDtUsuarioAtualiza($dt_usuario_atualiza)
    {
        $this->dt_usuario_atualiza = $dt_usuario_atualiza;
        return $this;
    }

    /**
     * @param $dt_usuario_criacao
     * @return $this
     */
    public function setDtUsuarioCriacao($dt_usuario_criacao)
    {
        $this->dt_usuario_criacao = $dt_usuario_criacao;
        return $this;
    }

    /**
     * @param $genero
     * @return $this
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
        return $this;
    }

    /**
     * @param $cd_cat_grupo
     * @return $this
     */
    public function setCdCatGrupo($cd_cat_grupo)
    {
        $this->cd_cat_grupo = $cd_cat_grupo;
        return $this;
    }

    /**
     * @param $cd_grupo
     * @return $this
     */
    public function setCdGrupo($cd_grupo)
    {
        $this->cd_grupo = $cd_grupo;
        return $this;
    }
}