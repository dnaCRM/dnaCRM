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

    public function gravar(OrdemServicoDTO $dto)
    {
        if ($dto->getCdOrdemServico() == '') {
            if (!$this->insert($dto)) {
                throw new Exception('Impossível Inserir Ordem de Serviço');
            }
        } else {
            if (!$this->update($dto)) {
                throw new Exception('Impossível Atualizar Ordem de Serviço');
            }
        }
    }
} 

