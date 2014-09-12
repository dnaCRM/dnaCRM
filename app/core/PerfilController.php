<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 11/09/14
 * Time: 19:23
 */

abstract class PerfilController extends Controller{
    /**
     * Médodo acionado pelo botão deletar da view confirmDelete
     * @param $id = id do Perfil a ser deletado
     */
    public function removerPerfil($id)
    {
        $id = (int)$id;
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {
                $this->getModel()->deletePerfil($id);
            }
        }
    }

    /**
     * Executa o método recebefoto() da classe model
     * Retorna true se recebeu uma foto ou false se não recebeu
     * @return bool
     */
    public function enviaFotoPerfil()
    {
        if ($this->getModel()->recebefoto()) {
            return true;
        }
        return false;
    }
} 