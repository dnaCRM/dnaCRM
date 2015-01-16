<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 13/10/14
 * Time: 23:02
 */

class CategoriaValorDAO extends DataAccessObject
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_categoria_valor';
        $this->primaryKey = 'cd_vl_categoria';
        $this->dataTransfer = 'CategoriaValorDTO';
    }


    /**
     * @param CategoriaValorDTO $dto
     * @return bool|DataTransferObject
     * @throws Exception
     */
    public function gravar(CategoriaValorDTO $dto)
    {
        if (!$dto->getCdVlCategoria()) {
            if (!$obj = $this->insert($dto)) {
                throw new Exception('Impossível Gravar Valor');
            }
        } else {
            if (!$obj = $this->update($dto)) {
                throw new Exception('Impossível Atualizar Valor');
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
        unset($reflex['cd_vl_categoria']);

        $colunas = implode(', ', array_keys($reflex));
        $campos = ':' . implode(', :', array_keys($reflex));

        $sql = "INSERT INTO {$this->tabela} ({$colunas})
                VALUES ({$campos}) returning *";

        foreach ($reflex as $atributo => $method) {
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
                WHERE cd_vl_categoria = :cd_vl_categoria
                 AND cd_categoria = :cd_categoria returning *";

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
                WHERE cd_vl_categoria = :cd_vl_categoria
                 AND cd_categoria = :cd_categoria returning *";

        $array_info = array(
            'cd_vl_categoria' => $dto->getCdVlCategoria(),
            'cd_categoria' => $dto->getCdCategoria()
        );

        if ($this->query($sql, $this->dataTransfer, $array_info)->success()) {
            return $this->first();
        }
        return false;
    }

    /**
     * @param $cd_vl_categoria
     * @param $cd_categoria
     * @return bool
     */
    public function getBy2Ids($cd_vl_categoria, $cd_categoria)
    {
        $where = "";
        if ($cd_vl_categoria && $cd_categoria) {
            $cd_vl_categoria = (int)$cd_vl_categoria;
            $cd_categoria = (int)$cd_categoria;
            $where .= "cd_vl_categoria = {$cd_vl_categoria}
                      AND cd_categoria = {$cd_categoria}";
        }
        $this->resultado = $this->get($where);

        if ($this->resultado) {
            return $this->resultado[0];
        }

        return false;
    }


    /**
     * @param $where
     * @return bool | DataTransferObject
     */
    public function get($where)
    {
        return $this->select($where, null, null, "desc_vl_catg");
    }

}