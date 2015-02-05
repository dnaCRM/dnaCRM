<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 29/10/14
 * Time: 17:35
 */

class PessoaFisicaEnderecoModel extends Model
{
    /** @var  PessoaFisicaEnderecoDTO */
    private $dto;
    /** @var  PessoaFisicaEnderecoDAO */
    private $dao;
    
    public function __construct()
    {
        $this->dao = new PessoaFisicaEnderecoDAO();
    }
    
    public function getArrayDados()
    {
        $estado = (new EstadosDAO())->getById($this->dto->getEstado());
        $cidade = (new CidadesDAO())->getById($this->dto->getCidade());

        $endereco = (new CategoriaValorDAO())->getBy2Ids($this->dto->getCdVlCatgEnd(), 9)
            ->getDescVlCatg();
        $pessoa = (new PessoaFisicaDAO())->getById($this->dto->getCdPessoaFisica())
            ->getNmPessoaFisica();

        return array(
            'id_endereco' => $this->dto->getNrSequencia(),
            'cd_pessoa_fisica' => $this->dto->getCdPessoaFisica(),
            'pessoa' => $pessoa,
            'rua' => $this->dto->getRua(),
            'numero' => $this->dto->getNumero(),
            'bairro' => $this->dto->getBairro(),
            'cep' => $this->dto->getCep(),
            'observacao' => $this->dto->getObservacao(),
            'categoria' => $endereco,
            'cd_catg_end' => $this->dto->getCdCatgEnd(),
            'cd_vl_catg_end' => $this->dto->getCdVlCatgEnd(),
            'cidade' => $cidade->getNome(),
            'estado' => $estado->getNome(),
            'cd_catg_estado' => $this->dto->getCdCatgEstado(),
            'cd_vl_catg_estado' => $this->dto->getCdVlCatgEstado()
        );
    }

    /**
     * @param $id = id de uma Pessoa Física
     * @return array
     */
    public function getEnderecosPessoaFisica($id)
    {
        $endereco = $this->dao->get("cd_pessoa_fisica = {$id}");
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
    
    public function setDTO(PessoaFisicaEnderecoDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
} 