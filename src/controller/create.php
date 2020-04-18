<?php
//* Iniciando uma sessão
session_start();


//* Importando as classes de outro arquivo 
require_once '../model/FornecedorDao.php';
require_once '../model/Fornecedor.php';

//* Armazenando as variaveis 
$nome = trim(strip_tags($_POST['nome']));
$email = trim(strip_tags($_POST['email']));
$cnpj = trim(strip_tags($_POST['cnpj']));
$status = trim(($_POST['status']));
 
//* Validando as variaveis 
if (isset($nome) && isset($email) && isset($cnpj) && isset($status)):
    //* Instanciando as classes
    $fornecedor = new Fornecedor();
    $fornecedorDao = new FornecedorDao();

    //* Setando os valores na classe fornecedor 
    $fornecedor->setNome($nome);
    $fornecedor->setEmail($email);
    $fornecedor->setCnpj($cnpj);
    $fornecedor->setStatus($status);

    //*  Setando valores na classe FornecedorDao para inserir no banco de dados
    $fornecedorDao->create($fornecedor);
    
    //* Criando uma sessão
    $_SESSION['return'] = '<p style="position: absolute;color: green; top: 100px;right: 20px;">Criado com sucesso</p>';
    //* Redirencionar usuário para a página informada
    header('Location: ../../index.php');
else:
    //* Criando uma sessão
    $_SESSION['return'] = '<p style="position: absolute;color: red;top: 100px;right: 20px;">Verifique os dados e tente novamente!</p>';
    //* Redirencionar usuário para a página informada
    header('Location: ../../index.php');
endif;
