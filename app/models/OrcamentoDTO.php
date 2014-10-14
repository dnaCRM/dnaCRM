<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 12/10/14
 * Time: 20:10
 */

class OrcamentoDTO extends DataTransferObject {

    private $cd_orcamento;
    private $cd_ordem_servico;
    private $ds_orcamento;
    private $dt_orcamento;
    private $dt_fim;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct(){

        $this->reflex = array(
            'cd_orcamento' => 'getCdOrcamento',
            'cd_ordem_servico' => 'getOrdemServico',
            'ds_orcamento' => 'getDsOrcamento',
            'dt_orcamento' => 'getDtOrcamento',
            'dt_fim' => 'getDtFim',
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
    public function getCdOrcamento()
    {
        return $this->cd_orcamento;
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
    public function getDsOrcamento()
    {
        return $this->ds_orcamento;
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
    public function getDtOrcamento()
    {
        return $this->dt_orcamento;
    }

    ################## SETTERS #######################

    /**
     * @param mixed $cd_orcamento
     */
    public function setCdOrcamento($cd_orcamento)
    {
        $this->cd_orcamento = $cd_orcamento;
        return $this;
    }

    /**
     * @param mixed $cd_ordem_servico
     */
    public function setCdOrdemServico($cd_ordem_servico)
    {
        $this->cd_ordem_servico = $cd_ordem_servico;
        return $this;
    }

    /**
     * @param mixed $cd_usuario_atualiza
     */
    public function setCdUsuarioAtualiza($cd_usuario_atualiza)
    {
        $this->cd_usuario_atualiza = $cd_usuario_atualiza;
        return $this;
    }

    /**
     * @param mixed $cd_usuario_criacao
     */
    public function setCdUsuarioCriacao($cd_usuario_criacao)
    {
        $this->cd_usuario_criacao = $cd_usuario_criacao;
        return $this;
    }

    /**
     * @param mixed $ds_orcamento
     */
    public function setDsOrcamento($ds_orcamento)
    {
        $this->ds_orcamento = $ds_orcamento;
        return $this;
    }

    /**
     * @param mixed $dt_fim
     */
    public function setDtFim($dt_fim)
    {
        $this->dt_fim = $dt_fim;
        return $this;
    }

    /**
     * @param mixed $dt_orcamento
     */
    public function setDtOrcamento($dt_orcamento)
    {
        $this->dt_orcamento = $dt_orcamento;
        return $this;
    }

    /**
     * @param mixed $dt_usuario_atualiza
     */
    public function setDtUsuarioAtualiza($dt_usuario_atualiza)
    {
        $this->dt_usuario_atualiza = $dt_usuario_atualiza;
        return $this;
    }

    /**
     * @param mixed $dt_usuario_criacao
     */
    public function setDtUsuarioCriacao($dt_usuario_criacao)
    {
        $this->dt_usuario_criacao = $dt_usuario_criacao;
        return $this;
    }
}