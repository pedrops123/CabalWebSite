<?php
 include('../funcAdmPanel/funcDados2.php');
 $ck_Not = mssql_fetch_array(mssql_query("SELECT * FROM ".DB_ACC.".dbo.Cabal_Banner WHERE CodBanner='".$_GET['CodBanner']."'"));
  
 if($_POST['sbmtRegItem'])
 {
   $txtImagem   = $_POST['txtImagem'];
   $txtCod      = $_POST['txtCod'];
   if(strlen($txtImagem) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo Imagem, minimo 1 digito.</div>';
   }
   else
   { 

	   mssql_query("UPDATE ".DB_ACC.".dbo.Cabal_Banner SET
	   Imagem = '".$txtImagem."'
	   WHERE CodBanner = '".$txtCod."'");
		echo'<div class=\'ferrorbig\'>Banner editado com sucesso.</div>';
   }
   
 }
   else
   {   
   ?>

<form  name="editar" id="editar">
<div class="fbar">
  <div class="ftitle">EDITAR BANNER</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
   <br />
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
    
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Nome da Imagem </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
          <input class="ffield" name="txtCod" type="hidden" maxlength="255" value="<?=$_GET['CodBanner']?>"/>
             <input class="ffield" name="txtImagem" type="text" maxlength="255" value="<?=$ck_Not['Imagem']?>"/></td>
        </tr>
       <tr>
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="30px" colspan="2" style="text-align:center;"><input name="sbmtRegItem" class="fsubmit" type="button" value="ENVIAR" onclick="new Ajax.Updater('checar', '_admPanel/_executarSite/ex.siteEdtBannerOk.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.editar)}); esperar('checar');" /></td>
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