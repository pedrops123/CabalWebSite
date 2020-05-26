<?php
 include('funcAdmPanel/funcDados.php');
            
 if($_POST['sbmtPesqAcc'])
 { 
	$txtPesquisa  = $_POST['txtPesquisa'];
	$txtPesq      = $_POST['txtPesq'];
	
	if(strlen($txtPesquisa) < 4)
	{
	   echo '<div class=\'ferrorbig\'>Campo requer minimo 4 digitos</div>';
	}
	elseif($txtPesq == 'ACC')
	{
		$PegaAcc = mssql_query("select * from ".DB_ACC.".dbo.cabal_auth_table where Id LIKE '".$txtPesquisa."%' order by Id desc"); 
		$total = mssql_num_rows($PegaAcc);
?>
        <table id="fbody" class="fbody" cellpadding="3" cellspacing="1" width="100%" border="0" style="margin-top:5" align="center">
        <tbody>
         <tr  align="center" class="rhead">
          <td colspan="3"  align="center">Resultado da pesquisa ( <b><u><?=$total?></u></b> )</td>
          </tr>
        <tr  align="center" class="rhead">
          <td width="30"  align="center">#</td>
          <td align="left" style="padding-left: 10px;">Conta</td>
          <td width="80"  align="center">Ação</td>
        </tr>
        
<?php		
       for ($i=1;$i<=mssql_num_rows($PegaAcc);$i++)
	    {
         $ResultInfo = mssql_fetch_array($PegaAcc); 
	   
 
?>
		  <tr align="center" class="rrow">
          <td align="center" ><?=$i?></td>
          <input type="hidden" name="txtChar" value="<?=$ResultInfo['ID']?>" />
          <td align="left" style="padding-left: 10px;"><b><?=$ResultInfo['ID']?></b></td>
          <td align="center"> <input class="ssubmit" onclick="new Ajax.Updater('container', '_admPanel/_executarJogo/ex.pesqConta.php?ID=<?=$ResultInfo['ID']?>', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" type="button" value="selecione" /></td> 
          </tr>
<?php
        }
?>   
      </tbody>
     </table>
 <?php     		
	}
	elseif($txtPesq == 'IP')
	{
	 $PegaAcc = mssql_query("select * from ".DB_ACC.".dbo.cabal_auth_table where LastIp LIKE '".$txtPesquisa."%' order by LastIp desc"); 
     $total = mssql_num_rows($PegaAcc);
?>
        <table id="fbody" class="fbody" cellpadding="3" cellspacing="1" width="100%" border="0" style="margin-top:5" align="center">
        <tbody>
         <tr  align="center" class="rhead">
          <td colspan="4"  align="center">Resultado da pesquisa ( <b><u><?=$total?></u></b> )</td>
          </tr>
        <tr  align="center" class="rhead">
          <td width="30"  align="center">#</td>
          <td align="left" style="padding-left: 10px;">Ip</td>
          <td align="left" style="padding-left: 10px;">Conta</td>
          <td width="80"  align="center">Ação</td>
        </tr>
        
 <?php		
       for ($i=1;$i<=mssql_num_rows($PegaAcc);$i++)
	    {
         $ResultInfo = mssql_fetch_array($PegaAcc); 
	   
 
?>
		  <tr align="center" class="rrow">
          <td align="center" ><?=$i?></td>
          <input type="hidden" name="txtChar" value="<?=$ResultInfo['LastIp']?>" />
          <td align="left" style="padding-left: 10px;"><b><?=$ResultInfo['LastIp']?></b></td>
          <td align="left" style="padding-left: 10px;"><b><?=$ResultInfo['ID']?></b></td>
          <td align="center"><input class="ssubmit" onclick="new Ajax.Updater('container', '_admPanel/_executarJogo/ex.pesqConta.php?ID=<?=$ResultInfo['ID']?>', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" type="button" value="selecione" /></td> 
          </tr>
<?php
        }
?>   
      </tbody>
</table>
<?php	
	}
	elseif($txtPesq == 'CHAR')
	{
	 $PegaAcc = mssql_query("select * from ".DB_GAM.".dbo.cabal_character_table where Name LIKE '".$txtPesquisa."%' order by Name desc");
     $total = mssql_num_rows($PegaAcc);
?>
        <table id="fbody" class="fbody" cellpadding="3" cellspacing="1" width="100%" border="0" style="margin-top:5" align="center">
        <tbody>
         <tr  align="center" class="rhead">
          <td colspan="3"  align="center">Resultado da pesquisa ( <b><u><?=$total?></u></b> )</td>
          </tr>
        <tr  align="center" class="rhead">
          <td width="30"  align="center">#</td>
          <td align="left" style="padding-left: 10px;">Char</td>
        
          <td width="80"  align="center">Ação</td>
        </tr>
        
<?php	
       for ($i=1;$i<=mssql_num_rows($PegaAcc);$i++)
	    {
         $ResultInfo = mssql_fetch_array($PegaAcc); 
		
	   
 
?>
		  <tr align="center" class="rrow">
          <td align="center" ><?=$i?></td>
          <input type="hidden" name="txtChar" value="<?=$ResultInfo['Name']?>" />
          <td align="left" style="padding-left: 10px;"><b><?=$ResultInfo['Name']?></b></td>
          <td align="center"><input class="ssubmit" onclick="new Ajax.Updater('container', '_admPanel/_executarJogo/ex.pesqChar.php?Name=<?=$ResultInfo['Name']?>', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" type="button" value="selecione" /></td> 
          </tr>
<?php
        }
?>   
      </tbody>
     </table>
<?php	
	}

} 
 else
 {
?>

<form  name="registro" id="registro">
  <div class="fbar">
    <div class="ftitle">PESQUISAR CONTA / CHAR / IP</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
    

    <div class="flabel" style="">
      <div class="fitem" style="">
      <select  name="txtPesq" class="fsubmit" style="padding: 0; text-align: left; width: 100%; margin: 0;">
      <option value="ACC">CONTA &nbsp;&nbsp;&nbsp;</option>
      <option value="CHAR">CHAR &nbsp;&nbsp;&nbsp;</option>
      <option value="IP">IP &nbsp;&nbsp;&nbsp;</option>
       </select>
   </div>
         <div class="finput" style=""><input class="ffield" name="txtPesquisa" type="text" maxlength="20" ></div>
         <div class="clear"></div>
    </div>
    
   
</div>

  <div class="flabel" style="text-align: center;"><input name="sbmtPesqAcc" class="fsubmit" type="button" value="Pesquisar" onclick="new Ajax.Updater('checar', '_admPanel/ap.edtConta.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.registro)}); esperar('checar');"></div>
    <div style="height: 5px;"></div>
</div>
</form>

<?php } ?>

<div id="checar" name="checar">

</div>