<?
session_start();
ob_start();
unset($_SESSION["ss_txtLogin"]);
unset($_SESSION["ss_txtSenha"]);
header("Location: ../index.php");
?>