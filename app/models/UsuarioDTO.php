<?php
/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 01/10/14
 * Time: 18:52
 */

class UsuarioDTO extends DataTransferObject{

    private $cd_usuario;
    private $login;
    private $nivel;
    private $ie_status;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct()
    {
        $this->reflex = array(
            'cd_usuario' => 'getCdUsuario',
            'login' => 'getLogin',
            'nivel' => 'getNivel',
            'ie_status' => 'getIeStatus',
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
    public function getCdUsuario()
    {
        return $this->cd_usuario;
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
    public function getIeStatus()
    {
        return $this->ie_status;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * @param $cd_usuario
     * @return UsuarioDTO
     */
    public function setCdUsuario($cd_usuario)
    {
        $this->cd_usuario = $cd_usuario;
        return $this;
    }

    /**
     * @param $cd_usuario_atualizacao
     * @return UsuarioDTO
     */
    public function setCdUsuarioAtualiza($cd_usuario_atualiza)
    {
        $this->cd_usuario_atualiza = $cd_usuario_atualiza;
        return $this;
    }

    /**
     * @param $cd_usuario_criacao
     * @return UsuarioDTO
     */
    public function setCdUsuarioCriacao($cd_usuario_criacao)
    {
        $this->cd_usuario_criacao = $cd_usuario_criacao;
        return $this;
    }

    /**
     * @param $dt_usuario_atualizacao
     * @return UsuarioDTO
     */
    public function setDtUsuarioAtualiza($dt_usuario_atualiza)
    {
        $this->dt_usuario_atualiza = $dt_usuario_atualiza;
        return $this;
    }

    /**
     * @param $dt_usuario_criacao
     * @return UsuarioDTO
     */
    public function setDtUsuarioCriacao($dt_usuario_criacao)
    {
        $this->dt_usuario_criacao = $dt_usuario_criacao;
        return $this;
    }

    /**
     * @param $ie_status
     * @return UsuarioDTO
     */
    public function setIeStatus($ie_status)
    {
        $this->ie_status = $ie_status;
        return $this;
    }

    /**
     * @param $login
     * @return UsuarioDTO
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @param $nivel
     * @return UsuarioDTO
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
        return $this;
    }

    /**
     * @param $reflex
     * @return UsuarioDTO
     */
    public function setReflex($reflex)
    {
        $this->reflex = $reflex;
        return $this;
    }


}