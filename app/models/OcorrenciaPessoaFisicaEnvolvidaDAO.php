<?php

/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 07/10/14
 * Time: 02:25
 */
class OcorrenciaPessoaFisicaEnvolvidaDAO extends DataAccessObject
{

    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_ocorrencia_pf_envolvida';
        $this->primaryKey = 'cd_ocorrencia, cd_pessoa_fisica'; //Chave composta
        $this->dataTransfer = 'OcorrenciaPessoaFisicaEnvolvidaDTO';
    }

    /**
     * @todo A tabela correspondente a esta Classe usa chave composta.
     * Como resolver?
     */
    public function gravar(OcorrenciaPessoaFisicaEnvolvidaDTO $dto)
    {
        if (!$this->getBy2Ids($dto->getCdOcorrencia(), $dto->getCdPessoaFisica())) {
            if (!$this->insert($dto)) {
                throw new Exception('Impossível Gravar Ocorrencia de Pessoa Fisica Envolvida');
            }
        } else {
            if (!$this->update($dto)) {
                throw new Exception('Impossível Atualizar Ocorrencia de Pessoa Fisica Envolvida');
            }
        }
    }

    /**
     * @param DataTransferObject $dto
     * @return bool|DataTransferObject
     */
    public function insert(DataTransferObject $dto)
    {
        $reflex = $dto->getReflex();

        $colunas = implode(', ', array_keys($reflex));
        $campos = ':' . implode(', :', array_keys($reflex));

        $sql = "INSERT INTO {$this->tabela} ({$colunas})
                VALUES ({$campos}) returning *";

        foreach ($dto->getReflex() as $atributo => $method) {
            $dados[$atributo] = $dto->{$method}();
        }

        if ($this->query($sql, $this->dataTransfer, $dados)->success()) {
            return $this->getResultado()[0];
        }
        return false;
    }

    /**
     * @param DataTransferObject $dto
     * @return bool|DataTransferObject
     */
    public function update(DataTransferObject $dto)
    {
        foreach ($dto->getReflex() as $atributo => $method) {
            if ($atributo != 'cd_usuario_criacao' && $atributo != 'dt_usuario_criacao') {
                $parametros[] = $atributo . ' = :' . $atributo;
            }
        }
        $parametros = implode(', ', $parametros);

        $sql = "UPDATE {$this->tabela}
                SET {$parametros}
                WHERE cd_ocorrencia = :cd_ocorrencia
                 AND cd_pessoa_fisica = :cd_pessoa_fisica returning *";

        foreach ($dto->getReflex() as $atributo => $method) {
            if ($atributo != 'cd_usuario_criacao' && $atributo != 'dt_usuario_criacao') {
                $dados[$atributo] = $dto->{$method}();
            }
        }

        if ($this->query($sql, $this->dataTransfer, $dados)->success()) {
            return $this->getResultado()[0];
        }
        return false;
    }

    /**
     * @param DataTransferObject $dto
     * @return bool|DataTransferObject
     */
    public function delete(DataTransferObject $dto)
    {
        $sql = "DELETE FROM {$this->tabela}
                WHERE cd_ocorrencia = :cd_ocorrencia
                 AND cd_pessoa_fisica = :cd_pessoa_fisica returning *";

        $array_info = array(
            'cd_ocorrencia' => $dto->getCdOcorrencia(),
            'cd_pessoa_fisica' => $dto->getCdPessoaFisica()
        );

        if ($this->query($sql, $this->dataTransfer, $array_info)->success()) {
            return $this->getResultado();
        }
        return false;
    }

    /**
     * @param null $ocorrencia
     * @param null $pessoafisica
     * @return bool|DataTransferObject
     */
    public function getBy2Ids($ocorrencia, $pessoafisica)
    {
        $where = "";
        if ($pessoafisica && $pessoafisica) {
            $ocorrencia = (int)$ocorrencia;
            $pessoafisica = (int)$pessoafisica;
            $where .= "cd_ocorrencia = {$ocorrencia}
                      AND cd_pessoa_fisica = {$pessoafisica}";
        }
        $this->resultado = $this->get($where);

        if ($this->resultado) {
            return $this->resultado[0];
        }

        return false;
    }

} 