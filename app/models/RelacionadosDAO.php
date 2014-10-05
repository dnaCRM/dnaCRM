<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 05/10/14
 * Time: 18:07
 */

class RelacionadosDAO extends DataAccessObject
{

    public function __construct()
    {
        parent::__construct();
        $this->tabela = '';
        $this->primaryKey = '';//Chave composta
        $this->dataTransfer = 'RelacionadosDTO';
    }

    /**
     * @todo A tabela correspondente a esta Classe usa chave composta.
     * Como resolver?
     */
    public function gravar(RelacionadosDTO $dto)
    {
        if ($dto->getNrSequencia() == '') {
            if (!$this->insert($dto)) {
                throw new Exception('Impossível Gravar Relacionamento');
            }
        } else {
            if (!$this->update($dto)) {
                throw new Exception('Impossível Atualizar Relacionamento');
            }
        }
    }

} 