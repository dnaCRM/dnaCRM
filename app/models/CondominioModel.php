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

    public function getSetores(SetorModel $setorModel)
    {
        $setores = $setorModel->getDAO()->get("cd_condominio = {$this->dto->getCdCondominio()}");

        $lista = array();
        foreach ($setores as $setor) {
            $lista[] = $setorModel->setDTO($setor)->getArrayDados();
        }
        return $lista;
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

    public function existeNome($nome, $id)
    {
        $queryString = "nm_condominio ilike '{$nome}'";

        if ($id) {
            $queryString .= " AND cd_condominio != {$id}";
        }

        $return = $this->dao->get($queryString);

        return (count($return) > 0 ? false : true);
    }
}