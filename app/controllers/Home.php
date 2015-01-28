<?php

/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 22/07/14
 * Time: 21:20
 * class Home
 * Propósito: Responsável por montar e atualizar a tela de entrada do sistema
 */
class Home extends Controller
{
    /** @var  HomeModel */
    private $homeModel;

    public function __construct()
    {
        $this->homeModel = new HomeModel();
    }

    public function start() {

        $pessoaModel = new PessoaFisicaModel();
        $ultimasPessoasCadastradas = $this->homeModel->getUltimasPessoas($pessoaModel, 'dt_usuario_criacao', 4);
        $aniversariantesDoDia = $this->homeModel->getAniversariantesDoDia($pessoaModel);

        $ultimasOcorrencias =$this->homeModel->getUltimasOcorrencias(new OcorrenciaModel(), 'dt_ocorrencia', 5);
        $ultimasOrdensServico =$this->homeModel->getUltimasOrdensServico(new OrdemServicoModel(), 'dt_inicio', 5);
        $dados = [
            'pagesubtitle' => Session::get('usuario'),
            'pagetitle' => 'Home',
            'utimas_pessoas_cadastradas' => $ultimasPessoasCadastradas,
            'utimas_ocorrencias' => $ultimasOcorrencias,
            'utimas_ordens_servico' => $ultimasOrdensServico,
            'aniversariantes_do_dia' => $aniversariantesDoDia
        ];

        /** O parâmetros 'Home' define o Controller e 'start' define o método que será executado*/
        $this->view = new View('Home', 'start');
        $this->view->output($dados);
    }

    public
    function test()
    {
        $dados = [
            'pagesubtitle' => 'Testes com Banco de dados',
            'pagetitle' => 'Testando'
        ];

        $this->view = new View('Home', 'test');
        $this->view->output($dados);
    }
    public
    function help()
    {
        $dados = [
            'pagesubtitle' => 'Testes com Banco de dados',
            'pagetitle' => 'Testando'
        ];

        $this->view = new View('Home', 'help');
        $this->view->output($dados);
    }

}