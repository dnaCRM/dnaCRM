<?php
class OrdemServicoDTO extends DataTransferObject
{
    private $cd_ordem_servico;
    private $cd_setor;
    private $cd_ocorrencia;
    private $cd_pf_executor;
    private $cd_pf_solicitante;
    private $desc_assunto;
    private $desc_ordem_servico;
    private $dt_inicio;
    private $dt_fim;
    private $cd_catg_estagio;
    private $cd_vl_catg_estagio;
    private $cd_catg_aval_atendimento;
    private $cd_vl_catg_aval_atendimento;
    private $cd_catg_aval_qualidade;
    private $cd_vl_catg_aval_qualidade;
    private $desc_conclusao;
    private $valor_material;
    private $valor_servico;
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
            'cd_ordem_servico' => 'getCdOrdemServico',
            'cd_setor' => 'getCdSetor',
            'cd_ocorrencia' => 'getCdOcorrencia',
            'cd_pf_executor' => 'getCdPfExecutor',
            'cd_pf_solicitante' => 'getCdPfSolicitante',
            'desc_assunto' => 'getDescAssunto',
            'desc_ordem_servico' => 'getDescOrdemServico',
            'dt_inicio' => 'getDtInicio',
            'dt_fim' => 'getDtFim',
            'cd_catg_estagio' => 'getCdCatgEstagio',
            'cd_vl_catg_estagio' => 'getCdVlCatgEstagio',
            'cd_catg_aval_atendimento' => 'getCdCatgAvalAtendimento',
            'cd_vl_catg_aval_atendimento' => 'getCdVlCatgAvalAtendimento',
            'cd_catg_aval_qualidade' => 'getCdCatgAvalQualidade',
            'cd_vl_catg_aval_qualidade' => 'getCdVlCatgAvalQualidade',
            'desc_conclusao' => 'getDescConclusao',
            'valor_material' => 'getValorMaterial',
            'valor_servico' => 'getValorServico',
            'cd_catg_tipo' => 'getCdCatgTipo',
            'cd_vl_catg_tipo' => 'getCdVlCatgTipo',
            'cd_catg_sub_tipo' => 'getCdCatgSubTipo',
            'cd_vl_catg_sub_tipo' => 'getCdVlCatgSubTipo',
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
    public function getCdCatgSubTipo()
    {
        return $this->cd_catg_sub_tipo;
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
    public function getCdVlCatgSubTipo()
    {
        return $this->cd_vl_catg_sub_tipo;
    }

    /**
     * @return mixed
     */
    public function getValorMaterial()
    {
        return $this->valor_material;
    }

    /**
     * @return mixed
     */
    public function getValorServico()
    {
        return $this->valor_servico;
    }

    /**
     * @return mixed
     */
    public function getCdCatgAvalAtendimento()
    {
        return $this->cd_catg_aval_atendimento;
    }

    /**
     * @return mixed
     */
    public function getCdCatgAvalQualidade()
    {
        return $this->cd_catg_aval_qualidade;
    }

    /**
     * @return mixed
     */
    public function getCdVlCatgAvalAtendimento()
    {
        return $this->cd_vl_catg_aval_atendimento;
    }

    /**
     * @return mixed
     */
    public function getCdVlCatgAvalQualidade()
    {
        return $this->cd_vl_catg_aval_qualidade;
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
    public function getCdVlCatgTipo()
    {
        return $this->cd_vl_catg_tipo;
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
     * @param $cd_catg_aval_atendimento
     * @return $this
     */
    public function setCdCatgAvalAtendimento($cd_catg_aval_atendimento)
    {
        $this->cd_catg_aval_atendimento = $cd_catg_aval_atendimento;
        return $this;
    }

    /**
     * @param $cd_catg_aval_qualidade
     * @return $this
     */
    public function setCdCatgAvalQualidade($cd_catg_aval_qualidade)
    {
        $this->cd_catg_aval_qualidade = $cd_catg_aval_qualidade;
        return $this;
    }

    /**
     * @param $cd_vl_catg_aval_atendimento
     * @return $this
     */
    public function setCdVlCatgAvalAtendimento($cd_vl_catg_aval_atendimento)
    {
        $this->cd_vl_catg_aval_atendimento = $cd_vl_catg_aval_atendimento;
        return $this;
    }

    /**
     * @param $cd_vl_catg_aval_qualidade
     * @return $this
     */
    public function setCdVlCatgAvalQualidade($cd_vl_catg_aval_qualidade)
    {
        $this->cd_vl_catg_aval_qualidade = $cd_vl_catg_aval_qualidade;
        return $this;
    }

    /**
     * @param $cd_catg_estagio
     * @return $this
     */
    public function setCdCatgEstagio($cd_catg_estagio)
    {
        $this->cd_catg_estagio = $cd_catg_estagio;
        return $this;
    }

    /**
     * @param $cd_ocorrencia
     * @return $this
     */
    public function setCdOcorrencia($cd_ocorrencia)
    {
        $this->cd_ocorrencia = $cd_ocorrencia;
        return $this;
    }

    /**
     * @param $cd_ordem_servico
     * @return $this
     */
    public function setCdOrdemServico($cd_ordem_servico)
    {
        $this->cd_ordem_servico = $cd_ordem_servico;
        return $this;
    }

    /**
     * @param $cd_pf_executor
     * @return $this
     */
    public function setCdPfExecutor($cd_pf_executor)
    {
        $this->cd_pf_executor = $cd_pf_executor;
        return $this;
    }

    /**
     * @param $cd_pf_solicitante
     * @return $this
     */
    public function setCdPfSolicitante($cd_pf_solicitante)
    {
        $this->cd_pf_solicitante = $cd_pf_solicitante;
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
     * @param $cd_vl_catg_estagio
     * @return $this
     */
    public function setCdVlCatgEstagio($cd_vl_catg_estagio)
    {
        $this->cd_vl_catg_estagio = $cd_vl_catg_estagio;
        return $this;
    }

    /**
     * @param $desc_assunto
     * @return $this
     */
    public function setDescAssunto($desc_assunto)
    {
        $this->desc_assunto = $desc_assunto;
        return $this;
    }

    /**
     * @param $desc_conclusao
     * @return $this
     */
    public function setDescConclusao($desc_conclusao)
    {
        $this->desc_conclusao = $desc_conclusao;
        return $this;
    }

    /**
     * @param $desc_ordem_servico
     * @return $this
     */
    public function setDescOrdemServico($desc_ordem_servico)
    {
        $this->desc_ordem_servico = $desc_ordem_servico;
        return $this;
    }

    /**
     * @param $dt_fim
     * @return $this
     */
    public function setDtFim($dt_fim)
    {
        $this->dt_fim = $dt_fim;
        return $this;
    }

    /**
     * @param $dt_inicio
     * @return $this
     */
    public function setDtInicio($dt_inicio)
    {
        $this->dt_inicio = $dt_inicio;
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
     * @param $cd_catg_tipo
     * @return $this
     */
    public function setCdCatgTipo($cd_catg_tipo)
    {
        $this->cd_catg_tipo = $cd_catg_tipo;
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
     * @param $cd_catg_sub_tipo
     * @return $this
     */
    public function setCdCatgSubTipo($cd_catg_sub_tipo)
    {
        $this->cd_catg_sub_tipo = $cd_catg_sub_tipo;
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
     * @param $cd_vl_catg_sub_tipo
     * @return $this
     */
    public function setCdVlCatgSubTipo($cd_vl_catg_sub_tipo)
    {
        $this->cd_vl_catg_sub_tipo = $cd_vl_catg_sub_tipo;
        return $this;
    }

    /**
     * @param $valor_material
     * @return $this
     */
    public function setValorMaterial($valor_material)
    {
        $this->valor_material = $valor_material;
        return $this;
    }

    /**
     * @param $valor_servico
     * @return $this
     */
    public function setValorServico($valor_servico)
    {
        $this->valor_servico = $valor_servico;
        return $this;
    }

}