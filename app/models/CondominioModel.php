<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 16/10/14
 * Time: 03:05
 */
class CondominioModel extends Model
{
    /** @var  CondominioDTO */
    private $dto;
    /** @var  CondominioDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new CondominioDAO();
    }

    public function getArrayDados()
    {
        $categoria = new CategoriaValorDAO();
        $estado = '';

        if ($this->dto->getCdCatgEstado()) {
            $catg = $categoria->getBy2Ids($this->dto->getCdVlCatgEstado(), $this->dto->getCdCatgEstado());
            $estado = $catg->getDescVlCatg();
        }

        return array(
            'cd_condominio' => $this->dto->getCdCondominio(),
            'nm_condominio' => $this->dto->getNmCondominio(),
            'im_perfil' => $this->dto->getImPerfil(),
            'cep' => $this->dto->getCep(),
            'rua' => $this->dto->getRua(),
            'numero' => $this->dto->getNumero(),
            'bairro' => $this->dto->getBairro(),
            'cidade' => $this->dto->getCidade(),
            'estado' => $estado
        );
    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(CondominioDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
}