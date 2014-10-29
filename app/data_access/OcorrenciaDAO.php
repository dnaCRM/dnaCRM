<?php
class OcorrenciaDAO extends DataAccessObject
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_ocorrencia';
        $this->primaryKey = 'cd_ocorrencia';
        $this->dataTransfer = 'OcorrenciaDTO';
    }

    /**
     * @param OcorrenciaDTO $dto
     * @throws Exception
     */
    public function gravar(OcorrenciaDTO $dto)
    {
        if ($dto->getCdOcorrencia() == '') {
            if (!$this->insert($dto)){
                throw new Exception('Impossível Inserir Ocorrencia');
            }
        } else {
            if (!$this->update($dto)) {
                throw new Exception('Impossível Atualizar Ocorrencia');
            }
        }
    }
} 

