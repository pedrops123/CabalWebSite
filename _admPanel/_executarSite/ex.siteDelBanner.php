<?php
 include('../funcAdmPanel/funcDados2.php');
 
 
 if($_GET['CodBanner']){
 mssql_query('delete from '.DB_ACC.'.dbo.Cabal_Banner where CodBanner="'.$_GET['CodBanner'].'"');
 echo'<div class=\'ferrorbig\'>Banner COD# ( <u>'.$_GET['CodBanner'].'</u> ) deletado com sucesso.</div>';
 }
 else 
 {
	 echo'ERRO 404';
 }
?>	