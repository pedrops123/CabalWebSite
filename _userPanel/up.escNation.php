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
  if($_POST['sbmtNation'])
  {  
		
		$txtNation = $_POST['txtNation'];
		$txtChar   = $_POST['txtChar'];

        $ck_Burlar = mssql_fetch_row(mssql_query("SELECT CharacterIdx/8,Alz,LEV,Login,Nation FROM ".DB_GAM.".dbo.cabal_character_table WHERE CharacterIdx/8='".$IdxAcc."' and  Name ='".$txtChar."'"));
	
	       if($ck_Burlar[0] <> $IdxAcc)
	        {
			 echo BurlarNacao($txtConta);
		    }
		    elseif($txtNation >= 3 || $txtNation < 0)
		    {
			 echo BurlarNacaoGm($txtConta);
		    }	
		    elseif(eregi("[^1-2]", $txtNation))
			{
	         echo BurlarNacaoGm($txtConta);
		    }
		    elseif($ck_Burlar[2] < $confCabal['LVLN'])
			{
	         echo'<div class=\'ferrorbig\'>Você não possui <u>LEVEL</u> suficiente para obter nação.</div>';
			}
			elseif($ck_Burlar[1] < $confCabal['ALZN'])
			{
	         echo'<div class=\'ferrorbig\'>Você não possui <u>ALZ</u> suficiente para obter nação.</div>';
			}
			elseif($ck_Burlar[3] >= 1)
			{
	         echo'<div class=\'ferrorbig\'>É preciso estar offline do jogo para continuar esta operação.</div>';
			}
			elseif($ck_Burlar[4] >= 1)
			{
	         echo'<div class=\'ferrorbig\'>'.$txtChar.' já possui nação.</div>';
			}
			else
			{
			 echo Nacao($txtChar,$txtNation,$txtAlz);
			}
 
		 mssql_close();	
	   }
	   else
	   {
?>

<div class="fbar">
  <div class="ftitle">ESCOLHA SUA NAÇÃO</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
    <div class="fdesc">
      <b>Requisitos</b>:<br>
      - Você tem direito a 1 nação por char,não podendo trocar.<br>
      - Seu personagem selecionado deve estar no nível <font color="#FFFF00"><u><?=$confCabal['LVLN']?></u></font> ou acima.<br>
      - Seu personagem selecionado deve ter <font color="#FFFF00"><u><?=number_format($confCabal['ALZN'])?></u></font> alz ou acima.<br>
      <br>
      <b>Notas</b>:<br>
      - Com este sistema não há necessidade de fazer quest.<br />
      - Seu personagem deve estar <font color="#FF0000"><u>OFFLINE</u></font> para obter sua nação.
    </div>
<form name="formnation">
   
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Selecione Char</label></div>
      <div class="finput" style="">
        <select name="txtChar" class="fsubmit" style="padding: 0; text-align: left; width: 100%; margin: 0;">
        <?php
         for ($i=1;
		      $i <= mssql_num_rows($ck_Char);
			  $i++)
		  { 
		   $ck_Char_Result = mssql_fetch_array($ck_Char);
		   echo'<option value="'.$ck_Char_Result['Name'].'">
		         '.$ck_Char_Result['Name'].' [LVL: '.$ck_Char_Result['LEV'].'] -- [Alz: '.number_format($ck_Char_Result['Alz']).']
		        </option>';
            }
		  ?> 
        </select>      </div>
      <div class="clear"></div>
    </div>
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Selecione Nação</label></div>
      <div class="finput" style="">
        <select id="nation" name="txtNation" class="fsubmit" style="padding: 0; text-align: left; width: 100%; margin: 0;">
          <option value="1">Capella</option>
          <option value="2">Procyon</option>
        </select>
      </div>
      <div class="clear"></div>
    </div>
    <div class="flabel" style="text-align: center;"><input name="sbmtNation" class="fsubmit" type="button" value="ENVIAR" onclick="new Ajax.Updater('errors', '_userPanel/up.escNation.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.formnation)}); esperar('errors');"></div>
    <div style="height: 5px;"></div>

</form>
  </div>
</div>
<div id="errors" name="errors"></div>
<?php
	   }
  }
?>