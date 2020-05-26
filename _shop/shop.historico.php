<form method="get" action="" name="irr" id="irr">
<? 
 require('../_conf/confCabal.php');
session_start();
  ob_start();
 if(!(isset($_SESSION['ss_txtLogin']) and isset($_SESSION['ss_txtSenha']))) 
  {
	echo header('Location: ../_erros/err.Shop.php');
  }
   else {  ?>
   

<div id="container" name="container" class="container">  <div class="fbar">
    <div class="ftitle">HISTORICO DE COMPRAS</div>
    <div class="clear"></div>
  </div>
  <div class="spages">
    
	<? $PegaId = mssql_fetch_array(mssql_query("select * from ".DB_ACC.".dbo.cabal_auth_table where Id='".$_SESSION['ss_txtLogin']."'"));
 $PegaInfo = mssql_query("SELECT TOP 20 * FROM CabalCash.dbo.shop_log where usernum = '".$PegaId['UserNum']."' order by purchasedate desc"); ?>
   
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="sbody" style="margin: 0px; background: none repeat scroll 0 0 #d1d1d1;">
        <tbody>
        <tr style="background-color: #eaeaea;">
          <td width="130" align="center" style="font-weight: bold; padding: 5px;">Data</td>
          <td width="296" align="left" style="font-weight: bold; padding: 5px;">Nome do Item</td>
          <td width="67" align="center" style="font-weight: bold; padding: 5px;">Duração</td>
          <td width="51" align="center" style="font-weight: bold; padding: 5px;">Quant</td>
          <td width="83" align="right" style="font-weight: bold; padding: 5px;">SubTotal</td>
        </tr>
        <?
 for ($i=1;$i<=mssql_num_rows($PegaInfo);$i++) {
       $ResultInfo = mssql_fetch_array($PegaInfo);
	   ?>
          <tr class="ssubmit" style="background: none repeat scroll 0 0 transparent; color: #242424;">
          <td width="130" align="center" style="border-left: 1px solid #b6b7b7; border-right: 1px solid #b6b7b7; font-weight: bold; padding: 2px 5px;"><?=$ResultInfo['purchasedate']= date("d-m-Y  H:i", strtotime($ResultInfo['purchasedate']))?></td>
          <td align="left" style="border-right: 1px solid #b6b7b7; font-weight: bold; padding: 2px 5px;"><?=$ResultInfo['itemnum']?></td>
          <td width="67" align="center" style="border-right: 1px solid #b6b7b7; font-weight: bold; padding: 2px 5px;">
		  <?
		  switch($ResultInfo['durationidx'])
		  {
			  case 10 : echo'5 dias'; break;
			  case 23 : echo'15 dias'; break;
			  case 15 : echo'30 dias'; break;
			  case 30 : echo'30 dias'; break;
			  case 31 : echo'Perm'; break;
		  }
          
		  ?></td>
          <td width="51" align="center" style="border-right: 1px solid #b6b7b7; font-weight: bold; padding: 2px 5px;">
          <?=$ResultInfo['quantity']?>
          </td>
          <td width="83" align="right" style="border-right: 1px solid #b6b7b7; font-weight: bold; padding: 2px 5px;">
		  <?
           if($ResultInfo['PriceCoin'] == NULL or $ResultInfo['PriceCoin'] == 0)
		   {
			   echo number_format($ResultInfo['PricePoint']); echo' <img src="images/pc2.png" title="'.$confCabal['NOME_MOEDA'].'" />';
		   }
		    else
			{
			   echo number_format($ResultInfo['PriceCoin']); echo' <img src="images/pc.png" title="'.$confCabal['NOME_MOEDA_EVENT'].'" />';	
			}
		  ?>
         </td>
        </tr>
         <? } ?>
        </tbody></table>
                           
  </div>
  
    <div style="padding: 0px 10px ;" name="ir" id="ir">
 
    </div>

</div>
<? } ?>
 