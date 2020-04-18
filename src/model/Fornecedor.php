<?php

//* Criando classe para guardar e pegar dados dos fornecedores
class Fornecedor {
    //* Criando variaveis privadas
    private $cod;
    private $nome; 
    private $email;
    private $cnpj;
    private $status;

    //* Pegar o valor da variavel
    public function getCod() {
        return $this->cod;
    }
    //* Recebendo um valor é guardando na variavel
    public function setCod($c) {
        $this->cod = $c;
    }
    //* Pegar o valor da variavel
    public function getNome() {
        return $this->nome;
    }
    //* Recebendo um valor é guardando na variavel
    public function setNome($n) {
        $this->nome = $n;
    }
    //* Pegar o valor da variavel
    public function getEmail() {
        return $this->email;
    }
    //* Recebendo um valor é guardando na variavel
    public function setEmail($e) {
        $this->email = $e;
    }
    //* Pegar o valor da variavel
    public function getCnpj() {
        return $this->cnpj;
    }
    //* Recebendo um valor é guardando na variavel
    public function setCnpj($c) {
        $this->cnpj = $c;
    }
    //* Pegar o valor da variavel
    public function getStatus() {
        return $this->status;
    }
    //* Recebendo um valor é guardando na variavel
    public function setStatus($s) {
        $this->status = $s;
    }

}