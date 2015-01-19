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

         return array(
             'cd_categoria' => $this->dto->getCdCategoria(),
             'desc_categoria' => $desc_categoria,
             'cd_vl_categoria' => $this->dto->getCdVlCategoria(),
             'desc_vl_categoria' => $this->dto->getDescVlCatg(),
             'genero' => ($this->dto->getGenero() ? $this->dto->getGenero() : '--')
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
} 