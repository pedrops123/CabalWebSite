<?php
 include('../funcAdmPanel/funcDados2.php');
  
?>	 
    <table id="fbody" class="fbody" cellpadding="3" cellspacing="1" width="100%" border="0" style="margin-top:5" align="center">
  <tbody> 
  <tr align="center" class="rhead">
    <td width="29" >Cod</td>
    <td width="132">Item</td>
    <td width="126" >Estoque</td>
    <td width="128" >Ação</td>
  </tr>
  <?
  $ck_Donate = mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = '".$_GET['Cat']."' order by weight desc");
  for ($i = 1; $i <= mssql_num_rows($ck_Donate); $i++)
  {
    $ck_DonateR = mssql_fetch_array($ck_Donate);
  ?>
  
   <tr align="center" class="rrow">
   	<div name="deletar" id="deletar">
    <td># <?=$ck_DonateR['Id']?></td>
    <td> <?=$ck_DonateR['Name']?></td>
    <td ><?=$ck_DonateR['Available']?></td>
    <td >
      <a href="#" onclick="new Ajax.Updater('content', '_admPanel/_executarShop/ex.edtItemEditar.php?Id=<?=$ck_DonateR['Id']?>', {method: 'get', asynchronous:true, evalScripts:true}); esperar('content');">Editar</a> | 
      <a href="#" onclick="new Ajax.Updater('deletar', '_admPanel/_executarShop/ex.edtItemDelet.php?Id=<?=$ck_DonateR['Id']?>', {method: 'get', asynchronous:true, evalScripts:true}); esperar('deletar');">Deletar</a>
     	
    </td>
     </div>
  </tr>
  
  <?
  }
  ?>
</tbody></table>
  
 