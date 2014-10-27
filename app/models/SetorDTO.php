<?php

/**
 * Created by PhpStorm.
 * Usuario: Raul
 * Date: 07/10/14
 * Time: 01:43
 */
class SetorDTO extends DataTransferObject
{
    private $cd_setor;
    private $cd_condominio;
    private $nm_setor;
    private $observacao;
    private $im_perfil;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct()
    {
        $this->reflex = array(
            'cd_setor' => 'getCdSetor',
            'cd_condominio' => 'getCdCondominio',
            'nm_setor' => 'getNmSetor',
            'observacao' => 'getObservacao',
            'cd_usuario_criacao' => 'getCdUsuarioCriacao',
            'dt_usuario_criacao' => 'getDtUsuarioCriacao',
            'cd_usuario_atualiza' => 'getCdUsuarioAtualiza',
            'dt_usuario_atualiza' => 'getDtUsuarioAtualiza',
        );
        if ($this->getImPerfil()) {
            $this->setImPerfil("img/uploads/tb_setor/{$this->cd_setor}.jpg");
        } else {
            $this->setImPerfil(ICON_USER);
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
    public function getCdCondominio()
    {
        return $this->cd_condominio;
    }

    /**
     * @return mixed
     */
    public function getCdSetor()
    {
        return $this->cd_setor;
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
    public function getNmSetor()
    {
        return $this->nm_setor;
    }

    /**
     * @return mixed
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    ######################## SETTERS ##########################

    /**
     * @param mixed $cd_condominio
     */
    public function setCdCondominio($cd_condominio)
    {
        $this->cd_condominio = $cd_condominio;
        return $this;
    }

    /**
     * @param mixed $cd_setor
     */
    public function setCdSetor($cd_setor)
    {
        $this->cd_setor = $cd_setor;
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

    /**
     * @param mixed $im_perfil
     */
    public function setImPerfil($im_perfil)
    {
        $this->im_perfil = $im_perfil;
        return $this;
    }

    /**
     * @param mixed $nm_setor
     */
    public function setNmSetor($nm_setor)
    {
        $this->nm_setor = $nm_setor;
        return $this;
    }

    /**
     * @param mixed $observacao
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
        return $this;
    }


    
}