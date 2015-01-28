<?php
/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 22/07/14
 * Time: 22:48
 */

class HomeModel extends Model
{
    /**
     * @param PessoaFisicaModel $pessoaFisicaModel
     * @param $ordenar_por
     * @param $limit
     * @return array
     */
    public function getUltimasPessoas(PessoaFisicaModel $pessoaFisicaModel, $ordenar_por, $limit)
    {
        /** @var $ordenar_por STRING */
        $pessoas =  $pessoaFisicaModel->getDAO()
            ->get("cd_pessoa_fisica is not null order by {$ordenar_por} desc limit {$limit}");

        $lista = array();
        foreach ($pessoas as $pessoa) {
            $lista[] = $pessoaFisicaModel->setDTO($pessoa)->getBasicInfo();
        }

        return $lista;
    }

    /**
     * @param OcorrenciaModel $ocorrenciaModel
     * @param $ordenar_por
     * @param $limit
     * @return array
     */
    public function getUltimasOcorrencias(OcorrenciaModel $ocorrenciaModel, $ordenar_por, $limit)
    {
        /** @var $ordenar_por STRING */
        $ocorrencias =  $ocorrenciaModel->getDAO()
            ->get("cd_ocorrencia is not null order by {$ordenar_por} desc limit {$limit}");

        $lista = array();
        foreach ($ocorrencias as $ocorrencia) {
            $lista[] = $ocorrenciaModel->setDTO($ocorrencia)->getArrayDados();
        }

        return $lista;
    }

    /**
     * @param OrdemServicoModel $ordemServicoModel
     * @param $ordenar_por
     * @param $limit
     * @return array
     */
    public function getUltimasOrdensServico(OrdemServicoModel $ordemServicoModel, $ordenar_por, $limit)
    {
        /** @var $ordenar_por STRING */
        $ordens_servico =  $ordemServicoModel->getDAO()
            ->get("cd_ordem_servico is not null order by {$ordenar_por} desc limit {$limit}");

        $lista = array();
        foreach ($ordens_servico as $ordem_servico) {
            $lista[] = $ordemServicoModel->setDTO($ordem_servico)->getArrayDados();
        }

        return $lista;
    }

    public function getAniversariantesDoMes(PessoaFisicaModel $pessoaFisicaModel)
    {
        $mes_atual = (int)(new DateTime())->format('m');
        $pessoas =  $pessoaFisicaModel->getDAO()
            ->get("date_part('month', dt_nascimento) = {$mes_atual} order by dt_nascimento desc");

        $lista = array();
        foreach ($pessoas as $pessoa) {
            $lista[] = $pessoaFisicaModel->setDTO($pessoa)->getBasicInfo();
        }

        return $lista;
    }

    public function getAniversariantesDoDia(PessoaFisicaModel $pessoaFisicaModel)
    {
        $dia_atual = (int)(new DateTime())->format('d');
        $pessoas =  $pessoaFisicaModel->getDAO()
            ->get("date_part('day', dt_nascimento) = {$dia_atual} order by nm_pessoa_fisica");

        $lista = array();
        foreach ($pessoas as $pessoa) {
            $lista[] = $pessoaFisicaModel->setDTO($pessoa)->getBasicInfo();
        }

        return $lista;
    }

}