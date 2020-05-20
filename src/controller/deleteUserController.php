<?php
session_start();

require_once '../model/FornecedorDao.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) :
  $id = $_GET['id'];
  $img = $_GET['img'];

  $dir = "../img_qrcode";
  
 
  $iterator = new \FilesystemIterator($dir);

  if ($iterator->valid()) {
    // tem coisas lá dentro
    unlink("$dir/$img.png");
  }

  $delete = new FornecedorDao();
  $delete->deleteUser($id);
  
  $_SESSION['sucess'] = "Registro excluido com sucesso!";
  header('Location: ../index.php');
else:
  header('Location: ../index.php');
endif;
?>