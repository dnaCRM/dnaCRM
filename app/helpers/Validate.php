<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 28/07/14
 * Time: 10:04
 */
class Validate
{
    private $passed = false;
    private $erros = array();
    /** @var DB */
    private $db = null;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function check($source, $items = array())
    {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {

                $value = trim($source[$item]);
                $item = escape($item);

                if ($rule === 'required' && empty($value)) {
                    $this->addErro("{$item} é obrigatório");
                } elseif (!empty($value)) {
                    switch ($rule) {
                        case 'min':
                            if (strlen($value) < $rule_value) {
                                $this->addErro("{$item} deve ter no mínimo {$rule_value} caracteres!");
                            }
                            break;
                        case 'max':
                            if (strlen($value) > $rule_value) {
                                $this->addErro("{$item} deve ter no máximo {$rule_value} caracteres!");
                            }
                            break;
                        case 'matches':
                            if ($value != $source[$rule_value]) {
                                $this->addErro("{$item} deve ser igual a {$rule_value}!");
                            }
                            break;
                        case 'email':
                            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                                $this->addErro("e-mail inválido!");
                            }
                            break;
                        case 'unique':
                            $check = $this->db->get($rule_value, "{$item} = '{$value}'");
                            if ($check->getNumRegistros()) {
                                $this->addErro("{$item} já existe!");
                            }
                            break;

                    }
                }

                }
            }

            if (empty($this->erros)) {
                $this->passed = true;
            }

            return $this;
        }

        public
        function addErro($erro)
        {
            $this->erros[] = $erro;
        }

        public
        function erros()
        {
            return $this->erros;
        }

        public
        function passed()
        {
            return $this->passed;
        }
    }