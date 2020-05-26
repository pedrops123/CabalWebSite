<?php
//DISTRIBUIDOR DE PONTOS
function AddPnt($Limite,$txtStr,$txtInt,$txtDex,$txtChar,$IdxAcc) {
mssql_query('exec '.DB_GAM.'.dbo.SP_ADDPNT "'. $Limite .'", "'. $txtStr .'", "'. $txtInt .'", "'. $txtDex .'", "'. $txtChar .'" , "'. $IdxAcc .'"');
		echo'<div class=\'ferrorbig\'>'.$txtChar.' teve '.$Limite.' pontos adicionados com sucesso.</div>';
}

//REDISTRIBUIDOR DE PONTOS
function ReaddPnt($Limite,$txtChar,$IdxAcc) {
mssql_query('exec '.DB_GAM.'.dbo.SP_READDPNT "'. $Limite .'", "'. $txtChar .'" , "'. $IdxAcc .'"');
		echo'<div class=\'ferrorbig\'>'.$txtChar.' teve seus pontos redistribuidos com sucesso.</div>';
}

//LIMPAR PK
function LimpPk($txtChar) {
mssql_query('exec '.DB_GAM.'.dbo.SP_LIMPK "'. $txtChar .'"');
		echo'<div class=\'ferrorbig\'>Pk limpo com sucesso.</div>';
}

//RESETAR CHAR
function ResetChar($txtChar,$txtSTR,$txtINT,$txtDEX,$Total,$txtPNT,$IdxAcc) {
 mssql_query('exec '.DB_GAM.'.dbo.SP_RESET_CHAR "'. $txtChar .'", "'. $txtSTR .'", "'. $txtINT .'", "'. $txtDEX .'", "'. $Total .'", "'. $txtPNT .'", "'. $IdxAcc .'"');
		echo'<div class=\'ferrorbig\'>Char resetado com sucesso.</div>';
}

//MASTER RESET
function MReset($txtChar,$txtCash,$IdxAcc) {
 mssql_query('exec '.DB_GAM.'.dbo.SP_MRESET "'. $txtChar .'", "'. $txtCash .'", "'. $IdxAcc .'"');
		echo'<div class=\'ferrorbig\'>Master reset efetuado com sucesso.</div>';
}

//CONVERSOR
function Conversor($txtHoras,$txtSoma,$IdxAcc) {
 mssql_query('exec '.DB_ACC.'.dbo.SP_CONVERSOR "'. $txtHoras .'", "'. $txtSoma .'", "'. $IdxAcc .'"');
		echo'<div class=\'ferrorbig\'>Suas horas foram convertidas para EVO-POINT com sucesso.</div>';
}

//ESCOLHA DE NAÇÃO
function Nacao($txtChar,$txtNation,$txtAlz) {
 mssql_query('exec '.DB_GAM.'.dbo.SP_ADD_NACAO "'. $txtChar .'", "'. $txtNation .'", "'. $txtAlz .'"');
		echo'<div class=\'ferrorbig\'>Nação adicionada com sucesso.</div>';
}

//CONFIRMAR DONATE
function ConfDonate($txtConta,$IdxAcc,$txtValor,$txtData,$txtFPagamento,$txtCodigo) {
   include ('../_conf/confCabal.php');
	switch($txtValor)
	 {
		case $confCabal['PACK0']*$ck_Config['ExpDoacao'] :
		 $txtQntCash = $confCabal['PACK0']*$ck_Config['ExpDoacao'];
		 $txtReais01 = '5,00';
         mssql_query('exec '.DB_ACC.'.dbo.SP_CONFDONATE "'.$txtConta.'","'.$IdxAcc.'","'.$txtQntCash.'","'.$txtReais01.'","'.$txtData.'","'.$txtFPagamento.'","'.$txtCodigo.'"');
	     echo'<div class=\'ferrorbig\'>
		       <font color="#00CC00"><b> Confirmacao enviada com sucesso</b></font> <br>
		       <u>Favor acessar Historico de compra e checar status da compra</u><br><br>
		       <font color="yellow"><b> (Nunca envie confirmacoes repetidas para nao ser banido.)<b>
			  </div>'; 
	    break;
	   	   
	   case $confCabal['PACK1']*$ck_Config['ExpDoacao'] :
		 $txtQntCash = $confCabal['PACK1']*$ck_Config['ExpDoacao'];
		 $txtReais = '10,00';
         mssql_query('exec '.DB_ACC.'.dbo.SP_CONFDONATE "'.$txtConta.'","'.$IdxAcc.'","'.$txtQntCash.'","'.$txtReais.'","'.$txtData.'","'.$txtFPagamento.'","'.$txtCodigo.'"');
	     echo'<div class=\'ferrorbig\'>
		       <font color="#00CC00"><b> Confirmacao enviada com sucesso</b></font> <br>
		       <u>Favor acessar Historico de compra e checar status da compra</u><br><br>
		       <font color="yellow"><b> (Nunca envie confirmacoes repetidas para nao ser banido.)<b>
			  </div>'; 
	    break;
		
		case $confCabal['PACK2']*$ck_Config['ExpDoacao'] :
		 $txtQntCash = $confCabal['PACK2']*$ck_Config['ExpDoacao'];
		 $txtReais = '20,00';
         mssql_query('exec '.DB_ACC.'.dbo.SP_CONFDONATE "'.$txtConta.'","'.$IdxAcc.'","'.$txtQntCash.'","'.$txtReais.'","'.$txtData.'","'.$txtFPagamento.'","'.$txtCodigo.'"');
	     echo'<div class=\'ferrorbig\'>
		       <font color="#00CC00"><b> Confirmacao enviada com sucesso</b></font> <br>
		       <u>Favor acessar Historico de compra e checar status da compra</u><br><br>
		       <font color="yellow"><b> (Nunca envie confirmacoes repetidas para nao ser banido.)<b>
			  </div>'; 
	    break;
		case $confCabal['PACK3']*$ck_Config['ExpDoacao'] :
		 $txtQntCash = $confCabal['PACK3']*$ck_Config['ExpDoacao'];
		 $txtReais = '30,00';
         mssql_query('exec '.DB_ACC.'.dbo.SP_CONFDONATE "'.$txtConta.'","'.$IdxAcc.'","'.$txtQntCash.'","'.$txtReais.'","'.$txtData.'","'.$txtFPagamento.'","'.$txtCodigo.'"');
	     echo'<div class=\'ferrorbig\'>
		       <font color="#00CC00"><b> Confirmacao enviada com sucesso</b></font> <br>
		       <u>Favor acessar Historico de compra e checar status da compra</u><br><br>
		       <font color="yellow"><b> (Nunca envie confirmacoes repetidas para nao ser banido.)<b>
			  </div>'; 
	    break;
		case $confCabal['PACK4']*$ck_Config['ExpDoacao'] :
		 $txtQntCash = $confCabal['PACK4']*$ck_Config['ExpDoacao'];
		 $txtReais = '40,00';
         mssql_query('exec '.DB_ACC.'.dbo.SP_CONFDONATE "'.$txtConta.'","'.$IdxAcc.'","'.$txtQntCash.'","'.$txtReais.'","'.$txtData.'","'.$txtFPagamento.'","'.$txtCodigo.'"');
	     echo'<div class=\'ferrorbig\'>
		       <font color="#00CC00"><b> Confirmacao enviada com sucesso</b></font> <br>
		       <u>Favor acessar Historico de compra e checar status da compra</u><br><br>
		       <font color="yellow"><b> (Nunca envie confirmacoes repetidas para nao ser banido.)<b>
			  </div>'; 
	    break;
		case $confCabal['PACK5']*$ck_Config['ExpDoacao'] :
		 $txtQntCash = $confCabal['PACK5']*$ck_Config['ExpDoacao'];
		 $txtReais = '50,00';
         mssql_query('exec '.DB_ACC.'.dbo.SP_CONFDONATE "'.$txtConta.'","'.$IdxAcc.'","'.$txtQntCash.'","'.$txtReais.'","'.$txtData.'","'.$txtFPagamento.'","'.$txtCodigo.'"');
	     echo'<div class=\'ferrorbig\'>
		       <font color="#00CC00"><b> Confirmacao enviada com sucesso</b></font> <br>
		       <u>Favor acessar Historico de compra e checar status da compra</u><br><br>
		       <font color="yellow"><b> (Nunca envie confirmacoes repetidas para nao ser banido.)<b>
			  </div>'; 
	    break;
		case $confCabal['PACK6']*$ck_Config['ExpDoacao'] :
		 $txtQntCash = $confCabal['PACK6']*$ck_Config['ExpDoacao'];
		 $txtReais = '100,00';
         mssql_query('exec '.DB_ACC.'.dbo.SP_CONFDONATE "'.$txtConta.'","'.$IdxAcc.'","'.$txtQntCash.'","'.$txtReais.'","'.$txtData.'","'.$txtFPagamento.'","'.$txtCodigo.'"');
	     echo'<div class=\'ferrorbig\'>
		       <font color="#00CC00"><b> Confirmacao enviada com sucesso</b></font> <br>
		       <u>Favor acessar Historico de compra e checar status da compra</u><br><br>
		       <font color="yellow"><b> (Nunca envie confirmacoes repetidas para nao ser banido.)<b>
			  </div>'; 
	    break;
	}
}	
	   
?>