
<?php
function anti_injection($sql, $formUse = true)	
{	
$sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/i","",$sql);	
$sql = trim($sql);
$sql = strip_tags($sql);	
if(!$formUse || !get_magic_quotes_gpc())	
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

?>