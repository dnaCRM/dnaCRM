<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 02/08/14
 * Time: 19:14
 */
class PessoaFisicaDAO extends DataAccessObject implements IModelComFoto
{

    private $colunaImagem; // coluna que guarda imagens
    private $imgFolder;
    private $fotoDefault;
    protected $tabela;// tabela referente ao model
    protected $primaryKey; // chave primária da tabela
    /** @var  ImageModel */
    private $imageManager;
    /** @var  PDO */
    private $con;

    public function __construct()
    {
        $this->con = DataBase::getConnection();
        $this->setTabela('tb_pessoa_fisica');
        $this->setColunaImagem('im_perfil');
        $this->setPrimaryKey('cd_pessoa_fisica');
        $this->setImageFolder(IMG_UPLOADS_FOLDER . "{$this->getTabela()}/");
        $this->setFotoDefault(IMG_UPLOADS_FOLDER . 'icon-user.jpg');

        $this->setImageManager(new ImageModel($this));
    }


    public function save(PessoaFisica $pessoaFisica)
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

        $stmt->execute();
    }

    protected function read(PessoaFisica $pessoaFisica)
    {
        // TODO: Implement read() method.
    }

    protected function delete(PessoaFisica $pessoaFisica)
    {
        // TODO: Implement delete() method.
    }

    /**
     * Recebe um array com dados do Perfil e testa se ele tem uma imagem gravada
     * @param array $perfil
     * @return string = endereço da imagem do Perfil ou imagem padrão
     */
    private function getImgUrl(array $perfil)
    {
        if (!file_exists($this->getImageFolder() . $perfil[$this->getPrimaryKey()] . '.jpg')) {
            $this->getFoto($perfil[$this->getPrimaryKey()] );
        }
        return $perfil[$this->getColunaImagem()] ?
            $this->getImageFolder() . $perfil[$this->getPrimaryKey()] . '.jpg' : $this->getFotoDefault();
    }

    /**
     * @param string $img_folder
     */
    public function setImageFolder($img_folder)
    {
        $this->imgFolder = $img_folder;
    }

    /**
     * @param mixed $coluna_imagem
     */
    public function setColunaImagem($coluna_imagem)
    {
        $this->colunaImagem = $coluna_imagem;
    }

    /**
     * @param string $foto_default
     */
    public function setFotoDefault($foto_default)
    {
        $this->fotoDefault = $foto_default;
    }

    /**
     * @return string
     */
    public function getFotoDefault()
    {
        return $this->fotoDefault;
    }

    // Métodos obrigatórios para interface IModelComFoto
    public function getImageFolder()
    {
        return $this->imgFolder;
    }

    public function getColunaImagem()
    {
        return $this->colunaImagem;
    }

    public function setImageManager(ImageModel $image_manager)
    {
        $this->imageManager = $image_manager;
    }

    public function getFoto($id)
    {
        $this->imageManager->exportaFoto($id);
    }

    public function setFoto($id)
    {
        $this->imageManager->importaFoto($id);
    }

    public function recebefoto()
    {
        $this->imageManager->uploadFoto();
    }

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function getTabela()
    {
        return $this->tabela;
    }

    /**
     * @param mixed $primaryKey
     */
    public function setPrimaryKey($primaryKey)
    {
        $this->primaryKey = $primaryKey;
    }

    /**
     * @param mixed $tabela
     */
    public function setTabela($tabela)
    {
        $this->tabela = $tabela;
    }

}