

<?php
 include('../funcAdmPanel/funcDados2.php');
 
 $PegaBan  = mssql_fetch_array(mssql_query("select * from ".DB_ACC.".dbo.Cabal_Banidos where UserNum = '".$_GET['UserNum']."' AND Status = 0"));
?>
<div class="fbar">
    <div class="ftitle">DESBLOQUEAR CONTA</div>
  <div class="clear"></div>
</div>

<div id="fbody" class="fbody">
    <div style="">
    <div class="fdesc" align="right">
       <a onclick="new Ajax.Updater('container','_admPanel/ap.edtConta.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#"> Pesquisar conta</a> > <a href="#" onclick="new Ajax.Updater('container', '_admPanel/_executarJogo/ex.pesqConta.php?ID=<?=$PegaBan['ID']?>', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" >Editar conta</a> > Desbloquear conta   
</div>
    </div>
<?php 
   $txtDiasBan = $PegaBan['TempoBan'];
   $txtMotivo  = $PegaBan['MotivoBan'];
   $txtId      = $PegaBan['ID']; 
   $ssLogin    = $_SESSION['ss_txtLogin'];
   
   include('../funcAdmPanel/funcLogs.php');
    echo DesbanConta($txtId,$txtDiasBan,$txtMotivo,$ssLogin);
	
	   mssql_query("
	   UPDATE ".DB_ACC.".dbo.Cabal_Banidos SET
	   Status = 1,
	   RespDesban = '".$ssLogin."',
	   DataDesban = getdate(),
	   TempoBan = 0
	   WHERE ID = '".$txtId."' AND Status = 0
	   
	   UPDATE ".DB_ACC.".dbo.cabal_auth_table SET
	   AuthType = 1,
	   TempoBan = 0
	   WHERE ID = '".$txtId."'");
		echo'<div class=\'ferrorbig\'>Conta desbloqueada com sucesso.</div>';
?>
</div>