<?php
 include('../funcAdmPanel/funcDados2.php');
  
 if($_POST['sbmtRegItem'])
 {
   $txtIemNome   = $_POST['txtIemNome'];
   $txtDesc      = $_POST['txtDesc'];
   $txtItemIdx   = $_POST['txtItemIdx'];
   $txtCash      = $_POST['txtCash'];
   $txtCashEvent = $_POST['txtCashEvent'];
   $txtOptIdx    = $_POST['txtOptIdx'];
   $txtEstoque   = $_POST['txtEstoque'];
   $txtPos       = $_POST['txtPos'];
   $txtTipo      = $_POST['txtTipo'];	
   $txtCat       = $_POST['txtCat'];
   $txtImage     = $_POST['txtImage'];	 
   $ssLogin      = $_SESSION['ss_txtLogin'];
   
   if(eregi("[^0-9]", $txtCash))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em '.$confCabal['NOME_MOEDA'].'.</div>';
   }
   elseif(eregi("[^0-9]", $txtCashEvent))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em '.$confCabal['NOME_MOEDA_EVENT'].'.</div>';
   }
   elseif(eregi("[^0-9]", $txtEstoque))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em Estoque.</div>';
   }
   elseif(eregi("[^0-9]", $txtPos))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em POSIÇÃO.</div>';
   }
   elseif(strlen($txtIemNome) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo ItemNome, minimo 1 digito.</div>';
   }
   elseif(strlen($txtDesc) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo Descrição, minimo 1 digito.</div>';
   }
   elseif(strlen($txtPos) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo Posição, minimo 1 digito.</div>';
   }
   elseif(strlen($txtCash) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo '.$confCabal['NOME_MOEDA'].', minimo 1 digito.</div>';
   }
   elseif(strlen($txtCashEvent) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo '.$confCabal['NOME_MOEDA_EVENT'].', minimo 1 digito.</div>';
   }
   elseif(strlen($txtOptIdx) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo OptionIdx, minimo 1 digito.</div>';
   }
   elseif(strlen($txtEstoque) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo ESTOQUE, minimo 1 digito.</div>';
   }
    elseif(strlen($txtImage) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo Imagem, minimo 1 digito.</div>';
   }
   else
   { 

	   mssql_query("INSERT INTO CabalCash.dbo.ShopItems
	   (Name, Description, ItemIdx, DurationIdx, ItemOpt, Image, Honour, Cash, Category, Available, Quantity, Weight, Tipo, CashBonus, QntVend)
	   VALUES
	   ('".$txtIemNome."', '".$txtDesc."', '".$txtItemIdx."', 31, '".$txtOptIdx."', '".$txtImage."', 0, '".$txtCash."', '".$txtCat."', '".$txtEstoque."', 1, '".$txtPos."', '".$txtTipo."', '".$txtCashEvent."', 0)
	   ");
					
		echo'<div class=\'ferrorbig\'>Item enviado com sucesso.</div>';
   }
   
 }
   else
   {   
   ?>
<script type="text/javascript">
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;
    if((tecla > 47 && tecla < 58)) return true;
    else{
    if (tecla != 8) return false;
    else return true;
    }
}
</script>
<form  name="editar" id="editar">
<div class="fbar">
  <div class="ftitle">ENVIAR ITEMS</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
   <br />
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
    
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Nome Item </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtIemNome" type="text" maxlength="255" /></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td class="flabel" height="24px" style="padding: 0 15px 0;" >Descricao</td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <textarea class="ffield" name="txtDesc" type="text"  ></textarea></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >ItemIDX </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtItemIdx" type="text" maxlength="255" /></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >OptionIDX </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtOptIdx" type="text" maxlength="255" /></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Imagem</td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtImage" type="text" maxlength="255" value=".gif" /></td>
        </tr>
      
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" ><?=$confCabal['NOME_MOEDA']?> </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtCash" type="text" maxlength="20" /></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" ><?=$confCabal['NOME_MOEDA_EVENT']?> </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtCashEvent" type="text" maxlength="20" /></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Estoque </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtEstoque" type="text" maxlength="10" /></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Posição </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtPos" type="text" maxlength="10" /></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Tipo </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <select class="ffield" name="txtTipo"  >
              <option value="1">Ligado ao personagem quando equipado</option>
              <option value="2" selected>Ligado a conta</option>
              <option value="0">Livre</option>
            </select></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Categoria </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="18">Pet</option>
              <option value="19">Kit: Pet</option>
              <option value="20">Kit: Craft</option>
              <option value="21">Dungeons</option>
            </select></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="30px" colspan="2" style="text-align:center;"><input name="sbmtRegItem" class="fsubmit" type="button" value="ENVIAR" onclick="new Ajax.Updater('checar', '_admPanel/_executarShop/ex.envItem.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.editar)}); esperar('checar');" /></td>
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