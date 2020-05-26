<?php

include('../_conf/confCabal.php');


session_start();
ob_start();
 if(!(isset($_SESSION['ss_txtLogin']) and isset($_SESSION['ss_txtSenha'])))
  { 
    echo header('Location: ../_erros/upGeral.php');
  }
   else
      {
	   $txtConta = $_SESSION['ss_txtLogin'];	  
       $ck_Conta = mssql_fetch_array(mssql_query("SELECT * FROM ".DB_ACC.".dbo.cabal_auth_table WHERE ID='".$_SESSION['ss_txtLogin']."'"));
	   $ck_Vip   = mssql_fetch_array(mssql_query("SELECT * FROM ".DB_ACC.".dbo.cabal_charge_auth WHERE UserNum='".$ck_Conta['UserNum']."'"));
	   $ck_Point = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.CashAccount WHERE UserNum='".$ck_Conta['UserNum']."'"));
       $ck_Char  = mssql_query("SELECT * FROM ".DB_GAM.".dbo.cabal_character_table WHERE CharacterIdx/8='".$ck_Conta['UserNum']."' and Nation <> 3");
	   $IdxAcc   = $ck_Conta['UserNum']; 
      }
?>