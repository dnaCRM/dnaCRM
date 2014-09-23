<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 13/09/14
 * Time: 22:43
 */
class PessoaFisicaDTO extends DataTransferObject
{
    private $cd_pessoa_fisica;
    private $cd_pessoa_juridica;
    private $cd_profissao;
    private $nm_pessoa_fisica;
    private $cpf;
    private $rg;
    private $cd_catg_org_rg;
    private $cd_vl_catg_org_rg;
    private $email;
    private $dt_nascimento;
    private $fone;
    private $celular;
    private $ie_sexo;
    private $im_perfil;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;
    private $ie_estuda;
    private $cd_instituicao;
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
            'cd_catg_org_rg' => 'getCdCatgOrgRg',
            'cd_vl_catg_org_rg' => 'getCdVlCatgOrgRg',
            'email' => 'getEmail',
            'dt_nascimento' => 'getDtNascimento',
            'fone' => 'getFone',
            'celular' => 'getCelular',
            'ie_sexo' => 'getIeSexo',
            'cd_usuario_criacao' => 'getCdUsuarioCriacao',
            'dt_usuario_criacao' => 'getDtUsuarioCriacao',
            'cd_usuario_atualiza' => 'getCdUsuarioAtualiza',
            'dt_usuario_atualiza' => 'getDtUsuarioAtualiza',
            'ie_estuda' => 'getIeEstuda',
            'cd_instituicao' => 'getCdInstituicao'
        );
        if ($this->getImPerfil()) {
            $this->setImPerfil("img/uploads/tb_pessoa_fisica/{$this->cd_pessoa_fisica}.jpg");
        } else {
            $this->setImPerfil("img/uploads/icon-user.jpg");
        }
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