<?php

class InfoEstudosModel extends Model
{
    /** @var  InfoEstudosDTO */
    private $dto;
    /** @var  InfoEstudosDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new InfoEstudosDAO();
    }

    public function getArrayDados()
    {
        $return =  array(
            'cd_pessoa_fisica' => '',
            'cd_info_estudos' => '',
            'instituicao' => '',
            'curso' => '',
            'area' => '',
            'periodo' => '',
            'dt_inicio' => '',
            'dt_fim' => ''
        );
        $con = Database::getConnection();
        $stmt = $con->prepare("
                    SELECT *
                    FROM vs_estudantes
                    WHERE cd_info_estudos = {$this->dto->getCdInfoEstudos()}
                ");
        $stmt->execute();

        $return = $stmt->fetch(PDO::FETCH_ASSOC);

        return $return;

    }

    public function getPorPessoaFisica($id)
    {
        $info_estudos = $this->dao->get("cd_pessoa_fisica = {$id}");
        $lista = array();
        foreach($info_estudos as $ie) {
            $lista[] = $this->setDTO($ie)->getArrayDados();
        }
        return $lista;
    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(InfoEstudosDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
} 