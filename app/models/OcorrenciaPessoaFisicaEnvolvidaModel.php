<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 31/10/14
 * Time: 11:49
 */

class OcorrenciaPessoaFisicaEnvolvidaModel extends Model
{
    /** @var  OcorrenciaPessoaFisicaEnvolvidaDTO */
    private $dto;
    /** @var  OcorrenciaPessoaFisicaEnvolvidaDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new OcorrenciaPessoaFisicaEnvolvidaDAO();
    }

    /**
     * @return array
     */
    public function getArrayDados()
    {
        $pessoaModel = new PessoaFisicaModel();
        $pessoa = $pessoaModel->getDAO()->getById($this->dto->getCdPessoaFisica());
        $pessoaInfo = $pessoaModel->setDTO($pessoa)->getArrayDados();

        $ocorrenciaModel = new OcorrenciaModel();
        $ocorrencia = $ocorrenciaModel->getDAO()->getById($this->dto->getCdOcorrencia());
        $ocorrenciaInfo = $ocorrenciaModel->setDTO($ocorrencia)->getArrayDados();

        return array_merge($ocorrenciaInfo, $pessoaInfo);
    }

    /**
     * @param PessoaFisicaModel $pessoaFisicaModel
     * @param $id_ocorrencia
     * @return array
     */
    public function getPessoasPorOcorrencia(PessoaFisicaModel $pessoaFisicaModel, $id_ocorrencia)
    {
        $pessoas = $this->dao->get("cd_ocorrencia = {$id_ocorrencia}");
        $lista = array();
        foreach($pessoas as $pessoa) {
            $pessoa = $pessoaFisicaModel->getDAO()->getById($pessoa->getCdPessoaFisica());
            $lista[] = $pessoaFisicaModel->setDTO($pessoa)->getBasicInfo();
        }
        return $lista;
    }

    /**
     * @param OcorrenciaModel $ocorrenciaModel
     * @param $id_pessoa_fisica
     * @return array
     */
    public function getOcorrenciasPorPessoa(OcorrenciaModel $ocorrenciaModel, $id_pessoa_fisica)
    {
        $ocorrencias = $this->dao->get("cd_pessoa_fisica = {$id_pessoa_fisica}");
        $lista = array();
        foreach($ocorrencias as $ocorrencia) {
            $ocorrencia = $ocorrenciaModel->getDAO()->getById($ocorrencia->getCdOcorrencia());
            $lista[] = $ocorrenciaModel->setDTO($ocorrencia)->getArrayDados();
        }
        return $lista;
    }

    /**
     * @param OcorrenciaModel $ocorrenciaModel
     * @param $id_pessoa_fisica
     * @return array
     */
    public function getOcorrenciasPorInformante(OcorrenciaModel $ocorrenciaModel, $id_pessoa_fisica)
    {
        $ocorrencias = $ocorrenciaModel->getDao()->get("cd_pf_informante = {$id_pessoa_fisica}");
        $lista = array();
        foreach($ocorrencias as $ocorrencia) {
            $ocorrencia = $ocorrenciaModel->getDAO()->getById($ocorrencia->getCdOcorrencia());
            $lista[] = $ocorrenciaModel->setDTO($ocorrencia)->getArrayDados();
        }
        return $lista;
    }

    /**
     * @return OcorrenciaPessoaFisicaEnvolvidaDAO
     */
    public function getDAO()
    {
        return $this->dao;
    }

    /**
     * @param OcorrenciaPessoaFisicaEnvolvidaDTO $ocorrenciaPessoaFisicaEnvolvida
     * @return OcorrenciaPessoaFisicaEnvolvidaModel
     */
    public function setDTO(OcorrenciaPessoaFisicaEnvolvidaDTO $ocorrenciaPessoaFisicaEnvolvida)
    {
        $this->dto = $ocorrenciaPessoaFisicaEnvolvida;
        return $this;
    }

} 