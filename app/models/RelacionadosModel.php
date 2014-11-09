<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 07/11/14
 * Time: 21:02
 */

class RelacionadosModel extends Model
{
    /** @var  RelacionadosDTO */
    private $dto;
    /** @var  RelacionadosDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new RelacionadosDAO();
    }

    public function getArrayDados()
    {
        $categoria = new CategoriaValorDAO();
        $relac = '';

        if ($this->dto->getCdCatgRelac()) {
            $catg = $categoria->getBy2Ids($this->dto->getCdCatgVlRelac(), $this->dto->getCdCatgRelac());
            $relac = $catg->getDescVlCatg();
        }

        $pessoaModel = new PessoaFisicaModel();
        $pessoaDAO = $pessoaModel->getDAO();

        $pessoa1 = $pessoaDAO->getById($this->dto->getCdPessoaFisica1());
        $pessoa1Info = $pessoaModel->setDTO($pessoa1)->getBasicInfo();

        $pessoa2 = $pessoaDAO->getById($this->dto->getCdPessoaFisica2());
        $pessoa2Info = $pessoaModel->setDTO($pessoa2)->getBasicInfo();


        return array(
            'cd_pessoa_fisica_1' => $this->dto->getCdPessoaFisica1(),
            'pessoa1_nome' => $pessoa1Info['nome'],
            'pessoa1_email' => $pessoa1Info['email'],
            'pessoa1_foto' => $pessoa1Info['foto'],
            'cd_pessoa_fisica_2' => $this->dto->getCdPessoaFisica2(),
            'pessoa2_nome' => $pessoa2Info['nome'],
            'pessoa2_email' => $pessoa2Info['email'],
            'pessoa2_foto' => $pessoa2Info['foto'],
            'relac' => $relac,
            'cd_catg_relac' => $this->dto->getCdCatgRelac(),
            'cd_vl_catg_relac' => $this->dto->getCdCatgVlRelac()
        );
    }

    public function getRelacionados($id)
    {
        $pessoas = $this->dao->get("cd_pessoa_fisica_1 = {$id}");
        $lista = array();
        foreach($pessoas as $pessoa) {
            $lista[] = $this->setDTO($pessoa)->getArrayDados();
        }
        return $lista;
    }

    public function getRelacionado(PessoaFisicaModel $pessoaFisicaModel)
    {
        $pessoa = $pessoaFisicaModel->getDAO()->getById($this->dto->getCdPessoaFisica2());
        return $pessoaFisicaModel->setDTO($pessoa)->getBasicInfo();
    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(RelacionadosDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
} 