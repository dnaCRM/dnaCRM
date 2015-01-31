<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 14/10/14
 * Time: 23:50
 */
class SetorModel extends Model
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
        $condominio = (new PessoaJuridicaDAO())->getById($this->dto->getCdCondominio());

        return array(
            'cd_setor' => $this->dto->getCdSetor(),
            'nm_setor' => $this->dto->getNmSetor(),
            'cd_condominio' => $this->dto->getCdCondominio(),
            'condominio' => $condominio->getNmFantasia(),
            'condo_foto' => Image::get($condominio),
            'observacao' => $this->dto->getObservacao(),
            'im_perfil' => Image::get($this->dto)
        );
    }

    public function getApartamentos(ApartamentoModel $apartamentoModel)
    {
        $apartamentos = $apartamentoModel->getDAO()->get("cd_setor = {$this->dto->getCdSetor()}");

        $lista = array();
        foreach( $apartamentos as $apartamento) {
            $lista[] = $apartamentoModel->setDTO($apartamento)->getArrayDados();
        }
        return $lista;
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
        $queryString = "nm_setor ilike '{$nome}'";

        if ($id) {
            $queryString .= " AND cd_setor != {$id}";
        }

        $return = $this->dao->get($queryString);

        return (count($return) > 0 ? false : true);
    }
}