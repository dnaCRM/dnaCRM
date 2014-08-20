<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 20/08/14
 * Time: 00:43
 */

interface IModelComFoto {

    public function getImageFolder();

    public function getPrimaryKey();

    public function getTabela();

    public function getColunaImagem();

    public function getFoto($id);

    public function setFoto($id);

    public function recebefoto();

    public function setImageManager();
} 