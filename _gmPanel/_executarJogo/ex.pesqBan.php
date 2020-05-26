<?php
 include('../funcGmPanel/funcDados.php');
 
 $PegaAcc  = mssql_fetch_array(mssql_query("select * from ".DB_ACC.".dbo.cabal_auth_table where UserNum = '".$_GET['UserNum']."'"));
 
 if($_POST['sbmtBanConta'])
 {
   $txtDiasBan = $_POST['txtDiasBan'];
   $txtMotivo  = $_POST['txtMotivo'];
   $txtId      = $_POST['txtId'];
   $txtUserNum = $_POST['txtUserNum'];	 
   
   if(eregi("[^0-9]", $txtDiasBan))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em Dias Ban.</div>';
   }
   elseif(strlen($txtDiasBan) < 1)
   { 
     echo'<div class=\'ferrorbig\'>Dias ban obrigatorio.</div>';
   }
   else
   {
   $ssLogin = $_SESSION['ss_txtLogin'];
   include('../funcGmPanel/funcLogs.php');
    echo BanConta($txtId,$txtDiasBan,$txtMotivo,$txtUserNum,$ssLogin);
	
	   mssql_query("INSERT INTO ".DB_ACC.".dbo.Cabal_Banidos 
	   (UserNum, ID, MotivoBan, DataBan, TempoBan, RespBan, RespDesban, DataDesban, Status)
	   VALUES
	   ('".$txtUserNum."', '".$txtId."', '".$txtMotivo."', getdate(), '".$txtDiasBan."', '".$_SESSION['ss_txtLogin']."', NULL,NULL,0)
	   UPDATE ".DB_ACC.".dbo.cabal_auth_table SET
	   AuthType = 2,
	   TempoBan = '".$txtDiasBan."'
	   WHERE ID = '".$txtId."'");
		echo'<div class=\'ferrorbig\'>Conta bloqueada com sucesso.</div>';
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
    <div class="ftitle">BANIR CONTA</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
    <div style="">
    <div class="fdesc" align="right">
        <a onclick="new Ajax.Updater('container','_gmPanel/_executarJogo/ex.pesqConta.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#"> Pesquisar conta</a> > <a href="#" onclick="new Ajax.Updater('container', '_gmPanel/_executarJogo/ex.pesqConta.php?ID=<?=$PegaBan['ID']?>', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" >Checar conta</a> > Banir conta    
</div>
    </div>
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Conta</label></div>
      <div class="finput" style="">
        <?=$PegaAcc['ID']?>
        <input name="txtId" maxlength="20" value="<?=$PegaAcc['ID']?>" type="hidden"  class="ffield"/>
        <input name="txtUserNum" maxlength="20" value="<?=$PegaAcc['UserNum']?>" type="hidden"  class="ffield"/>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Motivo Ban</label></div>
      <div class="finput" style="">
       <select class="fsubmit" style="padding: 0; text-align: left; width: 98%; margin: 0;" name="txtMotivo">
        <option value="0">Ofença</option>
        <option value="1">Falsa doação </option>
        <option value="2">Desrespeito a equipe</option>
        <option value="3">Comercio de contas </option>
        <option value="4">Falso ADM/GM/DV </option>
        <option value="5">Progamas proibidos</option>
       </select>
      </div>
      <div class="clear"></div>
    </div>
    
     <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Dias Ban</label></div>
      <div class="finput" style="">
        <input name="txtDiasBan" maxlength="4" value="" type="text"  class="ffield" onkeypress="return SomenteNumero(event)"/>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Responsavel Ban</label></div>
      <div class="finput" style="">
        <?=$_SESSION['ss_txtLogin']?>
      </div>
      <div class="clear"></div>
    </div>
 
     <div class="flabel" style="text-align: center;">
     <input name="sbmtBanConta" class="fsubmit" type="button" value="Enviar" onclick="new Ajax.Updater('checar', '_gmPanel/_executarJogo/ex.pesqBan.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.editar)}); esperar('checar');"></div>
    <div style="height: 5px;"></div>
</div>
</div>

</form>




<?php
 }
?>

<div id="checar" name="checar"></div>

