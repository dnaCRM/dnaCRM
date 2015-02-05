<?php

/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 13/09/14
 * Time: 22:43
 */
class PessoaFisicaDTO extends DataTransferObject implements ImagemPerfilInterface
{
    private $cd_pessoa_fisica;
    private $cd_pessoa_juridica;
    private $cd_profissao;
    private $nm_pessoa_fisica;
    private $cpf;
    private $rg;
    private $uf_rg;
    private $email;
    private $dt_nascimento;
    private $ie_sexo;
    private $im_perfil;
    private $cd_cidade_origem;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct()
    {
        $this->reflex = array(
            'cd_pessoa_fisica' => 'getCdPessoaFisica',
            'cd_pessoa_juridica' => 'getCdPessoaJuridica',
            'cd_profissao' => 'getCdProfissao',
            'nm_pessoa_fisica' => 'getNmPessoaFisica',
            'cpf' => 'getCpf',
            'rg' => 'getRg',
            'uf_rg' => 'getUfRg',
            'email' => 'getEmail',
            'dt_nascimento' => 'getDtNascimento',
            'ie_sexo' => 'getIeSexo',
            'cd_cidade_origem' => 'gegCdCidadeOrigem',
            'cd_usuario_criacao' => 'getCdUsuarioCriacao',
            'dt_usuario_criacao' => 'getDtUsuarioCriacao',
            'cd_usuario_atualiza' => 'getCdUsuarioAtualiza',
            'dt_usuario_atualiza' => 'getDtUsuarioAtualiza',
        );
    }

    /**
     * Retorna um array com todos os campos da classe e seus métodos 'Getters'
     * Objetivo: fornecer um meio para que o seu respectivo DAO possa saber
     * dinamicamente quais os campos da tabela e quais métodos executar para
     * resgatar os dados
     * @return array
     */
    public function getReflex()
    {
        return $this->reflex;
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
    public function getCdProfissao()
    {
        return $this->cd_profissao;
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
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @return mixed
     */
    public function getDtNascimento()
    {
        return $this->dt_nascimento;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getIeSexo()
    {
        return $this->ie_sexo;
    }

    /**
     * @return mixed
     */
    public function getImPerfil()
    {
        return $this->im_perfil;
    }

    /**
     * @return mixed
     */
    public function getNmPessoaFisica()
    {
        return $this->nm_pessoa_fisica;
    }

    /**
     * @return mixed
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * @return mixed
     */
    public function getCdCidadeOrigem()
    {
        return $this->cd_cidade_origem;
    }

    /**
     * @return mixed
     */
    public function getUfRg()
    {
        return $this->uf_rg;
    }

######### SETTERS #################################################################3

    /**
     * @param $cd_pessoa_fisica
     * @return PessoaFisicaDTO
     */
    public function setCdPessoaFisica($cd_pessoa_fisica)
    {
        $this->cd_pessoa_fisica = $cd_pessoa_fisica;
        return $this;
    }

    /**
     * @param $cd_pessoa_juridica
     * @return PessoaFisicaDTO
     */
    public function setCdPessoaJuridica($cd_pessoa_juridica)
    {
        $this->cd_pessoa_juridica = $cd_pessoa_juridica;
        return $this;
    }

    /**
     * @param $cd_profissao
     * @return PessoaFisicaDTO
     */
    public function setCdProfissao($cd_profissao)
    {
        $this->cd_profissao = $cd_profissao;
        return $this;
    }

    /**
     * @param $cd_usuario_atualiza
     * @return PessoaFisicaDTO
     */
    public function setCdUsuarioAtualiza($cd_usuario_atualiza)
    {
        $this->cd_usuario_atualiza = $cd_usuario_atualiza;
        return $this;
    }

    /**
     * @param $cd_usuario_criacao
     * @return PessoaFisicaDTO
     */
    public function setCdUsuarioCriacao($cd_usuario_criacao)
    {
        $this->cd_usuario_criacao = $cd_usuario_criacao;
        return $this;
    }

    /**
     * @param $cpf
     * @return PessoaFisicaDTO
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @param $dt_nascimento
     * @return PessoaFisicaDTO
     */
    public function setDtNascimento($dt_nascimento)
    {
        $this->dt_nascimento = $dt_nascimento;
        return $this;
    }

    /**
     * @param $dt_usuario_atualiza
     * @return PessoaFisicaDTO
     */
    public function setDtUsuarioAtualiza($dt_usuario_atualiza)
    {
        $this->dt_usuario_atualiza = $dt_usuario_atualiza;
        return $this;
    }

    /**
     * @param $dt_usuario_criacao
     * @return PessoaFisicaDTO
     */
    public function setDtUsuarioCriacao($dt_usuario_criacao)
    {
        $this->dt_usuario_criacao = $dt_usuario_criacao;
        return $this;
    }

    /**
     * @param $email
     * @return PessoaFisicaDTO
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param $ie_sexo
     * @return PessoaFisicaDTO
     */
    public function setIeSexo($ie_sexo)
    {
        $this->ie_sexo = $ie_sexo;
        return $this;
    }

    /**
     * @param $im_perfil
     * @return PessoaFisicaDTO
     */
    public function setImPerfil($im_perfil)
    {
        $this->im_perfil = $im_perfil;
        return $this;
    }

    /**
     * @param $nm_pessoa_fisica
     * @return PessoaFisicaDTO
     */
    public function setNmPessoaFisica($nm_pessoa_fisica)
    {
        $this->nm_pessoa_fisica = $nm_pessoa_fisica;
        return $this;
    }

    /**
     * @param $rg
     * @return PessoaFisicaDTO
     */
    public function setRg($rg)
    {
        $this->rg = $rg;
        return $this;
    }

    /**
     * @param $cd_cidade_origem
     * @return $this
     */
    public function setCdCidadeOrigem($cd_cidade_origem)
    {
        $this->cd_cidade_origem = $cd_cidade_origem;
        return $this;
    }

    /**
     * @param $uf_rg
     * @return $this
     */
    public function setUfRg($uf_rg)
    {
        $this->uf_rg = $uf_rg;
        return $this;
    }


}