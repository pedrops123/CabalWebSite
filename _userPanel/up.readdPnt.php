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
  if($ck_Vip['ServiceKind'] <= 1)
  { 
      include('./_erros/offPanel.php'); 
  }
  elseif($_POST['sbmtReaddPnt'])
  {   
        $txtChar= $_POST['txtChar'];
   $ck_Pnt = mssql_fetch_row(mssql_query("SELECT CharacterIdx/8,Login,PNT,STR,INT,DEX FROM ".DB_GAM.".dbo.cabal_character_table WHERE CharacterIdx/8='".$IdxAcc."' and  Name ='".$txtChar."'"));
		$Limite = $ck_Pnt[2]+$ck_Pnt[3]+$ck_Pnt[4]+$ck_Pnt[5];
		   
	        if($ck_Pnt[0] <> $IdxAcc)
	        {
			 echo BurlarReaddPnt($txtConta);
		    }
			elseif($ck_Pnt[1] >= 1)
	        {
			 echo'<div class=\'ferrorbig\'>É preciso estar offline do jogo para continuar esta operação.</div>';
		    }
			else
			{
			 echo ReaddPnt($Limite,$txtChar,$IdxAcc);
			}
		 mssql_close();	
	   }
	   else
	   {		 
?>
<div class="fbar">
  <div class="ftitle">REDISTRIBUIDOR DE PONTOS</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
    <div class="fdesc">
      <b>Requisitos</b>:<br>
       - Sua conta deve estar <font color="#FF0000"><u>OFFLINE</u></font>.
      <br /> <br />
      <b>Notas</b>:<br>
       - Pega sua STR + INT + DEX + PNT e acumula para distribui-los novamente.<br />
  
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
      <div class="fitem" style=""><label for="rusername">Escolha seu char</label></div>
      <div class="finput" style="">
      
       <select name="txtChar" class="fsubmit" style="padding: 0; text-align: left; width: 100%; margin: 0;">
        <?php
         for ($i=1;
		      $i <= mssql_num_rows($ck_Char);
			  $i++)
		  { 
		   $ck_Char_Result = mssql_fetch_array($ck_Char);
		   echo'<option value="'.$ck_Char_Result['Name'].'">
		         '.$ck_Char_Result['Name'].' -- [TOTAL:  '.number_format($ck_Char_Result['PNT']+$ck_Char_Result['STR']+$ck_Char_Result['INT']+$ck_Char_Result['DEX']).']
		        </option>';
            }
		  ?> 
        </select> 
          </div>
      <div class="clear"></div>
    </div>
    <div class="flabel" style="text-align: center;"><input name="sbmtReaddPnt" class="fsubmit" type="button" value="ENVIAR" onclick="new Ajax.Updater('errors', '_userPanel/up.readdPnt.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.formnation)}); esperar('errors');"></div>
    <div style="height: 5px;"></div>

</form>
  </div>
</div>
<div id="errors" name="errors"></div>
<?php
	   }
  }
  
?>