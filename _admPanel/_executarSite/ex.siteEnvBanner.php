<?php
 include('../funcAdmPanel/funcDados2.php');
  
 if($_POST['sbmtRegItem'])
 {
   $txtImagem   = $_POST['txtImagem'];
   
   if(strlen($txtImagem) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo Imagem, minimo 1 digito.</div>';
   }
   else
   { 

	   mssql_query("INSERT INTO ".DB_ACC.".dbo.Cabal_Banner VALUES
	  ('".date("Y-M-d H:i:s")."', NULL, '".$txtImagem."')");
		echo'<div class=\'ferrorbig\'>Banner enviado com sucesso.</div>';
   }
   
 }
   else
   {   
   ?>

<form  name="editar" id="editar">
<div class="fbar">
  <div class="ftitle">ENVIAR BANNER</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
   <br />
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
    
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Nome da Imagem </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
             <input class="ffield" name="txtImagem" type="text" maxlength="255" /></td>
        </tr>
       <tr>
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="30px" colspan="2" style="text-align:center;"><input name="sbmtRegItem" class="fsubmit" type="button" value="ENVIAR" onclick="new Ajax.Updater('checar', '_admPanel/_executarSite/ex.siteEnvBanner.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.editar)}); esperar('checar');" /></td>
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