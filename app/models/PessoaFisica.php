<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 13/09/14
 * Time: 22:43
 */
class PessoaFisica extends ValueObject
{
    protected $cd_pessoa_fisica;
    protected $cd_pessoa_juridica;
    protected $cd_profissao;
    protected $nm_pessoa_fisica;
    protected $cpf;
    protected $rg;
    protected $cd_catg_org_rg;
    protected $cd_vl_catg_org_rg;
    protected $email;
    protected $dt_nascimento;
    protected $fone;
    protected $celular;
    protected $ie_sexo;
    protected $im_perfil;
    protected $cd_usuario_criacao;
    protected $dt_usuario_criacao;
    protected $cd_usuario_atualiza;
    protected $dt_usuario_atualiza;
    protected $ie_estuda;
    protected $cd_instituicao;

    /**
     * @return mixed
     */
    public function getCdCatgOrgRg()
    {
        return $this->cd_catg_org_rg;
    }

    /**
     * @return mixed
     */
    public function getCdInstituicao()
    {
        return $this->cd_instituicao;
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
    public function getCdVlCatgOrgRg()
    {
        return $this->cd_vl_catg_org_rg;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
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
    public function getFone()
    {
        return $this->fone;
    }

    /**
     * @return mixed
     */
    public function getIeEstuda()
    {
        return $this->ie_estuda;
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
     * @param mixed $cd_catg_org_rg
     */
    public function setCdCatgOrgRg($cd_catg_org_rg)
    {
        $this->cd_catg_org_rg = $cd_catg_org_rg;
    }

    /**
     * @param mixed $cd_instituicao
     */
    public function setCdInstituicao($cd_instituicao)
    {
        $this->cd_instituicao = $cd_instituicao;
    }

    /**
     * @param mixed $cd_pessoa_fisica
     */
    public function setCdPessoaFisica($cd_pessoa_fisica)
    {
        $this->cd_pessoa_fisica = $cd_pessoa_fisica;
    }

    /**
     * @param mixed $cd_pessoa_juridica
     */
    public function setCdPessoaJuridica($cd_pessoa_juridica)
    {
        $this->cd_pessoa_juridica = $cd_pessoa_juridica;
    }

    /**
     * @param mixed $cd_profissao
     */
    public function setCdProfissao($cd_profissao)
    {
        $this->cd_profissao = $cd_profissao;
    }

    /**
     * @param mixed $cd_usuario_atualiza
     */
    public function setCdUsuarioAtualiza($cd_usuario_atualiza)
    {
        $this->cd_usuario_atualiza = $cd_usuario_atualiza;
    }

    /**
     * @param mixed $cd_usuario_criacao
     */
    public function setCdUsuarioCriacao($cd_usuario_criacao)
    {
        $this->cd_usuario_criacao = $cd_usuario_criacao;
    }

    /**
     * @param mixed $cd_vl_catg_org_rg
     */
    public function setCdVlCatgOrgRg($cd_vl_catg_org_rg)
    {
        $this->cd_vl_catg_org_rg = $cd_vl_catg_org_rg;
    }

    /**
     * @param mixed $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @param mixed $dt_nascimento
     */
    public function setDtNascimento($dt_nascimento)
    {
        $this->dt_nascimento = $dt_nascimento;
    }

    /**
     * @param mixed $dt_usuario_atualiza
     */
    public function setDtUsuarioAtualiza($dt_usuario_atualiza)
    {
        $this->dt_usuario_atualiza = $dt_usuario_atualiza;
    }

    /**
     * @param mixed $dt_usuario_criacao
     */
    public function setDtUsuarioCriacao($dt_usuario_criacao)
    {
        $this->dt_usuario_criacao = $dt_usuario_criacao;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $fone
     */
    public function setFone($fone)
    {
        $this->fone = $fone;
    }

    /**
     * @param mixed $ie_estuda
     */
    public function setIeEstuda($ie_estuda)
    {
        $this->ie_estuda = $ie_estuda;
    }

    /**
     * @param mixed $ie_sexo
     */
    public function setIeSexo($ie_sexo)
    {
        $this->ie_sexo = $ie_sexo;
    }

    /**
     * @param mixed $im_perfil
     */
    public function setImPerfil($im_perfil)
    {
        $this->im_perfil = $im_perfil;
    }

    /**
     * @param mixed $nm_pessoa_fisica
     */
    public function setNmPessoaFisica($nm_pessoa_fisica)
    {
        $this->nm_pessoa_fisica = $nm_pessoa_fisica;
    }

    /**
     * @param mixed $rg
     */
    public function setRg($rg)
    {
        $this->rg = $rg;
    }


}