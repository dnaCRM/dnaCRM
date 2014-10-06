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
     * @throws Exception
     */
    public function gravar(ProfissaoDTO $dto)
    {
        if ($dto->getCdProfissao() == '') {
            if (!$this->insert($dto)) {
                throw new Exception('Impossível Inserir Profissao');
            }
        } else {
            if (!$this->update($dto)) {
                throw new Exception('Impossível Atualizar Profissao');
            }
        }
    }
} 