<?php
//* Iniciando uma sessão
session_start();
//* Importando as classes de outro arquivo 
require_once '../model/Fornecedor.php';
require_once '../model/FornecedorDao.php';

//* Validando se o parametro abaixo existe na url!
if (isset($_GET['cod']) && !empty($_GET['cod'])):
    //* Armazenando a variavel 
    $cod = $_GET['cod'];
    
    //* Instanciando as classes
    $fornecedor = new Fornecedor();
    $fornecedorDao = new FornecedorDao();
    //* Setando os valores na classe fornecedor 
    $fornecedor->setCod($cod);
    $fornecedorDao->delete($fornecedor);

    //* Criando uma sessão
    $_SESSION['return-delete'] = '<p style="position: absolute;color: green; top: 20px;right: 20px;">Deletado com sucesso!</p>';
    //* Redirencionar usuário para a página informada
    header('Location: ../views/list.php');
else:
    //* Criando uma sessão
    $_SESSION['return-delete'] = '<p style="position: absolute;color: green; top: 20px;right: 20px;">[Erro] tente novamente!</p>';
    //* Redirencionar usuário para a página informada
    header('Location: ../views/list.php');
endif;