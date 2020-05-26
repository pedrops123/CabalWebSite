<?php
 include('../funcAdmPanel/funcDados2.php');
 
 $PegaAcc  = mssql_fetch_array(mssql_query("select * from ".DB_ACC.".dbo.cabal_auth_table where UserNum = '".$_GET['UserNum']."'"));
 
 if($_POST['sbmtEnvItem'])
 {
 
   $txtMotivo  = $_POST['txtMotivo'];
   $txtId      = $_POST['txtId'];
   $txtItem    = $_POST['txtItem'];
   $txtOpt     = $_POST['txtOpt'];
   $txtapri    = $_POST['txtapri'];
   $txtDur     = $_POST['txtDur'];
   $txtQuant   = $_POST['txtQuant'];
   $txtType    = $_POST['txtType'];

function anti_injection($sql, $formUse = true)	
{	
$sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/i","",$sql);	
$sql = trim($sql);
$sql = strip_tags($sql);	

$sql = addslashes($sql);	
return $sql;	
}	
   
   switch(anti_injection($_GET['txtDur'])) 
	 {
	  case 11: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	  case 12: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	  case 13: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	  case 14: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	  case 16: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	  case 17: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	  case 18: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	  case 19: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	  case 20: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	  case 21: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	  case 22: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	  case 24: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	  case 25: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	  case 26: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	  case 27: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	  case 28: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	  case 29: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	  case 30: echo'<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	 }
   
   $verificaLogin = mssql_query("SELECT 1 FROM ".DB_ACC.".dbo.cabal_auth_table WHERE ID ='". $txtId ."';");
   $LoginVER = mssql_num_rows($verificaLogin);
   
   if($LoginVER <= 0) 
   {
	  echo'<div class=\'ferrorbig\'>Login nao encontrado.</div>';
   }  
   elseif($txtItem == "")
   { 
     echo'<div class=\'ferrorbig\'>Campo Item Obrigatorio.</div>';
   }
   elseif($txtMotivo == "")
   { 
     echo'<div class=\'ferrorbig\'>E Obrigatorio especificar o motivo</div>';
   }
   elseif($txtOpt == "")
   { 
     echo'<div class=\'ferrorbig\'>Campo Option Obrigatorio.</div>';
   }
   elseif($txtDur == "")
   { 
     echo'<div class=\'ferrorbig\'>Campo de duracao do Item Obrigatorio.</div>';
   }
   elseif($txtQuant == "")
   { 
     echo'<div class=\'ferrorbig\'>Campo Quantidade de Itens Obrigatorio</div>';
   }
   elseif($txtType == "")
   { 
     echo'<div class=\'ferrorbig\'>Campo Tipo do Item Obrigatorio.</div>';
   }
   elseif($txtId == "")
   { 
     echo'<div class=\'ferrorbig\'>Campo Login Obrigatorio.</div>';
   }
   elseif($txtapri == "")
   { 
     echo'<div class=\'ferrorbig\'>Campo aprimoramento obrigatorio.</div>';
   }
   elseif($txtDur < 10 || $txtDur > 31)
	{
	   echo '<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	}
	elseif($txtType > 3)
	{
	   echo '<div class=\'ferrorbig\'>Nao tente burlar o sistema.</div>';
	}
elseif($txtQuant > 10)
	{
	   echo '<div class=\'ferrorbig\'>Limite de unidades excedida.</div>';
	}
elseif($txtapri > 15)
	{
	   echo '<div class=\'ferrorbig\'>Limite de aprimoramento excedido.</div>';
	}
   elseif(eregi("[^0-9]", $txtDur))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas n�meros na duracao do Item.</div>';
   }
   elseif(eregi("[^0-9]", $txtItem))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas n�meros no ID do Item.</div>';
   }
   elseif(eregi("[^0-9]", $txtOpt))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas n�meros na Option do Item.</div>';
   }
   elseif(eregi("[^0-9]", $txtQuant))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas n�meros na quantidade de Itens.</div>';
   }
   elseif(eregi("[^0-9]", $txtapri))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas o aprimoramento do item.</div>';
   }
   elseif(eregi("[^0-9]", $txtType))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas n�meros no tipo de uso.</div>';
   }
   else
   {
   $ssLogin = $_SESSION['ss_txtLogin'];
   include('../funcAdmPanel/funcEditorLOG.php');
    echo Editor($ssLogin,$txtId,$txtMotivo,$txtItem,$txtOpt,$txtDur,$txtapri,$txtType);
	
	    mssql_query("EXEC CabalCash.dbo.enviaritem '".$txtId."','".$txtItem."','".$txtOpt."','".$txtDur."','".$txtapri."','".$txtQuant."','".$txtType."'");
	   
		echo'<div class=\'ferrorbig\'>Item enviado com sucesso, seu envio foi registrado por seguranca.</div>';
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
    <div class="ftitle">ENVIAR ITEM</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
    <div style="">
    </div>
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Conta (Login)</label></div>
      <div class="finput" style="">
        <input name="txtId" maxlength="20" value="" style="width: 80px;" type="text"  class="ffield"/>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Motivo do Envio (Valido)</label></div>
      <div class="finput" style="">
       <input name="txtMotivo" maxlength="20" value="" type="text"  class="ffield"/>
      </div>
      <div class="clear"></div>
    </div>
    
     <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Item ID</label></div>
      <div class="finput" style="">
        <input name="txtItem" maxlength="6" value="" style="width: 40px;" type="text"  class="ffield" onkeypress="return SomenteNumero(event)"/>
      </div>
      <div class="clear"></div>
    </div>

     <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Aprimoramento</label></div>
      <div class="finput" style="">
        <input name="txtapri" maxlength="2" value="0" style="width: 40px;" type="text"  class="ffield" onkeypress="return SomenteNumero(event)"/>
      </div>
      <div class="clear"></div>
    </div>
	
	<div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Item Option</label></div>
      <div class="finput" style="">
        <input name="txtOpt" maxlength="15" value="0" type="text" style="width: 60px;"  class="ffield" onkeypress="return SomenteNumero(event)"/>
      </div>
      <div class="clear"></div>
    </div>
	

	<div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Quantidade (Max: 10)</label></div>
      <div class="finput" style="">
        <input name="txtQuant" maxlength="2" value="1" type="text" style="width: 20px;"  class="ffield" onkeypress="return SomenteNumero(event)"/>
      </div>
      <div class="clear"></div>
    </div>
	
	<div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Duracao</label></div>
      <div class="finput" style="">
        <select class="ssubmit" style="padding: 0px; text-align: left; width: 110px;" id="time" name="txtDur">
                      <option value=11 selected>5 Dias</option>
                      <option value=15>15 Dias</option>
                      <option value=17>30 Dias</option>
                      <option value=31>Permanente</option>
                    </select>
      </div>
      <div class="clear"></div>
    </div>
	
	<div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Tipo</label></div>
      <div class="finput" style="">
        <select class="ssubmit" style="padding: 0px; text-align: left; width: 110px;" id="time" name="txtType">
                      <option value=1>Ligado ao Personagem quando Equipar</option>
                      <option value=2 selected>Ligado a Conta</option>
                      <option value=0>Livre</option>
                    </select>
      </div>
      <div class="clear"></div>
    </div>

 
     <div class="flabel" style="text-align: center;">
     <input name="sbmtEnvItem" class="fsubmit" type="button" value="Enviar Item" onclick="new Ajax.Updater('checar', '_admPanel/_executarJogo/ex.envItem.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.editar)}); esperar('checar');"></div>
    <div style="height: 5px;"></div>
</div>
</div>

</form>




<?php
 }
?>

<div id="checar" name="checar"></div>