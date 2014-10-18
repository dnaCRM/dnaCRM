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
    public function getCdPfInformante()
    {
        return $this->cd_pf_informante;
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
    public function getCdVlCatgEstagio()
    {
        return $this->cd_vl_catg_estagio;
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
    public function getDescOcorrencia()
    {
        return $this->desc_ocorrencia;
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
    public function getDtOcorrencia()
    {
        return $this->dt_ocorrencia;
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
     * @param mixed $cd_pf_informante
     */
    public function setCdPfInformante($cd_pf_informante)
    {
        $this->cd_pf_informante = $cd_pf_informante;
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
     * @param mixed $desc_ocorrencia
     */
    public function setDescOcorrencia($desc_ocorrencia)
    {
        $this->desc_ocorrencia = $desc_ocorrencia;
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
     * @param mixed $dt_ocorrencia
     */
    public function setDtOcorrencia($dt_ocorrencia)
    {
        $this->dt_ocorrencia = $dt_ocorrencia;
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