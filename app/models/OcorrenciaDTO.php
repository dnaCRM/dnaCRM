<?php
class OcorrenciaDTO extends DataTransferObject
{
    private $cd_ocorrencia;
    private $cd_pf_informante;
    private $desc_assunto;
    private $desc_ocorrencia;
    private $dt_ocorrencia;
    private $ie_situacao;
    private $dt_fim;
    private $desc_conclusao;
    private $cd_catg_estagio;
    private $cd_vl_catg_estagio;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct()
    {
        $this->reflex = array(
            'cd_ocorrencia' => 'getCdOcorrencia',
            'cd_pf_informante' => 'getCdPfInformante',
            'desc_assunto' => 'getDescAssunto',
            'desc_ocorrencia' => 'getDescOcorrencia',
            'dt_ocorrencia' => 'getDtOcorrencia',
            'ie_situacao' => 'getIeSituacao',
            'dt_fim' => 'getDtFim',
            'desc_conclusao' => 'getDescConclusao',
            'cd_catg_estagio' => 'getCdCatgEstagio',
            'cd_vl_catg_estagio' => 'getCdVlCatgEstagio',
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

    public function getCd_ocorrencia() {
        return $this->cd_ocorrencia;
    }

    public function getCd_pf_informante() {
        return $this->cd_pf_informante;
    }

    public function getDesc_assunto() {
        return $this->desc_assunto;
    }

    public function getDesc_ocorrencia() {
        return $this->desc_ocorrencia;
    }

    public function getDt_ocorrencia() {
        return $this->dt_ocorrencia;
    }

    public function getIe_situacao() {
        return $this->ie_situacao;
    }

    public function getDt_fim() {
        return $this->dt_fim;
    }

    public function getDesc_conclusao() {
        return $this->desc_conclusao;
    }

    public function getCd_catg_estagio() {
        return $this->cd_catg_estagio;
    }

    public function getCd_vl_catg_estagio() {
        return $this->cd_vl_catg_estagio;
    }

    public function getCd_usuario_criacao() {
        return $this->cd_usuario_criacao;
    }

    public function getDt_usuario_criacao() {
        return $this->dt_usuario_criacao;
    }

    public function getCd_usuario_atualiza() {
        return $this->cd_usuario_atualiza;
    }

    public function getDt_usuario_atualiza() {
        return $this->dt_usuario_atualiza;
    }
    
    ############################# SETTERS #############################

    public function setCd_ocorrencia($cd_ocorrencia) {
        $this->cd_ocorrencia = $cd_ocorrencia;
        return $this;
    }

    public function setCd_pf_informante($cd_pf_informante) {
        $this->cd_pf_informante = $cd_pf_informante;
        return $this;
    }

    public function setDesc_assunto($desc_assunto) {
        $this->desc_assunto = $desc_assunto;
        return $this;
    }

    public function setDesc_ocorrencia($desc_ocorrencia) {
        $this->desc_ocorrencia = $desc_ocorrencia;
        return $this;
    }

    public function setDt_ocorrencia($dt_ocorrencia) {
        $this->dt_ocorrencia = $dt_ocorrencia;
        return $this;
    }

    public function setIe_situacao($ie_situacao) {
        $this->ie_situacao = $ie_situacao;
        return $this;
    }

    public function setDt_fim($dt_fim) {
        $this->dt_fim = $dt_fim;
        return $this;
    }

    public function setDesc_conclusao($desc_conclusao) {
        $this->desc_conclusao = $desc_conclusao;
        return $this;
    }

    public function setCd_catg_estagio($cd_catg_estagio) {
        $this->cd_catg_estagio = $cd_catg_estagio;
        return $this;
    }

    public function setCd_vl_catg_estagio($cd_vl_catg_estagio) {
        $this->cd_vl_catg_estagio = $cd_vl_catg_estagio;
        return $this;
    }

    public function setCd_usuario_criacao($cd_usuario_criacao) {
        $this->cd_usuario_criacao = $cd_usuario_criacao;
        return $this;
    }

    public function setDt_usuario_criacao($dt_usuario_criacao) {
        $this->dt_usuario_criacao = $dt_usuario_criacao;
        return $this;
    }

    public function setCd_usuario_atualiza($cd_usuario_atualiza) {
        $this->cd_usuario_atualiza = $cd_usuario_atualiza;
        return $this;
    }

    public function setDt_usuario_atualiza($dt_usuario_atualiza) {
        $this->dt_usuario_atualiza = $dt_usuario_atualiza;
        return $this;
    }
}
    