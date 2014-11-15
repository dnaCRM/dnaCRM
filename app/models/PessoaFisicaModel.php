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
    private $dto;
    /** @var  PessoaFisicaDAO */
    private $dao;

    /**
     *
     */
    public function __construct()
    {
        $this->dao = new PessoaFisicaDAO();
    }

    public function getArrayDados()
    {
        $categoria = new CategoriaValorDAO();
        $uf = '';

        if ($this->dto->getCdCatgOrgRg()) {
            $catg = $categoria->getBy2Ids($this->dto->getCdVlCatgOrgRg(), $this->dto->getCdCatgOrgRg());
            $uf = $catg->getDescVlCatg();
        }

        $grau = '';
        if ($this->dto->getCdCatgGrauEnsino()) {
            $catg = $categoria->getBy2Ids($this->dto->getCdVlCatgGrauEnsino(), $this->dto->getCdCatgGrauEnsino());
            $grau = $catg->getDescVlCatg();
        }
        $instituicao = '';
        if ($this->dto->getCdInstituicao()) {
            $instituicao = (new InstituicaoEnsinoDAO())->getById($this->dto->getCdInstituicao())
                ->getDsInstituicao();
        }

        $empresa = '';
        if ($this->dto->getCdPessoaJuridica()) {
            $empresa = (new PessoaJuridicaDAO())->getById($this->dto->getCdPessoaJuridica())
                ->getNmFantasia();
        }
        $profissao = '';
        if ($this->dto->getCdProfissao()) {
            $profissao = (new ProfissaoDAO())->getById($this->dto->getCdProfissao())
                ->getNmProfissao();
        }

        $sexo = ($this->dto->getIeSexo() == 'F' ? 'Feminino' : 'Masculino');

        // Calculando a idade
        $date = new DateTime($this->dto->getDtNascimento()); // data de nascimento
        $interval = $date->diff( new DateTime() ); // data atual
        $idade = $interval->format('%Y anos');
        //  '%Y Anos, %m Meses e %d Dias'  110 Anos, 2 Meses e 2 Dias
        // '%Y Anos, %m Meses, %d Dias, %H Horas, %i Minutos e %s Segundos'

        $dt_inicio_curso = ($this->dto->getDtInicioCurso() ?
            (new DateTime($this->dto->getDtInicioCurso()))->format('d/m/Y') : '');

        $dt_fim_curso = ($this->dto->getDtFimCurso() ?
            (new DateTime($this->dto->getDtFimCurso()))->format('d/m/Y') : '');

        return array(
            'cd_pessoa_fisica' => $this->dto->getCdPessoaFisica(),
            'cd_pessoa_juridica' => $this->dto->getCdPessoaJuridica(),
            'empresa' => $empresa,
            'cd_profissao' => $this->dto->getCdProfissao(),
            'profissao' => $profissao,
            'nm_pessoa_fisica' => $this->dto->getNmPessoaFisica(),
            'im_perfil' => $this->dto->getImPerfil(),
            'cpf' => $this->dto->getCpf(),
            'rg' => $this->dto->getRg(),
            'uf' => $uf,
            'cd_catg_org_rg' => $this->dto->getCdCatgOrgRg(),
            'cd_vl_catg_org_rg' => $this->dto->getCdVlCatgOrgRg(),
            'email' => $this->dto->getEmail(),
            'idade' => $idade,
            'dt_nascimento' => (new DateTime($this->dto->getDtNascimento()))->format('d/m/Y'),
            'ie_sexo' => $sexo,
            'ie_estuda' => ($this->dto->getIeEstuda() == 's' ? 'Sim' : 'Não'),
            'cd_instituicao' => $this->dto->getCdInstituicao(),
            'instituicao' => $instituicao,
            'dt_inicio_curso' => $dt_inicio_curso,
            'dt_fim_curso' => $dt_fim_curso,
            'grau' => $grau,
            'cd_catg_grau_ensino' => $this->dto->getCdCatgGrauEnsino(),
            'cd_vl_catg_grau_ensino' => $this->dto->getCdVlCatgGrauEnsino()
        );
    }

    public function getPessoaFisica()
    {
        $_POST = filter_input_array(INPUT_POST);
        $nome = Input::get('nome');
        $pessoas = $this->dao->get("nm_pessoa_fisica ilike '%{$nome}%' order by nm_pessoa_fisica limit 5");

        $resultado = array();

        foreach ($pessoas as $pessoa) {
            $resultado[] = $this->setDTO($pessoa)->getBasicInfo();
        }

        return $resultado;
    }

    public function getBasicInfo()
    {
        return array(
            'id' => $this->dto->getCdPessoaFisica(),
            'nome' => $this->dto->getNmPessoaFisica(),
            'foto' => $this->dto->getImPerfil(),
            'email' => $this->dto->getEmail(),
            'nascimento' => (new DateTime($this->dto->getDtNascimento()))->format('d/m/Y')
        );
    }

    public function getTelefones(PessoaFisicaTelefoneModel $pessoaFisicaTelefone)
    {
        return $pessoaFisicaTelefone->getTelefonesPessoaFisica($this->dto->getCdPessoaFisica());
    }

    public function getEnderecos(PessoaFisicaEnderecoModel $pessoaFisicaEndereco)
    {
        return $pessoaFisicaEndereco->getEnderecosPessoaFisica($this->dto->getCdPessoaFisica());
    }

    public function getMoradorEnderecos(MoradorEnderecoModel $moradorEndereco)
    {
        return $moradorEndereco->getPorMorador($this->dto->getCdPessoaFisica());
    }

    public function getOsSolicitadas(OrdemServicoModel $ordemServico)
    {
        return $ordemServico->getPorSolicitante($this->dto->getCdPessoaFisica());
    }

    public function getOsExecutadas(OrdemServicoModel $ordemServico)
    {
        return $ordemServico->getPorExecutor($this->dto->getCdPessoaFisica());
    }

    public function getOcorrenciasEnvolvidas(OcorrenciaPessoaFisicaEnvolvidaModel $ocorrencias)
    {
        return $ocorrencias->getOcorrenciasPorPessoa(new OcorrenciaModel(), $this->dto->getCdPessoaFisica());
    }

    public function getOcorrenciasInformadas(OcorrenciaPessoaFisicaEnvolvidaModel $ocorrencias)
    {
        return $ocorrencias->getOcorrenciasPorInformante(new OcorrenciaModel(), $this->dto->getCdPessoaFisica());
    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(PessoaFisicaDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }

    /**
     * @param RelacionadosDAO $relacionados
     * @return array|bool
     */
    public function getRelacionados(RelacionadosDAO $relacionados)
    {
        if ($this->dto->getCdPessoaFisica()) {
            $relacionados = $relacionados->get("cd_pessoa_fisica_1 = {$this->dto->getCdPessoaFisica()}");

            foreach ($relacionados as $relacionado) {
                $lista[] = $this->dao->getById($relacionado->getCdPessoaFisica2());
            }

            return $lista;
        }
        return false;
    }

} 