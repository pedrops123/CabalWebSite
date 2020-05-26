<?php
$_SESSION = "";
$serverName = "DESKTOP-9IU6ULD\SQLEXPRESS"; 
/***************************************************************************************************************************/
define('DB_ADDR','localhost');   //Ip do host                                      
define('DB_USER','CABAL_ADMIN'); //Id SQL (sa)                                 
define('DB_PASS','1234');        //Senha SQL

//serverName\instanceName, portNumber (1433 by default)
$connectionInfoAccount = array("Database"=> "ACCOUNT" , "UID"=>"CABAL_ADMIN", "PWD"=>"1234");
$connectionInfoAuth = array( "Database"=> "AUTHENTICATION", "UID"=>"CABAL_ADMIN", "PWD"=>"1234");
$connectionInfoCash = array( "Database"=> "CABALCASH", "UID"=>"CABAL_ADMIN", "PWD"=>"1234");
$connectionInfoGuild = array( "Database"=> "CABALGUILD", "UID"=>"CABAL_ADMIN", "PWD"=>"1234");
$connectionInfoManager = array( "Database"=> "CABALMANAGER", "UID"=>"CABAL_ADMIN", "PWD"=>"1234");
$connectionInfoCashShop = array( "Database"=> "CASHSHOP", "UID"=>"CABAL_ADMIN", "PWD"=>"1234");
$connectionInfoEvent = array( "Database"=> "EVENTDATA", "UID"=>"CABAL_ADMIN", "PWD"=>"1234");
$connectionInfoSrv01 = array( "Database"=> "SERVER01", "UID"=>"CABAL_ADMIN", "PWD"=>"1234");

$conectionAccount = sqlsrv_connect($serverName,$connectionInfoAccount);
$conectionAuth = sqlsrv_connect($serverName,$connectionInfoAuth);
$conectionCash = sqlsrv_connect($serverName,$connectionInfoCash);
$conectionGuild = sqlsrv_connect($serverName,$connectionInfoGuild);
$conectionManager = sqlsrv_connect($serverName,$connectionInfoManager);
$conectionCashShop = sqlsrv_connect($serverName,$connectionInfoCashShop);
$conectionEvent = sqlsrv_connect($serverName , $connectionInfoEvent);
$conectionSrv = sqlsrv_connect($serverName , $connectionInfoSrv01);

define('DB_ACC','ACCOUNT');     //DB de contas (Padro ACCOUNT)
define('DB_GAM','SERVER01');      //DB de Chars (Padro GAMEDB)
define('DB_CCA','CABALCASH');   //DB de itemshop (Padro CABALCASH)
define('DB_CSH','CABALCASH');    //DB do Cash (Padro CASHSHOP)
define('SVR_IDX','25');         //Server Idx
/***************************************************************************************************************************/
$Config_SMTP['Server']   = "mail.eliteworldgames.com";
$Config_SMTP['From']     = "noreply@eliteworldgames.com";
$Config_SMTP['User']     = "noreply@eliteworldgames.com";
$Config_SMTP['Password'] = "jdsfm2346fd//";
$Config_SMTP['Debug']    = false;
$Config_SMTP['RETORNO']  = ""; //Link de retorno ao confirmar o registro (Padro  a url do site do game http://....)
$confGeral['ATIVAR_VIP'] = "0";   //Tipo de conta ser ganha ao se cadastrar ( 0= FREE / 1= VIP)
$confGeral['DIAS_VIP']   = "0";   //Caso ganhe conta vip coloque os dias que ser ganho
/***************************************************************************************************************************/
$confGeral['ID_ADM'] = array(''); //Login dos adms  p/ acessar ao painel de ADM e editor do shop                      
//
$confGeral['ID_GM']  = array('dasdasdasdadasdasdaDASDASdasdasdASDASDASDasdasdadsdSADASDAS'); //Login dos Gms p/ acessar ao painel de GM                     
/***************************************************************************************************************************/
$confCabal['EQUIPE']   = ""; //Titulo da barra do navegador
$confCabal['TITULO']   = "Cabal Online - Terceiro Despertar"; //Titulo da barra do navegador
$confCabal['SVNOME']   = ""; //Titulo do rodap site e cadastro
$confCabal['VERSAO']   = "EP8 - BM3"; //Verso do server
$confCabal['EXP']   = "x150"; //Exp do server
$confCabal['ALZ']   = "x150"; //Exp Alz
$confCabal['CRAFT'] = "x150"; //Exp craft
$confCabal['SKILL'] = "x150"; //Exp skill
$confCabal['DROP']  = "x25"; //Exp drop
$confCabal['DROPITEM']  = "2"; //Drop de item por mob
$confCabal['NOME_MOEDA']       = "COIN"; //Nome da moeda Cash
$confCabal['NOME_MOEDA_EVENT'] = "POINT"; //Nome da moeda de evento
$confCabal['FORUM'] = ""; //Link do Forum
$confCabal['facebook'] = ""; //Link Curtir do Facebook
/***************************************************************************************************************************/
$confCabal['DOWNLOAD01']   = ""; //Link client completo opo 1
$confCabal['DOWNLOAD02']   = ""; //Link client completo opo 2
$confCabal['Patch01']        = ""; // Link Patch
/***************************************************************************************************************************/
$confCabal['XTREME']     = "http://www.xtremetop100.com";    //Link gerado pelo xtremetop 100 (D = Desativa)
$confCabal['TOPGAMES']   = "http://topg.org"; //Link gerado pelo topgames 100 (D = Desativa)
$confCabal['GAMESSITES'] = "http://www.gamesites100.net"; //Link gerado pelo gamessites 100 (D = Desativa)
$confCabal['TOPG']       = "http://www.gtop100.com"; //Link gerado pelo topg 100 (D = Desativa)
/***************************************************************************************************************************/
$confCabal['MRESET']   = "5";    //Numero de reset para efetuar master reset
$confCabal['CASH']     = "5000"; //Quantidade de cash ganho por Master Reset
$confCabal['CASHVOTE'] = "5"; //Quantidade de cash prata ganho por votar

$confCabal['LIMPARPK'] = "1"; //Quantidade de cash prata ganho por votar
/***************************************************************************************************************************/
$confCabal['PACK0'] = "500"; //Quantia de cash ganho por doar R$ 5,00
$confCabal['PACK1'] = "1000"; //Quantia de cash ganho por doar R$ 10,00
$confCabal['PACK2'] = "2000"; //Quantia de cash ganho por doar R$ 20,00
$confCabal['PACK3'] = "3000"; //Quantia de cash ganho por doar R$ 30,00
$confCabal['PACK4'] = "4000"; //Quantia de cash ganho por doar R$ 40,00
$confCabal['PACK5'] = "5000"; //Quantia de cash ganho por doar R$ 50,00
$confCabal['PACK6'] = "15000"; //Quantia de cash ganho por doar R$ 100,00
/***************************************************************************************************************************/
$confCabal['LVLVIP']  = "170"; //Level minimo para reset VIP
$confCabal['LVLFREE'] = "175"; //Level minimo para reset FREE

$confCabal['PNTVIP']  = "50"; //Quantidade de pontos ganho por reset VIP
$confCabal['PNTFREE'] = "50"; //Quantidade de pontos ganho por reset FREE

$confCabal['STRVIP']  = "15"; //Quantidade STR ao resetar VIP
$confCabal['INTVIP']  = "15"; //Quantidade INT ao resetar VIP
$confCabal['DEXVIP']  = "15"; //Quantidade DEX ao resetar VIP
$confCabal['STRFREE'] = "15"; //Quantidade STR ao resetar FREE
$confCabal['INTFREE'] = "15"; //Quantidade INT ao resetar FREE
$confCabal['DEXFREE'] = "15"; //Quantidade DEX ao resetar FREE

$confCabal['LIMITE']  = "5"; //Limite de reset

$confCabal['POINT']   = "20";   //EVO-POINT cobrado por reset (valor multiplica a cada reset)

$confCabal['LVLN']    = "150"; //Level minimo para obter nao
$confCabal['ALZN']    = "50000000"; //Alz cobrado para obter nao
/***************************************************************************************************************************/
$confCabal['CANAL'] = array(1  => '--[Canal 1]--',
                            2  => '-- [Canal 2] --',
							3  => '-- [Canal 3] --',
							4  => '-- [Canal 4] --',
							5  => '-- [Canal Vip] --',
							6  => '-- [Canal De Guerra] --',
							7  => '-- [Guerra das Na��es 140-169]--',
							8  => '-- [Guerra das Na��es 170-190]--',
							9  => 'Canal 9',
							10 => 'Tierra Gloriosa');
/***************************************************************************************************************************/
$confCabal['MAPA'] =  array(1  => '<font color=yellow>Tundra Infame</font>',
                            2  => '<font color=yellow>Deserto Lamentao</font>',
							3  => '<font color=yellow>Floresta Desespero</font>',
							4  => '<font color=yellow">Porto Lux</font>',
							5  => '<font color=yellow>Forte Ruina</font>',
							6  => '<font color=yellow>Elo Perdido</font>',
							7  => '<font color=yellow>Regiao dos Lagos</font>',
							8  => '<font color=yellow>Santurio Profano</font>',
							9  => '<font color=yellow>Floresta Mutante</font>',
							10 => '<font color=yellow>Pontus Ferrum</font>',
							11 => '<font color=yellow>Forte Infernus</font>',
							12 => '<font color=yellow>Vila Misteriosa</font>',
							13 => '<font color=red>Dragona dos Mortos</font>',
							14 => '<font color=red>Tropa de Soldados</font>',
							15 => '<font color=pink>Tierra Gloriosa</font>',
							16 => '<font color=blue>Tierra Gloriosa[Espera]</font>',
							17 => '<font color=yellow>Locomotiva Maluca</font>',
							18 => '<font color=yellow>Selo da Escuridao</font>',
							19 => '<font color=green>Prisao</font>',
							20 => '<font color="#FF0000">Arena Do Caos</font>',
							21 => 'Calabouo',
							22 => '<font color=yellow>Posto Avancado de Maquinas</font>',
							23 => '<font color=yellow>Templo Esquecido 1SS</font>',
							24 => '<font color=yellow>Templo Esquecido 2SS</font>',
							25 => 'Calabouo',
							26 => '<font color=yellow>Lago do Crepusculo</font>',
							27 => 'Calabouo',
							28 => 'Calabouo',
							29 => 'Calabouo',
							30 => '<font color=yellow>Central de Teleporte</font>',
							31 => 'Calabouo',
							32 => 'Calabouo',
							33 => 'Calabouo',
							34 => 'Calabouo',
							35 => 'Calabouo',
							36 => 'Calabouo',
							37 => 'Calabouo',
							38 => 'Calabouo');
/***************************************************************************************************************************/
function anti_injection($sql, $formUse = true)	
{	
$sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/i","",$sql);	
$sql = trim($sql);
$sql = strip_tags($sql);	

$sql = addslashes($sql);	
return $sql;	
}	
function clean_variable($var)
{
	$newvar = preg_replace('/[^a-zA-Z0-9\_\-\@\ \!\>\<\#\$\%\^\.\+\-\&\*\(\)\`\:\.\}\{\]\[]/', '', $var);
	return $newvar;
}
$_REQUEST = clean_variable($_REQUEST);
$_POST = clean_variable($_POST);
$_GET = clean_variable($_GET);
$_COOKIE = clean_variable($_COOKIE);
$_SESSION = clean_variable($_SESSION);
$badwords = array(";","'", "+", "--","/","|",":", "=", "%", "(", ")","DROP", "SELECT", "UPDATE", "DELETE", "drop", "select", "update", "delete", "WHERE", "where", "-1", "-2", "-3","-4", "-5", "-6", "-7", "-8", "-9",);
foreach($_POST as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0)
die('<div class=\'ferrorbig\'>Acao Proibida,voce digitou caracteres ilegais.</div>');

foreach($_GET as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0)
die('<div class=\'ferrorbig\'>Acao Proibida,voce digitou caracteres ilegais.</div>');

foreach($_COOKIE as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0)
die('<div class=\'ferrorbig\'>Acao Proibida,voce digitou caracteres ilegais.</div>');

foreach($_REQUEST as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0)
die('<div class=\'ferrorbig\'>Acoa Proibida,voce digitou caracteres ilegais.</div>');
$link = sqlsrv_connect($serverName ,$connectionInfoAccount);  //no mexa
if (!$link) die('Falha ao conectar com o MSSQL do Cabal online.');
$ck_Config = sqlsrv_query($conectionAccount , "SELECT * FROM ".DB_ACC.".dbo.SITE_CONFIG");
header("Content-Type: text/html; charset=utf-8",true) ;
/***************************************************************************************************************************/
?>
