<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 13/09/14
 * Time: 22:41
 */
abstract class DataAccessObject
{
    protected $colunaImagem; // coluna que guarda imagens
    protected $imgFolder;
    protected $fotoDefault;
    protected $fotoEnviada = false;
    protected $arquivoTemp;

    protected $success = false;
    protected $resultado;
    protected $numRegistros;
    protected $dataTransfer;

    /** @var PDOStatement */
    protected $statement;

    protected $tabela; // tabela referente ao model
    protected $primaryKey; // chave primária da tabela
    /** @var  PDO */
    protected $con;

    public function __construct()
    {
        $this->con = DataBase::getConnection();
        $this->arquivoTemp = session_id() . '.tmp';
    }

    /**
     * @param DataTransferObject $dto
     * @return bool | DataTransferObject
     */
    public function insert(DataTransferObject $dto)
    {
        $reflex = $dto->getReflex();
        unset($reflex[$this->primaryKey]);

        $colunas = implode(', ', array_keys($reflex));
        $campos = ':' . implode(', :', array_keys($reflex));

        $sql = "INSERT INTO {$this->tabela} ({$colunas}) VALUES ({$campos}) returning *";

        foreach ($dto->getReflex() as $atributo => $method) {
            if ($atributo != $this->primaryKey) {
                $dados[$atributo] = $dto->{$method}();
            }
        }

        if ($this->query($sql, $this->dataTransfer, $dados)->success()) {
            return $this->getResultado()[0];
        }
        return false;
    }

    /**
     * @param DataTransferObject $dto
     * @return bool| DataTransferObject
     */
    public function update(DataTransferObject $dto)
    {
        foreach ($dto->getReflex() as $atributo => $method) {
            if ($atributo != $this->primaryKey) {
                $parametros[] = $atributo . ' = :' . $atributo;
            }
        }
        $parametros = implode(', ', $parametros);

        $sql = "UPDATE {$this->tabela} SET {$parametros} WHERE {$this->primaryKey} = :{$this->primaryKey}";

        foreach ($dto->getReflex() as $atributo => $method) {
            $dados[$atributo] = $dto->{$method}();
        }

        if ($this->query($sql, $this->dataTransfer, $dados)->success()) {
            return $this->getResultado()[0] ;
        }
        return false;
    }

    /**
     * @param null $where
     * @param null $limit
     * @param null $offset
     * @param null $orderby
     * @return bool| DataTransferObject
     */
    public function select($where = null, $limit = null, $offset = null, $orderby = null)
    {
        $where = ($where != null ? " WHERE {$where}" : "");
        $limit = ($limit != null ? " LIMIT {$limit}" : "");
        $offset = ($offset != null ? " OFFSET {$offset}" : "");
        $orderby = ($orderby != null ? " ORDER BY {$orderby}" : "");

        $sql = "SELECT * FROM {$this->tabela}{$where}{$limit}{$offset}{$orderby}";

        if ($this->query($sql, $this->dataTransfer, array())->success()) {
            return $this->getResultado();
        }
        return false;
    }

    /**
     * @param $where
     * @return bool | DataTransferObject
     */
    public function get($where) {
        return $this->select($where, null, null, null);
    }

    /**
     * @param $id
     * @return DataTransferObject
     */
    public function getById($id)
    {
        return $this->get("{$this->primaryKey} = {$id};")[0];
    }

    /**
     * @param DataTransferObject $dto
     * @return bool | DataTransferObject
     */
    public function delete(DataTransferObject $dto)
    {
        //$where = ($where != null ? " WHERE {$where}" : "");
        $sql = "DELETE FROM {$this->tabela} WHERE {$this->primaryKey} = {$dto->{$dto->getReflex()[$this->primaryKey]}()}";
        if ($this->query($sql, $this->dataTransfer, array())->success()) {
            return $this->getResultado();
        }
        return false;
    }

    /**
     * @param string $sql = SQL para ser preparada
     * @param DataTransferObject $obj = Objeto usado para capturar a classe
     * @param array $parametros = dados a serem enviados para o banco de dados
     * @return $this
     */
    private function query($sql, $obj, array $parametros)
    {
        try {
            $this->statement = $this->con->prepare($sql);
            if (count($parametros)) {
                $this->statement->execute($parametros);
            } else {
                $this->statement->execute();
            }

            $this->resultado = $this->statement->fetchAll(PDO::FETCH_CLASS, $this->dataTransfer);
            $this->numRegistros = $this->statement->rowCount();
            $this->success = true;
        } catch (PDOException $e) {
            $this->success = false;
            CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }

        return $this;
    }

    /**
     * @return bool
     */
    private function success()
    {
        return $this->success;
    }

    /**
     * @return DataTransferObject
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * @return bool| DataTransferObject
     */
    public function fullList()
    {
        return $this->select(null, null, null, "{$this->primaryKey} DESC");

    }

    /**
     * Retorna primeiro objeto resultante da consulta ao banco de dados
     * @return DataTransferObject
     */
    public function first() {
        return $this->resultado[0];
    }

    /**
     * @return int $numregistros = numero de registros retornados da query
     */
    public function getNumRegistros()
    {
        return $this->numRegistros;
    }

    /**
     * @return PDO
     */
    public function getCon()
    {
        return $this->con;
    }


    ################ MÉTODOS PARA MANIPULAÇÃO DE IMAGENS ########################
    /**
     * Método para manipulação da foto do perfil
     * Este método utiliza uma classe externa que não foi criada por mim
     * @return bool
     */
    public function uploadFoto()
    {
        if (Input::exists('files')) {
            $fotoperfil = isset($_FILES[$this->colunaImagem]) ?
                $_FILES[$this->colunaImagem] : null;

            if ($fotoperfil['error'] > 0) {
                echo 'Nenhuma imagem enviada.<br>';
            } else {
                // array com extensões válidas
                $validExtensions = array('.jpg', '.jpeg');
                // pega a extensão do arquivo enviado
                $fileExtension = strrchr($fotoperfil['name'], ".");
                // testa se extensão é permitida
                if (in_array($fileExtension, $validExtensions)) {
                    $manipulator = new ImageManipulator($fotoperfil['tmp_name']);
                    // o tamanho da imagem poderia ser 800x600
                    $width = $manipulator->getWidth();
                    $height = $manipulator->getHeight();
                    // Encontrando o centro da imagem
                    $centreX = round($width / 2); // 400
                    $centreY = round($height / 2); //300

                    // Define canto esquerdo de cima
                    if ($width > $height) {
                        // Parâmetros caso a imagem fornecida seja no formato paisagem
                        $x1 = $centreX - $centreY; // 400 - 300 = 100 "Topo esquerdo X"
                        $y1 = 0; // "Topo esquerdo Y"
                        // Define canto direito de baixo
                        $x2 = $centreX + $centreY; // 400 + 300 = 700 / 2 "Base X"
                        $y2 = $centreY * 2; // 300 * 2 = 600 "Base Y"
                    } else {
                        // Parâmetros caso a imagem não seja no formato paisagem
                        $y1 = $centreY - $centreX; // 400 - 300 = 100 "Topo esquerdo X"
                        $x1 = 0; // "Topo esquerdo Y"
                        // Define canto direito de baixo
                        $y2 = $centreX + $centreY; // 400 + 300 = 700 / 2 "Base X"
                        $x2 = $centreX * 2; // 300 * 2 = 600 "Base Y"
                    }

                    // corta no centro  200x200
                    $manipulator->crop($x1, $y1, $x2, $y2);
                    // redimensiona a imagem para 400x400
                    $manipulator->resample(400, 400, true);

                    $manipulator->save(IMG_UPLOADS_FOLDER . $this->arquivoTemp);

                    $this->fotoEnviada = true;

                } else {
                    $this->fotoEnviada = false;
                }
            }
        }
    }

    /**
     * Testa se uma foto foi enviada
     * caso positivo, a foto será gravada no banco
     * @todo verificar necessidade de fazer a gravação dos dados dentro de uma transaction
     * @param $id
     * @return bool
     */
    protected function importaFoto($id)
    {
        if ($this->fotoEnviada) {

            $file = SITE_ROOT . IMG_UPLOADS_FOLDER . $this->arquivoTemp;

            $stmt = $this->con->prepare("UPDATE {$this->tabela}
                                         SET {$this->colunaImagem} = lo_import('{$file}')
                                         WHERE {$this->primaryKey} = {$id}");

            $this->con->beginTransaction();
            $stmt->execute();
            $this->con->commit();

            return true;
        }

        return false;

    }

    /**
     * Resgata a imagem da tabela no BD
     * Testa se uma pasta com o nome da tabela existe
     * Casa não exista, a pasta é criada para receber a imagem exportada
     * @param $id
     * @return bool
     */
    protected function exportaFoto($id)
    {

        if (!file_exists($this->imgFolder)) {
            mkdir($this->imgFolder);
        }

        $foto = SITE_ROOT . $this->imgFolder . $id . '.jpg';

        $state = $this->con->prepare("SELECT lo_export({$this->colunaImagem}, '{$foto}')
                                      FROM {$this->tabela}
                                      WHERE {$this->primaryKey} = $id");

        $this->con->beginTransaction();
        $state->execute();
        $this->con->commit();

        if ($state->fetch()) {
            return true;
        }

        return false;

    }
}