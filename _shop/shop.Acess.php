
<div class="spages"><b>ACESSORIOS</b>
</div>

 <? 
 require('../_conf/confCabal.php');

 $PegaInfo = mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category=15 and Available>0 order by weight asc"); 

 
  for ($i=1;$i<=mssql_num_rows($PegaInfo);$i++) {
       $ResultInfo = mssql_fetch_array($PegaInfo);
	  
      if ($ResultInfo['Image']=='') {
        $pic='no_pic.gif';
      } else {
        $pic=$ResultInfo['Image'];
      }
	   ?>
<div>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="sbody" style="margin:0px;">
      <tr>
        <td class="sbar"><?=$ResultInfo['Name']?></td>
      </tr>
    </table>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="sbody" style="border-top: none;border-bottom: 1px solid #a6a5a5;">
      <tr>
        <td width="85" height="85" align="left" valign="top" style="padding:4px;">
          <div style="position: relative;">
            <img src="images/items/<?=$ResultInfo['Image']?>" border="0" alt="<?=$ResultInfo['Name']?>" title="<?=$ResultInfo['Name']?>" width="85" height="85" />
                      </div>
        </td>
        <td width="560" style="padding:4px 4px 4px 0px;">
          <div>
            <table width="100%" height="54" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="3" height="60" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="top">
                  <div><?=$ResultInfo['Description']?> </div>
                </td>
                <td rowspan="5" width="4"><td>
                <td rowspan="5" width="60" align="center" valign="top" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;">
                  <input class="ssubmit" onclick="new Ajax.Updater('container', '_shop/_functionCompra/buy.Geral.php?Id=<?=$ResultInfo['Id']?>', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" type="button" value="selecione" />
                <td>
              </tr>
              <tr><td height="4"></td></tr>
              <tr>
                <td width="50" height="19" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center"><b>Estoque</b>:</td>
                <td width="4"></td>
                <td height="19" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center">
                  <?=$ResultInfo['Available']?>             </td>
              </tr>
              <tr><td height="4"></td>
               <td ></td>
               <td ></td>
               </tr>
              <tr>
                <td width="50" height="19" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center"><b>Vendidos</b>:</td>
                <td width="4"></td>
                <td height="19" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center">
                 <?=number_format($ResultInfo['QntVend'])?>             </td>
              </tr>
             
            </table>
          </div>
        </td>
      </tr>
    </table>
  </div> <? } ?>
