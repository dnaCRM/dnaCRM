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
        $this->dao = new MoradorEnderecoDAO();
    }

    /**
     * @return array
     */
    public function getArrayDados()
    {
        $apartamento = (new ApartamentoDAO())->getById($this->dto->getCdApartamento());
        $setor = (new SetorDAO())->getById($apartamento->getCdSetor());
        $condominio = (new CondominioDAO())->getById($setor->getCdCondominio());

        $dt_entrada = (new DateTime($this->dto->getDtEntrada()))->format('d/m/Y');
        $dt_saida = ($this->dto->getDtSaida() ?
            (new DateTime($this->dto->getDtSaida()))->format('d/m/Y') : '');

        $pessoa = (new PessoaFisicaDAO())->getById($this->dto->getCdPessoaFisica())
            ->getNmPessoaFisica();

        return array(
            'id_m_end' => $this->dto->getNrSequencia(),
            'cd_pessoa_fisica' => $this->dto->getCdPessoaFisica(),
            'pessoa' => $pessoa,
            'm_end_dt_entrada' => $dt_entrada,
            'm_end_dt_saida' => $dt_saida,
            'cd_apartamento' => $this->dto->getCdApartamento(),
            'apartamento' => $apartamento->getDescApartamento(),
            'cd_setor' => $setor->getCdSetor(),
            'setor' => $setor->getNmSetor(),
            'cd_condominio' => $condominio->getCdCondominio(),
            'condominio' => $condominio->getNmCondominio()
        );
    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(MoradorEnderecoDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
    
    public function getEnderecosMorador($id)
    {
        $morador_endereco = $this->dao->get("cd_pessoa_fisica = {$id}");
        $lista = array();
        foreach($morador_endereco as $me){
            $lista[] = $this->setDTO($me)->getArrayDados();
        }
        return $lista;
    }
} 