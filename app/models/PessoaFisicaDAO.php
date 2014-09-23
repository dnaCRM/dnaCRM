<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 02/08/14
 * Time: 19:14
 */



class PessoaFisicaDAO extends DataAccessObject
{

    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_pessoa_fisica';
        $this->primaryKey = 'cd_pessoa_fisica';
        $this->dataTransfer = 'PessoaFisicaDTO';
        $this->colunaImagem = 'im_perfil';
        $this->imgFolder = IMG_UPLOADS_FOLDER . "{$this->tabela}/";
        $this->fotoDefault = IMG_UPLOADS_FOLDER . 'icon-user.jpg';

    }

    public function gravar(PessoaFisicaDTO $pessoaFisica)
    {
        if ($pessoaFisica->getCdPessoaFisica() == '') {
            $obj = $this->insert($pessoaFisica);
        } else {
            $obj = $this->update($pessoaFisica);
        }
        var_dump($obj);

        if ($this->importaFoto($obj->getCdPessoaFisica())) {
            $this->exportaFoto($obj->getCdPessoaFisica());
        }

    }

    public function save(PessoaFisicaDTO $pessoaFisica)
    {
        if ($pessoaFisica->getCdPessoaFisica() == '') {
            $sql = "
            INSERT INTO {$this->tabela}
                (cd_pessoa_juridica, cd_profissao, nm_pessoa_fisica, cpf, rg, cd_catg_org_rg,
                cd_vl_catg_org_rg, email, dt_nascimento, fone, celular, ie_sexo, cd_usuario_criacao,
                dt_usuario_criacao, cd_usuario_atualiza, dt_usuario_atualiza, ie_estuda, cd_instituicao)
            VALUES
                (:cd_pessoa_juridica, :cd_profissao, :nm_pessoa_fisica, :cpf, :rg, :cd_catg_org_rg,
                :cd_vl_catg_org_rg, :email, :dt_nascimento, :fone, :celular, :ie_sexo, :cd_usuario_criacao,
                :dt_usuario_criacao, :cd_usuario_atualiza, :dt_usuario_atualiza, :ie_estuda, :cd_instituicao) returning *";
        } else {
            $sql = "
            UPDATE {$this->getTabela()}
            SET cd_pessoa_juridica = :cd_pessoa_juridica, cd_profissao = :cd_profissao,
                nm_pessoa_fisica = :nm_pessoa_fisica, cpf = :cpf, rg = :rg, cd_catg_org_rg = :cd_catg_org_rg,
                cd_vl_catg_org_rg = :cd_vl_catg_org_rg, email = :email, dt_nascimento = :dt_nascimento, fone = :fone,
                celular = :celular, ie_sexo = :ie_sexo, cd_usuario_criacao = :cd_usuario_criacao,
                dt_usuario_criacao = :dt_usuario_criacao, cd_usuario_atualiza = :cd_usuario_atualiza,
                dt_usuario_atualiza = :dt_usuario_atualiza, ie_estuda = :ie_estuda, cd_instituicao = :cd_instituicao
            WHERE {$this->getPrimaryKey()} = {$pessoaFisica->getCdPessoaFisica()}";
        }

        $stmt = $this->con->prepare($sql);

        $stmt->bindValue(':cd_pessoa_juridica', $pessoaFisica->getCdPessoaJuridica(), PDO::PARAM_INT);
        $stmt->bindValue(':cd_profissao', $pessoaFisica->getCdProfissao(), PDO::PARAM_INT);
        $stmt->bindValue(':nm_pessoa_fisica', $pessoaFisica->getNmPessoaFisica(), PDO::PARAM_STR);
        $stmt->bindValue(':cpf', $pessoaFisica->getCpf(), PDO::PARAM_STR);
        $stmt->bindValue(':rg', $pessoaFisica->getRg(), PDO::PARAM_STR);
        $stmt->bindValue(':cd_catg_org_rg', $pessoaFisica->getCdCatgOrgRg(), PDO::PARAM_INT);
        $stmt->bindValue(':cd_vl_catg_org_rg', $pessoaFisica->getCdVlCatgOrgRg(), PDO::PARAM_INT);
        $stmt->bindValue(':email', $pessoaFisica->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':dt_nascimento', $pessoaFisica->getDtNascimento(), PDO::PARAM_STR);
        $stmt->bindValue(':fone', $pessoaFisica->getFone(), PDO::PARAM_STR);
        $stmt->bindValue(':celular', $pessoaFisica->getCelular(), PDO::PARAM_STR);
        $stmt->bindValue(':ie_sexo', $pessoaFisica->getIeSexo(), PDO::PARAM_STR);
//        $stmt->bindValue(':im_perfil', $pessoaFisica->getImPerfil(), PDO::PARAM_LOB);
        $stmt->bindValue(':cd_usuario_criacao', $pessoaFisica->getCdUsuarioCriacao(), PDO::PARAM_INT);
        $stmt->bindValue(':dt_usuario_criacao', $pessoaFisica->getDtUsuarioCriacao(), PDO::PARAM_STR);
        $stmt->bindValue(':cd_usuario_atualiza', $pessoaFisica->getCdUsuarioAtualiza(), PDO::PARAM_INT);
        $stmt->bindValue(':dt_usuario_atualiza', $pessoaFisica->getDtUsuarioAtualiza(), PDO::PARAM_STR);
        $stmt->bindValue(':ie_estuda', $pessoaFisica->getIeEstuda(), PDO::PARAM_STR);
        $stmt->bindValue(':cd_instituicao', $pessoaFisica->getCdInstituicao(), PDO::PARAM_INT);

        try {
            $stmt->execute();
        } catch (Exception $e) {
            CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            die;
        }

    }

}