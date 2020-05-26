<?php
 include('../funcAdmPanel/funcDados2.php');

if($_POST['Entregar']) 
   {
    $CodDonate = $_POST['CodDonate'];
	$txtUserNum = $_POST['txtUserNum'];
	$txtCash  = $_POST['txtCash'];
	$txtPoint = $_POST['txtPoint'];
	mssql_query("UPDATE ".DB_ACC.".dbo.Cabal_Donate SET
	 Status = 1,
	 RespEntrega = '".$_SESSION['ss_txtLogin']."',
	 DataEnt = getdate()
	 
	 WHERE CodDonate = '".$CodDonate."'
	 UPDATE CabalCash.dbo.CashAccount SET
	 Cash = Cash + '".$txtCash."',
	 CashBonus = CashBonus + '".$txtPoint."'
	 WHERE UserNum = '".$txtUserNum."'");
	echo '<div class=\'ferrorbig\'>Donate N# '.$CodDonate.' entregue com sucesso.</div>';
	
   } 
   else
   {
	   echo'erro';
   }
   ?>
	   