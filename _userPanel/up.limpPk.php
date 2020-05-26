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
  if($confCabal['LIMPARPK'] <= 0)
  { 
      include('./_erros/offPanel.php'); 
  }
  elseif($_POST['sbmtlimPk'])
  {   
           $txtChar= $_POST['txtChar'];
   $ck_Pk = mssql_fetch_row(mssql_query("SELECT CharacterIdx/8,Login FROM ".DB_GAM.".dbo.cabal_character_table WHERE CharacterIdx/8='".$IdxAcc."' and  Name ='".$txtChar."'"));
	        if($ck_Pk[0] <> $IdxAcc)
	        {
			 echo BurlarLimpPk($txtConta);
		    }
			elseif($ck_Pk[1] >= 1)
	        {
			 echo'<div class=\'ferrorbig\'>É preciso estar offline do jogo para continuar esta operação.</div>';
		    }
             
			else
			{
			 echo LimpPk($txtChar);
			}
		 mssql_close();	
	   }
	   else
	   {		 
?>
<div class="fbar">
  <div class="ftitle">LIMPAR PK</div>
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
		         '.$ck_Char_Result['Name'].' -- [NIVEL PK:  '.$ck_Char_Result['PKPenalty'].']
		        </option>';
            }
		  ?> 
        </select> 
          </div>
      <div class="clear"></div>
    </div>
    <div class="flabel" style="text-align: center;"><input name="sbmtlimPk" class="fsubmit" type="button" value="ENVIAR" onclick="new Ajax.Updater('errors', '_userPanel/up.limpPk.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.formnation)}); esperar('errors');"></div>
    <div style="height: 5px;"></div>

</form>
  </div>
</div>
<div id="errors" name="errors"></div>
<?php
	   }
  }
  
?>