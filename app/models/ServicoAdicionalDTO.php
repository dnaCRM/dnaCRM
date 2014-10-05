<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 05/10/14
 * Time: 18:14
 */

class ServicoAdicionalDTO extends DataTransferObject
{
    private $cd_serv_adicional;
    private $cd_ordem_servico;
    private $cd_pessoa_fisica;
    private $cd_catg_servico;
    private $cd_vl_catg_servico;
    private $cd_setor;
    private $cd_vaga;
    private $dt_inicio;
    private $dt_fim;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct()
    {
        $this->reflex = array(
            'cd_serv_adicional' => 'getCdServAdicional',
            'cd_ordem_servico' => 'getCdOrdemServico',
            'cd_pessoa_fisica' => 'getCdPessoaFisica',
            'cd_catg_servico' => 'getCdCatgServico',
            'cd_vl_catg_servico' => 'getCdVlCatgServico',
            'cd_setor' => 'getCdSetor',
            'cd_vaga' => 'getCdVaga',
            'dt_inicio' => 'getDtInicio',
            'dt_fim' => 'getDtFim',
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
    public function getCdCatgServico()
    {
        return $this->cd_catg_servico;
    }

    /**
     * @return mixed
     */
    public function getCdOrdemServico()
    {
        return $this->cd_ordem_servico;
    }

    /**
     * @return mixed
     */
    public function getCdPessoaFisica()
    {
        return $this->cd_pessoa_fisica;
    }

    /**
     * @return mixed
     */
    public function getCdServAdicional()
    {
        return $this->cd_serv_adicional;
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
    public function getCdVaga()
    {
        return $this->cd_vaga;
    }

    /**
     * @return mixed
     */
    public function getCdVlCatgServico()
    {
        return $this->cd_vl_catg_servico;
    }

    /**
     * @return mixed
     */
    public function getDtFim()
    {
        return $this->dt_fim;
    }

    /**
     * @return mixed
     */
    public function getDtInicio()
    {
        return $this->dt_inicio;
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

    ################### SETTERS #############################3333
    public function setCdCatgServico($cd_catg_servico)
    {
        $this->cd_catg_servico = $cd_catg_servico;
        return $this;
    }

    public function setCdOrdemServico($cd_ordem_servico)
    {
        $this->cd_ordem_servico = $cd_ordem_servico;
        return $this;
    }

    public function setCdPessoaFisica($cd_pessoa_fisica)
    {
        $this->cd_pessoa_fisica = $cd_pessoa_fisica;
        return $this;
    }

    public function setCdServAdicional($cd_serv_adicional)
    {
        $this->cd_serv_adicional = $cd_serv_adicional;
        return $this;
    }

    public function setCdSetor($cd_setor)
    {
        $this->cd_setor = $cd_setor;
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

    public function setCdVaga($cd_vaga)
    {
        $this->cd_vaga = $cd_vaga;
        return $this;
    }

    public function setCdVlCatgServico($cd_vl_catg_servico)
    {
        $this->cd_vl_catg_servico = $cd_vl_catg_servico;
        return $this;
    }

    public function setDtFim($dt_fim)
    {
        $this->dt_fim = $dt_fim;
        return $this;
    }

    public function setDtInicio($dt_inicio)
    {
        $this->dt_inicio = $dt_inicio;
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