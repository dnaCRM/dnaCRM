<?php
class OrdemServicoDAO extends DataAccessObject
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_ordem_servico';
        $this->primaryKey = 'cd_ordem_servico';
        $this->dataTransfer = 'OrdemServicoDTO';
    }

    /**
     * @param OrdemServicoDTO $dto
     * @return bool
     * @throws Exception
     */
    public function gravar(OrdemServicoDTO $dto)
    {
        if ($dto->getCdOrdemServico() == '') {
            if ($obj = !$this->insert($dto)) {
                throw new Exception('Impossível Inserir Ordem de Serviço');
            }
        } else {
            if ($obj = !$this->update($dto)) {
                throw new Exception('Impossível Atualizar Ordem de Serviço');
            }
        }
        return $obj;
    }
} 

