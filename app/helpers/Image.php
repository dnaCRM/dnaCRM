<?php

/**
 * Class Image
 * Função:
 * Verificar se o perfil já tem imagem no banco de dados
 * e exibir a imagem de acordo com o teste feito pelo método Image::get
 */
class Image
{
    private static $imgSrcString;
    private static $imgName;

    /**
     * @param ImagemPerfilInterface $ipi
     * @return string = caminho para a imagem do perfil ou imagem padrão
     */
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