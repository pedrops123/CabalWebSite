<?php
 include('../funcAdmPanel/funcDados2.php');

$ck_Mens = mssql_query("SELECT * FROM ".DB_ACC.".dbo.Cabal_Donate WHERE Status = 0 order by DataConf desc");

if($_POST['Deletar']) 
   {
    $CodDonate = $_POST['CodDonate'];
	mssql_query("delete from ".DB_ACC.".dbo.Cabal_Donate WHERE CodDonate = '".$CodDonate."'");
	echo '<div class=\'ferrorbig\'>Donate N# '.$CodDonate.' deletado com sucesso.</div>';
	
   }
   else
   {
 ?>
<div class="fbar">
  <div class="ftitle">ENTREGAR DONATES</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
  <?
   for ($i=1; $i<=mssql_num_rows($ck_Mens);$i++)
		{ 
		
		$ck_Mens_Result = mssql_fetch_array($ck_Mens);
		$ck_acc = mssql_fetch_array(mssql_query("SELECT * FROM ".DB_ACC.".dbo.cabal_auth_table WHERE ID='".$ck_Mens_Result['ID']."'"));
		?>
   <form method="post" name="code<?=$ck_Mens_Result['CodDonate']?>x" id="code<?=$ck_Mens_Result['CodDonate']?>x"> 
     <div id="site<?=$ck_Mens_Result['CodDonate']?>x" name="site<?=$ck_Mens_Result['CodDonate']?>x"> 
    <div class="nbody nbody_N">
    <input type="hidden" name="CodDonate" value="<?=$ck_Mens_Result['CodDonate']?>" />
  <div class="nbar nbar_N" onclick="$('<?=$ck_Mens_Result['CodDonate']?>-<?=$ck_Mens_Result['CodDonate']?>').toggle(); ">
    <div style="padding: 5px; 0px;">
     <div class="ntitle" style="float: left;">
	 N# <?=$ck_Mens_Result['CodDonate']?> - <?=$ck_Mens_Result['ID']?>
      </div>
      <div class="ndate" style="float: left;"></div>
      <div class="ndate" style="float: right;"><?=date('d-m-Y h:m', strtotime($ck_Mens_Result['DataConf']))?></div>
      <div class="clear"></div>
  </div>
  </div>
  <div id="<?=$ck_Mens_Result['CodDonate']?>-<?=$ck_Mens_Result['CodDonate']?>" name="<?=$ck_Mens_Result['CodDonate']?>-<?=$ck_Mens_Result['CodDonate']?>" style='display: none;'>
  
    <div class="ntext" align="justify">
     <div align="justify" style="float: left; width: 98%; position: relative;">
     
      <table width="100%" border="0" cellspacing="0" cellpadding="0" >
    
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Idx </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <?=$ck_Mens_Result['UserNum']?>
            <input type="hidden" name="txtUserNum" value="<?=$ck_Mens_Result['UserNum']?>"/>
            </td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td class="flabel" height="24px" style="padding: 0 15px 0;" >Login</td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <?=$ck_Mens_Result['ID']?></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td class="flabel" height="24px" style="padding: 0 15px 0;" >Email</td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <?=$ck_acc['Email']?></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Valor Doado </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            R$ <?=$ck_Mens_Result['Valor']?></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" ><?=$confCabal['NOME_MOEDA']?> </td>
          <td height="24px" style="padding: 0 15px 0;" >
            <input class="ffield" name="txtCash" type="text" maxlength="255" value="<?=$ck_Mens_Result['Cash']?>" /></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" ><?=$confCabal['NOME_MOEDA_EVENT']?> (Opcional)</td>
          <td height="24px" style="padding: 0 15px 0;" >
            <input class="ffield" name="txtPoint" type="text" maxlength="255" value="0" /></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Data Confirmação</td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <?=date('d-m-Y h:m', strtotime($ck_Mens_Result['DataConf']))?></td>
        </tr>
      
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Data Transação </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <?=$ck_Mens_Result['DataEnv']?></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Forma Pagamento </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <?
			switch($ck_Mens_Result['FormaPag'])
			{
				case 0 : echo'PagSeguro'; break;
				case 1 : echo'MoIp';      break;
				case 2 : echo'PayPal';    break;
			}
            ?></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Codigo Transação </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <?=$ck_Mens_Result['CodTrans']?></td>
        </tr>
    </table>
      
      </div>
  
       <div style="clear: both;"></div>
    </div>
    <div class="nfooter nfooter_N">
      <div style="float: left; padding: 5px; margin: 0px; height: 20px;">
        
        <div style="margin: 0; padding: 0 position: relative; float: left;">
        </div>
      </div>

      <div style="padding: 3px;">
    <div style="float: right;">
         <input type="button" onclick="new Ajax.Updater('site<?=$ck_Mens_Result['CodDonate']?>x', '_admPanel/_executarDonate/ex.DonateEnt.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.code<?=$ck_Mens_Result['CodDonate']?>x)}); esperar('site<?=$ck_Mens_Result['CodDonate']?>x');" href="#" name="Entregar" class="ssubmit" value="ENTREGAR"> &nbsp;&nbsp;&nbsp;
           <input type="button" onclick="new Ajax.Updater('site<?=$ck_Mens_Result['CodDonate']?>x', '_admPanel/_executarDonate/ex.Donate.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.code<?=$ck_Mens_Result['CodDonate']?>x)}); esperar('site<?=$ck_Mens_Result['CodDonate']?>x');" href="#" name="Deletar" class="ssubmit" value="DELETAR">
          </div>
       
      </div>
      <div style="clear: both;"></div>
    </div>
  </div>
</div>
</div>
</form>
  <?php } ?>
  <div style="height: 5px;"></div>
</div>
<? } ?>