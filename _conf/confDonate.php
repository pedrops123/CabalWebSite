<?php
/***************************************************************************************************************************/
//                                                            
//                                         SITE DESENVOLVIDO POR IRON                            
//                                      CONTATO: leandro-iron@hotmail.com
//                                        FAVOR NÃO RETIRAR OS CREDITOS
//
/***************************************************************************************************************************/
//
//
//
//
/***************************************************************************************************************************/
// Leia - me                                                           
// Abaixo se encontra todas as configurações necessarios para o site funcionar perfeitamente.                                       
// Leia atentamente todas as informações disponiveis para não haver erros!
/***************************************************************************************************************************/
//
//
//
//
/***************************************************************************************************************************/
//                                                            
//                                         CONFIGURAÇÂO ACESSO AO BANCO DE DADOS
//
/***************************************************************************************************************************/
define('DB_ADDR','localhost');  //Ip do host                                      
define('DB_USER','CABAL_ADMIN');         //Id SQL (sa)                                 
define('DB_PASS','1234');        //Senha SQL
define('DB_ACC','ACCOUNT');     //DB de contas (Padrão ACCOUNT)
/***************************************************************************************************************************/
//
//
//
//
/***************************************************************************************************************************/
//                                                            
//                                            CONFIGURAÇÕES DO SERVIDOR
//
/***************************************************************************************************************************/
$confCabal['EQUIPE']   = "OP"; //Titulo da barra do navegador
$confCabal['TITULO']   = "OrionPlay - Cabal online Private Server"; //Titulo da barra do navegador
$confCabal['SVNOME']   = "OrionPlay-Cabal"; //Titulo do rodapé site e cadastro
$confCabal['VERSAO']   = "EP2 Completo"; //Versão do server
$confCabal['NOME_MOEDA']       = ""; //Nome da moeda Cash
$confCabal['NOME_MOEDA_EVENT'] = ""; //Nome da moeda de evento
/***************************************************************************************************************************/
//
//
//
//
/***************************************************************************************************************************/
//                                                            
//                                     VALORES DOS PACOTES DE DOAÇÕES
//
/***************************************************************************************************************************/
$confCabal['PACK0'] = "500"; //Quantia de cash ganho por doar R$ 5,00
$confCabal['PACK1'] = "1000"; //Quantia de cash ganho por doar R$ 10,00
$confCabal['PACK2'] = "2000"; //Quantia de cash ganho por doar R$ 20,00
$confCabal['PACK3'] = "3000"; //Quantia de cash ganho por doar R$ 30,00
$confCabal['PACK4'] = "4000"; //Quantia de cash ganho por doar R$ 40,00
$confCabal['PACK5'] = "5000"; //Quantia de cash ganho por doar R$ 50,00
$confCabal['PACK6'] = "15000"; //Quantia de cash ganho por doar R$ 100,00
/***************************************************************************************************************************/
//
//
//
//
/***************************************************************************************************************************/
//                                                            
//                                             CONEXÃO COM O BANCO NÃO MEXA
//
/***************************************************************************************************************************/
$badwords = array(";","'", "+", "--","|",":", "=", "%", "(", ")","DROP", "SELECT", "UPDATE", "DELETE", "drop", "select", "update", "delete", "WHERE", "where", "-1", "-2", "-3","-4", "-5", "-6", "-7", "-8", "-9",);
foreach($_POST as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0)
die('<div class=\'ferrorbig\'>Ação Proibida,você digitou caracters ilegais.</div>');

foreach($_GET as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0)
die('<div class=\'ferrorbig\'>Ação Proibida,você digitou caracters ilegais.</div>');

foreach($_COOKIE as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0)
die('<div class=\'ferrorbig\'>Ação Proibida,você digitou caracters ilegais.</div>');

foreach($_REQUEST as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0)
die('<div class=\'ferrorbig\'>Ação Proibida,você digitou caracters ilegais.</div>');
$link = mssql_connect(DB_ADDR, DB_USER, DB_PASS);  //não mexa
if (!$link) die('Falha ao conectar com o MSSQL do Cabal online.');
$ck_Config = mssql_fetch_array(mssql_query("SELECT * FROM ".DB_ACC.".dbo.SITE_CONFIG"));
header("Content-Type: text/html; charset=utf-8",true) ;
/***************************************************************************************************************************/
?>
