<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 04/10/14
 * Time: 21:21
 */

class PessoaJuridicaDTO extends DataTransferObject
{
    private $cd_pessoa_juridica;
    private $cnpj;
    private $nm_fantasia;
    private $desc_razao;
    private $cd_catg_tipo_empresa;
    private $cd_tipo_empresa;
    private $cd_catg_ramo_atividade;
    private $cd_ramo_atividade;
    private $im_perfil;
    private $email;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct()
    {
        $this->reflex = array(
            'cd_pessoa_juridica' => 'getCdPessoaJuridica',
            'cnpj' => 'getCnpj',
            'nm_fantasia' => 'getNmFantasia',
            'desc_razao' => 'getDescRazao',
            'cd_catg_tipo_empresa' => 'getCdCatgTipoEmpresa',
            'cd_tipo_empresa' => 'getCdTipoEmpresa',
            'cd_catg_ramo_atividade' => 'getCdCatgRamoAtividade',
            'cd_ramo_atividade' => 'getCdRamoAtividade',
            'email' => 'getEmail',
            'cd_usuario_criacao' => 'getCdUsuarioCriacao',
            'dt_usuario_criacao' => 'getDtUsuarioCriacao',
            'cd_usuario_atualiza' => 'getCdUsuarioAtualiza',
            'dt_usuario_atualiza' => 'getDtUsuarioAtualiza'
        );

        if ($this->getImPerfil()) {
            $this->setImPerfil("img/uploads/tb_pessoa_juridica/{$this->cd_pessoa_juridica}.jpg");
        } else {
            $this->setImPerfil(ICON_USER);
        }
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
    public function getCdCatgRamoAtividade()
    {
        return $this->cd_catg_ramo_atividade;
    }

    /**
     * @return mixed
     */
    public function getCdCatgTipoEmpresa()
    {
        return $this->cd_catg_tipo_empresa;
    }

    /**
     * @return mixed
     */
    public function getCdTipoEmpresa()
    {
        return $this->cd_tipo_empresa;
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
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @return mixed
     */
    public function getCdRamoAtividade()
    {
        return $this->cd_ramo_atividade;
    }

    /**
     * @return mixed
     */
    public function getDescRazao()
    {
        return $this->desc_razao;
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
    public function getImPerfil()
    {
        return $this->im_perfil;
    }

    /**
     * @return mixed
     */
    public function getNmFantasia()
    {
        return $this->nm_fantasia;
    }


    ############# SETTERS #######################

    public function setCdPessoaJuridica($cd_pessoa_juridica)
    {
        $this->cd_pessoa_juridica = $cd_pessoa_juridica;
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

    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
        return $this;
    }

    public function setCdRamoAtividade($desc_atividade)
    {
        $this->cd_ramo_atividade = $desc_atividade;
        return $this;
    }

    public function setDescRazao($desc_razao)
    {
        $this->desc_razao = $desc_razao;
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

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }


    public function setImPerfil($im_perfil)
    {
        $this->im_perfil = $im_perfil;
        return $this;
    }

    public function setNmFantasia($nm_fantasia)
    {
        $this->nm_fantasia = $nm_fantasia;
        return $this;
    }

    public function setReflex($reflex)
    {
        $this->reflex = $reflex;
        return $this;
    }

    /**
     * @param $cd_catg_tipo_empresa
     * @return $this
     */
    public function setCdCatgTipoEmpresa($cd_catg_tipo_empresa)
    {
        $this->cd_catg_tipo_empresa = $cd_catg_tipo_empresa;
        return $this;
    }

    /**
     * @param $cd_tipo_empresa
     * @return $this
     */
    public function setCdTipoEmpresa($cd_tipo_empresa)
    {
        $this->cd_tipo_empresa = $cd_tipo_empresa;
        return $this;
    }


    /**
     * @param $cd_catg_ramo_atividade
     * @return $this
     */
    public function setCdCatgRamoAtividade($cd_catg_ramo_atividade)
    {
        $this->cd_catg_ramo_atividade = $cd_catg_ramo_atividade;
        return $this;
    }
}