<? 
 require('../_conf/confCabal.php');

 $PegaInfo1 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 1 "));
 $PegaInfo2 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 2 "));
 $PegaInfo3 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 3 "));
 $PegaInfo4 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 4 "));
 $PegaInfo5 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 5 "));
 $PegaInfo6 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 6 "));
 $PegaInfo7 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 7 "));
 $PegaInfo8 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 8 "));
 $PegaInfo9 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 9 "));
 $PegaInfo10 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 10 "));
 $PegaInfo11 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 11 "));
 $PegaInfo12 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 12 "));
 $PegaInfo13 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 13 "));
 $PegaInfo14 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 14 "));
 $PegaInfo15 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 15 "));
 $PegaInfo16 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 16 "));
 $PegaInfo17 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 17 "));
 $PegaInfo18 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 18 "));
 $PegaInfo19 = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems where Category = 19 "));
?>
<div style="padding: 5px 0px;">
  <div class="stitle" style="padding: 0px 5px;">MENU</div>
  <div class="storemenu">
    <a onclick="new Ajax.Updater('container', '_shop/shop.historico.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container'); return false;" href="#">Historico de Compra</a>
  </div>
  <div style="height: 4px; clear: both;"></div>
  <div class="stitle" style="padding: 0px 5px;">SHOP ONLINE</div>
  <div class="storemenu">
  
<? if($PegaInfo1['Available'] > 0) { ?> 
   <a onclick="new Ajax.Updater('container', '_shop/shop.Eventt.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container'); return false;" href="#">-&nbsp;&nbsp;Items : Evento</a>
   <? } ?>
   
   <? if($PegaInfo2['Available'] > 0) { ?>	
    <a onclick="new Ajax.Updater('container', '_shop/shop.AccVip.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container'); return false;" href="#">-&nbsp;&nbsp;Conta : Vip</a>   
   <? } ?>

   <? if($PegaInfo3['Available'] > 0) { ?>
    <a onclick="new Ajax.Updater('container', '_shop/shop.fantCorpo.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container'); return false;" href="#">-&nbsp;&nbsp;Fantasias : Corpo</a>
   <? } ?>

   <? if($PegaInfo4['Available'] > 0){ ?>
    <a onclick="new Ajax.Updater('container', '_shop/shop.fantCabeca.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container'); return false;" href="#">-&nbsp;&nbsp;Fantasias : Cabeça</a>
   <? } ?>

   <? if($PegaInfo5['Available'] > 0){ ?>
    <a onclick="new Ajax.Updater('container', '_shop/shop.fantNacao.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container'); return false;" href="#">-&nbsp;&nbsp;Fantasias : Nação</a>
    <? } ?>
    
   <? if($PegaInfo13['Available'] > 0){ ?>
    <a onclick="new Ajax.Updater('container', '_shop/shop.Astral.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container'); return false;" href="#">-&nbsp;&nbsp;Motos e Pranchas</a>
    <? } ?>
    
   <? if($PegaInfo14['Available'] > 0){ ?>
    <a onclick="new Ajax.Updater('container', '_shop/shop.Cons.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container'); return false;" href="#">-&nbsp;&nbsp;Consumiveis/Minestas</a>
    <? } ?>
    
   <? if($PegaInfo15['Available'] > 0){ ?>
    <a onclick="new Ajax.Updater('container', '_shop/shop.Acess.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container'); return false;" href="#">-&nbsp;&nbsp;Acessorios</a>
    <? } ?>
    
   <? if($PegaInfo16['Available'] > 0){ ?>
    <a onclick="new Ajax.Updater('container', '_shop/shop.Dragona.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container'); return false;" href="#">-&nbsp;&nbsp;Dragonas</a>
    <? } ?>
    
   <? if($PegaInfo18['Available'] > 0){ ?>
    <a onclick="new Ajax.Updater('container', '_shop/shop.Pets.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container'); return false;" href="#">-&nbsp;&nbsp;Pets</a>  
    <? } ?>
    
   <? if($PegaInfo19['Available'] > 0){ ?>
    <a onclick="new Ajax.Updater('container', '_shop/shop.KPets.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container'); return false;" href="#">-&nbsp;&nbsp;Kit: Pets</a>  
    <? } ?>
    
   <? if($PegaInfo20['Available'] > 0){ ?>
    <a onclick="new Ajax.Updater('container', '_shop/shop.Craft.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container'); return false;" href="#">-&nbsp;&nbsp;Kit: Craft</a>  
    <? } ?>
    
     <? if($PegaInfo21['Available'] > 0){ ?>
    <a onclick="new Ajax.Updater('container', '_shop/shop.Dungeons.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container'); return false;" href="#">-&nbsp;&nbsp;Dungeons</a>  
    <? } ?>
  </div>
</div>
