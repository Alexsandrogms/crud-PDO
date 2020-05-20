<html>
<head></head>
<title>Universidade PROJEÇÃO</title>
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">


<style>
  h1 {
    font-family: Lobster, Monospace;
    font-size: 45px;
  }
    p {
    font-family: Monospace;
    font-size: 16px;
  }
    .code-qr {
    font-family: Monospace;
    font-size: 16px;
  }
</style>

<?php
/*
  ADAPTED and commented BY Sayuri Mizuguchi
  WEB DEVELOPER FOCUSED IN COGNITIVE SOLUTIONS
  this code is original from PHP LIB Developers
  This is important to say

*/
    echo "<h1><center>PHP QR Code</center></h1><hr/>";
    
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix in my temp inside my local repository 
    $PNG_WEB_DIR = 'temp/';


    //include my big lib for qrcode examples
    include "qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    //name for my qrcode image saved example
    $filename = $PNG_TEMP_DIR.'qrcode.png';
    
    //processing form input from user, user can choice the type of QRCODE
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($_REQUEST['data'])) { 
    
        //it's very important!
        if (trim($_REQUEST['data']) == '')
            die('Não pode ter algo vazio neste campo!!! <a href="?">back</a>');
            
        // user data to show my qrcode image
        $filename = $PNG_TEMP_DIR.'qrcode'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    } else {    
    
        //default data
        echo '<p>Você pode adicionar por parametro com método GET na URL: <a href="?data=assim">assim</a></p><hr/>';    
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    }    
        
    //display generated file to user in the same page with the next code
    echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';  
    
    //config form with post method and send to my index for show in my same page
    echo '<form class="code-qr" action="index.php" method="post">
        Conteúdo:&nbsp;<input name="data" value="'.(isset($_REQUEST['data'])?htmlspecialchars($_REQUEST['data']):'Dado a ser transformado').'" />&nbsp;
        ECC:&nbsp;<select name="level">
            <option value="L"'.(($errorCorrectionLevel=='L')?' selected':'').'>L - smallest</option>
            <option value="M"'.(($errorCorrectionLevel=='M')?' selected':'').'>M</option>
            <option value="Q"'.(($errorCorrectionLevel=='Q')?' selected':'').'>Q</option>
            <option value="H"'.(($errorCorrectionLevel=='H')?' selected':'').'>H - best</option>
        </select>&nbsp;
        Tamanho:&nbsp;<select name="size">';
     
    //option value selected for qrcode type    
    for($i=1;$i<=10;$i++)
        echo '<option value="'.$i.'"'.(($matrixPointSize==$i)?' selected':'').'>'.$i.'</option>';
    
    //show input button to generate the qrcode    
    echo '</select>&nbsp;
        <input type="submit" value="Gerar QRCode"></form><hr/>';
        
    // benchmark it is just one present
  //  QRtools::timeBenchmark();    
?>


</html>
    