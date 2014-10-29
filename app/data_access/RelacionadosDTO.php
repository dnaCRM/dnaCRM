<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 05/10/14
 * Time: 17:56
 */

class RelacionadosDTO extends DataTransferObject
{
    private $cd_pessoa_fisica_1;
    private $cd_pessoa_fisica_2;
    private $cd_catg_relac_pf_1;
    private $cd_vl_catg_relac_pf_1;
    private $cd_catg_relac_pf_2;
    private $cd_vl_catg_relac_pf_2;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct()
    {
        $this->reflex = array(
            'cd_pessoa_fisica_1' => 'getCdPessoaFisica1',
            'cd_pessoa_fisica_2' => 'getCdPessoaFisica2',
            'cd_catg_relac_pf_1' => 'getCdCatgRelacPf1',
            'cd_vl_catg_relac_pf_1' => 'getCdVlCatgRelacPf1',
            'cd_catg_relac_pf_2' => 'getCdCatgRelacPf2',
            'cd_vl_catg_relac_pf_2' => 'getCdVlCatgRelacPf2',
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
    public function getCdCatgRelacPf1()
    {
        return $this->cd_catg_relac_pf_1;
    }

    /**
     * @return mixed
     */
    public function getCdCatgRelacPf2()
    {
        return $this->cd_catg_relac_pf_2;
    }

    /**
     * @return mixed
     */
    public function getCdPessoaFisica1()
    {
        return $this->cd_pessoa_fisica_1;
    }

    /**
     * @return mixed
     */
    public function getCdPessoaFisica2()
    {
        return $this->cd_pessoa_fisica_2;
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
    public function getCdVlCatgRelacPf1()
    {
        return $this->cd_vl_catg_relac_pf_1;
    }

    /**
     * @return mixed
     */
    public function getCdVlCatgRelacPf2()
    {
        return $this->cd_vl_catg_relac_pf_2;
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

    ################## SETTERS
    public function setCdCatgRelacPf1($cd_catg_relac_pf_1)
    {
        $this->cd_catg_relac_pf_1 = $cd_catg_relac_pf_1;
        return $this;
    }

    public function setCdCatgRelacPf2($cd_catg_relac_pf_2)
    {
        $this->cd_catg_relac_pf_2 = $cd_catg_relac_pf_2;
        return $this;
    }

    public function setCdPessoaFisica1($cd_pessoa_fisica_1)
    {
        $this->cd_pessoa_fisica_1 = $cd_pessoa_fisica_1;
        return $this;
    }

    public function setCdPessoaFisica2($cd_pessoa_fisica_2)
    {
        $this->cd_pessoa_fisica_2 = $cd_pessoa_fisica_2;
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

    public function setCdVlCatgRelacPf1($cd_vl_catg_relac_pf_1)
    {
        $this->cd_vl_catg_relac_pf_1 = $cd_vl_catg_relac_pf_1;
        return $this;
    }

    public function setCdVlCatgRelacPf2($cd_vl_catg_relac_pf_2)
    {
        $this->cd_vl_catg_relac_pf_2 = $cd_vl_catg_relac_pf_2;
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

}