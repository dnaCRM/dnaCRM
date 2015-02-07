<?php


class CategoriaValorModel extends Model
{
    /** @var  CategoriaValorDTO */
    private $dto;
    /** @var CategoriaValorDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new CategoriaValorDAO();
    }

    public function getArrayDados()
    {
        $categoria = (new CategoriaDAO())->getById($this->dto->getCdCategoria());
        $desc_categoria = $categoria->getDescCategoria();

        $grupo = '';
        if ($this->dto->getCdGrupo()) {
            $grupoDTO = $this->getDAO()->getById($this->dto->getCdGrupo());
            $grupo = $grupoDTO->getDescVlCatg();
        }

         return array(
             'cd_categoria' => $this->dto->getCdCategoria(),
             'desc_categoria' => $desc_categoria,
             'cd_vl_categoria' => $this->dto->getCdVlCategoria(),
             'desc_vl_categoria' => $this->dto->getDescVlCatg(),
             'genero' => ($this->dto->getGenero() ? $this->dto->getGenero() : '--'),
             'grupo' => $grupo,
             'cd_grupo' => $this->dto->getCdGrupo(),
             'cd_cat_grupo' => $this->dto->getCdCatGrupo(),

         );
    }

    public function getPorCategoria($id)
    {
        $sub_categorias = $this->getDAO()->get("cd_categoria = {$id}");
        $lista = array();
        foreach($sub_categorias as $sc){
            $lista[] = $this->setDTO($sc)->getArrayDados();
        };
        return $lista;
    }


    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(CategoriaValorDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }


    public function existeNome($nome, $id)
    {
        $queryString = "desc_vl_catg ilike '{$nome}'";

        if ($id) {
            $queryString .= " AND cd_vl_categoria != {$id}";
        }

        $return = $this->dao->get($queryString);

        return (count($return) > 0 ? false : true);
    }
} 