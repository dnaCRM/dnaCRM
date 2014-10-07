<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 05/10/14
 * Time: 17:25
 */

class PessoaJuridicaTelefoneDTO extends DataTransferObject
{
    private $cd_pj_fone;
    private $cd_pessoa_juridica;
    private $fone;
    private $observacao;
    private $cd_catg_fone_pj;
    private $cd_vl_catg_fone_pj;
    private $cd_catg_operadora;
    private $cd_vl_catg_operadora;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct()
    {
        $this->reflex = array(
            'cd_pj_fone' => 'getCdPjFone',
            'cd_pessoa_juridica' => 'getCdPessoaJuridica',
            'fone' => 'getFone',
            'observacao' => 'getObservacao',
            'cd_catg_fone_pj' => 'getCdCatgFonePj',
            'cd_vl_catg_fone_pj' => 'getCdVlCatgFonePj',
            'cd_catg_operadora' => 'getCdCatgOperadora',
            'cd_vl_catg_operadora' => 'getCdVlCatgOperadora',
            'cd_usuario_criacao' => 'getCdUsuarioCriacao',
            'dt_usuario_criacao' => 'getDtUsuarioCriacao',
            'cd_usuario_atualiza' => 'getCdUsuarioAtualiza',
            'dt_usuario_atualiza' => 'getDtUsuarioAtualiza'
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
    public function getCdCatgFonePj()
    {
        return $this->cd_catg_fone_pj;
    }

    /**
     * @return mixed
     */
    public function getCdCatgOperadora()
    {
        return $this->cd_catg_operadora;
    }

    /**
     * @return mixed
     */
    public function getCdPessoaJuridica()
    {
        return $this->cd_pessoa_juridica;
    }

    /**
     * @return mixed
     */
    public function getCdPjFone()
    {
        return $this->cd_pj_fone;
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
    public function getCdVlCatgFonePj()
    {
        return $this->cd_vl_catg_fone_pj;
    }

    /**
     * @return mixed
     */
    public function getCdVlCatgOperadora()
    {
        return $this->cd_vl_catg_operadora;
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
    public function getFone()
    {
        return $this->fone;
    }

    /**
     * @return mixed
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    ########### SETTERS ##############################
    public function setCdCatgFonePj($cd_catg_fone_pj)
    {
        $this->cd_catg_fone_pj = $cd_catg_fone_pj;
        return $this;
    }

    public function setCdCatgOperadora($cd_catg_operadora)
    {
        $this->cd_catg_operadora = $cd_catg_operadora;
        return $this;
    }

    public function setCdPessoaJuridica($cd_pessoa_juridica)
    {
        $this->cd_pessoa_juridica = $cd_pessoa_juridica;
        return $this;
    }

    public function setCdPjFone($cd_pj_fone)
    {
        $this->cd_pj_fone = $cd_pj_fone;
        return $this;
    }

    public function setCdUsuarioAtualiza($cd_usuario_atualiza)
    {
        $this->cd_usuario_atualiza = $cd_usuario_atualiza;
        return $this;
    }

    public function setCdUsuarioCriacao($cd_usuario_criacao)
    {
        $this->cd_usuario_criacao = $cd_usuario_criacao;
        return $this;
    }

    public function setCdVlCatgFonePj($cd_vl_catg_fone_pj)
    {
        $this->cd_vl_catg_fone_pj = $cd_vl_catg_fone_pj;
        return $this;
    }

    public function setCdVlCatgOperadora($cd_vl_catg_operadora)
    {
        $this->cd_vl_catg_operadora = $cd_vl_catg_operadora;
        return $this;
    }

    public function setDtUsuarioAtualiza($dt_usuario_atualiza)
    {
        $this->dt_usuario_atualiza = $dt_usuario_atualiza;
        return $this;
    }

    public function setDtUsuarioCriacao($dt_usuario_criacao)
    {
        $this->dt_usuario_criacao = $dt_usuario_criacao;
        return $this;
    }

    public function setFone($fone)
    {
        $this->fone = $fone;
        return $this;
    }

    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
        return $this;
    }
}