<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 12/08/14
 * Time: 15:32
 */

class ImageTest {
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function show()
    {
        try {
            $db = new PDO('pgsql:host=localhost;dbname=siscon','postgres','159753');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            die;
        }

        if (Input::exists('files')) {

            $stmt = $db->prepare("insert into images (img_file) values (?)");

            //$fp = fopen($_FILES['img_file']['tmp_name'], 'rb');
            //$stmt->bindParam(1, $fp, PDO::PARAM_LOB);

            $data = file_get_contents($_FILES['img_file']['tmp_name']);
            $stmt->bindValue(1, $data, PDO::PARAM_LOB);

            $db->beginTransaction();
            $stmt->execute();
            $db->commit();
            echo $db->lastInsertId();
            var_dump($db, $stmt);
        }

        $stmt = $db->prepare("select img_file from images where id_image=?");
        $stmt->execute(array(1));
        $stmt->bindColumn(1, $lob, PDO::PARAM_LOB);
        $stmt->fetch(PDO::FETCH_BOUND);

        var_dump($lob);
        echo $lob;
        //header("Content-Type: image/jpeg");
        //fpassthru($lob);
    }


    public function lob()
    {
        try {
            $db = new PDO('pgsql:host=localhost;dbname=siscon','postgres','159753');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            die;
        }

        if (Input::exists('files')) {
            $file = $_FILES['img_file']['tmp_name'];
            $stmt = $db->prepare("insert into images (img_file) values (lo_import('{$file}'))");
            $stmt->execute();
            echo $db->lastInsertId();

        }
        /**
         * --Inserir imagens no banco

        INSERT INTO IMAGENS(NOME,IMG) VALUES('GABRIEL',lo_import('C:\teste.jpg'))


        --Extrair imagens no banco

        SELECT NOME, lo_export(IMG,'C:\temp\teste.jpg') FROM IMAGENS WHERE NOME = 'GABRIEL'



        lo_import("caminho da imagem as ser amarzenada no banco")


        lo_export("nome do campo", "caminho onde a imagem vai ser
         */

        $id = 1;
        $state = $db->prepare("select lo_export(img/uploads/teste.jpg) from imagens where id_image = {$id}");

        var_dump($state);
        echo '<img src="img/uploads/teste.jpg">';
    }

} 