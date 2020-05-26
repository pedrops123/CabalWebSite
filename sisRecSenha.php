<?php
 include '_conf/confCabal.php';
 ?>
            
<form action="sisRecSenha.php?write=true" method="post" name="registro" id="registro">
<?php	
	if ($_POST['sbmtReg']) {
		
	function valid_email($str)
	{
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}	
	
		$userName = anti_injection($_POST['userName']);
		$email  = anti_injection($_POST['email']);
		$Chave = anti_injection($_POST['Chave']);
		
		$SQL_Q = mssql_query("SELECT ID,Email,Chave FROM ".DB_ACC.".dbo.cabal_auth_table WHERE ID ='". $userName ."';");
		$SQL = mssql_fetch_object($SQL_Q);
		
			
	if($SQL->ID != $userName) 
	  $Error .= "<li>Login inválido.</li> ";	
	if($SQL->Email != $email) 
	  $Error .= "<li>Email inválido.</li> ";
	if($SQL->Chave != $Chave) 
	  $Error .= "<li>Palavra Chave invalido.</li> ";
	
	if(valid_email($email)==FALSE)
	   $Error .= "<li>  Email , formato invalido, exemplo meunome@dominio.com  </li>";      	   	    		
    
	if(strlen($userName) < 5 || strlen($userName) > 15)
	   $Error .= "<li>  Login requer minimo 5 e maximo 15 digitos </li>";      	   	    		
	if(eregi("[^0-9a-zA-Z]", $userName))
	   $Error .= "<li>  Login , digite apenas letras ou numeros </li>";
	   
	if(strlen($Chave) < 2 || strlen($Chave) > 15)
	   $Error .= "<li>  Palavra Chave requer minimo 2 e maximo 15 digitos </li>";      	   	    		
	if(eregi("[^0-9a-zA-Z]", $Chave))
	   $Error .= "<li>  Palavra Chave , digite apenas letras ou numeros </li>"; 
	   
    if(empty($Error) == false)
			echo '<div class=\'ferror\'>
			       <b>Erros encontrados</b><br />
				    <ul>
	                 '.$Error.'
					</ul> 
                  </div>';
		elseif($SQL->Chave == $Chave)
		{   

			$NewPwd = substr(md5(mktime()),0,8);
			mssql_query('UPDATE '.DB_ACC.'.dbo.cabal_auth_table set
						Password = PWDENCRYPT("'. $NewPwd .'") 
						where ID = "'.$userName.'" and Chave = "'.$Chave.'"');	

				echo '<div class=\'ferror\'> <b>Recuperação de senha</b><br />
				       <ul>
	                    <li><font color="#00CC00"><b> Nova senha gerada com sucesso!</b></font> </li>
	                    <li><font size=3> <b>Sua nova senha: <u>'.$NewPwd.'</u></b><font></li>
	                    <li><font color="yellow"><b> (Nunca passe seus dados a ninguém.)<b></font> </li>
					   </ul>
	                  </div>';
			}

	 } else {
?>
<div class="fbar">
  <div class="ftitle">RECUPERAR SENHA</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
    <div class="fdesc">
* Uma nova senha sera gerada.</div>
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">LOGIN</label></div>
         <div class="finput" style=""><input class="ffield" name="userName" type="text" maxlength="15" > 
         </div>
         <div class="clear"></div>
    </div>

   <div class="flabel" style="">
      <div class="fitem" style=""><label for="remail">EMAIL</label></div>
          <div class="finput" style=""><input class="ffield" name="email" type="text"></div>
          <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">PALAVRA CHAVE</label></div>
         <div class="finput" style=""><input class="ffield" name="Chave" type="password" maxlength="15" > 
         </div>
         <div class="clear"></div>
    </div>
</div>

  <div class="flabel" style="text-align: center;"><input name="sbmtReg" class="fsubmit" type="button" value="ENVIAR" onclick="new Ajax.Updater('checar', 'sisRecSenha.php?write=true', {method: 'post', asynchronous:true, parameters:Form.serialize(document.registro)}); esperar('checar');"></div>
    <div style="height: 5px;"></div>

</form>

<?php } ?>

<div id="checar" name="checar" class="errors">

</div>

