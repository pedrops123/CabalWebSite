<?php
 include '_conf/confCabal.php';
 $Error = "";
?>
            
<form action="sisCadastrar.php?write=true" method="post" name="registro" id="registro">
<style type="text/css">
  .formata { /* esta classe é somente 
               para formatar a fonte */
  font: 12px tahoma, verdana, helvetica, sans-serif; 
  }
  a.dcontexto{
  position:relative; 
  font:12px tahoma, verdana, helvetica, sans-serif; 
  padding:0;
  color:#FFF;
  text-decoration:none;

  cursor:help; 
  z-index:24;
  }
  a.dcontexto:hover{
  background:transparent;
  color:#f00;
  z-index:25; 
  }
  a.dcontexto span{display: none}
  a.dcontexto:hover span{ 
  display:block;
  position:absolute;
  width:300px; 
  top:3em;
  right-align:justify;
  left:0;
  font: 11px tahoma, verdana, helvetica, sans-serif; 
  padding:5px 10px;
  border:1px solid #FFF;
  background:#333; 
  color:#FFF;
  }
</style> 
<?php	
	if (isset($_POST['sbmtReg'])) {
	
	function valid_email($str)
	{
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}	
	
		$userName = anti_injection($_POST['userName']);
		$userPwd  = anti_injection($_POST['userPwd']);
		$userPwd2 = anti_injection($_POST['userPwd2']);
		$email    = anti_injection($_POST['email']);
		$Chave   = anti_injection($_POST['Chave']);
		
		$SQL_Q1 = sqlsrv_query($conectionAccount ,"SELECT 1 FROM ".DB_ACC.".dbo.cabal_auth_table WHERE ID ='". $userName ."';");
		$SQL1 = sqlsrv_num_rows($SQL_Q1);
		$SQL_Q2 = sqlsrv_query($conectionAccount ,"SELECT 1 FROM ".DB_ACC.".dbo.cabal_auth_table WHERE Email='". $email ."';");
		$SQL2 = sqlsrv_num_rows($SQL_Q2);
			
	if($SQL1 > 0) 
	  $Error .= "<li>Login ".$userName." já esta em uso.</li> ";	
	if($SQL2 > 0) 
	 $Error .= "<li>Email ".$email." já esta em uso.</li> ";	
	
	if(valid_email($email)==FALSE)
	   $Error .= "<li>  Email , formato invalido, exemplo meunome@dominio.com  </li>";      	   	    		
    
	if(strlen($userName) < 5 || strlen($userName) > 15)
	   $Error .= "<li>  Login requer minimo 5 e maximo 15 digitos </li>";      	   	    		
	if(preg_match("[^0-9a-zA-Z]", $userName))
	   $Error .= "<li>  Login , digite apenas letras ou numeros </li>";  
	     
	if(strlen($userPwd) < 5 || strlen($userPwd) > 15)
	   $Error .= "<li>  Senha requer minimo 5 e maximo 15 digitos </li>";      	   	    		
	if(preg_match("[^0-9a-zA-Z]", $userPwd))
	   $Error .= "<li>  Senha , digite apenas letras ou numeros </li>";  
	      	    		 
    if($userPwd2 <> $userPwd)
	   $Error .= "<li>  Re-senha incorreta <br> </li>";
	if(strlen($userPwd2) < 5 || strlen($userPwd2) > 15)
	   $Error .= "<li>  Re-senha requer minimo 5 e maximo 15 digitos </li>"; 
	   
	if(strlen($Chave) < 5 || strlen($Chave) > 10)
	   $Error .= "<li>  Palavra Chave requer minimo 5 e maximo 15 digitos </li>";      	   	    		
	if(preg_match("[^0-9a-zA-Z]", $userName))
	   $Error .= "<li>  Palavra Chave , digite apenas letras ou numeros </li>";    	   	    		
	
		if(empty($Error) == false)
			echo '<div class=\'ferror\'>
			       <b>Erros encontrados</b><br />
				    <ul>
	                 '.$Error.'
					</ul> 
                  </div>';
		elseif($confGeral['ATIVAR_VIP'] == 0)
		  {
			$hash = md5(date('[d-m-Y]'));
        // sqlsrv_query($conectionAccount,'exec '.DB_ACC.'.dbo.cabal_tool_registerAccount "'. $userName .'", "'. $userPwd .'", "'. $email .'", "'. $hash .'", "'. $Chave .'"');
      $testeInsert =  sqlsrv_query($conectionAccount,"exec ".DB_ACC.".dbo.cabal_tool_registerAccount '".$userName."','".$userPwd."','".$email."','".$hash."','".$Chave."'");
      if($testeInsert){
        echo '<div class=\'ferror\'> <b>Cadastro concluido</b><br />
        <ul>
               <li><font color="#00CC00"><b> Seu cadastro foi registrado com sucesso</b></font> </li>
      </ul>
             </div>';
      }
      else{
       $erros = sqlsrv_errors();
       echo '<div class=\'error\'> <b>Erro no cadastro !</b><br />';
       foreach($erros as $error){
         echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
         echo "code: ".$error[ 'code']."<br />";
         echo $error['message']."<br/>";
         echo "valores: <br/> Username: " .$userName. "<br/> Password: " . $userPwd. "<br/> Email :" .$email. "<br/> Hash :" .$hash. "<br/> Chave :" .$Chave; 
       }
         
      }
		
	       }
	     elseif($confGeral['ATIVAR_VIP'] == 1) 
		  {
	        $md5 =md5($userPwd);
			$hash = md5(mktime());
			$diasvip = $confGeral['DIAS_VIP'];
			sqlsrv_query($conectionAccount ,'exec '.DB_ACC.'.dbo.SP_CADASTRARR "'. $userName .'", "'. $md5 .'", "'. $email .'", "'. $hash .'", "'. $Chave .'", "'. $diasvip .'"');	
				echo '<div class=\'ferror\'> <b>Cadastro concluido</b><br />
				       <ul>
	                    <li><font color="#00CC00"><b> Seu cadastro foi registrado com sucesso</b></font> </li>
						<li><font color="yellow"><b> Parabens voce ganhou <u>'.$confGeral['DIAS_VIP'].' dias conta vip</u></b></font> </li>
					   </ul>
	                  </div>';
	        } } else {
?>
<div class="fbar">
  <div class="ftitle">CADASTRAR</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
    <div class="fdesc">Procure utilizar email e palavra chave que seja valido para que futuramente voce possa:<br />
- Recuperar senha e alterar dados pessoais<br />
- Obter ajuda de nossa Equipe sobre a sua conta</div>
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">LOGIN</label></div><div id="husername" class="fwhat"><a href="#" class="dcontexto">?
<span><b>SEU NOME DE USUARIO DE ENTRADA</b><br><hr>
 • Seu nome de usuario deve conter de 5 a 15 caracters de preferencia.<br>
 • Seu nome de usuario deve ser alfanumerico (isto significa que voce pode apenas utilizar letras de A a Z e numeros de 0 a 9)
 </span></a></div>
         <div class="finput" style=""><input class="ffield" name="userName" type="text" maxlength="10" > 
         </div>
         <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rpassword1">SENHA</label></div><div id="husername" class="fwhat"><a href="#" class="dcontexto">?
<span><b>INTRODUZA SUA SENHA</b><br><hr>
 • Sua senha deve conter de 5 a 15 caracters de preferencia.<br>
 • Seu login deve ser alfanumerico (isto significa que voce pode apenas utilizar letras de A a Z e numeros de 0 a 9)
 </span></a></div>
          <div class="finput" style=""><input class="ffield" name="userPwd" type="password"  id="password"></div>
          <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">

      <div class="fitem" style=""><label for="rpassword2">CONFIRMAR SENHA</label></div><div id="husername" class="fwhat"><a href="#" class="dcontexto">?
<span><b>REPITA SUA SENHA</b><br><hr>
 • Sua senha deve conter de 5 a 15 caracters de preferencia.<br>
 • Sua senha deve ser alfanumerico (isto significa que voce pode apenas utilizar letras de A a Z e numeros de 0 a 9)
 </span></a></div>
          <div class="finput" style=""><input class="ffield" name="userPwd2" type="password"  id="confirm" ></div>
          <div class="clear"></div>
    </div>
    
   <div class="flabel" style="">
      <div class="fitem" style=""><label for="remail">EMAIL</label></div><div id="husername" class="fwhat"><a href="#" class="dcontexto">?
<span><b>SEU ENDEREÇO DE EMAIL</b><br><hr>
 • Seu email deve ser valido.<br>
 • Seu email vai ser usado na recuperação de senha de sua conta e/ou contatos administrativos.
 </span></a></div>
          <div class="finput" style=""><input class="ffield" name="email" type="text"></div>
          <div class="clear"></div>
    </div>
</div>

<div class="flabel" style="">
      <div class="fitem" style=""><label for="remail">PALAVRA CHAVE</label></div><div id="husername" class="fwhat"><a href="#" class="dcontexto">?
<span><b>CODIGO DE SEGURANCA</b><br><hr>
 • Codigo utilizado para alterar dados pessoais e recuperacao de senha.<br>
 • Sua chave deve conter até 10 caracters.<br>
 • Ssua chave deve ser alfanumerico (isto significa que voce pode apenas utilizar letras de A a Z e numeros de 0 a 9)<br>
 • Sua chave será utilizada na recuperação de senha de sua conta
 </span></a></div>
          <div class="finput" style=""><input class="ffield" name="Chave" type="text"></div>
          <div class="clear"></div>
    </div>
	
</div>

  <div class="flabel" style="text-align: center;"><input name="sbmtReg" class="fsubmit" type="button" value="Cadastrar" onclick="new Ajax.Updater('checar', 'sisCadastrar.php?write=true', {method: 'post', asynchronous:true, parameters:Form.serialize(document.registro)}); esperar('checar');"></div>
    <div style="height: 5px;"></div>

</form>

<?php } ?>

<div id="checar" name="checar" class="errors">

</div>
