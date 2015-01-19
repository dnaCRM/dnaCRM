<?php

class RelacionamentoParametroModel extends Model
{
    /** @var  RelacionamentoParametroDTO */
    private $dto;
    /** @var  RelacionamentoParametroDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new RelacionamentoParametroDAO();
    }

    public function getArrayDados()
    {
        $categoriaValorDAO = new CategoriaValorDAO();
        $cat_relac_1 = $categoriaValorDAO->getById($this->dto->getCdCatgVlRelac1());
        $cat_relac_2 = $categoriaValorDAO->getById($this->dto->getCdCatgVlRelac2());

        return array(
            'cd_catg_relac_1' => $cat_relac_1->getCdCategoria(),
            'cd_catg_vl_relac_1' => $cat_relac_1->getCdVlCategoria(),
            'desc_vl_relac_1' => $cat_relac_1->getDescVlCatg(),
            'genero_relac_1' => $cat_relac_1->getGenero(),
            'cd_catg_relac_2' => $cat_relac_2->getCdCategoria(),
            'cd_catg_vl_relac_2' => $cat_relac_2->getCdVlCategoria(),
            'desc_vl_relac_2' => $cat_relac_2->getDescVlCatg(),
            'genero_relac_2' => $cat_relac_2->getGenero(),
        );


    }

    /**
     * @param $id_1
     * @param $id_2
     * @return bool
     */
    public function exists($id_1, $id_2)
    {
        $return = $this->dao->getBy2Ids($id_1, $id_2);
        return (is_bool($return) ? false : true);
    }

    public function getRelacionamentos(){
        $lista_dto = $this->dao->fullList();
        $lista = array();

        foreach ($lista_dto as $dto) {
            $lista[] =  $this->setDTO($dto)->getArrayDados();
        }

        return $lista;

    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(RelacionamentoParametroDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
} 