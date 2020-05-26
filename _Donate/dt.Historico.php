<?php
include('../_userPanel/_funcUserPanel/funcDados.php');

if($ck_Conta['AuthKey'] == FALSE)
  { 
      include('../_erros/UserPanel.php'); 
  }
  else 
  {
	  if($ck_Config['Doacao'] == 0)
  { 
      include('../_erros/offPanel.php'); 
  }
  else 
  {
		
?>
<div class="fbar">
  <div class="ftitle">HISTORICO DE DOAÇÔES</div>
  <div class="clear"></div>
</div>

<div id="fbody" class="fbody">
<br />
<table id="fbody" class="fbody" cellpadding="3" cellspacing="1" width="100%" border="0" style="margin-top:5" align="center">
  <tbody> 
  <tr align="center" class="rhead">
    <td width="29" >N°</td>
    <td width="97">Valor</td>
    <td width="126" ><?=$confCabal['NOME_MOEDA']?></td>
    <td width="132" >Data Confirmação</td>
    <td width="128" >Data Entrega</td>
    <td width="98">Status</td>
  </tr>
  <?
  $ck_Donate = mssql_query("SELECT * FROM ".DB_ACC.".dbo.Cabal_Donate where ID = '".$txtConta."' ");
  for ($i = 1; $i <= mssql_num_rows($ck_Donate); $i++)
  {
    $ck_DonateR = mssql_fetch_array($ck_Donate);
  ?>	
   <tr align="center" class="rrow">
    <td># <?=$ck_DonateR['CodDonate']?></td>
    <td>R$ <?=$ck_DonateR['Valor']?></td>
    <td ><img src="images/pc.png" title="<?=$confCabal['NOME_MOEDA']?>" /> <?=number_format($ck_DonateR['Cash'])?></td>
    <td ><?=date('d-m-Y',strtotime($ck_DonateR['DataConf']))?></td>
    <td >
	<? 
	if($ck_DonateR['DataEnt'] == NULL)
	{
		echo'';
	}
	else
	{
		echo date('d-m-Y',strtotime($ck_DonateR['DataEnt']));
	}
	?>
	</td>
     <td >
     <?
	 switch($ck_DonateR['Status'])
	 {
		 case 0 : echo'<font color="#FF9900">Em andamento</font>'; break;
		 case 1 : echo'<font color="#00FF00">Entregue</font>'; break;
	 }
	 ?>
     </td>
  </tr>
  <?
  }
  ?>
</tbody></table>
</div>
<?php } } ?>