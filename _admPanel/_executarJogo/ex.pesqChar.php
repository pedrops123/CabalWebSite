<?php
 include('../funcAdmPanel/funcDados2.php');

 $PegaChar = mssql_query("select * from ".DB_GAM.".dbo.cabal_character_table where Name = '".$_GET['Name']."'");
 $PegaCharResult = mssql_fetch_array($PegaChar);
 
 $PegaAcc  = mssql_query("select * from ".DB_ACC.".dbo.cabal_auth_table where UserNum = '".$PegaCharResult['CharacterIdx']."'/8"); 
 $PegaAccResult  = mssql_fetch_array($PegaAcc);
 function decodificar($PegaChar) {
  $sexoChar_array = array('<img src="./images/male.png" width="18" height="18" title="Male"/>',
                          '<img src="./images/female.png" width="18" height="18" title="Female"/>',
						  '<img src="./images/male.png" width="18" height="18" title="Male"/>',
						  '<img src="./female.png" width="18" height="18" title="Female"/>',
						  '<img src="./images/male.png" width="18" height="18" title="Male"/>',
						  '<img src="./images/female.png" width="18" height="18" title="Female"/>');
						  
  $auraChar_array = array('<b>Sem Aura</b>',
                          '<img src="./images/aura_1.gif" width="18" height="18" title="Aura Terra"/>',
						  '<img src="./images/aura_2.gif" width="18" height="18" title="Aura Água"/>',
						  '<img src="./images/aura_3.gif" width="18" height="18" title="Aura Vento"/>',
						  '<img src="./images/aura_4.gif" width="18" height="18" title="Aura Fogo"/>',
						  '<img src="./images/aura_5.gif" width="18" height="18" title="Aura Gelo"/>',
						  '<img src="./images/aura_6.gif" width="18" height="18" title="Aura Trovão"/>');
						  
  $classeChar_array = array(4=>'<img src="./images/aa.gif"  title="Arqueiro Arcano"/>',
                            5=>'<img src="./images/ga.gif"  title="Guardião Arcano"/>',
					        6=>'<img src="./images/ea.gif"  title="Espadachim Arcano"/>',
					        9=>'<img src="./images/gu.gif"  title="Guerreiro"/>',
					        10=>'<img src="./images/du.gif"  title="Duelista"/>',
					        11=>'<img src="./images/ma.gif"  title="Mago"/>',
					        12=>'<img src="./images/aa.gif"  title="Arqueiro Arcano"/>',
					        13=>'<img src="./images/ga.gif"  title="Guardião Arcano"/>',
					        14=>'<img src="./images/ea.gif"  title="Espadachim Arcano"/>');
					   
  $style['Aura'] = round(($PegaChar % hexdec(4000000)) / hexdec(200000))/2;
  $style['NomeAura'] = $auraChar_array[$style['Aura']];
  $style['Sexo'] = $sexoChar_array[round($PegaChar / hexdec(4000000))];	
  $style['Classe_Rank'] = round((((($PegaChar % hexdec(4000000)) % hexdec(20000)) % hexdec(2000)) % hexdec(100)) / 8 );
  $style['Classe'] = (((($PegaChar % hexdec(4000000)) % hexdec(20000)) % hexdec(2000)) % hexdec(100)) -  (($style['Classe_Rank'] -1) * 8) ;
  $style['Classe_Nome'] = $classeChar_array[$style['Classe']] ;
  return $style;  
} 
$classeChar    = decodificar($PegaCharResult['Style']);
$sexoChar      = decodificar($PegaCharResult['Style']);
$auraChar      = decodificar($PegaCharResult['Style']);
  
 if($_POST['sbmtEdtChar'])
 {
   $txtLevel    = $_POST['txtLevel'];
   $txtNation   = $_POST['txtNation'];
   $txtUserNum  = $_POST['txtUserNum'];
   $txtPnt      = $_POST['txtPnt'];
   $txtStr      = $_POST['txtStr'];
   $txtInt      = $_POST['txtInt'];
   $txtDex      = $_POST['txtDex'];
   $txtAlz      = $_POST['txtAlz'];
   $txtChar     = $_POST['txtChar'];
   $txtOnOff    = $_POST['txtOnOff'];	 
   $ssLogin     = $_SESSION['ss_txtLogin'];
   
   if(eregi("[^0-9]", $txtLevel))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em LEVEL.</div>';
   }
   elseif($txtOnOff == 1)
   {
	 echo'<div class=\'ferrorbig\'>Char precisa estar OFFLINE para ser editado.</div>';
   }
   elseif(eregi("[^0-9]", $txtPnt))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em PONTOS.</div>';
   }
   elseif(eregi("[^0-9]", $txtStr))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em STR.</div>';
   }
   elseif(eregi("[^0-9]", $txtInt))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em INT.</div>';
   }
   elseif(eregi("[^0-9]", $txtDex))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em DEX.</div>';
   }
   elseif(eregi("[^0-9]", $txtAlz))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em Alz.</div>';
   }
   elseif(strlen($txtAlz) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo ALZ ,obrigatorio no minimo 1 digito.</div>';
   }
   elseif(strlen($txtStr) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo STR ,obrigatorio no minimo 1 digito.</div>';
   }
   elseif(strlen($txtInt) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo INT ,obrigatorio no minimo 1 digito.</div>';
   }
   elseif(strlen($txtDex) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo DEX ,obrigatorio no minimo 1 digito.</div>';
   }
   elseif(strlen($txtPnt) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo PONTOS ,obrigatorio no minimo 1 digito.</div>';
   }
   elseif(strlen($txtChar) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo CHAR ,obrigatorio no minimo 1 digito.</div>';
   }
   else
   { 
    include('../funcAdmPanel/funcLogs.php');
    echo EditChar($txtChar,$txtNation,$txtPnt,$txtLevel,$txtAlz,$txtStr,$txtInt,$txtDex,$ssLogin);
	   mssql_query("UPDATE ".DB_GAM.".dbo.cabal_character_table SET
	                Name   = '".$txtChar."',
					Nation = '".$txtNation."',
					PNT    = '".$txtPnt."',
					LEV    = '".$txtLevel."',
					Alz    = '".$txtAlz."',
					STR    = '".$txtStr."',
					[INT]  = '".$txtInt."',
					DEX    = '".$txtDex."'
                    WHERE CharacterIdx = '".$txtUserNum."'");
		echo'<div class=\'ferrorbig\'>Char editado com sucesso.</div>';
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
    <div class="ftitle">EDITAR CHAR</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
    <div style="">
    <div class="fdesc" align="right">
       <a onclick="new Ajax.Updater('container','_admPanel/ap.edtConta.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#"> Pesquisar char</a> > Editar char  
</div>
    </div>
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Idx</label></div>
      <div class="finput" style="">
        <?=$PegaCharResult['CharacterIdx']?>
        <input name="txtUserNum" maxlength="50" value="<?=$PegaCharResult['CharacterIdx']?>" type="hidden"  class="ffield"/>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Char</label></div>
      <div class="finput" style="">
        <input name="txtChar" type="text" maxlength="20" value="<?=$PegaCharResult['Name']?>"  class="ffield" />
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Nação</label></div>
      <div class="finput" style="">
         <?
		switch($PegaCharResult['Nation'])
		{
			case 0 : echo'<select class="fsubmit" style="padding: 0; text-align: left; width: 98%; margin: 0;" name="txtNation"><option value="0" selected>Neutro </option><option value="1">Capella </option><option value="2">Procyon </option><option value="3">Game Master </option></select>'; break;
			case 1 : echo'<select class="fsubmit" style="padding: 0; text-align: left; width: 98%; margin: 0;" name="txtNation"><option value="0" >Neutro </option><option value="1" selected>Capella </option><option value="2">Procyon </option><option value="3">Game Master </option></select>'; break;
			case 2 : echo'<select class="fsubmit" style="padding: 0; text-align: left; width: 98%; margin: 0;" name="txtNation"><option value="0">Neutro </option><option value="1">Capella </option><option value="2" selected>Procyon </option><option value="3">Game Master </option></select>'; break;
			case 3 : echo'<select class="fsubmit" style="padding: 0; text-align: left; width: 98%; margin: 0;" name="txtNation"><option value="0" >Neutro </option><option value="1">Capella </option><option value="2">Procyon </option><option value="3" selected>Game Master </option></select>'; break;
		}
		?>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Level</label></div>
      <div class="finput" style="">
        <input name="txtLevel" maxlength="4" value="<?=$PegaCharResult['LEV']?>" type="text"  class="ffield" onkeypress="return SomenteNumero(event)"/>
       
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Pontos</label></div>
      <div class="finput" style="">
        <input name="txtPnt" type="text" maxlength="10" value="<?=$PegaCharResult['PNT']?>"  class="ffield" onkeypress="return SomenteNumero(event)"/>
      </div>
      <div class="clear"></div>
    </div>
 
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Str</label></div>
      <div class="finput" style="">
         <input name="txtStr" type="text" maxlength="10" value="<?=$PegaCharResult['STR']?>"  class="ffield" onkeypress="return SomenteNumero(event)"/>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Int</label></div>
      <div class="finput" style="">
       <input name="txtInt" type="text" maxlength="10" value="<?=$PegaCharResult['INT']?>"  class="ffield" onkeypress="return SomenteNumero(event)"/>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Dex</label></div>
      <div class="finput" style="">
        <input name="txtDex" type="text" maxlength="10" value="<?=$PegaCharResult['DEX']?>"  class="ffield" onkeypress="return SomenteNumero(event)"/>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Alz</label></div>
      <div class="finput" style="">
        <input name="txtAlz" type="text" maxlength="10" value="<?=$PegaCharResult['Alz']?>"  class="ffield" onkeypress="return SomenteNumero(event)"/>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Status</label></div>
      <div class="finput" style="">
      <input name="txtOnOff" type="hidden" maxlength="2" value="<?=$PegaCharResult['Login']?>"  class="ffield" />
        <?
		switch($PegaCharResult['Login'])
		{
			case 0 : echo'<font color=red>Offline</font>'; break;
			case 1 : echo'<font color=green>Online</font>'; break;
		}
		?>
      </div>
      <div class="clear"></div>
    </div>
    
     <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Classe</label></div>
      <div class="finput" style="">
        <?=$classeChar['Classe_Nome'];
	       unset($classeChar);
		?>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Aura</label></div>
      <div class="finput" style="">
        <?=$auraChar['NomeAura'];
	       unset($auraChar);
		?>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Sexo</label></div>
      <div class="finput" style="">
        <?=$sexoChar['Sexo'];
	       unset($sexoChar);
		?>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Canal</label></div>
      <div class="finput" style="">
         <?=$confCabal['CANAL'][$PegaCharResult['ChannelIdx']]?>
      </div>
      <div class="clear"></div>
    </div>
    
     <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Mapa</label></div>
      <div class="finput" style="">
        <?=$confCabal['MAPA'][$PegaCharResult['WorldIdx']]?>
      </div>
      <div class="clear"></div>
    </div>
    
     <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Char Criado</label></div>
      <div class="finput" style="">
        <?=date('d-m-Y H:m',strtotime($PegaCharResult['CreateDate']))?>
      </div>
      <div class="clear"></div>
    </div>
       
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Ultima Conexão</label></div>
      <div class="finput" style="">
        <?=date('d-m-Y H:m',strtotime($PegaCharResult['LogoutTime']))?>
      </div>
      <div class="clear"></div>
    </div>
    
      
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Conta</label></div>
      <div class="finput" style="">
      <?
	     echo '<a href="#" onclick="new Ajax.Updater(\'container\', \'_admPanel/_executarJogo/ex.pesqConta.php?ID='.$PegaAccResult['ID'].'\', {method: \'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" >'.$PegaAccResult['ID'].' </a>';
	  ?>	 	    
      </div>
      <div class="clear"></div>
    </div>
    
     <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Estado Conta</label></div>
      <div class="finput" style="">
         <?
		switch($PegaAccResult['AuthType'])
		{
			case 1 : echo'<font color=green>Normal</font> (<a href="#" onclick="new Ajax.Updater(\'container\', \'_admPanel/_executarJogo/ex.pesqBan.php?UserNum='.$PegaAccResult['UserNum'].'\', {method: \'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" >Deseja Bloquear ?</a>)'; break;
			case 2 : echo'<font color=red>Bloqueado</font> (<a href="#" onclick="new Ajax.Updater(\'container\', \'_admPanel/_executarJogo/ex.pesqDesban.php?UserNum='.$PegaAccResult['UserNum'].'\', {method: \'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" >Deseja Desbloquear ?</a>)'; break;	
		}
		?>
      </div>
      <div class="clear"></div>
    </div>
    
     <div class="flabel" style="text-align: center;">
     <input name="sbmtEdtChar" class="fsubmit" type="button" value="Editar" onclick="new Ajax.Updater('checar', '_admPanel/_executarJogo/ex.pesqChar.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.editar)}); esperar('checar');"></div>
    <div style="height: 5px;"></div>
</div>
</div>
</form>

<?php
 }
?>

<div id="checar" name="checar">

</div>