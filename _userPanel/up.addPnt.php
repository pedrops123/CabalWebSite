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
  if($_POST['sbmtAddPnt'])
  {  
        $txtStr = anti_injection($_POST['txtStr']);
	    $txtInt = anti_injection($_POST['txtInt']);
	    $txtDex = anti_injection($_POST['txtDex']);
        $txtChar= anti_injection($_POST['txtChar']);
   $ck_Pnt = mssql_fetch_row(mssql_query("SELECT CharacterIdx/8,PNT,Login FROM ".DB_GAM.".dbo.cabal_character_table WHERE CharacterIdx/8='".$IdxAcc."' and  Name ='".$txtChar."'"));
		$Limite = $txtStr+$txtInt+$txtDex;
		    if($txtStr == "")
			{ 
			 $txtStr = 0;
			}
	        if($txtInt == "")
			{
			 $txtInt = 0;
		    }
	        if($txtDex == "")
			{ 
			 $txtDex = 0; 
			}
	        if($ck_Pnt[0] <> $IdxAcc)
	        {
			 echo BurlarAddPnt($txtConta);
		    }
			elseif($ck_Pnt[2] >= 1)
	        {
			 echo'<div class=\'ferrorbig\'>É preciso estar offline do jogo para continuar esta operação.</div>';
		    }
			elseif(eregi("[^0-9]", $txtStr))
			{
	         echo'<div class=\'ferrorbig\'>Digite apenas números.</div>';
			}
			elseif(eregi("[^0-9]", $txtInt))
			{
	         echo'<div class=\'ferrorbig\'>Digite apenas números.</div>';
			}
			elseif(eregi("[^0-9]", $txtDex))
			{
	         echo'<div class=\'ferrorbig\'>Digite apenas números.</div>';
			}
			elseif($Limite > $ck_Pnt[1] )
			{
	         echo'<div class=\'ferrorbig\'>Você ultrapassou sua quantia máxima de pontos.</div>';
			}
			elseif($txtStr < 0 )
			{
	         echo'<div class=\'ferrorbig\'>Você não possui pontos disponiveis.</div>';
			}
			elseif($txtInt < 0 )
			{
	         echo'<div class=\'ferrorbig\'>Você não possui pontos disponiveis.</div>';
			}
			elseif($txtDex < 0 )
			{
	         echo'<div class=\'ferrorbig\'>Você não possui pontos disponiveis.</div>';
			}
			else
			{
			 echo AddPnt($Limite,$txtStr,$txtInt,$txtDex,$txtChar,$IdxAcc);
			}
		 mssql_close();	
	   }
	   else
	   {		 
?>
<div class="fbar">
  <div class="ftitle">DISTRIBUIDOR DE PONTOS</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
    <div class="fdesc">
      <b>Requisitos</b>:<br>
       - Sua conta deve estar <font color="#FF0000"><u>OFFLINE</u></font>.
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
		         '.$ck_Char_Result['Name'].' -- [PONTOS:  '.$ck_Char_Result['PNT'].']
		        </option>';
            }
		  ?> 
        </select> 
          </div>
      <div class="clear"></div>
    </div>
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">STR</label></div>
      <div class="finput" style="">
        <input name="txtStr" maxlength="4" onkeypress="return SomenteNumero(event)" class="ffield" style="padding: 0; text-align: left; width: 100%; margin: 0;">
          </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">INT</label></div>
      <div class="finput" style="">
        <input name="txtInt" maxlength="4" onkeypress="return SomenteNumero(event)" class="ffield" style="padding: 0; text-align: left; width: 100%; margin: 0;">
          </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">DEX</label></div>
      <div class="finput" style="">
        <input name="txtDex" maxlength="4" onkeypress="return SomenteNumero(event)" class="ffield" style="padding: 0; text-align: left; width: 100%; margin: 0;">
          </div>
      <div class="clear"></div>
    </div>
   
    <div class="flabel" style="text-align: center;"><input name="sbmtAddPnt" class="fsubmit" type="button" value="ENVIAR" onclick="new Ajax.Updater('errors', '_userPanel/up.addPnt.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.formnation)}); esperar('errors');"></div>
    <div style="height: 5px;"></div>

</form>
  </div>
</div>
<div id="errors" name="errors"></div>
<?php
	   }
  }
  
?>