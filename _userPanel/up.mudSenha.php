<?php
include('_funcUserPanel/funcDados.php');
?>

<form action="_userPanel/up.mudSenha.php.php?write=true" method="post" name="registro" id="registro">
<?php
	if ($_POST['sbmtMudSenha']) {
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
	{
		$Reg = new LS_Register();		
		$Reg->Connect();
		
	function valid_email($str)
	{
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}	
	
		$txtSenhaAtual = $_POST['txtSenhaAtual'];
		$txtNovaSenha  = $_POST['txtNovaSenha'];
		$txtReNovaSenha = $_POST['txtReNovaSenha'];
		$txtEmail      = $_POST['txtEmail'];
		
		$SQL_Q1 = mssql_fetch_array(mssql_query("SELECT * FROM ".DB_ACC.".dbo.cabal_auth_table WHERE ID ='". $txtConta ."'"));
	 	$nicke = mssql_query('select ID,UserNum,AuthKey from account.dbo.cabal_auth_table where id="'.$txtConta.'" and PWDCOMPARE("'.$txtSenhaAtual.'", Password) = 1 ');
    
	if (mssql_num_rows($nicke)==0) {
	  $Error .= "<li>Senha atual incorreta.</li> ";}	
	if($SQL_Q1['Email'] <> $txtEmail) 
	  $Error .= "<li>Email incorreta.</li> ";	 	
	if(valid_email($txtEmail)==FALSE)
	   $Error .= "<li>  Email , formato invalido, exemplo meunome@dominio.com  </li>";      	   	    		
	if(strlen($_POST['txtSenhaAtual']) < 5 || strlen($_POST['txtSenhaAtual']) > 15)
	   $Error .= "<li>  Senha atual requer minimo 5 e maximo 15 digitos </li>";      	   	    		
	if(eregi("[^0-9a-zA-Z]", $txtSenhaAtual))
	   $Error .= "<li>  Senha atual , digite apenas letras ou numeros </li>";      
	if(strlen($_POST['txtNovaSenha']) < 5 || strlen($_POST['txtNovaSenha']) > 15)
	   $Error .= "<li>  Nova senha requer minimo 5 e maximo 15 digitos </li>";      	   	    		
	if(eregi("[^0-9a-zA-Z]", $txtNovaSenha))
	   $Error .= "<li>  Nova senha , digite apenas letras ou numeros </li>";
	if($txtNovaSenha <> $txtReNovaSenha) 
	  $Error .= "Confirmar nova senha incorreta.</li> ";        	    	
		if(empty($Error) == false)
			echo '<div class=\'ferror\'>
			       <b>Erros encontrados</b><br />
				    <ul>
	                 '.$Error.'
					</ul> 
                  </div>';
		else
		{   
			if(mssql_query('exec SP_MUDAR_SENHA "'. $txtConta .'", "'. $txtReNovaSenha .'";') == false)	
				echo '<div class=\'ferror\'>
			       <b>Erros encontrados</b><br />
				    <ul>
	                <li> Houve um erro durante a gravação dos dados, por favor entrar em contato com algum administrador.</li>
					</ul> 
                  </div>';
			else
			{
				/*$smtp = new Smtp($Config_SMTP['Server']);
				$smtp->user = $Config_SMTP['User'];
				$smtp->pass = $Config_SMTP['Password'];
				$smtp->debug = $Config_SMTP['Debug'];
				
				$from = $Config_SMTP['From'];
				$subject = "Nova Senha (".$confCabal['SVNOME'].")";
				$msg = "Nao Responda!\nE-mail automatico gerado por ".$confGeral['GAME']."!\n
				---------------------------------------------------------------------------------\n
				LOGIN: ".$userName."\n
				NOVA SENHA: ".$userPwd."\n
				EMAIL: ".$email."\n
				---------------------------------------------------------------------------------\n
				(Nunca passe seus dados a ninguem!)\n
				Divirta-se! , ".$confCabal['SVNOME'].".\n";
								
				$smtp->Send($email, $from, $subject, $msg);*/
				
				echo '<div class=\'ferror\'> <b>Nova senha</b><br />
				       <ul>
	                    <li><font color="#00CC00"><b> Senha alterada com sucesso</b></font> </li>
					   </ul>
	                  </div>';
			}
		}
	} } else {
?>
<div class="fbar">
  <div class="ftitle">MUDAR SENHA</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
   
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">SENHA ATUAL</label></div>
         <div class="finput" style=""><input class="ffield" name="txtSenhaAtual" type="password" maxlength="15" > 
         </div>
         <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rpassword1">NOVA SENHA</label></div>
          <div class="finput" style=""><input class="ffield" name="txtNovaSenha" type="password" maxlength="15"  id="password"></div>
          <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">

      <div class="fitem" style=""><label for="rpassword2">CONFIRMAR RE-SENHA</label></div>
          <div class="finput" style=""><input class="ffield" name="txtReNovaSenha" type="password" maxlength="15"  id="confirm" ></div>
          <div class="clear"></div>
    </div>
    
   <div class="flabel" style="">
      <div class="fitem" style=""><label for="remail">EMAIL</label></div>
          <div class="finput" style=""><input class="ffield" name="txtEmail" type="text" maxlength="50"></div>
          <div class="clear"></div>
    </div>
</div>

  <div class="flabel" style="text-align: center;"><input name="sbmtMudSenha" class="fsubmit" type="button" value="ENVIAR" onclick="new Ajax.Updater('checar', '_userPanel/up.mudSenha.php?write=true', {method: 'post', asynchronous:true, parameters:Form.serialize(document.registro)}); esperar('checar');"></div>
    <div style="height: 5px;"></div>

</form>

<?php } ?>

<div id="checar" name="checar" class="errors">

</div>