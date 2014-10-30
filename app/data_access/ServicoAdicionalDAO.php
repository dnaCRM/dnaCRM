<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 05/10/14
 * Time: 18:15
 */

class ServicoAdicionalDAO extends DataAccessObject
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_servico_adicional';
        $this->primaryKey = 'cd_serv_adicional';
        $this->dataTransfer = 'ServicoAdicionalDTO';
    }

    /**
     * @param ServicoAdicionalDTO $dto
     * @return bool|DataTransferObject
     * @throws Exception
     */
    public function gravar(ServicoAdicionalDTO $dto)
    {
        if ($dto->getCdServAdicional() == '') {
            if (!$obj = $this->insert($dto)) {
                throw new Exception('Impossível Inserir Serviço Adicional');
            }
        } else {
            if (!$obj = $this->update($dto)) {
                throw new Exception('Impossível Atualizar Serviço Adicional');
            }
        }
        return $obj;
    }
} 