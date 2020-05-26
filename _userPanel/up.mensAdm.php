<?php
include('_funcUserPanel/funcDados.php');
include('_funcUserPanel/funcExecutar.php');

$ck_Mens = mssql_query("SELECT * FROM ".DB_ACC.".dbo.Cabal_Mensagem WHERE ID = '".$txtConta."' AND Status = 0 order by Data desc");
if($_POST['Deletar']) 
   {
    $CodMens = $_POST['CodMens'];
	mssql_query("delete from ".DB_ACC.".dbo.Cabal_Mensagem WHERE CodMens = '".$CodMens."'");
	echo '<div class=\'ferrorbig\'>Mensagem deletada com sucesso.</div>';
	
   } 
   else
   {
 ?>
<div class="fbar">
  <div class="ftitle">MENSAGENS DO ADM</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
  <?
   for ($i=1; $i<=mssql_num_rows($ck_Mens);$i++)
		{ 
		$ck_Mens_Result = mssql_fetch_array($ck_Mens);
		?>
   <form method="post" name="code<?=$ck_Mens_Result['CodMens']?>x" id="code<?=$ck_Mens_Result['CodMens']?>x"> 
     <div id="site<?=$ck_Mens_Result['CodMens']?>x" name="site<?=$ck_Mens_Result['CodMens']?>x"> 
    <div class="nbody nbody_N">
    <input type="hidden" name="CodMens" value="<?=$ck_Mens_Result['CodMens']?>" />
  <div class="nbar nbar_N" onclick="$('<?=$ck_Mens_Result['CodMens']?>-<?=$ck_Mens_Result['CodMens']?>').toggle(); ">
    <div style="padding: 5px; 0px;">
     <div class="ntitle" style="float: left;">
	 <?=$ck_Mens_Result['Assunto']?>
      </div>
      <div class="ndate" style="float: left;"></div>
      <div class="ndate" style="float: right;"><?=date('d-m-Y', strtotime($ck_Mens_Result['Data']))?></div>
      <div class="clear"></div>
  </div>
  </div>
  <div id="<?=$ck_Mens_Result['CodMens']?>-<?=$ck_Mens_Result['CodMens']?>" name="<?=$ck_Mens_Result['CodMens']?>-<?=$ck_Mens_Result['CodMens']?>" style='display: none;'>
  
    <div class="ntext" align="justify">
     <div align="justify" style="float: left; width: 98%; position: relative;">
      <?=$ck_Mens_Result['Mens']?>
      </div>
  
       <div style="clear: both;"></div>
    </div>
    <div class="nfooter nfooter_N">
      <div style="float: left; padding: 5px; margin: 0px; height: 20px;">
        
        <div style="margin: 0; padding: 0 position: relative; float: left;">
        </div>
      </div>

      <div style="padding: 5px;">
      
       Att: <?=$confCabal['TITULO']?>
    
    <div style="float: right;">
         
           <input type="button" onclick="new Ajax.Updater('site<?=$ck_Mens_Result['CodMens']?>x', '_userPanel/up.mensAdm.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.code<?=$ck_Mens_Result['CodMens']?>x)}); esperar('site<?=$ck_Mens_Result['CodMens']?>x');" href="#" name="Deletar" class="ssubmit" value="DELETAR">
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