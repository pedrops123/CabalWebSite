<?
 include('../funcGmPanel/funcDados.php');
 ?>
<?
if($_POST['sbmtGmIP'])
 {
 require ('../funcGmPanel/funcIP.php');
$IP = getenv('REMOTE_ADDR');
echo GMIP($IP);
} 
 else
 {
 ?>
<form  name="registro" id="registro">
  <div class="fbar">
    <div class="ftitle">ATUALIZAR IP GM</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
  <div class="fdesc">
      <b>Lembrete</b>:<br>
   
      - Sua conta deve estar <font color="#FF0000"><u>OFFLINE</u></font> para atualizar.
 
      <br />
	  
	  - Nao use o sistema atoa, apenas quando o IP for mudado.
     
</div>
    
   
</div>

  <div class="flabel" style="text-align: center;"><input name="sbmtGmIP" class="fsubmit" type="button" value="Atualizar IP" onclick="new Ajax.Updater('checar', '_gmPanel/_executarJogo/gm.edtIP.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.registro)}); esperar('checar');"></div>
    <div style="height: 5px;"></div>
</div>
</form>

<? } ?>

<div id="checar" name="checar">

</div>