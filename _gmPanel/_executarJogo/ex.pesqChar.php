<?php
 include('../funcGmPanel/funcDados.php');

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
    <div class="ftitle">CHECAR CHAR</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
    <div style="">
    <div class="fdesc" align="right">
       <a onclick="new Ajax.Updater('container','_gmPanel/ap.edtConta.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#"> Pesquisar char</a> > Checar char  
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
        <?=$PegaCharResult['Name']?>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Nação</label></div>
      <div class="finput" style="">
         <?
		switch($PegaCharResult['Nation'])
		{
			case 0 : echo'Neutro'; break;
			case 1 : echo'Capella'; break;
			case 2 : echo'Procyon'; break;
			case 3 : echo'Game Master'; break;
		}
		?>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Level</label></div>
      <div class="finput" style="">
        <?=$PegaCharResult['LEV']?>
       
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Reset</label></div>
      <div class="finput" style="">
      <?=$PegaCharResult['Reset']?>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Master Reset</label></div>
      <div class="finput" style="">
       <?=$PegaCharResult['Reset2']?>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Pontos</label></div>
      <div class="finput" style="">
        <?=$PegaCharResult['PNT']?>
      </div>
      <div class="clear"></div>
    </div>
 
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Str</label></div>
      <div class="finput" style="">
        <?=$PegaCharResult['STR']?>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Int</label></div>
      <div class="finput" style="">
      <?=$PegaCharResult['INT']?>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Dex</label></div>
      <div class="finput" style="">
       <?=$PegaCharResult['DEX']?>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Alz</label></div>
      <div class="finput" style="">
        <?=number_format($PegaCharResult['Alz'])?>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Status</label></div>
      <div class="finput" style="">
     
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
	     echo '<a href="#" onclick="new Ajax.Updater(\'container\', \'_gmPanel/_executarJogo/ex.pesqConta.php?ID='.$PegaAccResult['ID'].'\', {method: \'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" >'.$PegaAccResult['ID'].' </a>';
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
			case 1 : echo'<font color=green>Normal</font> (<a href="#" onclick="new Ajax.Updater(\'container\', \'_gmPanel/_executarJogo/ex.pesqBan.php?UserNum='.$PegaAccResult['UserNum'].'\', {method: \'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" >Deseja Bloquear ?</a>)'; break;
			case 2 : echo'<font color=red>Bloqueado</font> (<a href="#" onclick="new Ajax.Updater(\'container\', \'_gmPanel/_executarJogo/ex.pesqDesban.php?UserNum='.$PegaAccResult['UserNum'].'\', {method: \'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" >Deseja Desbloquear ?</a>)'; break;	
		}
		?>
      </div>
      <div class="clear"></div>
    </div>
    
 
</div>
</form>


<div id="checar" name="checar">

</div>