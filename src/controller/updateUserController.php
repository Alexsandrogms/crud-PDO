<?php
session_start();

require_once '../model/FornecedorDao.php';
require_once '../model/Fornecedor.php';
require_once '../phpqrcode/qrlib.php';
try {
  $create = new FornecedorDao();
  $user = new Fornecedor();
  
  $_POST['cod'] && $id = trim(strip_tags($_POST['cod']));
  $_POST['name'] && $name = trim(strip_tags($_POST['name']));
  $_POST['email'] && $email = trim(strip_tags($_POST['email']));
  $_POST['cnpj'] && $cnpj = trim(strip_tags($_POST['cnpj']));
  $state = trim(strip_tags($_POST['state']));
  
  if (isset($name) && isset($email) && isset($cnpj) && isset($state)):
    $user->setName($name);
    $user->setEmail($email);
    $user->setCNPJ($cnpj);
    $user->setState($state);

    $name = str_replace(' ','',$name);
    $directory = '../img_qrcode';
    
    $filename =  "$directory/$name"."_"."$cnpj.png";

    if(!file_exists($filename)) {
      QRcode::png("Nome: $name/Email: $email/CNPJ: $cnpj/Status: $state", $filename);
    }

    $user->setImgUrl($name."_".$cnpj);

    $create->updateUser($user, $id);

    $_SESSION['sucess'] = "Usuário atualizado com sucesso!";
    header('Location: ../index.php');
  else :
    header('Location: ../index.php');
  endif;
} catch (\Throwable $th) {
  $_SESSION['sucess'] = "Ocorreu algo inexperado, tente novamente!";
  header('Location: ../index.php');
}  
?>

