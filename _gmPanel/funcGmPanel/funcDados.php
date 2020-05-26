<?php

include('../../_conf/confCabal.php');

session_start();
ob_start();
 if(!(isset($_SESSION['ss_txtLogin']) and isset($_SESSION['ss_txtSenha']) and in_array($_SESSION['ss_txtLogin'],$confGeral['ID_GM']))) 
  { 
    echo header('Location: ../../_erros/upGeral.php');
  }
  
?>