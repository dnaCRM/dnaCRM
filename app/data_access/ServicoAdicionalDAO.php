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

    public function gravar(ServicoAdicionalDTO $dto)
    {
        if ($dto->getCdServAdicional() == '') {
            if (!$this->insert($dto)) {
                throw new Exception('Impossível Inserir Serviço Adicional');
            }
        } else {
            if (!$this->update($dto)) {
                throw new Exception('Impossível Atualizar Serviço Adicional');
            }
        }
    }
} 