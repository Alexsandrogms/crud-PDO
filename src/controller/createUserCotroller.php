<?php
session_start();
require_once '../model/FornecedorDao.php';
require_once '../model/Fornecedor.php';
require_once '../phpqrcode/qrlib.php';

try {
  $create = new FornecedorDao();
  $user = new Fornecedor();
  
  $_POST['name'] && $name = trim(strip_tags($_POST['name']));
  $_POST['email'] && $email = trim(strip_tags($_POST['email']));
  $_POST['cnpj'] && $cnpj = trim(strip_tags($_POST['cnpj']));
  $state = trim(strip_tags($_POST['state']));

  if (isset($name) && isset($email) && isset($cnpj) && isset($state)):
    $name = str_replace(' ','',$name);
    $user->setName($name);
    $user->setEmail($email);
    $user->setCNPJ($cnpj);
    $user->setState($state);
    $user->setImgUrl($name."_".$cnpj);

    $directory = '../img_qrcode';

    $filename =  "$directory/$name"."_"."$cnpj.png";

    if(!file_exists($filename)) {
      QRcode::png("$name/$email/$cnpj/$state", $filename);
    }


    $create->createUser($user);

    $_SESSION['sucess'] = "Usuário criado com sucesso!";

    header('Location: ../index.php');
  else :
    header('Location: ../index.php');
  endif;
} catch (\Throwable $err) {
  $_SESSION['sucess'] = "Ocorreu algo inexperado, tente novamente!";
  header('Location: ../index.php');
}  

