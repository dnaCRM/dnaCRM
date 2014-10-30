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
     * @return bool
     * @throws Exception
     */
    public function gravar(OcorrenciaDTO $dto)
    {
        if ($dto->getCdOcorrencia() == '') {
            if ($obj = !$this->insert($dto)){
                throw new Exception('Impossível Inserir Ocorrencia');
            }
        } else {
            if ($obj = !$this->update($dto)) {
                throw new Exception('Impossível Atualizar Ocorrencia');
            }
        }
        return $obj;
    }
} 

