<?php
 include('../funcAdmPanel/funcDados2.php');
 $ck_Not = mssql_fetch_array(mssql_query("SELECT * FROM ".DB_ACC.".dbo.Cabal_Mens_Site WHERE CodMens='".$_GET['CodMens']."'"));
  
 if($_POST['sbmtRegItem'])
 {
   $txtAssunto   = $_POST['txtAssunto'];
   $txtDesc      = $_POST['txtDesc'];
   $txtTitulo   = $_POST['txtTitulo'];
   $txtLink      = $_POST['txtLink'];
   $txtCod      = $_POST['txtCod']; 
   $ssLogin      = $_SESSION['ss_txtLogin'];
   
    $lmtMens = wordwrap($txtDesc, 50, "<br>");
	$ordem = array("\r\n", "\n", "\r");
	$subistituir = array("<br><br>", "<br>", "<br>");
	$novoTexto = str_replace($ordem, $subistituir, $lmtMens);
   
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

	   mssql_query("UPDATE ".DB_ACC.".dbo.Cabal_Mens_Site SET
	    Assunto = '".$txtAssunto."',
		Mens    = '".$txtDesc."',
		Titulo  = '".$txtTitulo."',
		LinkForum = '".$txtLink."'
		WHERE CodMens = '".$txtCod."'");
		echo'<div class=\'ferrorbig\'>Noticia editada com sucesso.</div>';
   }
   
 }
   else
   {   
   ?>

<form  name="editar" id="editar">
<div class="fbar">
  <div class="ftitle">EDITAR NOTICIA</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
   <br />
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
    
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Titulo </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
          <input type="hidden" name="txtCod" value="<?=$_GET['CodMens']?>" />
          <?
		  switch($ck_Not['Titulo'])
		  {
			case 0 : echo'<select class="ffield" name="txtTitulo"  >
                           <option value="0" selected="selected">Noticia</option>
                           <option value="2">Atualização</option>
                           <option value="1">Evento</option>
                           <option value="3">Promoção</option>
                          </select>'; 
					  break;
			case 1 : echo'<select class="ffield" name="txtTitulo"  >
                           <option value="0">Noticia</option>
                           <option value="2">Atualização</option>
                           <option value="1" selected="selected">Evento</option>
                           <option value="3">Promoção</option>
                          </select>'; 
					  break; 
			case 2 : echo'<select class="ffield" name="txtTitulo"  >
                           <option value="0">Noticia</option>
                           <option value="2" selected="selected">Atualização</option>
                           <option value="1">Evento</option>
                           <option value="3">Promoção</option>
                          </select>'; 
					  break; 
			case 3 : echo'<select class="ffield" name="txtTitulo"  >
                           <option value="0">Noticia</option>
                           <option value="2">Atualização</option>
                           <option value="1">Evento</option>
                           <option value="3" selected="selected">Promoção</option>
                          </select>'; 
					  break; 		  		  		    
		  }
		  ?>
           </td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Assunto </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtAssunto" type="text" maxlength="255" value="<?=$ck_Not['Assunto']?>" /></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Link forum </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtLink" type="text" maxlength="255" value="<?=$ck_Not['LinkForum']?>" /></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
       <tr class="flabel" >
          <td class="flabel" height="24px" style="padding: 0 15px 0;" >Descricao</td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <textarea name="txtDesc" class="ffield"><?=$ck_Not['Mens']?></textarea></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="30px" colspan="2" style="text-align:center;"><input name="sbmtRegItem" class="fsubmit" type="button" value="ENVIAR" onclick="new Ajax.Updater('checar', '_admPanel/_executarSite/ex.siteEdtNotOk.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.editar)}); esperar('checar');" /></td>
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