<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 09/10/14
 * Time: 21:17
 */
Class CondominioDTO extends DataTransferObject
{

    private $cd_condominio;
    private $nm_condominio;
    private $im_perfil;
    private $cep;
    private $rua;
    private $numero;
    private $bairro;
    private $cidade;
    private $cd_catg_estado;
    private $cd_vl_catg_estado;
    private $cd_usuario_criacao;
    private $dt_criacao_criacao;
    private $cd_usuario_atualiaza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct(){

        $this->reflex = array(
           'cd_condominio' => 'getCdCondominio',
           'nm_condominio' => 'getNmCondominio',
           'cep' => 'getCep',
           'rua' => 'getRua',
           'numero' => 'getNumero',
           'bairro' => 'getBairro',
           'cidade' => 'getCidade',
           'cd_catg_estado' => 'getCdCatgEstado',
           'cd_vl_catg_estado' => 'getVlCatgEstado',
           'cd_usuario_criacao' => 'getCdUsuarioCriacao',
           'dt_usuario_atualiza' => 'getDtUsuarioAtualiza',
           'cd_usuario_atualiza' => 'getCdUsuarioAtualiza',
           'dt_usuario_atualiza' => 'getDtUsuarioAtualiza',

        );

        if($this->getImPerfil()){
            $this->setImPerfil("img/uploads/tb_pessoa_fisica/{$this->cd_pessoa_fisica}.jpg");
        } else {
            $
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


    public function getCdCondominio()
    {
        return $this->cd_condominio;
    }

    public function getNmCondominio()
    {
        return $this->nm_condominio;
    }

    public function getImPerfil()
    {
        return $this->im_perfil;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function getRua()
    {
        return $this->rua;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getCdCatgEstado()
    {
        return $this->cd_catg_estado;
    }

    public function getCdVlCatgEstado()
    {
        return $this->cd_vl_catg_estado;
    }

    public function getCdUsuarioCriacao()
    {
        return $this->cd_usuario_criacao;
    }

    public function getDtUsuarioCriacao()
    {
        return $this->dt_criacao_criacao;
    }

    public function getCdUsuarioAtualiza()
    {
        return $this->cd_usuario_atualiaza;
    }

    public function getDtUsuarioAtualiza()
    {
        return $this->dt_usuario_atualiza;
    }

    ################## SETTERS #######################

    public function setCdCondominio($cd_condominio)
    {
        $this->cd_condominio = $cd_condominio;
        return $this;
    }

    public function setNmCondominio($nm_condominio)
    {
        $this->nm_condominio = $nm_condominio;
        return $this;
    }

    public function setImPerfil($im_perfil)
    {
        $this->im_perfil = $im_perfil;
        return $this;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
        return $this;
    }

    public function setRua($rua)
    {
        $this->rua = $rua;
        return $this;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $bairro;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }

    public function setCdCatgEstado($cd_catg_estado)
    {
        $this->cd_catg_estado = $cd_catg_estado;
        return $this;
    }

    public function setCdVlCatgEstado($cd_vl_catg_estado)
    {
        $this->cd_vl_catg_estado = $cd_vl_catg_estado;
        return $this;
    }

    public function setCdUsuarioCriacao($cd_usuario_criacao)
    {
        $this->cd_usuario_criacao = $cd_usuario_criacao;
        return $this;
    }

    public function setDtUsuarioCriacao($dt_usuario_criacao)
    {
        $this->dt_usuario_criacao = $dt_usuario_criacao;
        return $this;
    }

    public function setCdUsuarioAtualiza($cd_usuario_atualiza)
    {
        $this->cd_usuario_atualiaza = $cd_usuario_atualiza;
        return $this;
    }

    public function setDtUsuarioAtualiza($dt_usuario_atualiza)
    {
        $this->dt_usuario_atualiza;
        return $this;
    }
}


