<a href="index.php" />
   <div class="menu">Home</div>
  </a>
    <a onclick="new Ajax.Updater('container', 'sisServerInfo.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" href="#"  />
   <div class="menu"><font color="#fdfca5">SERVER INFO</font></div>
  </a>
   
  <a onclick="new Ajax.Updater('container', 'sisCadastrar.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" href="#" />
   <div class="menu">REGISTRAR</div>
  </a>
  
  <a onclick="new Ajax.Updater('container', '_userPanel/up.Download.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" href="#"  />
   <div class="menu"><font color="#fdfca5">DOWNLOAD</font></div>
  </a>
  
  <a onclick="new Ajax.Updater('container', '_rank/rk.Chars.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" href="#"  />
   <div class="menu">RANKING</div>
  </a>

    <a href="<?=$confCabal['FORUM']?>" target="_blank"  />
   <div class="menu"><font color="#fdfca5">FORUM</font></div>
  </a><div class="menu"><a href="<?=$confCabal['facebook']?>" target="a_blank"><img src="images/facebook-icon.png" height="20" width="20"></a></div><div class="menu">
<div class="fb-like"  data-href="<?=$confCabal['facebook']?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-font="arial"></div>
</div>

<script type="text/javascript">
</script>