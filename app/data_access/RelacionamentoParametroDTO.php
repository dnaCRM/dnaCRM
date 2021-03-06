<?php


class RelacionamentoParametroDTO extends DataTransferObject
{
    private $cd_catg_relac_1;
    private $cd_catg_vl_relac_1;
    private $cd_catg_relac_2;
    private $cd_catg_vl_relac_2;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  arrray */
    private $reflex;

    public function __construct()
    {
        $this->reflex = array(
            'cd_catg_relac_1' => 'getCdCatgRelac1',
            'cd_catg_vl_relac_1' => 'getCdCatgVlRelac1',
            'cd_catg_relac_2' => 'getCdCatgRelac2',
            'cd_catg_vl_relac_2' => 'getCdCatgVlRelac2',
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
    public function getCdCatgRelac1()
    {
        return $this->cd_catg_relac_1;
    }

    /**
     * @return mixed
     */
    public function getCdCatgRelac2()
    {
        return $this->cd_catg_relac_2;
    }

    /**
     * @return mixed
     */
    public function getCdCatgVlRelac1()
    {
        return $this->cd_catg_vl_relac_1;
    }

    /**
     * @return mixed
     */
    public function getCdCatgVlRelac2()
    {
        return $this->cd_catg_vl_relac_2;
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

    /////////// SETTERS ///////////////////////

    /**
     * @param $cd_catg_relac_1
     * @return $this
     */
    public function setCdCatgRelac1($cd_catg_relac_1)
    {
        $this->cd_catg_relac_1 = $cd_catg_relac_1;
        return $this;
    }

    /**
     * @param $cd_catg_relac_2
     * @return $this
     */
    public function setCdCatgRelac2($cd_catg_relac_2)
    {
        $this->cd_catg_relac_2 = $cd_catg_relac_2;
        return $this;
    }

    /**
     * @param $cd_catg_vl_relac_1
     * @return $this
     */
    public function setCdCatgVlRelac1($cd_catg_vl_relac_1)
    {
        $this->cd_catg_vl_relac_1 = $cd_catg_vl_relac_1;
        return $this;
    }

    /**
     * @param $cd_catg_vl_relac_2
     * @return $this
     */
    public function setCdCatgVlRelac2($cd_catg_vl_relac_2)
    {
        $this->cd_catg_vl_relac_2 = $cd_catg_vl_relac_2;
        return $this;
    }

    /**
     * @param $cd_usuario_atualiza
     * @return $this
     */
    public function setCdUsuarioAtualiza($cd_usuario_atualiza)
    {
        $this->cd_usuario_atualiza = $cd_usuario_atualiza;
        return $this;
    }

    /**
     * @param $cd_usuario_criacao
     * @return $this
     */
    public function setCdUsuarioCriacao($cd_usuario_criacao)
    {
        $this->cd_usuario_criacao = $cd_usuario_criacao;
        return $this;
    }

    /**
     * @param $dt_usuario_atualiza
     * @return $this
     */
    public function setDtUsuarioAtualiza($dt_usuario_atualiza)
    {
        $this->dt_usuario_atualiza = $dt_usuario_atualiza;
        return $this;
    }

    /**
     * @param $dt_usuario_criacao
     * @return $this
     */
    public function setDtUsuarioCriacao($dt_usuario_criacao)
    {
        $this->dt_usuario_criacao = $dt_usuario_criacao;
        return $this;
    }


}