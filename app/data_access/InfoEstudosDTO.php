<?php

class InfoEstudosDTO extends DataTransferObject
{
    private $cd_info_estudos;
    private $cd_pessoa_fisica;
    private $cd_pessoa_juridica;
    private $cd_catg_curso;
    private $cd_vl_catg_curso;
    private $cd_catg_periodo;
    private $cd_vl_catg_periodo;
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
            'cd_info_estudos' => 'getCdInfoEstudos',
            'cd_pessoa_fisica' => 'getCdPessoaFisica',
            'cd_pessoa_juridica' => 'getCdPessoaJuridica',
            'cd_catg_curso' => 'getCdCatgCurso',
            'cd_vl_catg_curso' => 'getCdVlCatgCurso',
            'cd_catg_periodo' => 'getCdCatgPeriodo',
            'cd_vl_catg_periodo' => 'getCdVlCatgPeriodo',
            'dt_inicio' => 'getDtInicio',
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
    public function getCdCatgCurso()
    {
        return $this->cd_catg_curso;
    }

    /**
     * @return mixed
     */
    public function getCdCatgPeriodo()
    {
        return $this->cd_catg_periodo;
    }

    /**
     * @return mixed
     */
    public function getCdInfoEstudos()
    {
        return $this->cd_info_estudos;
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
    public function getCdVlCatgCurso()
    {
        return $this->cd_vl_catg_curso;
    }

    /**
     * @return mixed
     */
    public function getCdVlCatgPeriodo()
    {
        return $this->cd_vl_catg_periodo;
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

    ////////////////////////////////////////////////////////////////////////////////////////


    /**
     * @param $cd_catg_curso
     * @return $this
     */
    public function setCdCatgCurso($cd_catg_curso)
    {
        $this->cd_catg_curso = $cd_catg_curso;
        return $this;
    }

    /**
     * @param $cd_catg_periodo
     * @return $this
     */
    public function setCdCatgPeriodo($cd_catg_periodo)
    {
        $this->cd_catg_periodo = $cd_catg_periodo;
        return $this;
    }

    /**
     * @param $cd_info_estudos
     * @return $this
     */
    public function setCdInfoEstudos($cd_info_estudos)
    {
        $this->cd_info_estudos = $cd_info_estudos;
        return $this;
    }

    /**
     * @param $cd_pessoa_fisica
     * @return $this
     */
    public function setCdPessoaFisica($cd_pessoa_fisica)
    {
        $this->cd_pessoa_fisica = $cd_pessoa_fisica;
        return $this;
    }

    /**
     * @param $cd_pessoa_juridica
     * @return $this
     */
    public function setCdPessoaJuridica($cd_pessoa_juridica)
    {
        $this->cd_pessoa_juridica = $cd_pessoa_juridica;
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
     * @param $cd_vl_catg_curso
     * @return $this
     */
    public function setCdVlCatgCurso($cd_vl_catg_curso)
    {
        $this->cd_vl_catg_curso = $cd_vl_catg_curso;
        return $this;
    }

    /**
     * @param $cd_vl_catg_periodo
     * @return $this
     */
    public function setCdVlCatgPeriodo($cd_vl_catg_periodo)
    {
        $this->cd_vl_catg_periodo = $cd_vl_catg_periodo;
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
}