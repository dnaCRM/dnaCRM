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

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(PessoaJuridicaDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
} 