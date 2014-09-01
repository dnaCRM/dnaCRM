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
    private $tabela;
    private $coluna;
    private $arquivo_temp;
    private $primary_key;
    private $pasta_imagem;
    private $foto_enviada = false;

    /**
     * @param IModelComFoto $model
     */
    public function __construct(IModelComFoto $model)
    {
        $this->db = DB::getInstance();
        $this->arquivo_temp = session_id() . '.tmp';
        $this->tabela = $model->getTabela();
        $this->primary_key = $model->getPrimaryKey();
        $this->coluna = $model->getColunaImagem();
        $this->pasta_imagem = $model->getImageFolder();//IMG_UPLOADS_FOLDER . "{$this->tabela}\\";

    }

    /**
     * Testa se uma foto foi enviada
     * caso positivo, a foto será gravada no banco
     * @todo verificar necessidade de fazer a gravação dos dados dentro de uma transaction
     */
    public function importaFoto($id)
    {
        if ($this->foto_enviada) {

            $file = SITE_ROOT . IMG_UPLOADS_FOLDER . $this->arquivo_temp;
            $pdo = $this->db->getPDO();

            $stmt = $pdo->prepare("UPDATE {$this->tabela} SET {$this->coluna} = lo_import('{$file}') WHERE {$this->primary_key} = {$id}");

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
    public function exportaFoto($id)
    {

        if (!file_exists($this->pasta_imagem)) {
            mkdir($this->pasta_imagem);
        }

        $foto = SITE_ROOT . $this->pasta_imagem . $id . '.jpg';

        $pdo = $this->db->getPDO();
        $state = $pdo->prepare("select lo_export({$this->coluna}, '{$foto}') from {$this->tabela} where {$this->primary_key} = $id");

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

                    $manipulator->save(IMG_UPLOADS_FOLDER . $this->arquivo_temp);

                    $this->foto_enviada = true;

                } else {
                    $this->foto_enviada = false;
                }
            }
        }
    }

}