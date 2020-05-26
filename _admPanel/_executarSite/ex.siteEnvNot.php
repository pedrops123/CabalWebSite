<?php
 include('../funcAdmPanel/funcDados2.php');
  
 if($_POST['sbmtRegItem'])
 {
   $txtAssunto   = $_POST['txtAssunto'];
   $txtDesc      = $_POST['txtDesc'];
   $txtTitulo   = $_POST['txtTitulo'];
   $txtLink      = $_POST['txtLink']; 
   $ssLogin      = $_SESSION['ss_txtLogin'];
   
   
   if(strlen($txtAssunto) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo Assunto, minimo 1 digito.</div>';
   }
   elseif(strlen($txtDesc) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo Descrição, minimo 1 digito.</div>';
   }
   else
   { 

	   mssql_query("INSERT INTO ".DB_ACC.".dbo.Cabal_Mens_Site VALUES
	  ('".$txtAssunto."', '".$txtDesc."', '".date("Y-M-d H:i:s")."', '".$txtLink."', '".$ssLogin."', 0, 0, '".$txtTitulo."')");
		echo'<div class=\'ferrorbig\'>Noticia enviado com sucesso.</div>';
   }
   
 }
   else
   {   
   ?>

<form  name="editar" id="editar">
<div class="fbar">
  <div class="ftitle">ENVIAR NOTICIA</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
   <br />
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
    
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Titulo </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <select class="ffield" name="txtTitulo"  >
              <option value="0">Noticia</option>
              <option value="2">Atualização</option>
              <option value="1">Evento</option>
              <option value="3">Promoção</option>
            </select></td>
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
          <td height="24px" style="padding: 0 15px 0;" >Link forum </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtLink" type="text" maxlength="255" /></td>
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
          <td height="30px" colspan="2" style="text-align:center;"><input name="sbmtRegItem" class="fsubmit" type="button" value="ENVIAR" onclick="new Ajax.Updater('checar', '_admPanel/_executarSite/ex.siteEnvNot.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.editar)}); esperar('checar');" /></td>
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