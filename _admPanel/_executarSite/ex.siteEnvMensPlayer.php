<?php
 include('../funcAdmPanel/funcDados2.php');
  
 if($_POST['sbmtRegItem'])
 {
   $txtAssunto   = $_POST['txtAssunto'];
   $txtDesc      = $_POST['txtDesc'];
   $txtTitulo    = $_POST['txtTitulo'];
   $txtLink      = $_POST['txtLink']; 
   $ssLogin      = $_SESSION['ss_txtLogin'];
   $txtConta     = $_POST['txtConta'];
   
   if(strlen($txtAssunto) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo Assunto, minimo 1 digito.</div>';
   }
   elseif(strlen($txtDesc) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo Descrição, minimo 1 digito.</div>';
   }
   elseif($txtTitulo == 0)
   {
	 $ck_ContaUnica = mssql_fetch_array(mssql_query("SELECT * FROM ".DB_ACC.".dbo.cabal_auth_table WHERE ID = '".$txtConta."' ")); 
	 if( $txtConta <> $ck_ContaUnica['ID'])
	 {
		echo'<div class=\'ferrorbig\'>Conta unica não existe, ou inválida.</div>';	 
	 }
	 elseif(strlen($txtConta) < 3)
	 {
		echo'<div class=\'ferrorbig\'>Conta unica requer minimo 3 digitos.</div>'; 
	 }
    
	 else
	 {
		 $txtUserNum = $ck_ContaUnica['UserNum'];
		 $txtID      = $ck_ContaUnica['ID'];
		 mssql_query("INSERT INTO ".DB_ACC.".dbo.Cabal_Mensagem VALUES
	  ('".$txtUserNum."', '".$txtID."', '".$txtAssunto."',  '".$txtDesc."', '".date("Y-M-d H:i:s")."', '".$ssLogin."', 0)");
	  echo'<div class=\'ferrorbig\'>Mensagem enviada com sucesso.</div>';
	  }
		
  }
   elseif($txtTitulo == 1)
   {
	 $ck_ContaUnica = mssql_query("SELECT * FROM ".DB_ACC.".dbo.cabal_auth_table WHERE Login = 1"); 
	 
		 $txtUserNum = $ck_ContaUnica['UserNum'];
		 $txtID      = $ck_ContaUnica['ID'];
		 
		 for ($i = 1;$i <= mssql_num_rows($ck_ContaUnica); $i++) 
         {
           $ck_ContaUnicaR = mssql_fetch_array($ck_ContaUnica);
		   $txtUserNum = $ck_ContaUnicaR['UserNum'];
		   $txtID      = $ck_ContaUnicaR['ID'];
		   
		   mssql_query("INSERT INTO ".DB_ACC.".dbo.Cabal_Mensagem VALUES
	       ('".$txtUserNum."', '".$txtID."', '".$txtAssunto."',  '".$txtDesc."', '".date("Y-M-d H:i:s")."', '".$ssLogin."', 0)");
		  } 
		   echo'<div class=\'ferrorbig\'>Mensagem enviada com sucesso.</div>'; 
   }
   elseif($txtTitulo == 2)
   {
	 $ck_ContaUnica = mssql_query("SELECT * FROM ".DB_ACC.".dbo.cabal_auth_table WHERE AuthType > 0"); 
	 
		 $txtUserNum = $ck_ContaUnica['UserNum'];
		 $txtID      = $ck_ContaUnica['ID'];
		 
		 for ($i = 1;$i <= mssql_num_rows($ck_ContaUnica); $i++) 
         {
           $ck_ContaUnicaR = mssql_fetch_array($ck_ContaUnica);
		   $txtUserNum = $ck_ContaUnicaR['UserNum'];
		   $txtID      = $ck_ContaUnicaR['ID'];
		   
		   mssql_query("INSERT INTO ".DB_ACC.".dbo.Cabal_Mensagem VALUES
	       ('".$txtUserNum."', '".$txtID."', '".$txtAssunto."',  '".$txtDesc."', '".date("Y-M-d H:i:s")."', '".$ssLogin."', 0)"); 
		 }
	  echo'<div class=\'ferrorbig\'>Mensagem enviada com sucesso.</div>';
   }
   else
   {
	 echo'<div class=\'ferrorbig\'>Erro encontrado favor entrar em contato com Iron.</div>';  
   }   
 }
   else
   {   
   ?>

<form  name="editar" id="editar">
<div class="fbar">
  <div class="ftitle">ENVIAR MENSAGEM</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
   <br />
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
    
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Ação </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <select class="ffield" name="txtTitulo"  >
              <option value="0">Conta unica</option>
              <option value="1">Contas online</option>
              <option value="2">Todas contas</option>
            </select></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Conta Unica </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
           <input class="ffield" type="text" value="" placeholder="Digite apenas se ação for conta unica"  name="txtConta" id="rusername" maxlength="15"></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Assunto </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtAssunto" type="text" maxlength="255" /></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
       
       <tr class="flabel" >
          <td class="flabel" height="24px" style="padding: 0 15px 0;" >Descricao</td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <textarea name="txtDesc" class="ffield"></textarea></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="30px" colspan="2" style="text-align:center;"><input name="sbmtRegItem" class="fsubmit" type="button" value="ENVIAR" onclick="new Ajax.Updater('checar', '_admPanel/_executarSite/ex.siteEnvMensPlayer.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.editar)}); esperar('checar');" /></td>
        </tr>
     
  
    </table>
    <div style="height: 4px;"></div>
</div>
</div>
</form>




<?php
 }
?>

<div id="checar" name="checar"></div>