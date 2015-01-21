<?php

/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 29/09/14
 * Time: 10:25
 */
class PessoaFisica extends Controller
{
    /** @var \PessoaFisicaModel  */
    private $pessoaFisicaModel;

    public function __construct()
    { //o método é herdado da classe pai 'Controller'
        $this->setModel(new PessoaFisicaDAO());
        $this->pessoaFisicaModel = new PessoaFisicaModel();
    }

    public function start()
    { //Pega a lista completa de perfis
        $perfil_list = (array)$this->model->fullList();

        // Exporta imagens de perfil
        $this->exportaImagens($perfil_list);

        $dados = array(
            'pagesubtitle' => '',
            'pagetitle' => 'Pessoa Física',
            'list' => $perfil_list
        );

        $this->view = new View('PessoaFisica', 'start');
        $this->view->output($dados);
    }

    /**
     * @param int $id = Caso receba um id retorna um array
     * para a view com os dados do perfil. Este array irá popular o formulário
     * permitindo editar dados do perfil e gravar no banco
     * Se não receber um id o formulário estará vazio e permitirá registrar
     * um novo perfil
     */
    public function formpessoafisica($id = null)
    {
        $pessoa_juridica = (new PessoaJuridicaDAO())->fullList();
        $profissoes = (new ProfissaoDAO())->fullList();
        $org_rg = (new CategoriaValorDAO())->get('cd_categoria = 1');
        $inst_ensino = (new InstituicaoEnsinoDAO())->fullList();
        $grau_ensino = (new CategoriaValorDAO())->get('cd_categoria = 14');

        if ($id) {
            /** @var PessoaFisicaDTO */
            $perfilarr = $this->findById($id);

            $condominios = (new CondominioDAO())->fullList();

            $moradorEnderecos = (new MoradorEnderecoModel())->getPorMorador($id);
            $telefones = (new PessoaFisicaTelefoneModel())->getTelefonesPessoaFisica($id);

            $pf_telefone = (new CategoriaValorDAO())->get('cd_categoria = 5');
            $operadora = (new CategoriaValorDAO())->get('cd_categoria = 10');

            $enderecos = (new PessoaFisicaEnderecoDAO())->get("cd_pessoa_fisica = {$id}");
            $estados = (new CategoriaValorDAO())->get('cd_categoria = 2');
            $catg_enderecos = (new CategoriaValorDAO())->get('cd_categoria = 9');
            $catg_relacionados = (new CategoriaValorDAO())->get("cd_categoria = 4"); //and genero = '{$perfilarr->getIeSexo()}'

            $relacionadosModel = new RelacionadosModel();
            $relacionados = $relacionadosModel->getRelacionados($id);

            //Formatação de datas
            $nasc = new DateTime($perfilarr->getDtNascimento());
            $perfilarr->setDtNascimento($nasc->format('d/m/Y'));

            $dt_inicio_curso = '';
            if ($perfilarr->getDtInicioCurso()) {
                $dt_inicio_curso = (new DateTime($perfilarr->getDtInicioCurso()))->format('d/m/Y');
            }
            $perfilarr->setDtInicioCurso($dt_inicio_curso);

            $dt_fim_curso = '';
            if ($perfilarr->getDtFimCurso()) {
                $dt_fim_curso = (new DateTime($perfilarr->getDtFimCurso()))->format('d/m/Y');
            }
            $perfilarr->setDtFimCurso($dt_fim_curso);

            $dados = array(
                'pagetitle' => $perfilarr->getNmPessoaFisica(),
                'pagesubtitle' => 'Atualizar Perfil.',
                'pessoa_juridica' => $pessoa_juridica,
                'profissoes' => $profissoes,
                'org_rg' => $org_rg,
                'inst_ensino' => $inst_ensino,
                'grau_ensino' => $grau_ensino,
                'pf_telefone' => $pf_telefone,
                'telefones' => $telefones,
                'enderecos' => $enderecos,
                'operadora' => $operadora,
                'estados' => $estados,
                'catg_enderecos' => $catg_enderecos,
                'condominios' => $condominios,
                'morador_endereco' => $moradorEnderecos,
                'catg_relacionados' => $catg_relacionados,
                'relacionados' => $relacionados,
                'id' => $id,
                'perfil' => $perfilarr
            );
        } else {
            $perfil = new PessoaFisicaDTO();
            $dados = array(
                'pagetitle' => 'Cadastro',
                'pagesubtitle' => 'Pessoa Física.',
                'pessoa_juridica' => $pessoa_juridica,
                'profissoes' => $profissoes,
                'org_rg' => $org_rg,
                'inst_ensino' => $inst_ensino,
                'grau_ensino' => $grau_ensino,
                'id' => null,
                'perfil' => $perfil
            );
        }

        $this->view = new View('PessoaFisica', 'formpessoafisica');
        $this->view->output($dados);
    }

    /**
     * @param string $id = id(chave primária da tabela de perfis)
     * O método recebe o id e monta respecttiva a tela de perfil
     */
    public function visualizar($id = null)
    {
        $id = (int)$id;
        $pessoa = $this->findById($id);
        $dadosPessoais = $this->pessoaFisicaModel->setDTO($pessoa)->getArrayDados();

        $telefones = $this->pessoaFisicaModel->getTelefones(new PessoaFisicaTelefoneModel());
        $enderecos = $this->pessoaFisicaModel->getEnderecos(new PessoaFisicaEnderecoModel());
        $moradorEnderecos = $this->pessoaFisicaModel->getMoradorEnderecos(new MoradorEnderecoModel());
        $ordensSolicitadas = $this->pessoaFisicaModel->getOsSolicitadas(new OrdemServicoModel());
        $ordensExecutadas = $this->pessoaFisicaModel->getOsExecutadas(new OrdemServicoModel());
        $ocorrencias = $this->pessoaFisicaModel->getOcorrenciasEnvolvidas(new OcorrenciaPessoaFisicaEnvolvidaModel());
        $oc_informadas = $this->pessoaFisicaModel->getOcorrenciasInformadas(new OcorrenciaPessoaFisicaEnvolvidaModel());

        $relacionadosModel = new RelacionadosModel();
        $relacionados = $relacionadosModel->getRelacionados($id);

        // Exporta imagem de perfil
        $this->exportaImagens($pessoa);

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $dadosPessoais['idade'],
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $dadosPessoais['nm_pessoa_fisica'],
            //todos os atributos do perfil
            'dados_pessoais' => $dadosPessoais,
            'telefones' => $telefones,
            'enderecos' => $enderecos,
            'morador_enderecos' => $moradorEnderecos,
            'os_solicitadas' => $ordensSolicitadas,
            'os_executadas' => $ordensExecutadas,
            'ocorrencias' => $ocorrencias,
            'oc_informadas' => $oc_informadas,
            'relacionados' => $relacionados
        );

        $this->view = new View('PessoaFisica', 'visualizar');
        $this->view->output($dados);
    }

    /**
     * Este método monta a tela de confirmação antes de apagar
     * o Perfil
     * @param $id = id do Perfil a ser deletado
     */
    public function confirmDelete($id)
    {
        $id = (int)$id;

        $perfilarr = $this->findById($id);

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $perfilarr->getEmail(),
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $perfilarr->getNmPessoaFisica(),
            'perfil' => $perfilarr
        );

        $this->view = new View('PessoaFisica', 'confirmDelete');
        $this->view->output($dados);
    }

    /**
     * @todo Sanitizar entrada de dados
     */
    public function cadastra() {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {

                $pessoaFisica = $this->setDados();

                try {
                    $obj = $this->model->gravar($pessoaFisica);
                    $this->exportaImagens($obj);
                    return $obj;
                } catch (Exception $e) {
                    CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
                }
                return false;
            }
        }
    }

    private function setDados()
    {
        $dto = new PessoaFisicaDTO();

        $dto->setCdPessoaFisica(Input::get('cd_pessoa_fisica'))
        ->setNmPessoaFisica(Input::get('nm_pessoa_fisica'))
        ->setCdPessoaJuridica(Input::get('cd_pessoa_juridica'))
        ->setCdProfissao(Input::get('cd_profissao'))
        ->setCpf(Input::get('cpf'))
        ->setRg(Input::get('rg'))
        ->setCdCatgOrgRg(1)
        ->setCdVlCatgOrgRg(Input::get('org_rg'))
        ->setEmail(Input::get('email'))
        ->setDtNascimento(Input::get('dt_nascimento'))
        ->setIeSexo(Input::get('ie_sexo'))
        ->setIeEstuda(Input::get('ie_estuda'))
        ->setCdInstituicao(Input::get('cd_instituicao'))
        ->setDtInicioCurso(Input::get('dt_inicio_curso'))
        ->setDtFimCurso(Input::get('dt_fim_curso'))
        ->setCdCatgGrauEnsino(14)
        ->setCdVlCatgGrauEnsino(Input::get('cd_grau_ensino'))
        ->setCdUsuarioCriacao(Session::get('user'))
        ->setDtUsuarioCriacao('now()')
        ->setCdUsuarioAtualiza(Session::get('user'))
        ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

    public function removerPessoaFisica(PessoaFisicaDTO $dto) {
        if (Input::exists()) {

            if (Token::check(Input::get('token'))) {

                $this->model->delete($dto);

            }
        }
    }

    protected function findById($id)
    {
        if (!$obj = $this->model->getById($id)) {
            /** Envia mensagem */
            Session::flash('fail', 'Cadastro não encontrado', 'danger');
            /** Redireciona para página de lista de Perfis */
            Redirect::to(SITE_URL . get_called_class());
        }
        return $obj;
    }

    public function buscaAjax()
    {
        $return = $this->pessoaFisicaModel->getPessoaFisica();
        echo json_encode($return);
    }


    /**
     * Deve receber um array contento objetos do tipo PessoaFisicaDTO
     * Percorre os objetos testando se as imagens já foram exportadas
     * e exporta caso necessário
     */
    protected function exportaImagens($arr_perfil)
    {
        if (is_array($arr_perfil)) {
            foreach ($arr_perfil as $perfil) {
                if ($perfil->getImPerfil()
                    && !file_exists($this->model->getImgFolder() . $perfil->getCdPessoaFisica() . '.jpg')
                ) {
                    $this->model->exportaFoto($perfil->getCdPessoaFisica());
                }
            }
        } else {
            if ($arr_perfil->getImPerfil()
                && !file_exists($this->model->getImgFolder() . $arr_perfil->getCdPessoaFisica() . '.jpg')
            ) {
                $this->model->exportaFoto($arr_perfil->getCdPessoaFisica());
            }
        }
    }

    public function checkExisteCPF()
    {
        $cpf = Input::get('cpf');
        $id = Input::get('cd_pessoa_fisica');

        $return = array(
            'valid' => $this->pessoaFisicaModel->existeCPF($cpf, $id)
        );

        echo json_encode($return);
    }

    public function checkExisteRG()
    {
        $rg = Input::get('rg');
        $id = Input::get('cd_pessoa_fisica');

        $return = array(
            'valid' => $this->pessoaFisicaModel->existeRG($rg, $id)
        );

        echo json_encode($return);
    }

    public function checkExisteEmail()
    {
        $email = Input::get('email');
        $id = Input::get('cd_pessoa_fisica');

        $return = array(
            'valid' => $this->pessoaFisicaModel->existeEmail($email, $id)
        );

        echo json_encode($return);
    }
}