<?php
/***************************************************************************************************************************/
//                                                            
//                                         CONFIGURAÇÂO ACESSO AO BANCO DE DADOS
//
/***************************************************************************************************************************/
define('DB_ADDR','localhost');  //Ip do host                                      
define('DB_USER','CABAL_ADMIN');         //Id SQL (sa)                                 
define('DB_PASS','1234');        //Senha SQL
define('DB_ACC','ACCOUNT');     //DB de contas (Padrão ACCOUNT)
define('DB_GAM','SERVER01');      //DB de Chars (Padrão GAMEDB)
define('DB_CCA','CABALCASH');   //DB de itemshop (Padrão CABALCASH)
define('DB_CSH','CABALCASH');    //DB do Cash (Padrão CASHSHOP)
define('SVR_IDX','25');         //Server Idx
/***************************************************************************************************************************/
//
//
//
//
/***************************************************************************************************************************/
//                                                            
//                               CONFIG AO ACESSO DO PAINEL DE ADM/GM E EDITOR DO SHOP
// IMPORTANTE:
// Caso deseja adicionar varios login para acessar, siga exatamente ao exemplo abaixo!
/***************************************************************************************************************************/
$confGeral['ID_ADM'] = array(''); //Login dos adms  p/ acessar ao painel de ADM e editor do shop                                         
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
$confCabal['NOME_MOEDA']       = ""; //Nome da moeda Cash
$confCabal['NOME_MOEDA_EVENT'] = ""; //Nome da moeda de evento
/***************************************************************************************************************************/
//
//
//
//
/***************************************************************************************************************************/
//                                                            
//                                               NOME DOS CANAIS DO SERVIDOR
//
/***************************************************************************************************************************/
$confCabal['CANAL'] = array(1  => '--[Canal 1]--',
                            2  => '-- [Canal 2] --',
							3  => '-- [Canal 3] --',
							4  => '-- [Canal 4] --',
							5  => '-- [Canal Vip] --',
							6  => '-- [Canal De Guerra] --',
							7  => '-- [Guerra das Naçoes 140-169]--',
							8  => '-- [Guerra das Naçoes 170-190]--',
							9  => 'Canal 9',
							10 => 'Tierra Gloriosa');
/**************************************************************************************************************************/
//
//
//
//
/***************************************************************************************************************************/
//                                                            
//                                                   NOME DOS MAPAS
//
/***************************************************************************************************************************/
$confCabal['MAPA'] =  array(1  => '<font color=yellow>Tundra Infame</font>',
                            2  => '<font color=yellow>Deserto Lamentação</font>',
							3  => '<font color=yellow>Floresta Desespero</font>',
							4  => '<font color=yellow">Porto Lux</font>',
							5  => '<font color=yellow>Forte Ruina</font>',
							6  => '<font color=yellow>Elo Perdido</font>',
							7  => '<font color=yellow>Regiao dos Lagos</font>',
							8  => '<font color=yellow>Santuário Profano</font>',
							9  => '<font color=yellow>Floresta Mutante</font>',
							10 => '<font color=yellow>Pontus Ferrum</font>',
							11 => '<font color=yellow>Forte Infernus</font>',
							12 => 'Calabouço',
							13 => 'Calabouço',
							14 => 'Calabouço',
							15 => 'Calabouço',
							16 => 'Calabouço',
							17 => 'Calabouço',
							18 => 'Calabouço',
							19 => 'Calabouço',
							20 => '<font color="#FF0000">Arena Do Caos</font>',
							21 => 'Calabouço',
							22 => 'Calabouço',
							23 => 'Calabouço',
							24 => 'Calabouço',
							25 => 'Calabouço',
							26 => 'Calabouço',
							27 => 'Calabouço',
							28 => 'Calabouço',
							29 => 'Calabouço',
							30 => 'Calabouço',
							31 => 'Calabouço',
							32 => 'Calabouço',
							33 => 'Calabouço',
							34 => 'Calabouço',
							35 => 'Calabouço',
							36 => 'Calabouço',
							37 => 'Calabouço',
							38 => 'Calabouço');
/**************************************************************************************************************************/
//
//
//
//
/***************************************************************************************************************************/
//                                                            
//                                             CONEXÃO COM O BANCO NÃO MEXA
//
/***************************************************************************************************************************/
$link = sqlsrv_connect(DB_ADDR, DB_USER, DB_PASS);  //não mexa
if (!$link) die('Falha ao conectar com o sqlsrv do Cabal online.');
$ck_Config = sqlsrv_fetch_array(sqlsrv_query("SELECT * FROM ".DB_ACC.".dbo.SITE_CONFIG"));
header("Content-Type: text/html; charset=utf-8",true) ;
/***************************************************************************************************************************/
?>
