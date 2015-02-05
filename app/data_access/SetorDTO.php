<?php

/**
 * Created by PhpStorm.
 * Usuario: Raul
 * Date: 07/10/14
 * Time: 01:43
 */
class SetorDTO extends DataTransferObject implements ImagemPerfilInterface
{
    private $cd_setor;
    private $cd_condominio;
    private $nm_setor;
    private $cd_setor_grupo;
    private $ramal;
    private $observacao;
    private $im_perfil;
    private $cd_catg_tipo;
    private $cd_vl_catg_tipo;
    private $cd_catg_sub_tipo;
    private $cd_vl_catg_sub_tipo;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct()
    {
        $this->reflex = array(
            'cd_setor' => 'getCdSetor',
            'cd_condominio' => 'getCdCondominio',
            'nm_setor' => 'getNmSetor',
            'cd_setor_grupo' => 'getCdSetorGrupo',
            'ramal' => 'getRamal',
            'observacao' => 'getObservacao',
            'cd_catg_tipo' => 'getCdCatgTipo',
            'cd_vl_catg_tipo' => 'getCdVlCatgTipo',
            'cd_catg_sub_tipo' => 'getCdCatgSubTipo',
            'cd_vl_catg_sub_tipo' => 'getCdVlCatgSubTipo',
            'cd_usuario_criacao' => 'getCdUsuarioCriacao',
            'dt_usuario_criacao' => 'getDtUsuarioCriacao',
            'cd_usuario_atualiza' => 'getCdUsuarioAtualiza',
            'dt_usuario_atualiza' => 'getDtUsuarioAtualiza',
        );
    }

    /**
     * Retorna um array com todos os campos da classe e seus métodos 'Getters'
     * Objetivo: fornecer um meio para que o seu respectivo DAO possa saber
     * dinamicamente quais os campos da tabela e quais métodos executar para
     * resgatar os dados
     * @return array
     */
    public function getReflex()
    {
        return $this->reflex;
    }

    /**
     * @return mixed
     */
    public function getCdCatgSubTipo()
    {
        return $this->cd_catg_sub_tipo;
    }

    /**
     * @return mixed
     */
    public function getCdCatgTipo()
    {
        return $this->cd_catg_tipo;
    }

    /**
     * @return mixed
     */
    public function getCdSetorGrupo()
    {
        return $this->cd_setor_grupo;
    }

    /**
     * @return mixed
     */
    public function getCdVlCatgSubTipo()
    {
        return $this->cd_vl_catg_sub_tipo;
    }

    /**
     * @return mixed
     */
    public function getCdVlCatgTipo()
    {
        return $this->cd_vl_catg_tipo;
    }

    /**
     * @return mixed
     */
    public function getRamal()
    {
        return $this->ramal;
    }

    /**
     * @return mixed
     */
    public function getCdCondominio()
    {
        return $this->cd_condominio;
    }

    /**
     * @return mixed
     */
    public function getCdSetor()
    {
        return $this->cd_setor;
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
     * @return mixed
     */
    public function getImPerfil()
    {
        return $this->im_perfil;
    }

    /**
     * @return mixed
     */
    public function getNmSetor()
    {
        return $this->nm_setor;
    }

    /**
     * @return mixed
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    ######################## SETTERS ##########################

    /**
     * @param $cd_condominio
     * @return $this
     */
    public function setCdCondominio($cd_condominio)
    {
        $this->cd_condominio = $cd_condominio;
        return $this;
    }

    /**
     * @param $cd_setor
     * @return $this
     */
    public function setCdSetor($cd_setor)
    {
        $this->cd_setor = $cd_setor;
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
     * @param $im_perfil
     * @return $this
     */
    public function setImPerfil($im_perfil)
    {
        $this->im_perfil = $im_perfil;
        return $this;
    }

    /**
     * @param $nm_setor
     * @return $this
     */
    public function setNmSetor($nm_setor)
    {
        $this->nm_setor = $nm_setor;
        return $this;
    }

    /**
     * @param $observacao
     * @return $this
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
        return $this;
    }

    /**
     * @param $cd_catg_sub_tipo
     * @return $this
     */
    public function setCdCatgSubTipo($cd_catg_sub_tipo)
    {
        $this->cd_catg_sub_tipo = $cd_catg_sub_tipo;
        return $this;
    }

    /**
     * @param $cd_catg_tipo
     * @return $this
     */
    public function setCdCatgTipo($cd_catg_tipo)
    {
        $this->cd_catg_tipo = $cd_catg_tipo;
        return $this;
    }

    /**
     * @param $cd_setor_grupo
     * @return $this
     */
    public function setCdSetorGrupo($cd_setor_grupo)
    {
        $this->cd_setor_grupo = $cd_setor_grupo;
        return $this;
    }

    /**
     * @param $cd_vl_catg_sub_tipo
     * @return $this
     */
    public function setCdVlCatgSubTipo($cd_vl_catg_sub_tipo)
    {
        $this->cd_vl_catg_sub_tipo = $cd_vl_catg_sub_tipo;
        return $this;
    }

    /**
     * @param $cd_vl_catg_tipo
     * @return $this
     */
    public function setCdVlCatgTipo($cd_vl_catg_tipo)
    {
        $this->cd_vl_catg_tipo = $cd_vl_catg_tipo;
        return $this;
    }

    /**
     * @param $ramal
     * @return $this
     */
    public function setRamal($ramal)
    {
        $this->ramal = $ramal;
        return $this;
    }


    
}