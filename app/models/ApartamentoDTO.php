<?php
Class ApartamentoDTO extends DataTransferObject
{
    private $cd_apartamento;
    private $cd_setor;
    private $desc_apartamento;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;


    /** @var  array */
    private $reflex;

    public function __construct()
    {
        $this->reflex = array(
            'cd_apartamento' => 'getCdApartamento',
            'cd_setor' => 'getCdSetor',
            'desc_apartamento' => 'getDescApartamento',
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

    public function getCdApartamento()
    {
        return $this->cd_apartamento;
    }

    public function getCdSetor()
    {
        return $this->cd_setor;
    }

    public function getDescApartamento()
    {
        return $this->desc_apartamento;
    }

    public function  getCdUsuarioCriacao()
    {
        return $this->cd_usuario_criacao;
    }

    public function getDtUsuarioCriacao()
    {
        return $this->dt_usuario_criacao;
    }

    public function getCdUsuarioAtualiza()
    {
        return $this->cd_usuario_atualiza;
    }

    public function getDtUsuarioAtualiza()
    {
        return $this->dt_usuario_atualiza;
    }

    ################## SETTERS #######################

    public function setCdApartamento($cd_apartamento)
    {
        $this->cd_apartamento = $cd_apartamento;
        return $this;
    }


    public function setCdSetor($cd_setor){
        $this->cd_setor = $cd_setor;
        return $this;
    }


    public function setDescApartamento($desc_apartamento)
    {
        $this->desc_apartamento = $desc_apartamento;
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
        $this->cd_usuario_atualiza = $cd_usuario_atualiza;
        return $this;
    }

    public function setDtUsuarioAtualiza($dt_usuario_atualiza)
    {
        $this->dt_usuario_atualiza = $dt_usuario_atualiza;
        return $this;
    }

}