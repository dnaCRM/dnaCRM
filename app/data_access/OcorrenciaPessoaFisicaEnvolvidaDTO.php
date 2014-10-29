<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 07/10/14
 * Time: 02:36
 */

class OcorrenciaPessoaFisicaEnvolvidaDTO extends DataTransferObject
{
    private $cd_ocorrencia;
    private $cd_pessoa_fisica;
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
            'cd_pessoa_fisica' => 'getCdPessoaFisica',
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
    public function getCdOcorrencia()
    {
        return $this->cd_ocorrencia;
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

    #################### SETTERS ##########################

    /**
     * @param mixed $cd_ocorrencia
     */
    public function setCdOcorrencia($cd_ocorrencia)
    {
        $this->cd_ocorrencia = $cd_ocorrencia;
        return $this;
    }

    /**
     * @param mixed $cd_pessoa_fisica
     */
    public function setCdPessoaFisica($cd_pessoa_fisica)
    {
        $this->cd_pessoa_fisica = $cd_pessoa_fisica;
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