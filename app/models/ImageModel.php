<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 19/08/14
 * Time: 19:36
 */
class ImageModel
{
    private $db;
    private $id;
    private $tabela;
    private $coluna;
    private $arquivo_temp;
    private $primary_key;
    private $pasta_imagem;

    /**
     * @param $tabela = Tabela onde a imagem será gravada
     * @param $primary_key = Chave primária da tabela
     * @param $id = id informado para saber em qual registro a imagem será armazenada
     * @param $coluna = nome da coluna que armazena imagens
     */
    public function __construct($tabela, $primary_key, $id, $coluna)
    {
        $this->db = DB::getInstance();
        $this->tabela = $tabela;
        $this->primary_key = $primary_key;
        $this->id = $id;
        $this->coluna = $coluna;
        $this->arquivo_temp = 'imagem.tmp';
        $this->pasta_imagem = IMG_UPLOADS_FOLDER . "{$this->tabela}\\";

    }

    /**
     * Testa se uma foto foi enviada
     * caso positivo, a foto será gravada no banco
     * @todo verificar necessidade de fazer a gravação dos dados dentro de uma transaction
     */
    public function gravarFoto()
    {
        if ($this->uploadFoto()) {

            $file = SITE_ROOT . IMG_UPLOADS_FOLDER . $this->arquivo_temp;
            $pdo = $this->db->getPDO();

            $stmt = $pdo->prepare("UPDATE {$this->tabela} SET im_foto = lo_import('{$file}') WHERE {$this->primary_key} = {$this->id}");

            $pdo->beginTransaction();
            $stmt->execute();
            $pdo->commit();

        }

    }

    /**
     * Resgata a imagem da tabela no BD
     * Testa se uma pasta com o nome da tabela existe
     * Casa não exista, a pasta é criada para receber a imagem exportada
     */
    public function getPerfilFoto()
    {

        if (!file_exists($this->tabela)) {
            mkdir($this->tabela);
        }

        $foto = SITE_ROOT . $this->tabela . $this->id . '.jpg';

        $pdo = $this->db->getPDO();
        $state = $pdo->prepare("select lo_export({$this->coluna}, '{$foto}') from {$this->tabela} where {$this->pk} = {$this->id}");

        $pdo->beginTransaction();
        $state->execute();
        $pdo->commit();
    }

    /**
     * Método para manipulação da foto do perfil
     * Este método utiliza uma classe externa que não foi criada por mim
     */
    public function uploadFoto()
    {
        if (Input::exists('files')) {
            $fotoperfil = isset($_FILES[$this->coluna]) ? $_FILES[$this->coluna] : null;

            if ($fotoperfil['error'] > 0) {
                echo "Nenhuma imagem enviada.<br />";
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

                    $manipulator->save(IMG_UPLOADS_FOLDER . $this->arquivo_temp);

                    return true;

                } else {
                    return false;
                }
            }
        }
    }

}