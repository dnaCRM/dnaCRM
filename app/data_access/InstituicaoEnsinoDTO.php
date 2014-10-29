<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 04/10/14
 * Time: 09:10
 */

class InstituicaoEnsinoDTO extends DataTransferObject
{
    private $cd_instituicao;
    private $ds_instituicao;
    private $cd_catg_instituicao;
    private $cd_vl_catg_instituicao;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct()
    {
        $this->reflex = array(
            'cd_instituicao' => 'getCdInstituicao',
            'ds_instituicao' => 'getDsInstituicao',
            'cd_catg_instituicao' => 'getCdCatgInstituicao',
            'cd_vl_catg_instituicao' => 'getCdVlCatgInstituicao',
            'cd_usuario_criacao' => 'getCdUsuarioCriacao',
            'dt_usuario_criacao' => 'getDtUsuarioCriacao',
            'cd_usuario_atualiza' => 'getCdUsuarioAtualiza',
            'dt_usuario_atualiza' => 'getDtUsuarioAtualiza',
        );
    }

    /**
     * @return array
     */
    public function getReflex()
    {
        return $this->reflex;
    }

    /**
     * @return mixed
     */
    public function getCdCatgInstituicao()
    {
        return $this->cd_catg_instituicao;
    }

    /**
     * @return mixed
     */
    public function getCdInstituicao()
    {
        return $this->cd_instituicao;
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
    public function getCdVlCatgInstituicao()
    {
        return $this->cd_vl_catg_instituicao;
    }

    /**
     * @return mixed
     */
    public function getDsInstituicao()
    {
        return $this->ds_instituicao;
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
     * @param mixed $cd_catg_instituicao
     * @return InstituicaoEnsinoDTO
     */
    public function setCdCatgInstituicao($cd_catg_instituicao)
    {
        $this->cd_catg_instituicao = $cd_catg_instituicao;
        return $this;
    }

    /**
     * @param mixed $cd_instituicao
     * @return InstituicaoEnsinoDTO
     */
    public function setCdInstituicao($cd_instituicao)
    {
        $this->cd_instituicao = $cd_instituicao;
        return $this;
    }

    /**
     * @param mixed $cd_usuario_atualiza
     * @return InstituicaoEnsinoDTO
     */
    public function setCdUsuarioAtualiza($cd_usuario_atualiza)
    {
        $this->cd_usuario_atualiza = $cd_usuario_atualiza;
        return $this;
    }

    /**
     * @param mixed $cd_usuario_criacao
     * @return InstituicaoEnsinoDTO
     */
    public function setCdUsuarioCriacao($cd_usuario_criacao)
    {
        $this->cd_usuario_criacao = $cd_usuario_criacao;
        return $this;
    }

    /**
     * @param mixed $cd_vl_catg_instituicao
     * @return InstituicaoEnsinoDTO
     */
    public function setCdVlCatgInstituicao($cd_vl_catg_instituicao)
    {
        $this->cd_vl_catg_instituicao = $cd_vl_catg_instituicao;
        return $this;
    }

    /**
     * @param mixed $ds_instituicao
     * @return InstituicaoEnsinoDTO
     */
    public function setDsInstituicao($ds_instituicao)
    {
        $this->ds_instituicao = $ds_instituicao;
        return $this;
    }

    /**
     * @param mixed $dt_usuario_atualiza
     * @return InstituicaoEnsinoDTO
     */
    public function setDtUsuarioAtualiza($dt_usuario_atualiza)
    {
        $this->dt_usuario_atualiza = $dt_usuario_atualiza;
        return $this;
    }

    /**
     * @param mixed $dt_usuario_criacao
     * @return InstituicaoEnsinoDTO
     */
    public function setDtUsuarioCriacao($dt_usuario_criacao)
    {
        $this->dt_usuario_criacao = $dt_usuario_criacao;
        return $this;
    }

}