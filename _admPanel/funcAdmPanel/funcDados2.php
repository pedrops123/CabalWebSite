<?php

include('../../_conf/confCabal2.php');

session_start();
ob_start();
 if(!(isset($_SESSION['ss_txtLogin']) and isset($_SESSION['ss_txtSenha']) and in_array($_SESSION['ss_txtLogin'],$confGeral['ID_ADM']))) 
  { 
    echo header('Location: ../../_erros/upGeral.php');
  }
?>