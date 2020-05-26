<?php
 include('../funcAdmPanel/funcDados2.php');
 
 
 if($_GET['CodMens']){
 mssql_query('delete from '.DB_ACC.'.dbo.Cabal_Mens_Site where CodMens="'.$_GET['CodMens'].'"');
 echo'<div class=\'ferrorbig\'>Noticia COD# ( <u>'.$_GET['CodMens'].'</u> ) deletado com sucesso.</div>';
 }
 else 
 {
	 echo'ERRO 404';
 }
?>	