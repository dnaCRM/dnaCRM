<?php

/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 19/08/14
 * Time: 16:31
 */
class PessoaJuridicaModel extends Model
{
    /** @var  PessoaJuridicaDTO */
    private $dto;
    /** @var  PessoaJuridicaDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new PessoaJuridicaDAO();
    }

    public function getArrayDados()
    {
        return array(
            'cd_pessoa_juridica' => $this->dto->getCdPessoaJuridica(),
            'cnpj' => $this->dto->getCnpj(),
            'nm_fantasia' => $this->dto->getNmFantasia(),
            'desc_razao' => $this->dto->getDescRazao(),
            'desc_atividade' => $this->dto->getDescAtividade(),
            'im_perfil' => $this->dto->getImPerfil(),
            'email' => $this->dto->getEmail()
        );
    }

    public function getTelefones(PessoaJuridicaTelefoneModel $pessoaJuridicaTelefone)
    {
        return $pessoaJuridicaTelefone->getTelefonesPessoaJuridica($this->dto->getCdPessoaJuridica());
    }

    public function getEnderecos(PessoaJuridicaEnderecoModel $pessoaJuridicaEndereco)
    {
        return $pessoaJuridicaEndereco->getEnderecosPessoaJuridica($this->dto->getCdPessoaJuridica());
    }

    /**
     * @param PessoaFisicaModel $pessoaFisica
     * @return array
     */
    public function getEmpregados(PessoaFisicaModel $pessoaFisica)
    {
        $empregados = $pessoaFisica->getDAO()->get("cd_pessoa_juridica = {$this->dto->getCdPessoaJuridica()}");
        $lista = array();
        foreach($empregados as $empregado) {
            $lista[] = $pessoaFisica->setDTO($empregado)->getArrayDados();
        }
        return $lista;
    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(PessoaJuridicaDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }

    public function existeCNPJ($cnpj, $id)
    {
        $queryString = "cnpj = '{$cnpj}'";

        if ($id) {
            $queryString .= " AND cd_pessoa_juridica != {$id}";
        }

        $return = $this->dao->get($queryString);

        return (count($return) > 0 ? false : true);
    }

    public function existeEmail($email, $id)
    {
        $queryString = "email = '{$email}'";

        if ($id) {
            $queryString .= " AND cd_pessoa_juridica != {$id}";
        }

        $return = $this->dao->get($queryString);

        return (count($return) > 0 ? false : true);
    }
} 