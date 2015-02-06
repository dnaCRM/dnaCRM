<?php

class CidadesModel extends Model
{
    /** @var  CidadesDTO */
    private $dto;
    /** @var  CidadesDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new CidadesDAO();
    }

    public function getArrayDados()
    {
        $estado = (new EstadosDAO())->getById($this->dto->getEstadoId());
        return array(
            'id' => $this->dto->getId(),
            'nome' => $this->dto->getNome(),
            'codigo_ibge' => $this->dto->getCodigoIbge(),
            'estado_id' => $this->dto->getEstadoId(),
            'estado_nome' => $estado->getNome(),
            'estado_sigla' => $estado->getSigla(),
            'populacao_2010' => $this->dto->getPopulacao2010(),
            'densidade_demo' => $this->dto->getDensidadeDemo(),
            'gentilico' => $this->dto->getGentilico(),
            'area' => $this->dto->getArea()
        );
    }

    public function getCidade()
    {
        $_POST = filter_input_array(INPUT_POST);
        $nome = Input::get('nome_cidade_origem');
        $cidades = $this->dao->get("nome ilike '%{$nome}%' order by nome limit 5");

        $resultado = array();

        foreach ($cidades as $cidade) {
            $resultado[] = $this->setDTO($cidade)->getArrayDados();
        }

        return $resultado;
    }

    public function getCidadesPorEstado($id_estado)
    {
        $id_estado = (int)$id_estado;
        $cidades = $this->dao->get("estado_id = {$id_estado}");
        $lista = array();

        foreach ($cidades as $cidade) {
            $lista[] = $this->setDTO($cidade)->getArrayDados();
        }

        return $lista;
    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(CidadesDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
}