<?php
 include('../funcAdmPanel/funcDados2.php');
?>

<div class="fbar">
  <div class="spages">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="#" onclick="new Ajax.Updater('content', '_admPanel/_executarSite/ex.siteEnvNot.php', {method: 'post', asynchronous:true, evalScripts:true}); esperar('content');">Enviar Noticias</a></td>
    <td><a href="#" onclick="new Ajax.Updater('content', '_admPanel/_executarSite/ex.siteEdtNot.php', {method: 'post', asynchronous:true, evalScripts:true}); esperar('content');">Editar Noticias</a></td>
    <td><a href="#" onclick="new Ajax.Updater('content', '_admPanel/_executarSite/ex.siteEnvBanner.php', {method: 'post', asynchronous:true, evalScripts:true}); esperar('content');">Enviar Banner</a></td>
    <td><a href="#" onclick="new Ajax.Updater('content', '_admPanel/_executarSite/ex.siteEdtBanner.php', {method: 'post', asynchronous:true, evalScripts:true}); esperar('content');">Editar Banner</a></td>
   
  </tr>
 
</table>

 
</div>
  <div class="clear"></div>
</div>

<div id="content" name="content" style="margin: 5px 0px;">
</div>




