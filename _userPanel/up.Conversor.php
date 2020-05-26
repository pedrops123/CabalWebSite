<?php
include('_funcUserPanel/funcDados.php');
include('_funcUserPanel/funcExecutar.php');
include('_funcUserPanel/funcLogs.php');
 if($ck_Conta['AuthKey'] == FALSE)
  { 
      include('../_erros/UserPanel.php'); 
  }
  else 
  {
	   if($ck_Config['Conversor'] == 0)
  { 
      include('./_erros/offPanel.php'); 
  }
  else 
  {
  if($_POST['sbmtHoras'])
  {  
      $ck_Horas = mssql_fetch_row(mssql_query("SELECT PlayTime/60 FROM ".DB_ACC.".dbo.cabal_auth_table WHERE Id = '".$txtConta."'"));
		$txtHoras   = anti_injection($_POST['txtHoras'])* $ck_Config['ExpConversor'];
	    $txtMinutos = $ck_Horas[0];
		$txtSoma    =  $_POST['txtHoras'] * 60;
		
	        if($_POST['txtHoras'] <= 0)
			{
	         echo'<div class=\'ferrorbig\'>Você não possui <u>HORAS</u> suficiente para converter.</div>';
			}
			elseif($_POST['txtHoras'] > $txtMinutos)
			{
	         echo'<div class=\'ferrorbig\'>Você ultrapassou quantidade de <u>HORAS</u> disponiveis.</div>';
			}
			elseif(eregi("[^0-9]", $txtHoras))
			{
	         echo'<div class=\'ferrorbig\'>Digite apenas números.</div>';
			}
			else
			{
			 echo Conversor($txtHoras,$txtSoma,$IdxAcc);
			}
		 mssql_close();	
	   }
	   else
	   {
		   $qtempo = mssql_fetch_row(mssql_query("SELECT PlayTime/60 FROM ".DB_ACC.".dbo.cabal_auth_table WHERE Id = '".$txtConta."'"));
?>

<div class="fbar">
  <div class="ftitle"><?=$confCabal['NOME_MOEDA_EVENT']?> CONVERSOR</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
    <div class="fdesc">
      <b>Requisitos</b>:<br>
   
      - Sua conta deve estar <font color="#FF0000"><u>OFFLINE</u></font> para converter.
   
     
      <br />
      <br>
       <b>Notas</b>:<br>
   
      - Com <u><b><img src="images/pc2.png" /> <?=$confCabal['NOME_MOEDA_EVENT']?></b></u> você pode resetar seu personagem e comprar items em nosso WEBSHOP.<br />
      - Com o conversor você adquire seus <u><?=$confCabal['NOME_MOEDA_EVENT']?></u> pelas horas de jogo realizados.<br>
      - A cada 1 hora jogado você converte em <u><b><?=$ck_Config['ExpConversor']?> <img src="images/pc2.png" title="<?=$confCabal['NOME_MOEDA_EVENT']?> "/></b></u>.
      <br>- EVO-Points sao as moedas do Shop In-Game, aberto pela tecla "N".
      <br />
     
     
</div>
    </div>
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
<form name="formnation">
   <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Total de horas</label></div>
      <div class="finput" style="">
      
       <? if($qtempo[0] == 0) { echo ''.$qtempo[0].' Hora';} else { echo ''.$qtempo[0].' Horas';} ?> 
          </div>
      <div class="clear"></div>
    </div>
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Quantidade a ser convertida</label></div>
      <div class="finput" style="">
        <input name="txtHoras" maxlength="5" onkeypress="return SomenteNumero(event)" class="ffield" style="padding: 0; text-align: left; width: 100%; margin: 0;">
          </div>
      <div class="clear"></div>
    </div>
   
    <div class="flabel" style="text-align: center;"><input name="sbmtHoras" class="fsubmit" type="button" value="ENVIAR" onclick="new Ajax.Updater('errors', '_userPanel/up.Conversor.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.formnation)}); esperar('errors');"></div>
    <div style="height: 5px;"></div>

</form>
  </div>
</div>
<div id="errors" name="errors"></div>
<?php
	   }
  }
  }
?>