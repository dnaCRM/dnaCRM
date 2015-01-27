<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 29/10/14
 * Time: 15:26
 */

class OcorrenciaModel extends Model
{
    /** @var  OcorrenciaDTO */
    private $dto;
    /** @var  OcorrenciaDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new OcorrenciaDAO();
    }

    public function getArrayDados()
    {
        $informante = (new PessoaFisicaDAO())->getById($this->dto->getCdPfInformante());
        $cd_condominio = '';
        $condominio = '';
        $condominio_foto = '';
        $setor = '';
        $setor_foto = '';
        if ($this->dto->getCdSetor()) {
            $setorDTO= (new SetorDAO())->getById($this->dto->getCdSetor());
            $condominioDTO = (new PessoaJuridicaDAO())->getById($setorDTO->getCdCondominio());
            $setor = $setorDTO->getNmSetor();
            $setor_foto = $setorDTO->getImPerfil();
            $cd_condominio = $condominioDTO->getCdPessoaJuridica();
            $condominio = $condominioDTO->getNmFantasia();
            $condominio_foto = $condominioDTO->getImPerfil();
        }

        $categoria = new CategoriaValorDAO();
        $estagio = '';
        if ($this->dto->getCdCatgEstagio()) {
            $catg = $categoria->getBy2Ids($this->dto->getCdVlCatgEstagio(), $this->dto->getCdCatgEstagio());
            $estagio = $catg->getDescVlCatg();
        }
        $tipo = '';
        if ($this->dto->getCdCatgTipo()) {
            $catg = $categoria->getBy2Ids($this->dto->getCdVlCatgTipo(), $this->dto->getCdCatgTipo());
            $tipo = $catg->getDescVlCatg();
        }

        return array(
            'cd_ocorrencia' => $this->dto->getCdOcorrencia(),
            'cd_setor' => $this->dto->getCdSetor(),
            'setor' => $setor,
            'setor_foto' => $setor_foto,
            'cd_condominio' => $cd_condominio,
            'condominio' => $condominio,
            'condominio_foto' => $condominio_foto,
            'cd_pf_informante' => $this->dto->getCdPfInformante(),
            'informante' => $informante->getNmPessoaFisica(),
            'informante_foto' => $informante->getImPerfil(),
            'desc_assunto' => $this->dto->getDescAssunto(),
            'desc_ocorrencia' => $this->dto->getDescOcorrencia(),
            'dt_ocorrencia' => (new DateTime($this->dto->getDtOcorrencia()))->format('d/m/Y'),
            'dt_fim' => ($this->dto->getDtFim() ? (new DateTime($this->dto->getDtFim()))->format('d/m/Y') : 'em aberto'),
            'desc_conclusao' => $this->dto->getDescConclusao(),
            'cd_catg_estagio' => $this->dto->getCdCatgEstagio(),
            'cd_vl_catg_estagio' => $this->dto->getCdVlCatgEstagio(),
            'estagio' => $estagio,
            'cd_catg_tipo' => $this->dto->getCdCatgTipo(),
            'cd_vl_catg_tipo' => $this->dto->getCdVlCatgTipo(),
            'tipo' => $tipo
        );
    }

    public function getOcorrencia()
    {
        $_POST = filter_input_array(INPUT_POST);
        $assunto = Input::get('assunto');
        $ocorrencias = $this->dao->get("desc_assunto ilike '%{$assunto}%' order by desc_assunto limit 5");

        $resultado = array();

        foreach($ocorrencias as $ocorrencia) {
            $resultado[] = $this->setDTO($ocorrencia)->getBasicInfo();
        }

        return $resultado;
    }

    public function getBasicInfo()
    {
        return array(
            'cd_ocorrencia' => $this->dto->getCdOcorrencia(),
            'dt_ocorrencia' => (new DateTime($this->dto->getDtOcorrencia()))->format('d/m/Y'),
            'desc_assunto' => $this->dto->getDescAssunto(),
            'desc_ocorrencia' => $this->dto->getDescOcorrencia()
        );
    }

    public function getPessoasEnvolvidas(OcorrenciaPessoaFisicaEnvolvidaModel $pessoas)
    {
        return $pessoas->getPessoasPorOcorrencia(new PessoaFisicaModel(), $this->dto->getCdOcorrencia());
    }

    public function getPorSetor($id)
    {
        $ocorrencias = $this->getDAO()->get("cd_setor = {$id}");
        $lista = array();

        foreach ($ocorrencias as $ocorrencia) {
            $lista[] = $this->setDTO($ocorrencia)->getArrayDados();
        }

        return $lista;
    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(OcorrenciaDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
} 