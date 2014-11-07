<?php
class OrdemServicoDTO extends DataTransferObject
{
    private $cd_ordem_servico;
    private $cd_ocorrencia;
    private $cd_pf_executor;
    private $cd_pf_solicitante;
    private $desc_assunto;
    private $desc_ordem_servico;
    private $dt_inicio;
    private $dt_fim;
    private $cd_catg_estagio;
    private $cd_vl_catg_estagio;
    private $desc_conclusao;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct()
    {
        $this->reflex = array(
            'cd_ordem_servico' => 'getCdOrdemServico',
            'cd_ocorrencia' => 'getCdOcorrencia',
            'cd_pf_executor' => 'getCdPfExecutor',
            'cd_pf_solicitante' => 'getCdPfSolicitante',
            'desc_assunto' => 'getDescAssunto',
            'desc_ordem_servico' => 'getDescOrdemServico',
            'dt_inicio' => 'getDtInicio',
            'dt_fim' => 'getDtFim',
            'cd_catg_estagio' => 'getCdCatgEstagio',
            'cd_vl_catg_estagio' => 'getCdVlCatgEstagio',
            'desc_conclusao' => 'getDescConclusao',
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
    public function getCdCatgEstagio()
    {
        return $this->cd_catg_estagio;
    }

    /**
     * @return mixed
     */
    public function getCdOcorrencia()
    {
        return $this->cd_ocorrencia;
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
    public function getCdPfExecutor()
    {
        return $this->cd_pf_executor;
    }

    /**
     * @return mixed
     */
    public function getCdPfSolicitante()
    {
        return $this->cd_pf_solicitante;
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
    public function getCdVlCatgEstagio()
    {
        return $this->cd_vl_catg_estagio;
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
    public function getDescAssunto()
    {
        return $this->desc_assunto;
    }

    /**
     * @return mixed
     */
    public function getDescConclusao()
    {
        return $this->desc_conclusao;
    }

    /**
     * @return mixed
     */
    public function getDescOrdemServico()
    {
        return $this->desc_ordem_servico;
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

    ################## SETTERS #######################

    /**
     * @param mixed $cd_catg_estagio
     */
    public function setCdCatgEstagio($cd_catg_estagio)
    {
        $this->cd_catg_estagio = $cd_catg_estagio;
        return $this;
    }

    /**
     * @param mixed $cd_ocorrencia
     */
    public function setCdOcorrencia($cd_ocorrencia)
    {
        $this->cd_ocorrencia = $cd_ocorrencia;
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
     * @param mixed $cd_pf_executor
     */
    public function setCdPfExecutor($cd_pf_executor)
    {
        $this->cd_pf_executor = $cd_pf_executor;
        return $this;
    }

    /**
     * @param mixed $cd_pf_solicitante
     */
    public function setCdPfSolicitante($cd_pf_solicitante)
    {
        $this->cd_pf_solicitante = $cd_pf_solicitante;
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
     * @param mixed $cd_vl_catg_estagio
     */
    public function setCdVlCatgEstagio($cd_vl_catg_estagio)
    {
        $this->cd_vl_catg_estagio = $cd_vl_catg_estagio;
        return $this;
    }

    /**
     * @param mixed $desc_assunto
     */
    public function setDescAssunto($desc_assunto)
    {
        $this->desc_assunto = $desc_assunto;
        return $this;
    }

    /**
     * @param mixed $desc_conclusao
     */
    public function setDescConclusao($desc_conclusao)
    {
        $this->desc_conclusao = $desc_conclusao;
        return $this;
    }

    /**
     * @param mixed $desc_ordem_servico
     */
    public function setDescOrdemServico($desc_ordem_servico)
    {
        $this->desc_ordem_servico = $desc_ordem_servico;
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
     * @param mixed $dt_inicio
     */
    public function setDtInicio($dt_inicio)
    {
        $this->dt_inicio = $dt_inicio;
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