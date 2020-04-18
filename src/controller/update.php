<?php
//* Iniciando uma sessão
session_start();


//* Importando as classes de outro arquivo 
require_once '../model/FornecedorDao.php';
require_once '../model/Fornecedor.php';

//* Armazenando as variaveis 
echo $cod = trim(($_POST['cod']));
echo $nome = trim(strip_tags($_POST['nome']));
echo $email = trim(strip_tags($_POST['email']));
echo $cnpj = trim(strip_tags($_POST['cnpj']));
echo $status = trim(($_POST['status']));
 
//* Validando as variaveis 
if (isset($nome) && isset($email) && isset($cnpj) && isset($status)):
    //* Instanciando as classes
    $fornecedor = new Fornecedor();
    $fornecedorDao = new FornecedorDao();

    //* Setando os valores na classe fornecedor 
    $fornecedor->setCod($cod);
    $fornecedor->setNome($nome);
    $fornecedor->setEmail($email);
    $fornecedor->setCnpj($cnpj);
    $fornecedor->setStatus($status);

    //*  Setando valores na classe FornecedorDao para inserir no banco de dados
    $fornecedorDao->update($fornecedor);
    
    //* Criando uma sessão
    $_SESSION['return-update'] = '<p style="position: absolute;color: green; top: 20px;right: 20px;">Atualizado sucesso</p>';
    //* Redirencionar usuário para a página informada
    header('Location: ../views/list.php');
else:
    //* Criando uma sessão
    $_SESSION['return-update'] = '<p style="position: absolute;color: red;top: 100px;right: 20px;">Verifique os dados e tente novamente!</p>';
    //* Redirencionar usuário para a página informada
    header('Location: ../views/update.php');
endif;
