<?php
class PessoaFisicaTelefoneDTO extends DataTransferObject
{
    private $cd_pf_fone;
    private $cd_pessoa_fisica;
    private $fone;
    private $observacao;
    private $cd_catg_fone_pf;
    private $cd_vl_catg_fone_pf;
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
            'cd_pf_fone' => 'getCdPfFone',
            'cd_pessoa_fisica' => 'getCdPessoaFisica',
            'fone' => 'getFone',
            'observacao' => 'getObservacao',
            'cd_catg_fone_pf' => 'getCdCatgFonePf',
            'cd_vl_catg_fone_pf' => 'getCdVlCatgFonePf',
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
    public function getCdCatgFonePf()
    {
        return $this->cd_catg_fone_pf;
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
    public function getCdPessoaFisica()
    {
        return $this->cd_pessoa_Fisica;
    }

    /**
     * @return mixed
     */
    public function getCdPfFone()
    {
        return $this->cd_pf_fone;
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
    public function getCdVlCatgFonePf()
    {
        return $this->cd_vl_catg_fone_pf;
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
    public function setCdCatgFonePf($cd_catg_fone_pf)
    {
        $this->cd_catg_fone_pf = $cd_catg_fone_pf;
        return $this;
    }

    public function setCdCatgOperadora($cd_catg_operadora)
    {
        $this->cd_catg_operadora = $cd_catg_operadora;
        return $this;
    }

    public function setCdPessoaFisica($cd_pessoa_fisica)
    {
        $this->cd_pessoa_fisica = $cd_pessoa_fisica;
        return $this;
    }

    public function setCdPfFone($cd_pf_fone)
    {
        $this->cd_pf_fone = $cd_pf_fone;
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

    public function setCdVlCatgFonePf($cd_vl_catg_fone_pf)
    {
        $this->cd_vl_catg_fone_pf = $cd_vl_catg_fone_pf;
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
