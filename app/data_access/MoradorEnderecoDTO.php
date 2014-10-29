<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 12/10/14
 * Time: 20:50
 */

class MoradorEnderecoDTO extends DataTransferObject{

    private $nr_sequencia;
    private $cd_pessoa_fisica;
    private $cd_apartamento;
    private $dt_entrada;
    private $dt_saida;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct(){
        $this->reflex = array(
            'nr_sequencia' => 'getNrSequencia',
            'cd_pessoa_fisica' => 'getCdPessoaFisica',
            'cd_apartamento' => 'getCdApartamento',
            'dt_entrada' => 'getDtEntrada',
            'dt_saida' => 'getDtSaida',
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
    public function getReflex(){
        return $this->reflex;
    }

    /**
     * @return mixed
     */
    public function getCdApartamento()
    {
        return $this->cd_apartamento;
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
    public function getDtEntrada()
    {
        return $this->dt_entrada;
    }

    /**
     * @return mixed
     */
    public function getDtSaida()
    {
        return $this->dt_saida;
    }

    /**
     * @return mixed
     */
    public function getDtUsuarioAtualiza()
    {
        return $this->dt_usuario_atualiza;
    }


    ################## SETTERS #######################

    /**
     * @param mixed $cd_apartamento
     */
    public function setCdApartamento($cd_apartamento)
    {
        $this->cd_apartamento = $cd_apartamento;
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
     * @param mixed $dt_entrada
     */
    public function setDtEntrada($dt_entrada)
    {
        $this->dt_entrada = $dt_entrada;
        return $this;
    }

    /**
     * @param mixed $dt_saida
     */
    public function setDtSaida($dt_saida)
    {
        $this->dt_saida = $dt_saida;
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
     * @param mixed $nr_sequencia
     */
    public function setNrSequencia($nr_sequencia)
    {
        $this->nr_sequencia = $nr_sequencia;
        return $this;
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
    public function getNrSequencia()
    {
        return $this->nr_sequencia;
    }










} 