<?php
 include('../funcAdmPanel/funcDados2.php');
 
 
 if($_GET['Id']){
 mssql_query('delete from '.DB_CSH.'.dbo.ShopItems where Id="'.$_GET['Id'].'"');
 echo'<div class=\'ferrorbig\'>Item COD# ( <u>'.$_GET['Id'].'</u> ) deletado com sucesso.</div>';
 }
 else 
 {
	 echo'ERRO 404';
 }
?>	