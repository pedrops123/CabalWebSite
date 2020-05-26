<?php
 include('../funcAdmPanel/funcDados2.php');
 $ck_Conf = mssql_fetch_array(mssql_query("SELECT * FROM ".DB_ACC.".dbo.SITE_CONFIG"));
 
 if($_POST['sbmtConf'])
 {
   $txtReset   = $_POST['txtReset'];
   $txtMReset     = $_POST['txtMReset'];
   $txtConversor   = $_POST['txtConversor'];
   $txtDoacao      = $_POST['txtDoacao'];
   $txtExpConversor = $_POST['txtExpConversor'];
   $txtExpDoacao    = $_POST['txtExpDoacao'];
   $txtVotar    = $_POST['txtVotar'];
   
   if(eregi("[^0-9]", $txtExpConversor))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em multiplicador Conversor.</div>';
   }
   elseif(eregi("[^0-9]", $txtExpDoacao))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em multiplicador Doação.</div>';
   }
   elseif(strlen($txtExpConversor) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo Multiplicador Conversor, minimo 1 digito.</div>';
   }
   elseif(strlen($txtExpDoacao) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo Multiplicador Doação, minimo 1 digito.</div>';
   }
   else
   { 

	   mssql_query("UPDATE ".DB_ACC.".dbo.SITE_CONFIG SET
	     Reset        = '".$txtReset."',
		 MReset       = '".$txtMReset."',
		 Conversor    = '".$txtConversor."',
		 Doacao       = '".$txtDoacao."',
		 Votar        = '".$txtVotar."',
		 ExpConversor = '".$txtExpConversor."',
		 ExpDoacao    = '".$txtExpDoacao."'
	   ");
					
		echo'<div class=\'ferrorbig\'>Configurações editada com sucesso.</div>';
   }
   
 }
   else
   {
?>

<div class="fbar">
  <div class="ftitle">CONFIGURAÇÕES DO SITE</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
  
    <form name="config">
     <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Reset</label></div>
         <div class="finput" style="">
         <?
		 switch($ck_Conf['Reset'])
		 {
			 case 0 : echo'<label>
              <input type="radio" name="txtReset" value="1" id="txtReset_0" checked="checked" />
               Ligar</label>
&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;
            <label>
              <input type="radio" name="txtReset" value="0" id="txtReset_1" />
               Desligar</label>';
			  break;
			  case 1 : echo'<label>
              <input type="radio" name="txtReset" value="1" id="txtReset_0" />
               Ligar</label>
&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;
            <label>
              <input type="radio" name="txtReset" value="0" id="txtReset_1" checked="checked"/>
               Desligar</label>';
			  break;
		 }
		 ?> 
         </div>
         <div class="clear"></div>
    </div>
    
       <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Master Reset</label></div>
         <div class="finput" style=""> 
         <?
		 switch($ck_Conf['MReset'])
		 {
			 case 0 : echo'<label>
              <input type="radio" name="txtMReset" value="1" id="txtMReset_0" checked="checked" />
               Ligar</label>
&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;
            <label>
              <input type="radio" name="txtMReset" value="0" id="txtMReset_1" />
               Desligar</label>';
			  break;
			  case 1 : echo'<label>
              <input type="radio" name="txtMReset" value="1" id="txtMReset_0" />
               Ligar</label>
&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;
            <label>
              <input type="radio" name="txtMReset" value="0" id="txtMReset_1" checked="checked"/>
               Desligar</label>';
			  break;
		 }
		 ?>
         </div>
         <div class="clear"></div>
    </div>
    
       <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Conversor</label></div>
         <div class="finput" style="">
         <?
		 switch($ck_Conf['Conversor'])
		 {
			 case 0 : echo'<label>
              <input type="radio" name="txtConversor" value="1" id="txtConversor_0" checked="checked" />
               Ligar</label>
&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;
            <label>
              <input type="radio" name="txtConversor" value="0" id="txtConversor_1" />
               Desligar</label>';
			  break;
			  case 1 : echo'<label>
              <input type="radio" name="txtConversor" value="1" id="txtConversor_0" />
               Ligar</label>
&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;
            <label>
              <input type="radio" name="txtConversor" value="0" id="txtConversor_1" checked="checked"/>
               Desligar</label>';
			  break;
		 }
		 ?>
         </div>
         <div class="clear"></div>
    </div>
    
       <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Votar</label></div>
         <div class="finput" style="">
         <?
		 switch($ck_Conf['Votar'])
		 {
			 case 0 : echo'<label>
              <input type="radio" name="txtVotar" value="1" id="txtVotar_0" checked="checked" />
               Ligar</label>
&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;
            <label>
              <input type="radio" name="txtVotar" value="0" id="txtVotar_1" />
               Desligar</label>';
			  break;
			  case 1 : echo'<label>
              <input type="radio" name="txtVotar" value="1" id="txtVotar_0" />
               Ligar</label>
&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;
            <label>
              <input type="radio" name="txtVotar" value="0" id="txtVotar_1" checked="checked"/>
               Desligar</label>';
			  break;
		 }
		 ?>
         </div>
         <div class="clear"></div>
    </div>
    
       <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Doação</label></div>
         <div class="finput" style="">
         <?
		 switch($ck_Conf['Doacao'])
		 {
			 case 0 : echo'<label>
              <input type="radio" name="txtDoacao" value="1" id="txtDoacao_0" checked="checked" />
               Ligar</label>
&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;
            <label>
              <input type="radio" name="txtDoacao" value="0" id="txtDoacao_1" />
               Desligar</label>';
			  break;
			  case 1 : echo'<label>
              <input type="radio" name="txtDoacao" value="1" id="txtDoacao_0" />
               Ligar</label>
&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;
            <label>
              <input type="radio" name="txtDoacao" value="0" id="txtDoacao_1" checked="checked"/>
               Desligar</label>';
			  break;
		 }
		 ?>
         </div>
         <div class="clear"></div>
    </div>
    
       <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Multiplicador Conversor</label></div>
         <div class="finput" style=""> 
              <input class="ffield" name="txtExpConversor" type="text" maxlength="2" value="<?=$ck_Conf['ExpConversor']?>" >
         </div>
         <div class="clear"></div>
    </div>
    
       <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Multiplicador Doação</label></div>
         <div class="finput" style="">  <input class="ffield" name="txtExpDoacao" type="text" maxlength="2" value="<?=$ck_Conf['ExpDoacao']?>" >
         </div>
         <div class="clear"></div>
    </div>
    
       <div class="flabel" style="text-align: center;"><input name="sbmtConf" class="fsubmit" type="button" value="ENVIAR" onclick="new Ajax.Updater('checar', '_admPanel/_executarConfig/ex.configGeral.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.config)}); esperar('checar');"></div>

    </form>
    <div style="height: 4px;"></div>
</div>
</div>
<?php } ?>

<div id="checar" name="checar"></div>