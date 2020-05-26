<?php
/*******************************************************************/
//                                                                 //
//                   SITE DESENVOLVIDO POR IRON                    //
//                 CONTATO: leandro-iron@hotmail.com               //
//                 POR FAVOR NÃO RETIREM OS CREDITOS               //
//                                                                 //
/*******************************************************************/
function BurlarAddPnt($txtConta) {
 $ip = getenv('REMOTE_ADDR');
 $arquivo = "LOGS/Distribuir_pontos.log";
 $fp = fopen($arquivo, "a");
 $conteudo = @fread($fp, filesize($arquivo));
 $requested = stripslashes($_SERVER['REQUEST_URI']);
 $posted = stripslashes($post);

fwrite($fp, " ============== \n DISTRIBUIDOR DE PONTOS \n");

fwrite($fp, " Data e hora: ".date('d/m/y - H:i')." \n IP: $ip\n");

$ck_Ips = mssql_query("Select ID from ".DB_ACC.".dbo.cabal_auth_table Where ID='".$txtConta."'");

if(mssql_num_rows($ck_Ips) <= 0){

	fwrite($fp, "  Nenhum \n ============== \n");

}else{

	for($a=0;$a<mssql_num_rows($ck_Ips);$a++){

		$name = mssql_fetch_row($ck_Ips);

		fwrite($fp, " Login: $name[0]\n");
	}
	fwrite($fp, " ============== \n");
}
echo '<div class=\'ferrorbig\'>'.$txtConta.' esta tentando injectar dados inválidos para o sistema. Esta ação foi registrada e sua conta poderá ser banido permanentemente.</div>';
}

function BurlarReset($txtConta) {
 $ip = getenv('REMOTE_ADDR');
 $arquivo = "LOGS/Reset.log";
 $fp = fopen($arquivo, "a");
 $conteudo = @fread($fp, filesize($arquivo));
 $requested = stripslashes($_SERVER['REQUEST_URI']);
 $posted = stripslashes($post);

fwrite($fp, " ============== \n RESETAR CHAR \n");

fwrite($fp, " Data e hora: ".date('d/m/y - H:i')." \n IP: $ip\n");

$ck_Ips = mssql_query("Select ID from ".DB_ACC.".dbo.cabal_auth_table Where ID='".$txtConta."'");

if(mssql_num_rows($ck_Ips) <= 0){

	fwrite($fp, "  Nenhum \n ============== \n");

}else{

	for($a=0;$a<mssql_num_rows($ck_Ips);$a++){

		$name = mssql_fetch_row($ck_Ips);

		fwrite($fp, " Login: $name[0]\n");
	}
	fwrite($fp, " ============== \n");
}
echo '<div class=\'ferrorbig\'>'.$txtConta.' esta tentando injectar dados inválidos para o sistema. Esta ação foi registrada e sua conta poderá ser banido permanentemente.</div>';
}

function BurlarReaddPnt($txtConta) {
 $ip = getenv('REMOTE_ADDR');
 $arquivo = "LOGS/Redistribuir_pontos.log";
 $fp = fopen($arquivo, "a");
 $conteudo = @fread($fp, filesize($arquivo));
 $requested = stripslashes($_SERVER['REQUEST_URI']);
 $posted = stripslashes($post);

fwrite($fp, " ============== \n REDISTRIBUIDOR DE PONTOS \n");

fwrite($fp, " Data e hora: ".date('d/m/y - H:i')." \n IP: $ip\n");

$ck_Ips = mssql_query("Select ID from ".DB_ACC.".dbo.cabal_auth_table Where ID='".$txtConta."'");

if(mssql_num_rows($ck_Ips) <= 0){

	fwrite($fp, "  Nenhum \n ============== \n");

}else{

	for($a=0;$a<mssql_num_rows($ck_Ips);$a++){

		$name = mssql_fetch_row($ck_Ips);

		fwrite($fp, " Login: $name[0]\n");
	}
	fwrite($fp, " ============== \n");
}
echo '<div class=\'ferrorbig\'>'.$txtConta.' esta tentando injectar dados inválidos para o sistema. Esta ação foi registrada e sua conta poderá ser banido permanentemente.</div>';
}

function BurlarLimpPk($txtConta) {
 $ip = getenv('REMOTE_ADDR');
 $arquivo = "LOGS/Limpar_Pk.log";
 $fp = fopen($arquivo, "a");
 $conteudo = @fread($fp, filesize($arquivo));
 $requested = stripslashes($_SERVER['REQUEST_URI']);
 $posted = stripslashes($post);

fwrite($fp, " ============== \n LIMPAR PK \n");

fwrite($fp, " Data e hora: ".date('d/m/y - H:i')." \n IP: $ip\n");

$ck_Ips = mssql_query("Select ID from ".DB_ACC.".dbo.cabal_auth_table Where ID='".$txtConta."'");

if(mssql_num_rows($ck_Ips) <= 0){

	fwrite($fp, "  Nenhum \n ============== \n");

}else{

	for($a=0;$a<mssql_num_rows($ck_Ips);$a++){

		$name = mssql_fetch_row($ck_Ips);

		fwrite($fp, " Login: $name[0]\n");
	}
	fwrite($fp, " ============== \n");
}
echo '<div class=\'ferrorbig\'>'.$txtConta.' esta tentando injectar dados inválidos para o sistema. Esta ação foi registrada e sua conta poderá ser banido permanentemente.</div>';
}

function Pergaminho($txtId)  {	
 $ip = getenv('REMOTE_ADDR');
 $arquivo = "LOGS/Pergaminho.log";
 $fp = fopen($arquivo, "a");
 $conteudo = @fread($fp, filesize($arquivo));
 $requested = stripslashes($_SERVER['REQUEST_URI']);
 $posted = stripslashes($post);

fwrite($fp, " ------Pergaminho------\nResponsavel : $txtId\nData e hora : ".date('d/m/y - H:i')."\nIP          : $ip\n-----------------------------\n\n");
}

function BurlarNacao($txtConta) {
 $ip = getenv('REMOTE_ADDR');
 $arquivo = "Logs/Nacao.log";
 $fp = fopen($arquivo, "a");
 $conteudo = @fread($fp, filesize($arquivo));
 $requested = stripslashes($_SERVER['REQUEST_URI']);
 $posted = stripslashes($post);

fwrite($fp, " ============== \n ESCOLHA DE NAÇÃO \n");

fwrite($fp, " Data e hora: ".date('d/m/y - H:i')." \n IP: $ip\n");

$ck_Ips = mssql_query("Select ID from ".DB_ACC.".dbo.cabal_auth_table Where ID='".$txtConta."'");

if(mssql_num_rows($ck_Ips) <= 0){

	fwrite($fp, "  Nenhum \n ============== \n");

}else{

	for($a=0;$a<mssql_num_rows($ck_Ips);$a++){

		$name = mssql_fetch_row($ck_Ips);

		fwrite($fp, " Login: $name[0]\n");
	}
	fwrite($fp, " ============== \n");
}
echo'<div class=\'ferrorbig\'>'.$txtConta.' esta tentando injectar dados inválidos para o sistema. Esta ação foi registrada e sua conta poderá ser banido permanentemente.</div>';
}
function BurlarNacaoGm($txtConta) {
 $ip = getenv('REMOTE_ADDR');
 $arquivo = "Logs/Nacao.log";
 $fp = fopen($arquivo, "a");
 $conteudo = @fread($fp, filesize($arquivo));
 $requested = stripslashes($_SERVER['REQUEST_URI']);
 $posted = stripslashes($post);

fwrite($fp, " ============== \n ESCOLHA DE NAÇÃO \n");

fwrite($fp, " Data e hora: ".date('d/m/y - H:i')." \n IP: $ip\n");

$ck_Ips = mssql_query("Select ID from ".DB_ACC.".dbo.cabal_auth_table Where ID='".$txtConta."'");

if(mssql_num_rows($ck_Ips) <= 0){

	fwrite($fp, "  Nenhum \n ============== \n");

}else{

	for($a=0;$a<mssql_num_rows($ck_Ips);$a++){

		$name = mssql_fetch_row($ck_Ips);

		fwrite($fp, " Login: $name[0]\n");
	}
	fwrite($fp, " ============== \n");
}
echo'<div class=\'ferrorbig\'>'.$txtConta.' esta tentando injectar dados inválidos para o sistema. Esta ação foi registrada e sua conta poderá ser banido permanentemente.</div>';
}
?>