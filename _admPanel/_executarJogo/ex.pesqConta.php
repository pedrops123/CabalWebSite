<?php
 include('../funcAdmPanel/funcDados2.php');
 
 $PegaAcc  = mssql_fetch_array(mssql_query("select * from ".DB_ACC.".dbo.cabal_auth_table where ID = '".$_GET['ID']."'"));
 $PegaCash = mssql_fetch_array(mssql_query("select * from CabalCash.dbo.CashAccount where UserNum = '". $PegaAcc['UserNum']."'"));
 $PegaChar = mssql_query("select * from ".DB_GAM.".dbo.cabal_character_table where CharacterIdx/8 = '".$PegaAcc['UserNum']."'");  
  
 if($_POST['sbmtEdtConta'])
 {
   $txtEmail     = $_POST['txtEmail'];
   $txtSenha     = $_POST['txtSenha'];
   $txtSenhaOrig = $_POST['txtSenhaOrig'];
   $txtCash      = $_POST['txtCash'];
   $txtCashEvent = $_POST['txtCashEvent'];
   $txtUserNum   = $_POST['txtUserNum'];
   $txtId        = $_POST['txtId'];	 
   $ssLogin      = $_SESSION['ss_txtLogin'];
   if(eregi("[^0-9]", $txtCash))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em '.$confCabal['NOME_MOEDA'].'.</div>';
   }
   elseif(eregi("[^0-9]", $txtCashEvent))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em '.$confCabal['NOME_MOEDA_EVENT'].'.</div>';
   }
   elseif(strlen($txtEmail) < 5 || strlen($txtEmail) > 50)
   {
	 echo'<div class=\'ferrorbig\'>Campo email, minimo 5 digitos e maximo 50.</div>';
   }
   elseif(eregi("[^0-9a-zA-Z]", $txtSenha))
   {
	 echo'<div class=\'ferrorbig\'>Campo Senha, digitos invalidos.</div>';
   }
   elseif($txtSenha == "")
   { 
   include('../funcAdmPanel/funcLogs.php');
   echo EditConta($txtId,$txtCash,$txtCashEvent,$ssLogin);
	   mssql_query('UPDATE '.DB_ACC.'.dbo.cabal_auth_table set
						Email    = "'.$txtEmail.'"
						WHERE UserNum = "'.$txtUserNum.'"
						UPDATE '.DB_CSH.'.dbo.CashAccount SET
					    Cash = "'.$txtCash.'",
					    CashBonus = "'.$txtCashEvent.'"
					    WHERE UserNum = "'.$txtUserNum.'"');
					
		echo'<div class=\'ferrorbig\'>Conta editada com sucesso.</div>';
   }
   else
   {   
       include('../funcAdmPanel/funcLogs.php');
	   echo EditConta($txtId,$txtCash,$txtCashEvent,$ssLogin);
       mssql_query('UPDATE '.DB_ACC.'.dbo.cabal_auth_table set
						Password = PWDENCRYPT("'.$txtSenha.'"), 
						Email    = "'.$txtEmail.'"
						WHERE UserNum = "'.$txtUserNum.'"
						UPDATE '.DB_CSH.'.dbo.CashAccount SET
					    Cash = "'.$txtCash.'",
					    CashBonus = "'.$txtCashEvent.'"
					    WHERE UserNum = "'.$txtUserNum.'"');
		echo'<div class=\'ferrorbig\'>Conta editada com sucesso.</div>';
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
    <div class="ftitle">EDITAR CONTA</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
    <div style="">
    <div class="fdesc" align="right">
       <a onclick="new Ajax.Updater('container','_admPanel/ap.edtConta.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#"> Pesquisar conta</a> > Editar conta  
</div>
    </div>
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Idx</label></div>
      <div class="finput" style="">
        <?=$PegaAcc['UserNum']?>
        <input name="txtUserNum" maxlength="50" value="<?=$PegaAcc['UserNum']?>" type="hidden"  class="ffield"/>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Conta</label></div>
      <div class="finput" style="">
        <?=$PegaAcc['ID']?>
         <input name="txtId" maxlength="50" value="<?=$PegaAcc['ID']?>" type="hidden"  class="ffield"/>
      </div>
      <div class="clear"></div>
    </div>
    
     <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Ip</label></div>
      <div class="finput" style="">
        <?=$PegaAcc['LastIp']?>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Email</label></div>
      <div class="finput" style="">
        <input name="txtEmail" type="text" maxlength="50" value="<?=$PegaAcc['Email']?>"  class="ffield"/>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Senha</label></div>
      <div class="finput" style="">
        <input name="txtSenha" maxlength="15" value="" type="password"  class="ffield"/>
        <input name="txtSenhaOrig" maxlength="50" value="<?=$PegaAcc['Password']?>" type="hidden"  class="ffield"/>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername"><?=$confCabal['NOME_MOEDA']?></label></div>
      <div class="finput" style="">
      <input name="txtCash" type="text" maxlength="10" value="<?=$PegaCash['Cash']?>" onkeypress="return SomenteNumero(event)"  class="ffield"/> 
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername"><?=$confCabal['NOME_MOEDA_EVENT']?></label></div>
      <div class="finput" style="">
        <input name="txtCashEvent" type="text" maxlength="10" value="<?=$PegaCash['CashBonus']?>"  class="ffield" onkeypress="return SomenteNumero(event)"/>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Status</label></div>
      <div class="finput" style="">
       <?
		switch($PegaAcc['Login'])
		{
			case 0 : echo'<font color=red>Offline</font>'; break;
			case 1 : echo'<font color=green>Online</font>'; break;
		}
		?>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Conta Criada</label></div>
      <div class="finput" style="">
        <?=date('d-m-Y H:m',strtotime($PegaAcc['CreateDate']))?>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Ultima Conexão</label></div>
      <div class="finput" style="">
        <? if($PegaAcc['LogoutTime'] == NULL) { echo '';} else { echo date('d-m-Y h:m',strtotime($PegaAcc['LogoutTime'])); }?>
      </div>
      <div class="clear"></div>
    </div>
       
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Historico (Doação)</label></div>
      <div class="finput" style="">
        <a href="#" onclick="new Ajax.Updater('container', '_admPanel/_executarJogo/ex.pesqHistDonate.php?UserNum=<?=$PegaAcc['UserNum']?>', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" > Ver </a>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Historico (Shop)</label></div>
      <div class="finput" style="">
         <a href="#" onclick="new Ajax.Updater('container', '_admPanel/_executarJogo/ex.pesqHistShop.php?UserNum=<?=$PegaAcc['UserNum']?>', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" > Ver </a>
      </div>
      <div class="clear"></div>
    </div>
    
     <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Estado Conta</label></div>
      <div class="finput" style="">
         <?
		switch($PegaAcc['AuthType'])
		{
			case 1 : echo'<font color=green>Normal</font> (<a href="#" onclick="new Ajax.Updater(\'container\', \'_admPanel/_executarJogo/ex.pesqBan.php?UserNum='.$PegaAcc['UserNum'].'\', {method: \'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" >Deseja Bloquear ?</a>)'; break;
			
			case 2 : echo'<font color=red>Bloqueado</font> (<a href="#" onclick="new Ajax.Updater(\'container\', \'_admPanel/_executarJogo/ex.pesqDesban.php?UserNum='.$PegaAcc['UserNum'].'\', {method: \'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" >Deseja Desbloquear ?</a>)'; break;
			
			case 5 : echo'<font color=orange>Conta não ativada</font> (<a href="#" onclick="new Ajax.Updater(\'container\', \'_admPanel/_executarJogo/ex.pesqDesban.php?UserNum='.$PegaAcc['UserNum'].'\', {method: \'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" >Deseja Ativar ?</a>)'; break;
		}
		?>
      </div>
      <div class="clear"></div>
    </div>
    <?
	if($PegaAcc['AuthType'] == 2)
	{
	?>
     <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Historico (Ban)</label></div>
      <div class="finput" style="">
         <a href="#" onclick="new Ajax.Updater('container', '_admPanel/_executarJogo/ex.pesqHistBan.php?UserNum=<?=$PegaAcc['UserNum']?>', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" > Ver </a>
      </div>
      <div class="clear"></div>
    </div>
    
    <?
	}
	?>
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Chars</label></div>
      <div class="finput" style="">
        <?
		while ($ck_char_result = mssql_fetch_array($PegaChar))
		{
	     echo '<a href="#" onclick="new Ajax.Updater(\'container\', \'_admPanel/_executarJogo/ex.pesqChar.php?Name='.$ck_char_result['Name'].'\', {method: \'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" >'.$ck_char_result['Name'].' </a> | ';
	    }
	    ?>
      </div>
      <div class="clear"></div>
    </div>
    
     <div class="flabel" style="text-align: center;">
     <input name="sbmtEdtConta" class="fsubmit" type="button" value="Editar" onclick="new Ajax.Updater('checar', '_admPanel/_executarJogo/ex.pesqConta.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.editar)}); esperar('checar');"></div>
    <div style="height: 5px;"></div>
</div>
</div>

</form>




<?php
 }
?>

<div id="checar" name="checar"></div>