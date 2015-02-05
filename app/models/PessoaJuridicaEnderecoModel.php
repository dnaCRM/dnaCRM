<?php

class PessoaJuridicaEnderecoModel extends Model
{
    /** @var  PessoaJuridicaEnderecoDTO */
    private $dto;
    /** @var  PessoaJuridicaEnderecoDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new PessoaJuridicaEnderecoDAO();
    }

    public function getArrayDados()
    {
        $estado = (new EstadosDAO())->getById($this->dto->getEstado());
        $cidade = (new CidadesDAO())->getById($this->dto->getCidade());

        $endereco = (new CategoriaValorDAO())->getBy2Ids($this->dto->getCdVlCatgEnd(), 9)
            ->getDescVlCatg();
        $pessoaJuridica = (new PessoaJuridicaDAO())->getById($this->dto->getCdPessoaJuridica())
            ->getNmFantasia();
        return array(
            'id_endereco' => $this->dto->getNrSequencia(),
            'categoria' => $endereco,
            'cd_catg_end' => $this->dto->getCdCatgEnd(),
            'cd_vl_catg_end' => $this->dto->getCdVlCatgEnd(),
            'cd_pessoa_juridica' => $this->dto->getCdPessoaJuridica(),
            'empresa' => $pessoaJuridica,
            'cep' => $this->dto->getCep(),
            'rua' => $this->dto->getRua(),
            'numero' => $this->dto->getNumero(),
            'bairro' => $this->dto->getBairro(),
            'cidade' => $cidade->getNome(),
            'estado' => $estado->getNome(),
            'cd_catg_estado' => $this->dto->getCdCatgEstado(),
            'cd_vl_catg_estado' => $this->dto->getCdCatgEstado(),
            'observacao' => $this->dto->getObservacao()
        );
    }

    /**
     * @param $id = id de uma Pessoa Jurídica
     * @return array
     */
    public function getEnderecosPessoaJuridica($id)
    {
        $endereco = $this->dao->get("cd_pessoa_juridica = {$id}");
        $lista = array();
        foreach($endereco as $me){
            $lista[] = $this->setDTO($me)->getArrayDados();
        }
        return $lista;
    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(PessoaJuridicaEnderecoDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }

} 