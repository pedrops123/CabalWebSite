<form method="get" name="test" id="test" >
<?
  require('../../_conf/confCabal.php');
   $PegaId = mssql_fetch_array(mssql_query("select  * from CabalCash.dbo.ShopItems where Id='".anti_injection($_GET['Id'])."'"));   
 
?>
  <div>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="sbody" style="margin:0px;">
      <tr>
        <td class="sbar"><b><?=$PegaId['Name']?></b></td>
      </tr>
    </table>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="sbody" style="border-top: none;border-bottom: 1px solid #a6a5a5;">
      <tr>
        <td width="94" height="94" align="left" valign="top" style="padding:4px;">
          <div style="position: relative;">
            <img src="images/items/<?=$PegaId['Image']?>" border="0" alt="<?=$PegaId['Name']?>" title="<?=$PegaId['Name']?>" width="90" height="90" />
                      </div>
        </td>
        <td style="padding:4px 4px 4px 0px;">
          <div>
            <table width="100%" height="74" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="3" height="44" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="top">
                  <div><?=$PegaId['Description']?></div>
                </td>
                <td rowspan="5" width="4"><td>
                <td rowspan="5" width="31" align="center" valign="top" style="background-color:#aeaeae;padding: 8px 4px 0px 6px;">
               
                  <input class="ssubmit" onclick="new Ajax.Updater('container', '_shop/_functionCompra/buy.CalcularCons.php?Id=<?=anti_injection($_GET['Id'])?>&unidade=<?=anti_injection($_GET['unidade'])?>', {method: 'get', asynchronous:true, parameters:Form.serialize(document.test)}); esperar('container');" type="button" value="Calcular" />
                  
                                    
                <td>
              </tr>
              <tr><td height="4"></td></tr>
              <tr>
                <td width="50" height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center"><b>Efeito</b>:</td>
                <td width="4"></td>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center">
                  Livre para comercio               </td>
              </tr>
              <tr><td height="4"></td></tr>
              <tr>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center"><b>Unidade</b>:</td>
                <td width="4"></td>
                 <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center">
                  <div style="float: left; padding: 2px 5px;"><input type="text" id="unidade" name="unidade" value="1" maxlength="2" class="ffield" style="width: 20px; text-align: center;" ></div>
                  <div style="float: left; padding-left: 10px; line-height: 20px;">Max: 10 unidades</div>
                </td>
              </tr>
              <tr><td height="4"></td></tr>
              <tr>
                <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center"><b>Tempo:</b></td>
                <td width="4"></td>
                 <td height="15" style="background-color:#aeaeae;padding: 0px 4px 0px 4px;" valign="center"><div style="float: left; padding: 4px 0px;">
                 
                    <select class="ssubmit" style="padding: 0px; text-align: left; width: 110px;" id="time" name="time">

                      <option >Permanente</option>
                    </select>
                   
                
                  </div>
                </td>
              </tr>
            
          
              
           
            </table>
          </div>
        </td>
      </tr>
    </table>
  </div> 

	</form>