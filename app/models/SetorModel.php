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
        $tipo = (new CategoriaDAO())
            ->getById($this->dto->getCdCatgTipo());
        $tipo_desc = $tipo->getDescCategoria();

        $sub_tipo = (new CategoriaValorDAO())
            ->getById($this->dto->getCdVlCatgTipo());
        $sub_tipo_desc = $sub_tipo->getDescVlCatg();

        $condominio = (new PessoaJuridicaDAO())->getById($this->dto->getCdCondominio());
        $setor = '';
        if ($this->dto->getCdSetorGrupo()) {
            $setor_grupo = $this->dao->getById($this->dto->getCdSetorGrupo());
            $setor = $setor_grupo->getNmSetor();
        } else {
            $setor_grupo = new SetorDTO();
        }


        return array(
            'cd_setor' => $this->dto->getCdSetor(),
            'cd_setor_grupo' => $this->dto->getCdSetorGrupo(),
            'setor_grupo' => $setor,
            'setor_grupo_foto' => Image::get($setor_grupo),
            'nm_setor' => $this->dto->getNmSetor(),
            'cd_condominio' => $this->dto->getCdCondominio(),
            'condominio' => $condominio->getNmFantasia(),
            'condo_foto' => Image::get($condominio),
            'observacao' => $this->dto->getObservacao(),
            'im_perfil' => Image::get($this->dto),
            'tipo' => $tipo_desc,
            'sub_tipo' => $sub_tipo_desc,
            'cd_catg_tipo' => $this->dto->getCdCatgTipo(),
            'cd_vl_catg_tipo' => $this->dto->getCdVlCatgTipo()
        );
    }

    public function getApartamentos(SetorDTO $dto)
    {
        $apartamentos = $this->getDAO()->get("cd_setor_grupo = {$dto->getCdSetor()}");

        $lista = array();
        foreach( $apartamentos as $apartamento) {
            $lista[] = $this->setDTO($apartamento)->getArrayDados();
        }
        return $lista;
    }

    public function getByCondominio($id)
    {
        $setores = $this->dao->get("cd_condominio = {$id}");

        $lista = array();
        foreach( $setores as $setor) {
            $lista[] = $this->setDTO($setor)->getArrayDados();
        }
        return $lista;
    }

    public function getByNmSetorIdCond($nm_setor, $id_condominio)
    {

        $setores = $this->dao->get("
                        nm_setor ilike '%{$nm_setor}%'
                        AND
                        cd_condominio = {$id_condominio}
                        order by nm_setor limit 5");

        $resultado = array();

        foreach ($setores as $setor) {
            $resultado[] = $this->setDTO($setor)->getArrayDados();
        }

        return $resultado;
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