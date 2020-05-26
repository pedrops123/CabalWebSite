<?php
 include('../funcGmPanel/funcDados.php');
 
 $PegaAcc  = mssql_fetch_array(mssql_query("select * from ".DB_ACC.".dbo.cabal_auth_table where ID = '".$_GET['ID']."'"));
 $PegaVip  = mssql_fetch_array(mssql_query("select * from ".DB_ACC.".dbo.cabal_charge_auth where UserNum = '".$PegaAcc['UserNum']."'"));
 $PegaCash = mssql_fetch_array(mssql_query("select * from CabalCash.dbo.CashAccount where UserNum = '". $PegaAcc['UserNum']."'"));
 $PegaChar = mssql_query("select * from ".DB_GAM.".dbo.cabal_character_table where CharacterIdx/8 = '".$PegaAcc['UserNum']."'");  
  
	          
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
    <div class="ftitle">CHECAR CONTA</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
    <div style="">
    <div class="fdesc" align="right">
       <a onclick="new Ajax.Updater('container','_gmPanel/_executarSite/ex.edtConta.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#"> Pesquisar conta</a> > Checar conta  
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
       <?=$PegaAcc['Email']?>
      </div>
      <div class="clear"></div>
    </div>
 
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Tipo Conta</label></div>
      <div class="finput" style="">
        <?
		switch($PegaVip['ServiceKind'])
		{
			case 1 : echo'FREE'; break;
			case 2 : echo'VIP'; break;
			case 3 : echo'VIP'; break;
		}
		?>
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
      <div class="fitem" style=""><label for="rusername">Estado Conta</label></div>
      <div class="finput" style="">
         <?
		switch($PegaAcc['AuthType'])
		{
			case 1 : echo'<font color=green>Normal</font> (<a href="#" onclick="new Ajax.Updater(\'container\', \'_gmPanel/_executarJogo/ex.pesqBan.php?UserNum='.$PegaAcc['UserNum'].'\', {method: \'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" >Deseja Bloquear ?</a>)'; break;
			
			case 2 : echo'<font color=red>Bloqueado</font> (<a href="#" onclick="new Ajax.Updater(\'container\', \'_gmPanel/_executarJogo/ex.pesqDesban.php?UserNum='.$PegaAcc['UserNum'].'\', {method: \'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" >Deseja Desbloquear ?</a>)'; break;
			
			case 5 : echo'<font color=orange>Conta não ativada</font> (<a href="#" onclick="new Ajax.Updater(\'container\', \'_gmPanel/_executarJogo/ex.pesqDesban.php?UserNum='.$PegaAcc['UserNum'].'\', {method: \'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" >Deseja Ativar ?</a>)'; break;
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
         <a href="#" onclick="new Ajax.Updater('container', '_gmPanel/_executarJogo/ex.pesqHistBan.php?UserNum=<?=$PegaAcc['UserNum']?>', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" > Ver </a>
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
	     echo '<a href="#" onclick="new Ajax.Updater(\'container\', \'_gmPanel/_executarJogo/ex.pesqChar.php?Name='.$ck_char_result['Name'].'\', {method: \'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" >'.$ck_char_result['Name'].' </a> | ';
	    }
	    ?>
      </div>
      <div class="clear"></div>
    </div>
    

</form>


<div id="checar" name="checar"></div>