<?php
include('_funcUserPanel/funcDados.php');
if($ck_Conta['Perg'] <= 0) {
echo'
<div class=\'ferrorbig\'>O responsavel pelo seu banimento nao lhe deu o direito de comprar o pergaminho do perdao</div>
';
}
 else {
 $PegaAcc  = mssql_fetch_array(mssql_query("select * from ".DB_ACC.".dbo.cabal_auth_table where ID = '".$txtConta."'"));
 $ck_Burlar = mssql_fetch_array(mssql_query("SELECT UserNum,ID,Cash,CashBonus FROM CabalCash.dbo.CashAccount WHERE UserNum='".$IdxAcc."'"));
  
 if($_POST['sbmtPergaminho'])
 {
 $txtId          = $_SESSION['ss_txtLogin'];
 
 if($ck_Burlar['Cash'] < 5000)
			{
	         echo'<div class=\'ferrorbig\'>Voce n�o possui <u>EVO-Cash</u> suficiente para obter o pergaminho.</div>';
			}
			else{
   include ('_funcUserPanel/funcLogs.php');
   echo Pergaminho($txtId);
	   mssql_query('UPDATE '.DB_ACC.'.dbo.cabal_auth_table set
						AuthType = 1, 
						Perg = Perg - 1
						WHERE UserNum = "'.$IdxAcc.'"
						UPDATE CabalCash.dbo.CashAccount SET
					    Cash = Cash - 5000
					    WHERE UserNum = "'.$IdxAcc.'"');						
					
		echo'<div class=\'ferrorbig\'>Sua conta foi desbanida com sucesso.</div>';
   }}
 
 else
 {
	          
?>
<meta http-equiv="Content-Type"    content="text/html; charset=utf-8" />
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
<form  name="editar" id="editar" accept-charset="utf-8">
  <div class="fbar">
    <div class="ftitle">PERGAMINHO DO PERDAO</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
    <div style="">
	<div class="fdesc">
      <b>Informacoes sobre a Compra</b><br><br>
      - Voce tem direito a compra de <u><font color="#FFFF00"><?
	  $ACC = $_SESSION['ss_txtLogin'];
	  $ACC2  = mssql_fetch_array(mssql_query("select * from ".DB_ACC.".dbo.cabal_auth_table where ID = '".$ACC."'"));
	  echo''.$ACC2['Perg'].'';
	  ?></font></u> pergaminho apenas.<br>
      - Sua conta deve ter <font color="#FFFF00"><u> 5.000 <img src="images/pc.png"></u></font> ou acima.<br>
      <br>
    </div>
    </div>
    
    
     <div class="flabel" style="text-align: center;">
     <input name="sbmtPergaminho" class="fsubmit" type="button" value="Usar Pergaminho" onclick="new Ajax.Updater('checar', '_userPanel/up.Perg.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.editar)}); esperar('checar');"></div>
    <div style="height: 5px;"></div>
</div>
</div>

</form>




<?php
 } }
?>
<div id="checar" name="checar"></div>