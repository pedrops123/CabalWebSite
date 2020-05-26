<?php

function BanConta($txtId,$txtDiasBan,$txtMotivo,$txtUserNum,$ssLogin) {
	switch($txtMotivo)
	 {
		 case 0 : $Motivo = 'Ofença';               break;
		 case 1 : $Motivo = 'Falsa doação';         break;
		 case 2 : $Motivo = 'Desrespeito a equipe'; break;
		 case 3 : $Motivo = 'Comercio de contas';   break;
		 case 4 : $Motivo = 'Falso Gm/Adm/Dv';      break;
		 case 5 : $Motivo = 'Progamas proibidos';   break;
	 }		
 $ip = getenv('REMOTE_ADDR');
 $arquivo = "../LOGS/Contas_Bloqueadas.log";
 $fp = fopen($arquivo, "a");
 $conteudo = @fread($fp, filesize($arquivo));
 $requested = stripslashes($_SERVER['REQUEST_URI']);
 $posted = stripslashes($post);

fwrite($fp, " ------Conta Banida------\nResponsavel : $ssLogin\nMotivo      : $Motivo\nDias Ban    : $txtDiasBan\nConta       : $txtId\nIdx         : $txtUserNum\nData e hora : ".date('d/m/y - H:i')."\nIP          : $ip\n-----------------------------\n\n");
}

function DesbanConta($txtId,$txtDiasBan,$txtMotivo,$ssLogin) {
	switch($txtMotivo)
	 {
		 case 0 : $Motivo = 'Ofença';               break;
		 case 1 : $Motivo = 'Falsa doação';         break;
		 case 2 : $Motivo = 'Desrespeito a equipe'; break;
		 case 3 : $Motivo = 'Comercio de contas';   break;
		 case 4 : $Motivo = 'Falso Gm/Adm/Dv';      break;
		 case 5 : $Motivo = 'Progamas proibidos';   break;
	 }		
 $ip = getenv('REMOTE_ADDR');
 $arquivo = "../LOGS/Contas_Desbloqueadas.log";
 $fp = fopen($arquivo, "a");
 $conteudo = @fread($fp, filesize($arquivo));
 $requested = stripslashes($_SERVER['REQUEST_URI']);
 $posted = stripslashes($post);

fwrite($fp, " ------Conta Desbloqueada------\nResponsavel : $ssLogin\nMotivo      : $Motivo\nDias Ban    : $txtDiasBan\nConta       : $txtId\nData e hora : ".date('d/m/y - H:i')."\nIP          : $ip\n-----------------------------\n\n");
}

function EditConta($txtId,$txtCash,$txtCashEvent,$ssLogin)  {	
 $ip = getenv('REMOTE_ADDR');
 $arquivo = "../LOGS/Contas_Editadas.log";
 $fp = fopen($arquivo, "a");
 $conteudo = @fread($fp, filesize($arquivo));
 $requested = stripslashes($_SERVER['REQUEST_URI']);
 $posted = stripslashes($post);

fwrite($fp, " ------Contas editadas------\nResponsavel : $ssLogin\nConta      : $txtId\nCash        : $txtCash\nCash Evento : $txtCashEvent\nData e hora : ".date('d/m/y - H:i')."\nIP          : $ip\n-----------------------------\n\n");
}


function EditChar($txtChar,$txtNation,$txtPnt,$txtLevel,$txtAlz,$txtStr,$txtInt,$txtDex,$ssLogin)  {
	switch($txtNation)
	 {
		 case 0 : $Motivo = 'Neutro'; break;
		 case 1 : $Motivo = 'Capella'; break;
		 case 2 : $Motivo = 'Procyon';  break;
		 case 3 : $Motivo = 'Game Master';  break;
	 }	
 $ip = getenv('REMOTE_ADDR');
 $arquivo = "../LOGS/Chars_Editados.log";
 $fp = fopen($arquivo, "a");
 $conteudo = @fread($fp, filesize($arquivo));
 $requested = stripslashes($_SERVER['REQUEST_URI']);
 $posted = stripslashes($post);

fwrite($fp, " ------Char editados------\nResponsavel : $ssLogin\nChar        : $txtChar\nLevel       : $txtLevel\nALZ         : $txtAlz\nSTR         : $txtStr\nINT         : $txtInt\nDEX         : $txtDex\nPNT         : $txtPnt\nNação       : $Motivo\nData e hora : ".date('d/m/y - H:i')."\nIP          : $ip\n-----------------------------\n\n");
}
?>