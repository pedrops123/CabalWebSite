<?php
 include('../funcAdmPanel/funcDados2.php');
 $PegaAcc  = mssql_fetch_array(mssql_query("select * from ".DB_ACC.".dbo.cabal_auth_table where UserNum = '".$_GET['UserNum']."'"));
 ?>
 
 <div class="fbar">
  <div class="ftitle">HISTORICO DE BAN</div>
  <div class="clear"></div>
</div>

<div id="fbody" class="fbody">
 <div style="">
    <div class="fdesc" align="right">
       <a onclick="new Ajax.Updater('container','_admPanel/ap.edtConta.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#"> Pesquisar conta</a> > <a href="#" onclick="new Ajax.Updater('container', '_admPanel/_executarJogo/ex.pesqConta.php?ID=<?=$PegaAcc['ID']?>', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" >Editar conta</a> > Historico ban   
</div>
  </div>
<br />
<table id="fbody" class="fbody" cellpadding="3" cellspacing="1" width="100%" border="0" style="margin-top:5" align="center">
  <tbody> 
  <tr align="center" class="rhead">
    <td width="29" >N°</td>
    <td width="132">Motivo</td>
    <td width="126" >Dias Ban</td>
    <td width="128" >Data Ban</td>
    <td width="98">Data Desban</td>
    <td width="97">Responsavel</td>
  </tr>
  <?
  $ck_Donate = mssql_query("SELECT * FROM ".DB_ACC.".dbo.Cabal_Banidos where UserNum = '".$_GET['UserNum']."' order by DataBan desc");
  for ($i = 1; $i <= mssql_num_rows($ck_Donate); $i++)
  {
    $ck_DonateR = mssql_fetch_array($ck_Donate);
  ?>	
   <tr align="center" class="rrow">
    <td># <?=$ck_DonateR['CodBan']?></td>
    <td> <?
	 switch($ck_DonateR['MotivoBan'])
	 {
		 case 0 : echo 'Ofença';               break;
		 case 1 : echo 'Falsa doação';         break;
		 case 2 : echo 'Desrespeito a equipe'; break;
		 case 3 : echo 'Comercio de contas';   break;
		 case 4 : echo 'Falso Gm/Adm/Dv';      break;
		 case 5 : echo 'Progamas proibidos';   break;
	 }
	 ?></td>
    <td ><?=$ck_DonateR['TempoBan']?></td>
    <td >
      <?=date('d-m-Y',strtotime($ck_DonateR['DataBan']));?>
    </td>
     <td >
      <? if($ck_DonateR['DataDesban'] == NULL) { echo '';} else { echo date('d-m-Y h:m',strtotime($ck_DonateR['DataDesban'])); }?>
     </td>
     <td >
     <?=$ck_DonateR['RespBan']?>
     </td>
  </tr>
  <?
  }
  ?>
</tbody></table>
</div>