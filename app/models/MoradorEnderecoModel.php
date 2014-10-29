<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 28/10/14
 * Time: 14:39
 */

class MoradorEnderecoModel extends Model
{
    /** @var  MoradorEnderecoDTO */
    private $dto;
    /** @var  MoradorEnderecoDAO */
    private $dao;

    public function __construct()
    {
        $this->dto = new MoradorEnderecoDTO();
        $this->dao = new MoradorEnderecoDAO();
    }

    /**
     * @param MoradorEnderecoDTO $moradorEndereco
     * @return array|mixed
     */
    public function getArrayDados(MoradorEnderecoDTO $moradorEndereco)
    {
        $apartamento = (new ApartamentoDAO())->getById($moradorEndereco->getCdApartamento());
        $setor = (new SetorDAO())->getById($apartamento->getCdSetor());
        $condominio = (new CondominioDAO())->getById($setor->getCdCondominio());

        $dt_entrada = (new DateTime($moradorEndereco->getDtEntrada()))->format('d/m/Y');
        $dt_saida = ($moradorEndereco->getDtSaida() ?
            (new DateTime($moradorEndereco->getDtSaida()))->format('d/m/Y') : '');

        return array(
            'id_m_end' => $moradorEndereco->getNrSequencia(),
            'cd_pessoa_fisica' => $moradorEndereco->getCdPessoaFisica(),
            'm_end_dt_entrada' => $dt_entrada,
            'm_end_dt_saida' => $dt_saida,
            'cd_apartamento' => $moradorEndereco->getCdApartamento(),
            'apartamento' => $apartamento->getDescApartamento(),
            'cd_setor' => $setor->getCdSetor(),
            'setor' => $setor->getNmSetor(),
            'cd_condominio' => $condominio->getCdCondominio(),
            'condominio' => $condominio->getNmCondominio()
        );
    }
} 