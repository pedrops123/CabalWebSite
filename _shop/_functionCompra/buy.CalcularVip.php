 
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
	  if($_GET['coin'])
 {
   $PegaId = mssql_fetch_array(mssql_query("select * from CabalCash.dbo.ShopItems where Id='".anti_injection($_GET['Id'])."'")); 
   $PegaAcc= mssql_fetch_array(mssql_query("select * from ".DB_ACC.".dbo.cabal_auth_table where Id='".$_SESSION['ss_txtLogin']."'"));
   $PegaCoin=mssql_fetch_array(mssql_query("select * from CabalCash.dbo.CashAccount where UserNum='".$PegaAcc['UserNum']."'"));
   $PegaVip =mssql_fetch_array(mssql_query("select * from ".DB_ACC.".dbo.cabal_charge_auth where UserNum='".$PegaAcc['UserNum']."'"));
   
   $AccId       = $PegaAcc['UserNum'];
   $ItemId      = $PegaId['Id'];
   $ItemName    = $PegaId['Name'];
   $ItemCoin    = $PegaId['Cash'];
   $ItemEstoque = $PegaId['Available'];
   $Tira        = $ItemEstoque - 1;
      
	if($PegaCoin['Cash'] < $ItemCoin)
	{
	   echo '<div class=\'ferrorbig\'>Desculpe,mas você não possui '.$confCabal['NOME_MOEDA'].' suficiente. <br><br> 
	            <input class="ssubmit" onclick="new Ajax.Updater(\'container\', \'_shop/shop.index.php\', {method:\'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" type="button" value="VOLTAR" />
	        </div>';
	}
	elseif($PegaVip['ServiceKind'] >= 2)
	{
	   echo '<div class=\'ferrorbig\'>Desculpe,mas você ja possui conta vip, aguarde expirar para obter outra . <br><br> 
	            <input class="ssubmit" onclick="new Ajax.Updater(\'container\', \'_shop/shop.index.php\', {method:\'get\', asynchronous:true, evalScripts:true}); esperar(\'container\');" type="button" value="VOLTAR" />
	        </div>';
	}
	 else
	 {
	  mssql_query("UPDATE CabalCash.dbo.ShopItems SET
	                Available = '".$Tira."',
					QntVend   =  QntVend + 1
					WHERE Id  = '".$ItemId."'
				   UPDATE CabalCash.dbo.CashAccount SET
				    Alz = Alz - '".$ItemCoin."'
					WHERE UserNum = '".$AccId."'
				   INSERT INTO CabalCash.dbo.shop_log values
				    (".$AccId.",'".date("Y-M-d H:i:s")."','Conta Vip',30,1,'".$ItemCoin."',0)");
      mssql_query("EXEC ".DB_ACC.".dbo.add_vip_coin '".$AccId."','30','2'");
	   
	 echo '<div class=\'ferrorbig\'>Item comprado com sucesso.</div>';  
   mssql_close();
     }
  
    }
	
	else {
   $PegaId = mssql_fetch_array(mssql_query("select * from CabalCash.dbo.ShopItems where Id='".anti_injection($_GET['Id'])."'")); 
   $PegaAcc= mssql_fetch_array(mssql_query("select * from ".DB_ACC.".dbo.cabal_auth_table where Id='".anti_injection($_SESSION['ss_txtLogin'])."'"));
   $PegaCoin=mssql_fetch_array(mssql_query("select * from CabalCash.dbo.CashAccount where UserNum='".$PegaAcc['UserNum']."'"));
   
   $ItemCoin    = $PegaId['Cash'];
   $ItemPoint   = $PegaId['CashBonus'];
   
	
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
                  Ligado a conta                </td>
              </tr>

              
              <tr><td colspan="3" height="4"></td></tr>
              <tr>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center"><b>Duração</b>:</td>
                <td width="4"></td>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center">
                  
    30 dias      </td>
              </tr>
              <tr><td colspan="3" height="4"></td></tr>
      
              <tr>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center"><b>Unidade</b>:</td>
                <td width="4"></td>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center">
                 1                </td>
              </tr>
              <tr><td colspan="3" height="4"></td></tr>
              <tr>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center"><b><?=$confCabal['NOME_MOEDA']?> Total</b>:</td>
                <td width="4"></td>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center">
                  <div class="price"><? echo number_format($ItemCoin); ?> <img src="images/pc.png" title="<?=$confCabal['NOME_MOEDA']?>" /></div>
                </td>
              </tr>
               <? if($ck_Config['Conversor'] == 1)
			  {
				  echo'
              <tr><td colspan="3" height="4"></td></tr>
              <tr>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center"><b>'.$confCabal['NOME_MOEDA_EVENT'].' Total</b>:</td>
                <td width="4"></td>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center">
                  <div class="price">'.number_format($ItemPoint).' <img src="images/pc2.png" title="'.$confCabal['NOME_MOEDA_EVENT'].'" /></div>
                </td>
              </tr>';
			  }
			  ?>
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
               
                  <input class="ssubmit" onclick="new Ajax.Updater('comprarr', '_shop/_functionCompra/buy.CalcularVip.php?Id=<?=anti_injection($_GET['Id'])?>', {method: 'get', asynchronous:true, parameters:Form.serialize(document.comprar)}); esperar('comprarr');" type="button" value="<?=$confCabal['NOME_MOEDA']?>" name="coin"> &nbsp;&nbsp;&nbsp;
                 
                </td><td width="1">
              </td></tr>
              
            </tbody></table>
   
        </td>
      </tr>
      
      
    </tbody></table>
  </div> 
  </form>
  <? 
	}

 }
  
 
?>
