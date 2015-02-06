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
        $idade = '';
        $dt_nascimento = '';
        if ($this->dto->getDtNascimento()) {
            $date = new DateTime($this->dto->getDtNascimento()); // data de nascimento
            $interval = $date->diff(new DateTime()); // data atual
            $idade = $interval->format('%Y anos');
            $dt_nascimento = (new DateTime($this->dto->getDtNascimento()))->format('d/m/Y');
            //  '%Y Anos, %m Meses e %d Dias'  110 Anos, 2 Meses e 2 Dias
            // '%Y Anos, %m Meses, %d Dias, %H Horas, %i Minutos e %s Segundos'
        }

        $uf_rg = '';
        if ($this->dto->getUfRg()) {
            $estadoDTO = (new EstadosDAO())->getById($this->dto->getUfRg());
            $uf_rg = $estadoDTO->getSigla();
        }

        $cidade_dados = '';
        if ($this->dto->getCdCidadeOrigem()) {
            $cidade_origem = (new CidadesDAO())->getById($this->dto->getCdCidadeOrigem());
            $cidade_dados = (new CidadesModel())->setDTO($cidade_origem)->getArrayDados();
        }

        return array(
            'cd_pessoa_fisica' => $this->dto->getCdPessoaFisica(),
            'cd_pessoa_juridica' => $this->dto->getCdPessoaJuridica(),
            'empresa' => $empresa,
            'cd_profissao' => $this->dto->getCdProfissao(),
            'profissao' => $profissao,
            'nm_pessoa_fisica' => $this->dto->getNmPessoaFisica(),
            'im_perfil' => Image::get($this->dto),
            'cpf' => $this->dto->getCpf(),
            'rg' => $this->dto->getRg(),
            'uf_rg' => $uf_rg,
            'email' => $this->dto->getEmail(),
            'idade' => $idade,
            'dt_nascimento' => $dt_nascimento,
            'ie_sexo' => $sexo,
            'cidade_origem' => $this->dto->getCdCidadeOrigem(),
            'cidade_origem_dados' => $cidade_dados
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
            'foto' => Image::get($this->dto),
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

    public function existeCPF($cpf, $id)
    {
        $queryString = "cpf = '{$cpf}'";

        if ($id) {
            $queryString .= " AND cd_pessoa_fisica != {$id}";
        }

        $return = $this->dao->get($queryString);

        return (count($return) > 0 ? false : true);
    }

    public function existeRG($rg, $id)
    {
        $queryString = "rg ilike '{$rg}'";

        if ($id) {
            $queryString .= " AND cd_pessoa_fisica != {$id}";
        }

        $return = $this->dao->get($queryString);

        return (count($return) > 0 ? false : true);
    }

    public function existeEmail($email, $id)
    {
        $queryString = "email ilike '{$email}'";

        if ($id) {
            $queryString .= " AND cd_pessoa_fisica != {$id}";
        }

        $return = $this->dao->get($queryString);

        return (count($return) > 0 ? false : true);
    }

} 