<?php
include('../_conf/confDonate.php');

session_start();
ob_start();
$txtConta = $_SESSION['ss_txtLogin'];	  
       $ck_Conta = mssql_fetch_array(mssql_query("SELECT * FROM ".DB_ACC.".dbo.cabal_auth_table WHERE ID='".$_SESSION['ss_txtLogin']."'"));
	   $IdxAcc   = $ck_Conta['UserNum']; 
 if(!(isset($_SESSION['ss_txtLogin']) and isset($_SESSION['ss_txtSenha'])))
  { 
    echo header('Location: ../_erros/upGeral.php');
  }
   elseif($ck_Conta['AuthKey'] == FALSE)
     { 
     include('../_erros/UserPanel.php'); 
     }
     elseif($ck_Config['Doacao'] == 0)
     { 
     include('./_erros/offPanel.php'); 
     }
	 
	 elseif ($_POST['sbmtDonate']) 
	 {
		 
	 $txtValor      = addslashes($_POST['txtValor']);
	 $txtData       = addslashes($_POST['txtData']);
     $txtFPagamento = addslashes($_POST['txtFPagam']);
     $txtCodigo     = addslashes($_POST['txtCodTrans']);
	 $txtEmail      = $ck_Conta['Email'];	
	
	 if(strlen($txtData) < 10 || strlen($txtData) >=11)
	 {
	  echo'<div class=\'ferrorbig\'>Data transacao em formato invalido. Siga ao exemplo <font color=\'#FFFF00\'>'.date('d/m/Y').'</font></div>';  
	 }
	 elseif(eregi("[^0-9a-zA-Z]", $txtCodigo))
	 {
	  echo'<div class=\'ferrorbig\'>Codigo transação formato inválido</div>'; 
	 }
	 elseif(strlen($txtCodigo) < 1 || strlen($txtCodigo) > 255)
	 {
	  echo'<div class=\'ferrorbig\'>Preencha Codigo transacao, obrigatorio.</div>';  
	 }
	 
	 else
	 { 
	  include('_funcUserPanel/funcExecutar.php'); 
	  echo ConfDonate($txtConta,$IdxAcc,$txtValor,$txtData,$txtFPagamento,$txtCodigo);
	 }
	 
	}
	else
    {
?>
<form method="post" name="registro" id="registro">
<div class="fbar">
  <div class="ftitle">CONFIRMAR PAGAMENTO</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
   
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Login</label></div>
         <div class="finput" style=""><?=$ck_Conta['ID']?>
         </div>
         <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rpassword1">Email</label></div>
          <div class="finput" style=""><?=$ck_Conta['Email']?></div>
          <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">

      <div class="fitem" style=""><label for="rpassword2">Valor Doado</label></div>
          <div class="finput" style="">
   <select name="txtValor" class="ffield">
    <option value="<?=$confCabal['PACK0']*$ck_Config['ExpDoacao']?>"> R$ 5,00</option>
    <option value="<?=$confCabal['PACK1']*$ck_Config['ExpDoacao']?>"> R$ 10,00</option>
    <option value="<?=$confCabal['PACK2']*$ck_Config['ExpDoacao']?>"> R$ 20,00</option>
    <option value="<?=$confCabal['PACK3']*$ck_Config['ExpDoacao']?>"> R$ 30,00</option>
    <option value="<?=$confCabal['PACK4']*$ck_Config['ExpDoacao']?>"> R$ 40,00</option>
    <option value="<?=$confCabal['PACK5']*$ck_Config['ExpDoacao']?>"> R$ 50,00</option>
    <option value="<?=$confCabal['PACK6']*$ck_Config['ExpDoacao']?>"> R$ 100,00</option>
   </select></div>
          <div class="clear"></div>
    </div>
    <div class="flabel" style="">

      <div class="fitem" style=""><label for="rpassword2">Forma de Pagamento</label></div>
          <div class="finput" style="">
   <select name="txtFPagam" class="ffield">
    <option value="0">PagSeguro</option>
    <option value="1">MoIp</option>
    <option value="2">PayPal</option>
   </select></div>
          <div class="clear"></div>
    </div>
   <div class="flabel" style="">
      <div class="fitem" style=""><label for="remail">Data da Transação</label></div>
          <div class="finput" style=""><input class="ffield" name="txtData" type="text" maxlength="10" value="<?=date('d/m/Y')?>"></div>
          <div class="clear"></div>
    </div>
     
    
    <div class="flabel" style="">

      <div class="fitem" style=""><label for="rpassword2">Codigo da Transação</label></div>
          <div class="finput" style=""><input class="ffield" name="txtCodTrans" type="text" maxlength="255"  ></div>
          <div class="clear"></div>
    </div>
</div>

  <div class="flabel" style="text-align: center;"><input name="sbmtDonate" class="fsubmit" type="button" value="ENVIAR" onclick="new Ajax.Updater('checar', '_userPanel/up.ConfDonate.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.registro)}); esperar('checar');"></div>
    <div style="height: 5px;"></div>

</div>
</form>
<?php } ?>

<div id="checar" name="checar" class="errors">

</div>