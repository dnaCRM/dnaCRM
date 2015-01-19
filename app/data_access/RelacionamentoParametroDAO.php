<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 17/01/15
 * Time: 11:15
 */

class RelacionamentoParametroDAO extends DataAccessObject
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_relac_parametro';
        $this->primaryKey ='cd_catg_vl_relac_1';
        $this->dataTransfer = 'RelacionamentoParametroDTO';
    }

    /**
     *
     */
    public function gravar(DataTransferObject $dto)
    {
        if ($dto->getCdCatgVlRelac1() && $dto->getCdCatgVlRelac2()) {
            if (!$obj = $this->insert($dto)) {
                throw new Exception('Impossível Gravar Parâmetros');
            }
        }

        return $obj;
    }

    protected function insert(DataTransferObject $dto)
    {
        $reflex = $dto->getReflex();

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
                WHERE cd_catg_vl_relac_1 = :cd_catg_vl_relac_1
                 AND cd_catg_vl_relac_2 = :cd_catg_vl_relac_2 returning *";

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
                WHERE cd_catg_vl_relac_1 = :cd_catg_vl_relac_1
                 AND cd_catg_vl_relac_2 = :cd_catg_vl_relac_2 returning *";

        $array_info = array(
            'cd_catg_vl_relac_1' => $dto->getCdCatgVlRelac1(),
            'cd_catg_vl_relac_2' => $dto->getCdCatgVlRelac2()
        );

        if ($this->query($sql, $this->dataTransfer, $array_info)->success()) {
            return $this->first();
        }
        return false;
    }

    /**
     * @param $cd_catg_vl_relac_1
     * @param $cd_catg_vl_relac_2
     * @return bool
     */
    public function getBy2Ids($cd_catg_vl_relac_1, $cd_catg_vl_relac_2)
    {
        $where = "";
        if ($cd_catg_vl_relac_1 && $cd_catg_vl_relac_2) {

            $cd_catg_vl_relac_1 = (int)$cd_catg_vl_relac_1;
            $cd_catg_vl_relac_2 = (int)$cd_catg_vl_relac_2;

            $where .= "cd_catg_vl_relac_1 = {$cd_catg_vl_relac_1}
                      AND cd_catg_vl_relac_2 = {$cd_catg_vl_relac_2}";
        }
        $this->resultado = $this->get($where);

        if ($this->resultado) {
            return $this->first();
        }

        return false;
    }

    /**
     * @param $where
     * @return bool | DataTransferObject
     */
    public function get($where)
    {
        return $this->select($where, null, null, null);
    }
} 