<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 17/10/14
 * Time: 11:16
 */

class ApartamentoModel extends Model
{
    /** @var  SetorDTO */
    private $dto;
    /** @var  SetorDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new SetorDAO();
    }

    public function getArrayDados()
    {
        $setor = (new SetorDAO())->getById($this->dto->getCdSetorGrupo());
        $condominio = (new PessoaJuridicaDAO())->getById($setor->getCdCondominio());

        return array(
            'cd_apartamento' => $this->dto->getCdSetor(),
            'desc_apartamento' => $this->dto->getNmSetor(),
            'cd_setor' => $this->dto->getCdSetorGrupo(),
            'setor' => $setor->getNmSetor(),
            'setor_foto' => Image::get($setor),
            'cd_condominio' => $setor->getCdCondominio(),
            'ramal' => $this->dto->getRamal(),
            'condominio' => $condominio->getNmFantasia(),
            'condo_foto' => Image::get($condominio)
        );
    }

    public function getMoradores(MoradorEnderecoModel $enderecoMorador)
    {
        $moradores = $enderecoMorador->getPorApartamento($this->dto->getCdSetor());
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
        $moradores = $enderecoMorador->getPorApartamento($this->dto->getCdSetor());
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

    public function setDTO(SetorDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }

    public function existeNome($nome, $id)
    {
        $queryString = "desc_apartamento ilike '{$nome}'";

        if ($id) {
            $queryString .= " AND cd_apartamento != {$id}";
        }

        $return = $this->dao->get($queryString);

        return (count($return) > 0 ? false : true);
    }
}