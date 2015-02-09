<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 16/10/14
 * Time: 03:05
 */
class CondominioModel extends PessoaJuridicaModel
{

    public function getSetores(SetorModel $setorModel)
    {
        $setores = $setorModel->getDAO()->get("cd_condominio = {$this->dto->getCdPessoaJuridica()}
                                                AND cd_catg_tipo != 18
                                                ORDER BY nm_setor");

        $lista = array();
        foreach ($setores as $setor) {
            $lista[] = $setorModel->setDTO($setor)->getArrayDados();
        }
        return $lista;
    }

}