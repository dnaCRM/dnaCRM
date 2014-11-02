<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 17/10/14
 * Time: 11:16
 */

class ApartamentoModel extends Model
{
    /** @var  ApartamentoDTO */
    private $dto;
    /** @var  ApartamentoDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new ApartamentoDAO();
    }

    public function getArrayDados()
    {
        $setor = (new SetorDAO())->getById($this->dto->getCdSetor());
        $condominio = (new CondominioDAO())->getById($setor->getCdCondominio());

        return array(
            'cd_apartamento' => $this->dto->getCdApartamento(),
            'desc_apartamento' => $this->dto->getDescApartamento(),
            'cd_setor' => $this->dto->getCdSetor(),
            'setor' => $setor->getNmSetor(),
            'setor_foto' => $setor->getImPerfil(),
            'cd_condominio' => $setor->getCdCondominio(),
            'condominio' => $condominio->getNmCondominio(),
            'condo_foto' => $condominio->getImPerfil()
        );
    }

    public function getMoradores(MoradorEnderecoModel $enderecoMorador)
    {
        $moradores = $enderecoMorador->getPorApartamento($this->dto->getCdApartamento());
        $atuais = array();
        foreach($moradores as $morador) {
            if (in_array('Morador', $morador)) {
                $atuais[] = $morador;
            }
        }
        return $atuais;
    }

    public function getExMoradores(MoradorEnderecoModel $enderecoMorador)
    {
        $moradores = $enderecoMorador->getPorApartamento($this->dto->getCdApartamento());
        $ex = array();
        foreach($moradores as $morador) {
            if (!in_array('Morador', $morador)) {
                $ex[] = $morador;
            }
        }
        return $ex;
    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(ApartamentoDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
}