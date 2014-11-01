<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 31/10/14
 * Time: 13:14
 */
class OcorrenciaPessoaFisicaEnvolvida extends Controller
{
    /** @var  OcorrenciaPessoaFisicaEnvolvidaModel */
    private $ocorrenciaPessoaFisicaEnvolvidaModel;

    public function __construct()
    {
        $this->setModel(new OcorrenciaPessoaFisicaEnvolvidaDAO());
        $this->ocorrenciaPessoaFisicaEnvolvidaModel = new OcorrenciaPessoaFisicaEnvolvidaModel();
    }

    /**
     * Não existe update para esta tabela
     * Ao tentar gravar um registro que já existe, o método retorna o
     * array 'msg' => 'Registro já existe!'
     */
    public function cadastra()
    {
        if (Input::exists()) {
            $obj = $this->setDados();

            try {
                $dados = $this->model->gravar($obj);
                if (!is_array($dados)) {
                    $dados = $this->ocorrenciaPessoaFisicaEnvolvidaModel->setDTO($dados)->getArrayDados();
                }
                echo json_encode($dados);
            } catch (Exception $e) {
                CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }

        }
    }

    public function setDados()
    {
        $dto = new OcorrenciaPessoaFisicaEnvolvidaDTO();

        $dto
            ->setCdOcorrencia((int)Input::get('cd_ocorrencia'))
            ->setCdPessoaFisica((int)Input::get('cd_pessoa_fisica'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

    public function findBy2Ids()
    {
        $ocorrencia = (int)Input::get('cd_ocorrencia');
        $pessoa = (int)Input::get('cd_pessoa_fisica');

        $dto = $this->model->getBy2Ids($ocorrencia, $pessoa);

        $result = $this->ocorrenciaPessoaFisicaEnvolvidaModel->setDTO($dto)->getArrayDados();
        echo json_encode($result);
    }

    public function findByOcorrencia($id)
    {
        $result = $this->ocorrenciaPessoaFisicaEnvolvidaModel
            ->getPorOcorrencia(new OcorrenciaModel(), $id);

        echo json_encode($result);
    }

    public function findByPessoa($id)
    {
        $result = $this->ocorrenciaPessoaFisicaEnvolvidaModel
            ->getPorPessoa(new PessoaFisicaModel(), $id);

        echo json_encode($result);
    }

    public function apagar()
    {
        $pessoa = (int)Input::get('cd_pessoa_fisica');
        $ocorrencia = (int)Input::get('cd_ocorrencia');

        $dto = $this->model->getBy2Ids($ocorrencia, $pessoa);
        $ocorrenciaPessoaFisicaEnvolvida = $this->model->delete($dto);

        $result = $this->ocorrenciaPessoaFisicaEnvolvidaModel->setDTO($ocorrenciaPessoaFisicaEnvolvida)->getArrayDados();
        echo json_encode($result);
    }
} 