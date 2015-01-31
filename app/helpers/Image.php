<?php

class Image
{
    private static $imgSrcString;
    private static $imgName;

    public static function get(ImagemPerfilInterface $ipi)
    {
        if ($ipi instanceof PessoaFisicaDTO) {

            self::$imgName = ($ipi->getImPerfil() ? $ipi->getImPerfil() : 'default');
            self::$imgSrcString = 'img/uploads/tb_pessoa_fisica/'.self::$imgName.'.jpg';

        } else if ($ipi instanceof PessoaJuridicaDTO) {

            self::$imgName = ($ipi->getImPerfil() ? $ipi->getImPerfil() : 'default_pj');
            self::$imgSrcString = 'img/uploads/tb_pessoa_juridica/'.self::$imgName.'.jpg';

        } else if ($ipi instanceof SetorDTO) {

            self::$imgName = ($ipi->getImPerfil() ? $ipi->getImPerfil() : 'default_setor');
            self::$imgSrcString = 'img/uploads/tb_setor/'.self::$imgName.'.jpg';

        }

        return self::$imgSrcString;
    }
} 