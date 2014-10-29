<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 13/10/14
 * Time: 17:56
 */
class PessoaFisicaModel extends Model
{
    /** @var  PessoaFisicaDTO */
    private $pessoaFisicaDTO;
    /** @var  PessoaFisicaDAO */
    private $pessoaFisicaDAO;

    /**
     * @param PessoaFisicaDTO $dto
     * @param PessoaFisicaDAO $dao
     */
    public function __construct(PessoaFisicaDTO $dto, PessoaFisicaDAO $dao)
    {
        $this->pessoaFisicaDTO = $dto;
        $this->pessoaFisicaDAO = $dao;
    }

    public function getPessoaFisica()
    {
        $_POST = filter_input_array(INPUT_POST);
        $nome = Input::get('nome');
        $pessoas = $this->pessoaFisicaDAO->get("nm_pessoa_fisica ilike '%{$nome}%' order by nm_pessoa_fisica limit 5");
        
        $resultado = array();

        foreach($pessoas as $pessoa) {
            $resultado[] = array(
                'id' => $pessoa->getCdPessoaFisica(),
                'nome' => $pessoa->getNmPessoaFisica(),
                'foto' => $pessoa->getImPerfil()
            );
        }

        return $resultado;
    }


    public function getEmpresa(PessoaJuridicaDao $empresa)
    {
        return ($this->pessoaFisicaDTO->getCdPessoaJuridica()
            ? $empresa->getById($this->pessoaFisicaDTO->getCdPessoaJuridica())
            : false);
    }

    public function getProfissao(ProfissaoDAO $profissao)
    {
        return ($this->pessoaFisicaDTO->getCdProfissao()
            ? $profissao->getById(($this->pessoaFisicaDTO->getCdProfissao()))
            : false);
    }

    public function getOrgRg(CategoriaValorDAO $categoria)
    {
        return ($this->pessoaFisicaDTO->getCdCatgOrgRg()
            ? $categoria->getBy2Ids($this->pessoaFisicaDTO->getCdVlCatgOrgRg(), $this->pessoaFisicaDTO->getCdCatgOrgRg())
            : false);
    }

    public function getInstEnsino(InstituicaoEnsinoDAO $instituicao)
    {
        return ($this->pessoaFisicaDTO->getCdInstituicao()
            ? $instituicao->getById($this->pessoaFisicaDTO->getCdInstituicao())
            : false);
    }

    public function getGrauEnsino(CategoriaValorDAO $categoria)
    {
        return ($this->pessoaFisicaDTO->getCdCatgGrauEnsino()
            ? $categoria->getBy2Ids($this->pessoaFisicaDTO->getCdVlCatgOrgRg(), $this->pessoaFisicaDTO->getCdCatgGrauEnsino())
            : false);
    }

    public function getRelacionados(RelacionadosDAO $relacionados)
    {
        if ($this->pessoaFisicaDTO->getCdPessoaFisica()) {
            $relacionados = $relacionados->get("cd_pessoa_fisica_1 = {$this->pessoaFisicaDTO->getCdPessoaFisica()}");

            foreach ($relacionados as $relacionado) {
                $lista[] = $this->pessoaFisicaDAO->getById($relacionado->getCdPessoaFisica2());
            }

            return $lista;
        }
        return false;
    }
} 