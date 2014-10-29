<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 05/10/14
 * Time: 16:35
 */

class PessoaFisicaEnderecoDTO extends DataTransferObject
{
    private $nr_sequencia;
    private $cd_catg_end;
    private $cd_vl_catg_end;
    private $cd_pessoa_fisica;
    private $cep;
    private $rua;
    private $numero;
    private $bairro;
    private $cidade;
    private $cd_catg_estado;
    private $cd_vl_catg_estado;
    private $observacao;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct()
    {
        $this->reflex = array(
            'nr_sequencia' => 'getNrSequencia',
            'cd_catg_end' => 'getCdCatgEnd',
            'cd_vl_catg_end' => 'getCdVlCatgEnd',
            'cd_pessoa_fisica' => 'getCdPessoaFisica',
            'cep' => 'getCep',
            'rua' => 'getRua',
            'numero' => 'getNumero',
            'bairro' => 'getBairro',
            'cidade' => 'getCidade',
            'cd_catg_estado' => 'getCdCatgEstado',
            'cd_vl_catg_estado' => 'getCdVlCatgEstado',
            'observacao' => 'getObservacao',
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
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @return mixed
     */
    public function getCdCatgEnd()
    {
        return $this->cd_catg_end;
    }

    /**
     * @return mixed
     */
    public function getCdCatgEstado()
    {
        return $this->cd_catg_estado;
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
    public function getCdVlCatgEnd()
    {
        return $this->cd_vl_catg_end;
    }

    /**
     * @return mixed
     */
    public function getCdVlCatgEstado()
    {
        return $this->cd_vl_catg_estado;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
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
    public function getNrSequencia()
    {
        return $this->nr_sequencia;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @return mixed
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * @return mixed
     */
    public function getRua()
    {
        return $this->rua;
    }



    ################# SETTERS #################
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $this;
    }

    public function setCdCatgEnd($cd_catg_end)
    {
        $this->cd_catg_end = $cd_catg_end;
        return $this;
    }

    public function setCdCatgEstado($cd_catg_estado)
    {
        $this->cd_catg_estado = $cd_catg_estado;
        return $this;
    }

    public function setCdPessoaFisica($cd_pessoa_fisica)
    {
        $this->cd_pessoa_fisica = $cd_pessoa_fisica;
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

    public function setCdVlCatgEnd($cd_vl_catg_end)
    {
        $this->cd_vl_catg_end = $cd_vl_catg_end;
        return $this;
    }

    public function setCdVlCatgEstado($cd_vl_catg_estado)
    {
        $this->cd_vl_catg_estado = $cd_vl_catg_estado;
        return $this;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
        return $this;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
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

    public function setNrSequencia($nr_sequencia)
    {
        $this->nr_sequencia = $nr_sequencia;
        return $this;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
        return $this;
    }

    public function setRua($rua)
    {
        $this->rua = $rua;
        return $this;
    }

}