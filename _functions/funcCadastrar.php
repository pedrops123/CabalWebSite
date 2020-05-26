<?php
	class Smtp{
		var $conn;
		var $user;
		var $pass;
		var $debug = false;
		
		public function Smtp($host){
		  $this->conn = fsockopen($host, 25, $errno, $errstr, 30);
		  $this->Put("EHLO $host");
		}
		public function Auth(){
		  $this->Put("AUTH LOGIN");
		  $this->Put(base64_encode($this->user));
		  $this->Put(base64_encode($this->pass));
		}
		public function Send($to, $from, $subject, $msg){
		
			$this->Auth();
		  $this->Put("MAIL FROM: " . $from);
		  $this->Put("RCPT TO: " . $to);
		  $this->Put("DATA");
		  $this->Put($this->toHeader($to, $from, $subject));
		  $this->Put("\r\n");
		  $this->Put($msg);
		  $this->Put(".");
			$this->Close();
		  if(isset($this->conn)){
		  return true;
		  }else{
		  return false;
		  }
		}
		public function Put($value){
		  return fputs($this->conn, $value . "\r\n");
		}
		public function toHeader($to, $from, $subject){
		  $header  = "Message-Id: <". date('YmdHis').".". md5(microtime()).".". strtoupper($from) ."> \r\n";
		  $header .= "From: <" . $from . "> \r\n";
		  $header .= "To: <".$to."> \r\n";
		  $header .= "Subject: ".$subject." \r\n";
		  $header .= "Date: ". date('D, d M Y H:i:s O') ." \r\n";
		  $header .= "X-MSMail-Priority: High \r\n";
		  return $header;
		}
		public function Close(){
		  $this->Put("QUIT");
		  if($this->debug == true){
		  while (!feof ($this->conn)) {
			echo fgets($this->conn) . "<br>\n";
		  }
		  }
		  return fclose($this->conn);
		}
	}

	class LS_Register
	{
		private $OBJ_CONN;
		
		public function Connect()
		{
			$this->OBJ_CONN = mssql_connect(DB_ADDR, DB_USER, DB_PASS);
			mssql_select_db(DB_ACC, $this->OBJ_CONN);
		}
	}
	if($_GET['write'] == true)
        if(eregi("[^0-9a-zA-Z]", $_GET['write']))
	   echo"Tentando usar URL inject, Hum...";
	   else
	{
		$Reg = new LS_Register();		
		$Reg->Connect();
		
	function valid_email($str)
	{
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}	
	
		$txtLogin   = $_POST['txtLogin'];
		$txtSenha   = $_POST['txtSenha'];
		$txtReSenha = $_POST['txtReSenha'];
		$txtEmail   = $_POST['txtEmail'];
		
		$SQL_Q1 = mssql_query("SELECT 1 FROM cabal_auth_table WHERE ID ='". $txtLogin ."';");
		$SQL1 = mssql_num_rows($SQL_Q1);
		$SQL_Q2 = mssql_query("SELECT 1 FROM cabal_auth_table WHERE Email='". $txtEmail ."';");
		$SQL2 = mssql_num_rows($SQL_Q2);
			
	if($SQL1 > 0) 
	  $Error .= "<li>Login ".$txtLogin." já esta em uso.</li> ";	
	if($SQL2 > 0) 
	  $Error .= "<li>Email ".$txtEmail." já esta em uso.</li> ";	

	
	if(valid_email($txtEmail)==FALSE)
	   $Error .= "<li>Email , formato invalido, exemplo meunome@dominio.com. </li>";      	   	    		
	  	   	    		
	if(strlen($txtEmail) < 5 || strlen($txtEmail) > 50)
	   $Error .= "<li> Email , requer minimo 5 e maximo 50 digitos.</li>"; 
	     
	if(strlen($txtLogin) < 5 || strlen($txtLogin) > 15)
	   $Error .= "<li>  Login requer minimo 5 e maximo 15 digitos.</li>";      	   	    		
	if(eregi("[^0-9a-zA-Z]", $userName))
	   $Error .= "<li>  Login , digite apenas letras ou numeros.</li>";  
	     
	if(strlen($txtSenha) < 5 || strlen($txtSenha) > 15)
	   $Error .= "<li>  Senha requer minimo 5 e maximo 15 digitos.</li>";      	   	    		
	if(eregi("[^0-9a-zA-Z]", $userPwd))
	   $Error .= "<li>  Senha , digite apenas letras ou numeros.</li>";  
	      	    		 
    if($txtReSenha <> $txtSenha)
	   $Error .= "<li>Re-senha incorreta.</li>";
	   
	if(strlen($txtReSenha) < 5 || strlen($txtReSenha) > 15)
	   $Error .= "<li> Re-senha requer minimo 5 e maximo 15 digitos.</li>"; 
	   
		if(empty($Error) == false)
			echo '<div class=\'ferror\'>
			       <b>Erros encontrados</b><br />
				    <ul>
	                 '.$Error.'
					</ul> 
                  </div>';
		else
		{   
		    $ip = $_SERVER['REMOTE_ADDR'];
			$md5 = md5($txtSenha);
			$hash = md5(mktime());
			if(mssql_query
			('exec SP_CADASTRAR "'. $txtLogin .'", "'. $md5 .'", "'. $txtEmail .'", "'. $confGeral['ATIVAR_VIP'] .'", "'.$confGeral['DIAS_VIP'].'",  "'. $hash .'";') == false)
			  	
				echo '<div class=\'ferror\'>
			       <b>Erros encontrados</b><br />
				    <ul>
	                <li> Houve um erro durante a gravação dos dados, por favor entrar em contato com algum administrador.</li>
					</ul> 
                  </div>';
			else
			{
				$smtp = new Smtp($Config_SMTP['Server']);
				$smtp->user = $Config_SMTP['User'];
				$smtp->pass = $Config_SMTP['Password'];
				$smtp->debug = $Config_SMTP['Debug'];
				
				$from = $Config_SMTP['From'];
				$subject = "Confirmar Cadastro (".$confGeral['GAME'].")";
				$msg = "Nao Responda!\nE-mail automatico gerado por ".$confGeral['GAME']."!\n
				---------------------------------------------------------------------------------\n
				LOGIN: ".$txtlogin."\n
				SENHA: ".$txtSenha."\n
				EMAIL: ".$txtEmail."\n
				---------------------------------------------------------------------------------\n
				 Codigo de verificacao ,para confirmar clique  neste link:\n
				".$Config_SMTP['RETORNO']."/sisConfReg.php?login=".$userName."&hash=".$hash."  \n
				(Nunca passe seus dados a ninguem!)\n
				Divirta-se! , ".$confGeral['EQUIPE'].".\n";
								
				$smtp->Send($email, $from, $subject, $msg);
				
				echo '<div class=\'ferror\'> <b>Cadastro em andamento</b><br />
				       <ul>
	                    <li><font color="#00CC00"><b> Seu cadastro foi registrado com exito</b></font> </li>
	                    <li>Para finalizar acesse seu email e confirme seu registro</li>
	                    <li><font color="yellow"><b> (Nao se esqueça de verificar sua caixa de SPAM/LIXO)<b></font> </li>
					   </ul>
	                  </div>';
			}
		}
	}  else {
echo"<div class='ferror'>
 <b>Errors</b><br />
 <ul>
  <li>Erro encontrado, por favor entrar em contato com algum administrador.</li>
 </ul>
</div>";}
?>

