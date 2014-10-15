<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 14/10/14
 * Time: 00:08
 */

class ItensOrcamentoDTO extends DataTransferObject {

    private $nr_sequencia;
    private $cd_orcamento;
    private $cd_pessoa_juridica;
    private $desc_item;
    private $qt_item;
    private $valor_unit;
    private $valor_total;
    private $ie_aprovado;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct(){
        $this->reflex = array(
            'nr_sequencia' => 'getNrSequencia',
            'cd_orcamento' => 'getCdOrcamento',
            'cd_pessoa_juridica' => 'getCdPessoaJuridica',
            'desc_item' => 'getDescItem',
            'qt_item' => 'getQtItem',
            'valor_unit' => 'getValorUnit',
            'valor_total' => 'getValorTotal',
            'ie_aprovado' => 'getIeAprovado',
            'cd_usuario_criacao' => 'getCdUsuarioCriacao',
            'dt_usuario_criacao' => 'getDtUsuarioCriacao',
            'cd_usuario_atualiza' => 'getCdUsuarioAtualiza',
            'dt_usuario_atualiza' => 'getDtUsuarioAtualiza',
        );
    }

    /**
     * @return mixed
     */
    public function getReflex(){
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
    public function getCdPessoaJuridica()
    {
        return $this->cd_pessoa_juridica;
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
    public function getDescItem()
    {
        return $this->desc_item;
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
    public function getIeAprovado()
    {
        return $this->ie_aprovado;
    }

    /**
     * @return mixed
     */
    public function getNrSequencia()
    {
        return $this->nr_sequencia;
    }

    /**
     * @return mixed
     */
    public function getQtItem()
    {
        return $this->qt_item;
    }

    /**
     * @return mixed
     */
    public function getValorTotal()
    {
        return $this->valor_total;
    }

    /**
     * @return mixed
     */
    public function getValorUnit()
    {
        return $this->valor_unit;
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
     * @param mixed $cd_pessoa_juridica
     */
    public function setCdPessoaJuridica($cd_pessoa_juridica)
    {
        $this->cd_pessoa_juridica = $cd_pessoa_juridica;
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
     * @param mixed $desc_item
     */
    public function setDescItem($desc_item)
    {
        $this->desc_item = $desc_item;
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

    /**
     * @param mixed $ie_aprovado
     */
    public function setIeAprovado($ie_aprovado)
    {
        $this->ie_aprovado = $ie_aprovado;
        return $this;
    }

    /**
     * @param mixed $nr_sequencia
     */
    public function setNrSequencia($nr_sequencia)
    {
        $this->nr_sequencia = $nr_sequencia;
        return $this;
    }

    /**
     * @param mixed $qt_item
     */
    public function setQtItem($qt_item)
    {
        $this->qt_item = $qt_item;
        return $this;
    }

    /**
     * @param mixed $valor_total
     */
    public function setValorTotal($valor_total)
    {
        $this->valor_total = $valor_total;
        return $this;
    }

    /**
     * @param mixed $valor_unit
     */
    public function setValorUnit($valor_unit)
    {
        $this->valor_unit = $valor_unit;
        return $this;
    }




} 