<?php
 include('../funcAdmPanel/funcDados2.php');
  
?>	 
    <table id="fbody" class="fbody" cellpadding="3" cellspacing="1" width="100%" border="0" style="margin-top:5" align="center">
  <tbody> 
  <tr align="center" class="rhead">
    <td width="29" >Cod</td>
    <td width="132">Imagem</td>
    <td width="126" >Data</td>
    <td width="128" >Ação</td>
  </tr>
  <?
  $ck_Donate = mssql_query("SELECT * FROM ".DB_ACC.".dbo.Cabal_Banner order by CodBanner desc");
  for ($i = 1; $i <= mssql_num_rows($ck_Donate); $i++)
  {
    $ck_DonateR = mssql_fetch_array($ck_Donate);
  ?>
  
   <tr align="center" class="rrow">
   	<div name="deletar" id="deletar">
    <td># <?=$ck_DonateR['CodBanner']?></td>
    <td> <?=$ck_DonateR['Imagem']?></td>
    <td ><?=date('d/m/Y',strtotime($ck_DonateR['Data']))?></td>
    <td >
      <a href="#" onclick="new Ajax.Updater('content', '_admPanel/_executarSite/ex.siteEdtBannerOk.php?CodBanner=<?=$ck_DonateR['CodBanner']?>', {method: 'get', asynchronous:true, evalScripts:true}); esperar('content');">Editar</a> | 
      <a href="#" onclick="new Ajax.Updater('deletar', '_admPanel/_executarSite/ex.siteDelBanner.php?CodBanner=<?=$ck_DonateR['CodBanner']?>', {method: 'get', asynchronous:true, evalScripts:true}); esperar('deletar');">Deletar</a>
     	
    </td>
     </div>
  </tr>
  
  <?
  }
  ?>
</tbody></table>
  
 