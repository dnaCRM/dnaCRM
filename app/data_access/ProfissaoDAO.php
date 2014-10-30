<?php
class ProfissaoDAO extends DataAccessObject
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_profissao';
        $this->primaryKey = 'cd_profissao';
        $this->dataTransfer = 'ProfissaoDTO';
    }

    /**
     * @param ProfissaoDTO $dto
     * @return bool|DataTransferObject
     * @throws Exception
     */
    public function gravar(ProfissaoDTO $dto)
    {
        if ($dto->getCdProfissao() == '') {
            if (!$obj = $this->insert($dto)) {
                throw new Exception('Impossível Inserir Profissao');
            }
        } else {
            if (!$obj = $this->update($dto)) {
                throw new Exception('Impossível Atualizar Profissao');
            }
        }
        return $obj;
    }
} 