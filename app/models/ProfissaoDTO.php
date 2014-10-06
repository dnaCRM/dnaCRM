<?php
class PessoaJuridicaTelefoneDTO extends DataTransferObject
{
    private $cd_profissao;
    private $nm_profissao;
    private $cd_usuario_criacao;
    private $dt_usuario_criacao;
    private $cd_usuario_atualiza;
    private $dt_usuario_atualiza;

    /** @var  array */
    private $reflex;

    public function __construct()
    {
        $this->reflex = array(
            'cd_profissao' => 'getCdProfissao',
            'nm_profissao' => 'getNmProfissao',
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
    public function getCd_profissao() {
        return $this->cd_profissao;
    }

    public function getNm_profissao() {
        return $this->nm_profissao;
    }

    public function getCd_usuario_criacao() {
        return $this->cd_usuario_criacao;
    }

    public function getDt_usuario_criacao() {
        return $this->dt_usuario_criacao;
    }

    public function getCd_usuario_atualiza() {
        return $this->cd_usuario_atualiza;
    }

    public function getDt_usuario_atualiza() {
        return $this->dt_usuario_atualiza;
    }
    
    ############################## SETTERS ##############################

    public function setCd_profissao($cd_profissao) {
        $this->cd_profissao = $cd_profissao;
        return $this;
    }

    public function setNm_profissao($nm_profissao) {
        $this->nm_profissao = $nm_profissao;
        return $this;
    }

    public function setCd_usuario_criacao($cd_usuario_criacao) {
        $this->cd_usuario_criacao = $cd_usuario_criacao;
        return $this;
    }

    public function setDt_usuario_criacao($dt_usuario_criacao) {
        $this->dt_usuario_criacao = $dt_usuario_criacao;
        return $this;
    }

    public function setCd_usuario_atualiza($cd_usuario_atualiza) {
        $this->cd_usuario_atualiza = $cd_usuario_atualiza;
        return $this;
    }

    public function setDt_usuario_atualiza($dt_usuario_atualiza) {
        $this->dt_usuario_atualiza = $dt_usuario_atualiza;
        return $this;
    }
}