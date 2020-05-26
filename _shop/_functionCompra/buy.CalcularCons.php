 
  <?
  require('../../_conf/confCabal.php');
  
session_start();
  ob_start();
 if(!(isset($_SESSION['ss_txtLogin']) and isset($_SESSION['ss_txtSenha']))) 
  {
	echo header('Location: ../../_erros/err.Shop.php');
  }
   else
  {
	  if(anti_injection($_GET['coin']))
 {
   $PegaId = mssql_fetch_array(mssql_query("select * from CabalCash.dbo.ShopItems where Id='".anti_injection($_GET['Id'])."'")); 
   $PegaAcc= mssql_fetch_array(mssql_query("select * from ".DB_ACC.".dbo.cabal_auth_table where Id='".anti_injection($_SESSION['ss_txtLogin'])."'"));
   $PegaCoin=mssql_fetch_array(mssql_query("select * from CabalCash.dbo.CashAccount where UserNum='".$PegaAcc['UserNum']."'"));
   
   $Unidade     = anti_injection($_GET['unidade']);
   $AccId       = $PegaAcc['UserNum'];
   $AccLogin    = $PegaAcc['ID'];
   $ItemId      = $PegaId['Id'];
   $ItemDur     = $PegaId['Tipo'];
   $ItemName    = $PegaId['Name'];
   $ItemIdx     = $PegaId['ItemIdx'];
   $ItemOpt     = $PegaId['ItemOpt'];
   $ItemCoin    = $PegaId['Cash'];
   $ItemEstoque = $PegaId['Available'];
   $Tira        = $ItemEstoque - 1;
	 $Total = $Unidade*($ItemCoin);
	 
	if($PegaCoin['Cash'] < $Total)
	{
	   echo '<div class=\'ferrorbig\'>Desculpe,mas você não possui '.$confCabal['NOME_MOEDA'].' suficiente. <br><br> 
	            <input class="ssubmit" onclick="new Ajax.Updater(\'container\', \'_shop/shop.index.php\', {method:\'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" type="button" value="VOLTAR" />
	        </div>';
	}
	elseif($Unidade <= 0 or $Unidade > 10)
	{
	   echo '<div class=\'ferrorbig\'>Unidade excedida, você pode comprar no minimo 1 ou no máximo 10 unidades. <br><br> 
	            <input class="ssubmit" onclick="new Ajax.Updater(\'container\', \'_shop/shop.index.php\', {method:\'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" type="button" value="VOLTAR" />
	        </div>';
	}
	elseif(eregi("[^0-9]", $Unidade))
	{
	   echo '<div class=\'ferrorbig\'>Use apenas numeros no campo "Unidades".</div>';
	}
	
	 else
	 {
	  mssql_query("UPDATE CabalCash.dbo.ShopItems SET
	                Available = '".$Tira."',
					QntVend   = QntVend + 1
					WHERE Id  = '".$ItemId."'
				   UPDATE CabalCash.dbo.CashAccount SET
				    Cash = Cash - '".$Total."'
					WHERE UserNum = '".$AccId."'
				   INSERT INTO CabalCash.dbo.shop_log values
				    (".$AccId.",'".date("Y-M-d H:i:s")."','".$ItemName."',31,".$Unidade.",'".$Total."',0)");
					
	  for ($i=1; $i<=$Unidade; $i++) 
	   {
		   $Tempo = '31';
	  mssql_query("EXEC CabalCash.dbo.enviaritem '".$AccLogin."','".$ItemIdx."','".$ItemOpt."','".$Tempo."','0','1','".$ItemDur."'");
	   }
	 echo '<div class=\'ferrorbig\'>Item comprado com sucesso.</div>';  
   mssql_close();
     }
  
    }
	
	else {
   $PegaId = mssql_fetch_array(mssql_query("select * from CabalCash.dbo.ShopItems where Id='".$_GET['Id']."'")); 
   $PegaAcc= mssql_fetch_array(mssql_query("select * from ".DB_ACC.".dbo.cabal_auth_table where Id='".$_SESSION['ss_txtLogin']."'"));
   $PegaCoin=mssql_fetch_array(mssql_query("select * from CabalCash.dbo.CashAccount where UserNum='".$PegaAcc['UserNum']."'"));
   
   $Unidade     = anti_injection($_GET['unidade']);
   $ItemCoin    = $PegaId['Cash'];
   $ItemPoint   = $PegaId['CashBonus'];
   
	if($Unidade <= 0 || $Unidade > 10)
	{
	   echo '<div class=\'ferrorbig\'>Unidade excedida, você pode comprar no minimo 1 ou no máximo 10 unidades. <br><br> 
	            <input class="ssubmit" onclick="new Ajax.Updater(\'container\', \'_shop/shop.index.php\', {method:\'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" type="button" value="VOLTAR" />
	        </div>';
	}
	  elseif(eregi("[^0-9]", $Unidade))
	  {
		  echo'<div class=\'ferrorbig\'>Por favor digite apenas números no campo "Unidades". <br><br> 
	            <input class="ssubmit" onclick="new Ajax.Updater(\'container\', \'_shop/shop.index.php\', {method:\'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" type="button" value="VOLTAR" />
	        </div>';
	  }
	else
	{

	  ?>
<?
   $PegaId = mssql_fetch_array(mssql_query("select * from CabalCash.dbo.ShopItems where Id='".anti_injection($_GET['Id'])."'")); 
   $ItemIdx     = $PegaId['ItemIdx'];
   $VerificarNicke = mssql_query("select * from CabalCash.dbo.ShopItems where ItemIdx='".$ItemIdx."' and Category = 14");
   $VerificaConsNicke = mssql_num_rows($VerificarNicke);

    if($VerificaConsNicke == 0) 
    {
    echo '<div class=\'ferrorbig\'>Você não pode alterar como o item será tratado na compra</div>';
	}
else{
?>	
       <form  name="comprar" id="comprar">
      <div>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="sbody" style="margin:0px;">
      <tbody><tr>
        <td class="sbar"><b><?=$PegaId['Name']?></b></td>
      </tr>
    </tbody></table>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="sbody" style="border-top: none;border-bottom: 1px solid #a6a5a5;">
      <tbody><tr>
        <td width="94" height="94" align="left" valign="top" style="padding:4px;">
          <div style="position: relative;">
            <img src="images/items/<?=$PegaId['Image']?>" border="0" alt="<?=$PegaId['Name']?>" title="<?=$PegaId['Name']?>" width="90" height="90" />
                      </div>
        </td>
        <td style="padding:4px 4px 4px 0px;">
          <div>
            <table width="100%" height="74" border="0" align="center" cellpadding="0" cellspacing="0">
              <tbody><tr>
                <td colspan="3" height="44" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="top">
                  <div><?=$PegaId['Description']?></div>
                </td>
              </tr>
              <tr><td colspan="3" height="4"></td></tr>
              <tr>
                <td width="119" height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center"><b>Efeito</b>:</td>
                <td width="4"></td>
                <td width="418" height="15" valign="center" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;">
                  Livre para comercio                </td>
              </tr>

              
              <tr><td colspan="3" height="4"></td></tr>
              <tr>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center"><b>Duração</b>:</td>
                <td width="4"></td>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center">
                  
    Permamente               </td>
              </tr>
              <tr><td colspan="3" height="4"></td></tr>
              <tr>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center"><b><?=$confCabal['NOME_MOEDA']?> cada</b>:</td>
                <td width="4"></td>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center"><div class="price">
                <b><?=number_format($ItemCoin)?></b> <img src="images/pc.png" title="<?=$confCabal['NOME_MOEDA']?>"/></div>

                           </td>
              </tr>
               
              <tr><td colspan="3" height="4"></td></tr>
              <tr>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center"><b>Unidade</b>:</td>
                <td width="4"></td>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center">
                 <? echo $Unidade?>                </td>
              </tr>
              <tr><td colspan="3" height="4"></td></tr>
              <tr>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center"><b><?=$confCabal['NOME_MOEDA']?> Total</b>:</td>
                <td width="4"></td>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center">
                  <div class="price"><? echo number_format($Unidade*($ItemCoin)); ?> <img src="images/pc.png" title="<?=$confCabal['NOME_MOEDA']?>" /></div>
                </td>
              </tr>
              
            </tbody></table>
          </div>
        </td>
      </tr>
    </tbody></table>
    
    <div id="comprarr" name="comprarr">
     
          
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="sbody" style="margin:0px;">
      <tbody><tr>
        <td class="sbar"><b>FORMA DE PAGAMENTO</b></td>
        <td class="sbar" align="right"></td>
      </tr>
    </tbody></table>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="sbody" style="border-top: none;border-bottom: 1px solid #a6a5a5;">
      <tbody><tr>
        <td style="padding:4px 4px 4px 0px;">
        
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tbody><tr>
                <td height="42" colspan="3" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;font-size:12px;" align="center" valign="center">
                  Você deseja realmente comprar "<b><?=$PegaId['Name']?></b>" ?
                </td>
                <td rowspan="9" width="4"></td><td width="1">
                </td><td rowspan="9" width="166" align="center" valign="center" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;">
               
                  <input class="ssubmit" onclick="new Ajax.Updater('comprarr', '_shop/_functionCompra/buy.CalcularCons.php?Id=<?=anti_injection($_GET['Id'])?>&unidade=<?=anti_injection($_GET['unidade'])?>', {method: 'get', asynchronous:true, parameters:Form.serialize(document.comprar)}); esperar('comprarr');" type="button" value="<?=$confCabal['NOME_MOEDA']?>" name="coin"> &nbsp;&nbsp;&nbsp;
       
                </td><td width="1">
              </td></tr>
              
            </tbody></table>
   
        </td>
      </tr>
      
      
    </tbody></table>
  </div> 
  </form>
  <? }
	}

 }
  }
 
?>
