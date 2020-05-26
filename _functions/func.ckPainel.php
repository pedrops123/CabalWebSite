<?

require('../_conf/confCabal.php');

        $txtLogin = $_POST['txtLogin'];
		$txtSenha = md5($_POST['txtSenha']);	
		
	if(eregi("[^0-9a-zA-Z ]", $txtLogin))
		    $Error .= "Login inválido";
			if(eregi("[^0-9a-zA-Z ]", $txtSenha))
		    $Error .= "Senha inválida";
		if(empty($Error) == false)
		echo ' <div class=\'ferror\'>
                 <center><b>'.$Error.'</b> </center>
               </div>';
	 else {
		 	
    $sql_Conta = mssql_num_rows(mssql_query("select ID from ".DB_ACC.".dbo.cabal_auth_table where ID='".$txtLogin."'"));
	
		if($sql_Conta <= 0){
			echo ' <div class=\'ferror\'>
			        <center> <b>Login inválido</b> </center>
				   </div>'; 
	                       }
			
		else {  
	$sql_Senha = mssql_num_rows(mssql_query("select Password from ".DB_ACC.".dbo.cabal_auth_table where Password='".$txtSenha."' and ID='".$txtLogin."'"));
	
		if($sql_Senha <= 0){
			echo '<div class=\'ferror\'>
			        <center><b>Senha inválido</b> </center>
				   </div>';
	                       }
		
		else {
		$_SESSION['ss_txtLogin'] = $txtLogin;
        $_SESSION['ss_txtSenha'] = $txtSenha;
		
       header('Location: index.php');
		     }
 }  

 mssql_close();
         }

 
 ?>