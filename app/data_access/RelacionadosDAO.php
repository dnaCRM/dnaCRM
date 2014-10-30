<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 05/10/14
 * Time: 18:07
 */
class RelacionadosDAO extends DataAccessObject
{

    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_relacionados';
        $this->primaryKey = 'cd_pessoa_fisica_1, cd_pessoa_fisica_2'; //Chave composta
        $this->dataTransfer = 'RelacionadosDTO';
    }

    /**
     * @param RelacionadosDTO $dto
     * @return bool|DataTransferObject
     * @throws Exception
     */
    public function gravar(RelacionadosDTO $dto)
    {
        if (!$this->getBy2Ids($dto->getCdPessoaFisica1(), $dto->getCdPessoaFisica2())) {
            if (!$obj = $this->insert($dto)) {
                throw new Exception('Impossível Gravar Relacionamento');
            }
        } else {
            if (!$obj = $this->update($dto)) {
                throw new Exception('Impossível Atualizar Relacionamento');
            }
        }
        return $obj;
    }

    /**
     * @param DataTransferObject $dto
     * @return bool|DataTransferObject
     */
    protected function insert(DataTransferObject $dto)
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
    protected function update(DataTransferObject $dto)
    {
        foreach ($dto->getReflex() as $atributo => $method) {
            if ($atributo != 'cd_usuario_criacao' && $atributo != 'dt_usuario_criacao') {
                $parametros[] = $atributo . ' = :' . $atributo;
            }
        }
        $parametros = implode(', ', $parametros);

        $sql = "UPDATE {$this->tabela}
                SET {$parametros}
                WHERE cd_pessoa_fisica_1 = :cd_pessoa_fisica_1
                 AND cd_pessoa_fisica_2 = :cd_pessoa_fisica_2 returning *";

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
                WHERE cd_pessoa_fisica_1 = :cd_pessoa_fisica_1
                 AND cd_pessoa_fisica_2 = :cd_pessoa_fisica_2 returning *";

        $array_info = array(
            'cd_pessoa_fisica_1' => $dto->getCdPessoaFisica1(),
            'cd_pessoa_fisica_2' => $dto->getCdPessoaFisica2()
        );

        if ($this->query($sql, $this->dataTransfer, $array_info)->success()) {
            return $this->getResultado();
        }
        return false;
    }

    /**
     * Informar código de acordo com o critério de pesquisa
     * $pf1 para pesquisar pela Pessoa Física 1 (informar null para não usar)
     * $pf2 para pesquisar pela Pessoa Física 2 (informar null para não usar)
     * Informar os dois parâmetros para pesquisar a chave primária inteira
     * @param null $pf1
     * @param null $pf2
     * @return bool|DataTransferObject
     */
    public function getBy2Ids($pf1, $pf2)
    {
        $where = "";
        if ($pf2 && $pf2) {
            $pf1 = (int)$pf1;
            $pf2 = (int)$pf2;
            $where .= "cd_pessoa_fisica_1 = {$pf1}
                      AND cd_pessoa_fisica_2 = {$pf2}";
        }
        $this->resultado = $this->get($where);

        if ($this->resultado) {
            return $this->resultado[0];
        }

        return false;
    }

} 