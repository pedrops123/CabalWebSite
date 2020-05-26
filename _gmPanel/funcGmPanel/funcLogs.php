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
 $arquivo = "../LOGS/Contas_Bloqueadas_by_GM.log";
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
 $arquivo = "../LOGS/Contas_Desbloqueadas_by_GM.log";
 $fp = fopen($arquivo, "a");
 $conteudo = @fread($fp, filesize($arquivo));
 $requested = stripslashes($_SERVER['REQUEST_URI']);
 $posted = stripslashes($post);

fwrite($fp, " ------Conta Desbloqueada------\nResponsavel : $ssLogin\nMotivo      : $Motivo\nDias Ban    : $txtDiasBan\nConta       : $txtId\nData e hora : ".date('d/m/y - H:i')."\nIP          : $ip\n-----------------------------\n\n");
}
?>