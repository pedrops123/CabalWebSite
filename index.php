<?php                
require('_conf/confCabal.php');
session_start();
ob_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>  

<title><?php echo($confCabal['TITULO']) ?></title>

<meta name="title"                 content="<?=$confCabal['TITULO']?>">
<meta name="DC.Title"              content="<?=$confCabal['TITULO']?>">
<meta http-equiv="title"           content="<?=$confCabal['TITULO']?>">
<meta name="keywords"              content="<?=$confCabal['TITULO']?>">
<meta http-equiv="keywords"        content="<?=$confCabal['TITULO']?>">
<meta name="description"           content="<?=$confCabal['TITULO']?>">
<meta http-equiv="description"     content="<?=$confCabal['TITULO']?>">
<meta http-equiv="DC.Description"  content="<?=$confCabal['TITULO']?>">
<meta name="author"                content="<?=$confCabal['TITULO']?>">
<meta name="DC.Creator"            content="<?=$confCabal['TITULO']?>">
<meta name="vw96.objectype"        content="Homepage">
<meta name="resource-type"         content="Homepage">
<meta http-equiv="Content-Type"    content="text/html; charset=utf-8" />
<meta name="distribution"          content="all">
<meta name="robots"                content="all">
<meta name="revisit"               content="3 days">

<div id="grayBG" class="grayBox" style="display:none;"></div> 
<div id="LightBox1" class="box_content" style="display:none;">
<table cellpadding="3" cellspacing="0" border="0"> 
  <tr align="left"> 
    <td colspan="2" bgcolor="#FFFFFF" style="padding:10px;"><div onclick="displayHideBox('1'); return false;" style="cursor:pointer;" align="right"></b><font color="#000">Fechar</font></b></div><p><br /><font color="#000"><!-- Box content -->2012-2013 - Cabal Evolution<br>
Nós não temos de modo nenhum vínculo com a ESTSOFT ou Cabal Online Brasil ( Gamemaxx ), este servidor é destinado exclusivamente para fins de Lazer!<br></font></p></td> 
  </tr> 
</table> 
</div> 

<!--[if IE 6]> 
<script type="text/javascript">window.location.href = "acessonegado.php";</script>
<![endif]-->
<!--[if IE 7]> 
<script type="text/javascript">window.location.href = "acessonegado.php";</script>
<![endif]-->
<!--[if IE 8]> 
<script type="text/javascript">window.location.href = "acessonegado.php";</script>
<![endif]-->
<!--[if IE 9]> 
<script type="text/javascript">window.location.href = "acessonegado.php";</script>
<![endif]--> 
<!--[if IE 10]> 
<script type="text/javascript">window.location.href = "acessonegado.php";</script>
<![endif]-->

<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link type="text/css" rel="stylesheet" media="screen" charset="utf-8" href="js/prototip2.2.4/css/prototip.css" />
<link type="text/css" rel="stylesheet" media="screen" charset="utf-8" href="js/tinybox2/style.css" />
<link type="text/css" rel="stylesheet" media="screen" charset="utf-8" href="css/protoshow.css">
<link rel="stylesheet" href="css/Corpo.css" type="text/css" media="screen" />

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--
<script type="text/javascript" src="js/scriptaculous/lib/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous/src/scriptaculous.js"></script>
<script type='text/javascript' src='js/prototip2.2.4/js/prototip/prototip.js'></script>

<script type='text/javascript' src='js/tinybox2/tinybox.js'></script>
<script type="text/javascript" src="js/propios.js"></script>
-->
<script type="text/javascript">
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;
    if((tecla > 47 && tecla < 58)) return true;
    else{
    if (tecla != 8) return false;
    else return true;
    }
}
</script>
<script type="text/javascript">
var persistmenu="yes"
var persisttype="sitewide"

if (document.getElementById){ //DynamicDrive.com change
document.write('<style type="text/css">\n')
document.write('.submenu{display: none;}\n')
document.write('</style>\n')
}


function SwitchMenu(obj){
	if(document.getElementById){
	var el = document.getElementById(obj);
	var ar = document.getElementById("masterdiv").getElementsByTagName("span"); //DynamicDrive.com change
		if(el.style.display != "block"){ //DynamicDrive.com change
			for (var i=0; i<ar.length; i++){
				if (ar[i].className=="submenu") //DynamicDrive.com change
				ar[i].style.display = "none";
			}
			el.style.display = "block";
		}else{
			el.style.display = "none";
		}
	}
}

function get_cookie(Name) { 
var search = Name + "="
var returnvalue = "";
if (document.cookie.length > 0) {
offset = document.cookie.indexOf(search)
if (offset != -1) { 
offset += search.length
end = document.cookie.indexOf(";", offset);
if (end == -1) end = document.cookie.length;
returnvalue=unescape(document.cookie.substring(offset, end))
}
}
return returnvalue;
}

function onloadfunction(){
if (persistmenu=="yes"){
var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
var cookievalue=get_cookie(cookiename)
if (cookievalue!="")
document.getElementById(cookievalue).style.display="block"
}
}

function savemenustate(){
var inc=1, blockid=""
while (document.getElementById("sub"+inc)){
if (document.getElementById("sub"+inc).style.display=="block"){
blockid="sub"+inc
break
}
inc++
}
var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
var cookievalue=(persisttype=="sitewide")? blockid+";path=/" : blockid
document.cookie=cookiename+"="+cookievalue
}

if (window.addEventListener)
window.addEventListener("load", onloadfunction, false)
else if (window.attachEvent)
window.attachEvent("onload", onloadfunction)
else if (document.getElementById)
window.onload=onloadfunction

if (persistmenu=="yes" && document.getElementById)
window.onunload=savemenustate
 
function showProgress() { 
    var pb = document.getElementById("progressBar"); 
    pb.innerHTML = '<img src="images/loading.gif" />'; 
    pb.style.display = ''; 
} 
</script> 
<script language="JavaScript" type="text/javascript">
var i = 0; //initialize the counter
var slide; //setup the image array variable
function SlideShow() {
  //fade out the current slide
  $( slide[i] ).fade({ duration:5 });
  //add 1 to i
  i++;
  //check if we've reached the end of our slides, if so, rewind i to 0
  if (i == slide.length) i = 0;
  //fade in the next slide and after it's finished, loop this function
  $( slide[i] ).appear({ duration:5, afterFinish: function () { SlideShow(); } });
}
//start my functions after the document has loaded
document.observe('dom:loaded', function () {
  //hide all of the slideshow images
  $$('#slideshow img').each(function(image){ $(image).hide(); });
  //dump the images into an array
  slide =  $('slideshow').childElements();
  //fade in the first slide and after it's finished, start the slideshow
  $( slide[0] ).appear({ duration:5, afterFinish: function () { SlideShow(); } });
  $$('a[rel]').each(function(element){ new Tip(element, element.rel, { className: 'default', delay: 0.1 }); });
});
window.onload = function()
{
  if (self != top) top.location = self.location;
  jsClockTimeZone();
};
</script>
</head>

<body>
<style>
.donate { background: url(images/b_donate.png) no-repeat scroll 0 0 transparent; width: 153px; height: 153px; position: absolute; left: 50%; margin-left: -450px; margin-top: 250px; z-index: 100; }
.donate:hover { background: url(images/b_donate.png) no-repeat scroll 0 -153px transparent; }
</style>
<!-------------------------------------------- Donate Box Hover ------------------------------------------------->
<a onclick="new Ajax.Updater('container', '_Donate/dt.Geral.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" href="#">
<div class="donate"></div>
</a>
<!--------------------------------------------------------------------------------------------------------------->
<div class="topmenu" >
  <?php  include("PaginaPrincipal/header/header.php"); ?>
</div>

<div style="left: 50%; margin-left: -386px; padding-top: 320px; position: relative; z-index: 10;">
  <div class="left">
     <div class="banner">
   
    <?php 
    
	    $ck_Banner = sqlsrv_fetch_array(sqlsrv_query($conectionAccount  ,"SELECT * FROM ".DB_ACC.".dbo.Cabal_Banner order by CodBanner desc"));
	?>
	<img src="images/banners/ban01.jpg" border=0 width="620" height="214">
   
    
   </div>
<div style="height:4px;"></div>
    <div class="content">
      <div id="container" name="container" class="container">
  <!-- main container -->
  <div id='fb-root'></div>
       
  <div class="nbody">
<?php

 $ck_MensSite = sqlsrv_query($conectionAccount, "SELECT TOP 10 * FROM ".DB_ACC.".dbo.Cabal_Mens_Site WHERE Status = 0 order by Data desc");
   
   for ($i=1; $i<= sqlsrv_num_rows($ck_MensSite);$i++)
		{ 
		$ck_MensSite_Result = sqlsrv_fetch_array($ck_MensSite);
		
 ?>  
<div class="nbody nbody_N">
  <div class="nbar nbar_N" onclick="$('<?=$ck_MensSite_Result['CodMens']?>-<?=$ck_MensSite_Result['CodMens']?>').toggle(); ">
    <div style="padding: 5px; 0px;">
      <div class="ntitle" style="float: left;">
      </div>
      <div class="ndate" style="float: left;"><b><?=$ck_MensSite_Result['Assunto']?></b></div>
      <div class="ndate" style="float: right;"><b><?=date('[d-m-Y]',strtotime($ck_MensSite_Result['Data']))?></b></div>
      <div class="clear"></div>
  </div>
  </div>
  <div id="<?=$ck_MensSite_Result['CodMens']?>-<?=$ck_MensSite_Result['CodMens']?>" name="<?=$ck_MensSite_Result['CodMens']?>-<?=$ck_MensSite_Result['CodMens']?>" 
  style=' <?php switch($ck_MensSite_Result['AbreFecha'])
	  {
		  case 0 : echo'display: none;'; break;
		  case 1 : echo''; break;
	  }
	  ?>'>
    <div class="ntext" align="justify">
      <div align="justify" style="float: left; width: 95%; position: relative;">
       <?=nl2br($ck_MensSite_Result['Mens'])?>
      </div>
      
      <div style="clear: both;"></div>
    </div>
    <div class="nfooter nfooter_N">
      <div style="float: left; padding: 5px; margin: 0px; height: 20px;">
        
        <div style="margin: 0; padding: 0 position: relative; float: left;">
       </div>
      </div>
      <div style="padding: 5px;">
        <a href="<?=$ck_MensSite_Result['LinkForum']?>" target="Forum" title="Leia mais">
          <div class="nmore nmore_N" style="float: right;">LEIA MAIS</div>
        </a>
      </div>
      <div style="clear: both;"></div>
    </div>
  </div>
</div>
<?php } ?>

  </div>
  
      </div>
	   <div class="copyright">
	   <script type="text/javascript" language="javascript"> 
/* Superior Web Systems */ 
function displayHideBox(boxNumber) 
{ 
    if(document.getElementById("LightBox"+boxNumber).style.display=="none") {
        document.getElementById("LightBox"+boxNumber).style.display="block";
        document.getElementById("grayBG").style.display="block"; 
    } else { 
        document.getElementById("LightBox"+boxNumber).style.display="none";
        document.getElementById("grayBG").style.display="none"; 
    } 
} 
</script> 
<style> 
.grayBox{ 
    position: fixed; 
    top: 0%; 
    left: 0%; 
    width: 100%; 
    height: 100%; 
    background-color: black; 
    z-index:1001; 
    -moz-opacity: 0.8; 
    opacity:.80; 
    filter: alpha(opacity=80); 
} 
.box_content { 
    position: fixed; 
    top: 25%; 
    left: 30%; 
    right: 30%; 
    width: 40%; 
    padding: 16px; 
    z-index:1002; 
    overflow: auto; 
} 
</style> 
	   
	
	  

@2013 - Cabal Evolution (Cabal Online) - <a href="#" onclick="displayHideBox('1'); return false;">Clique aqui para mais informações sobre os direitos em relação ao nosso servidor</a><br><center>WebCoder (<a href="#">IRON | NICKE</a>)</center>



</div>
    </div>
  </div>


  <div class="right">
    <div class="buttons">
      <div class="servertime">
        <div style="float: left;">SERVER TEMPO</div>
        <div style="float: right;"><span id="timeserver" name="timeserver">00:00:00</span></div>
        <div class="clear"></div>
      </div>
     
       <?php
          if(isset($_SESSION['ss_txtLogin']) and isset($_SESSION['ss_txtSenha'])){
			  				
        $ckConta = sqlsrv_fetch_array(sqlsrv_query($conectionAccount ,"SELECT * FROM ".DB_ACC.".dbo.cabal_auth_table  WHERE ID='".$_SESSION['ss_txtLogin']."'"));
				$ckVip   = sqlsrv_fetch_array(sqlsrv_query($conectionAccount ,"SELECT * FROM ".DB_ACC.".dbo.cabal_charge_auth WHERE UserNum='".$ckConta['UserNum']."'"));
				$ckCoin  = sqlsrv_fetch_array(sqlsrv_query($conectionAccount ,"SELECT * FROM CabalCash.dbo.CashAccount WHERE UserNum='".$ckConta['UserNum']."'"));
				$cMens   = sqlsrv_fetch_row(sqlsrv_query($conectionAccount ,"SELECT count(ID) FROM ".DB_ACC.".dbo.Cabal_Mensagem WHERE ID='".$_SESSION['ss_txtLogin']."' AND Status = 0"));
				$UserNum = $ckConta['UserNum'];
        ?>
         <div class="login">
      <div class="login1">
         <div style="font: 12px/14px Arial, sans-serif;">

       <?php
	     if(in_array($_SESSION['ss_txtLogin'],$confGeral['ID_ADM']))
		 { 
		   echo'Bem vindo: <strong>'.strtoupper($_SESSION['ss_txtLogin']).'</strong><br><br>';
		   echo'<li>Painel Administrativo</li><hr> ';
		   $cDonate  = sqlsrv_fetch_row(sqlsrv_query($conectionAccount ,"SELECT count(CodDonate) FROM ".DB_ACC.".dbo.Cabal_Donate WHERE Status = 0")); ?>
		   
		       
 - <a onclick="new Ajax.Updater('container','_admPanel/ap.edtConta.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Pesquisar : Conta / Char / Ip</a><br/>
 <!--- <a onclick="new Ajax.Updater('container','_admPanel/up.mudSenha.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Desligar Server</a><br/>
 - <a onclick="new Ajax.Updater('container','_admPanel/up.mudSenha.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Evento Cash</a><br/>
 - <a onclick="new Ajax.Updater('container','_admPanel/up.mudSenha.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Evento Vip</a><br/><br/>-->
 - <a onclick="new Ajax.Updater('container','_admPanel/_executarSite/ex.siteEnvMensPlayer.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Enviar Mensagem : Player</a><br/>
 - <a onclick="new Ajax.Updater('container','_admPanel/_executarSite/ex.siteGeral.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Enviar,Editar : Noticia / Banner </a><br/>        
   - <a onclick="new Ajax.Updater('container','_admPanel/_executarJogo/ex.envItem.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Enviar Item (EDITOR)</a><br/>     
 - <a onclick="new Ajax.Updater('container','_admPanel/_executarShop/ex.envItem.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Enviar Item (SHOP)</a><br/>
 - <a onclick="new Ajax.Updater('container','_admPanel/_executarShop/ex.edtItem.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Editar Item (SHOP)</a><br/>
 
 - <a onclick="new Ajax.Updater('container','_admPanel/_executarDonate/ex.Donate.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Entregar Donate (<b><u><?=$cDonate[0]?></u></b>)</a><br/>
 
 - <a onclick="new Ajax.Updater('container','_admPanel/_executarJogo/ex.pesqEstat.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Estatisticas do server</a><br/>
       
 - <a onclick="new Ajax.Updater('container','_admPanel/_executarConfig/ex.configGeral.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Configurações</a><br/>
		
		   	 
		<?php }
		  elseif(in_array($_SESSION['ss_txtLogin'],$confGeral['ID_GM']))
			   {
				 echo'Bem vindo: <strong>'.strtoupper($_SESSION['ss_txtLogin']).'</strong><br><br>'; ?>
				 <li>Painel do GM</li><hr>  
             - <a onclick="new Ajax.Updater('container','_gmPanel/_executarJogo/gm.edtConta.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">
                Pesquisar Conta / Char / Ip
                </a>
                <br />
				- <a onclick="new Ajax.Updater('container','_gmPanel/_executarJogo/gm.edtIP.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">
                Atualizar IP GM
                </a>
                <br />
				
        <?php  
			   }
			    else { 
             ?>
             Bem vindo: <strong><?=strtoupper($_SESSION['ss_txtLogin'])?> <font color="#FFFF00">(FREE)</font></strong><br>
Estado da Conta:  <?php 
		if($ckConta['AuthType'] <= 1) 
		{ 
echo'<font color="green">Normal</font>';
}
else {
echo'<font color="red">Banida</font><br> (<a onclick="new Ajax.Updater(\'container\',\'_userPanel/up.Perg.php\',{method: \'get\',asynchronous:true,evalScripts:true}); esperar(\'container\');" href="#">Pergaminho do Perdão</a>)'; 
}
?><br><br>
<li>Resumo Geral da Conta</li><hr>  
- Você possui:
           <a onclick="new Ajax.Updater('container','_userPanel/up.mensAdm.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#"> <img src="images/menson.png" height="11" width="17" border="0" title="Mensagens do ADM" /> (<?=$cMens[0]?>)<br> Mensagens Administrativas </a><br />

 <br><li>Administrar Conta / Char</li><hr>
  - <a onclick="new Ajax.Updater('container','_userPanel/up.mudSenha.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Mudar Senha</a><br/>
  
  - <a onclick="new Ajax.Updater('container','_userPanel/up.addPnt.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Distribuir Pontos</a><br/>
- <a onclick="new Ajax.Updater('container','_userPanel/up.limpPk.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Limpar PK</a><br/>     
<br><li>Doação & WebShop</li><hr>  
- <?=$confCabal['NOME_MOEDA']?> : <img src="images/pc.png"> <a href="#" onclick="abrirPag(\'_Donate/sisDonate.php\');"><?=number_format($ckCoin['Cash'])?></a><br />
          - <?=$confCabal['NOME_MOEDA_EVENT']?> : <img src="images/pc2.png"> <a href="#"><?=number_format($ckCoin['CashBonus'])?></a> <br /><br />

- <a onclick="new Ajax.Updater('container','_Donate/dt.Geral.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Adiquira EVO-Coins</a><br/>             
<?php if($ck_Config['Doacao'] == 1) { ?>
  - <a onclick="new Ajax.Updater('container','_userPanel/up.confDonate.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Confirmar Doação</a><br/>
  - <a onclick="new Ajax.Updater('container','_Donate/dt.Historico.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Historico de Doação</a><br/>
- <a onclick="new Ajax.Updater('container','_userPanel/up.HistoricoCompra.php',{method: 'get',asynchronous:true,evalScripts:true}); esperar('container');" href="#">Historico do WebShop</a><br/>
   
  <?php } ?>         
<?php
	    }
	    ?>
         <div style="text-align: right; padding: 7px 0 4px;">
         
     <a class="ssubmit" style="width: 80px; font-size: 11px;" href="_userPanel/up.Deslogar.php">DESLOGAR</a></div></div>
              
              <div class="clear"></div>
           </div>
         
        </div>
		 <?php
		  } else
		  { 
		 ?>
          <div class="login"> 
        <div class="login1">
       
          
            <div style="float: left;">
            <img src="images/login_text.png" border="0" style="margin: 3px 0 0 -3px;" />
          </div>
          <div style="float: right; width: 156px;">
            <form method="post" action="index.php">
              <input id="username" name="txtLogin" type="text" tabindex="1" maxlength="15" />
              <div style="height: 2px;"></div>
              <input id="password" name="txtSenha" type="password" tabindex="2" maxlength="15" />
           
          </div>
          <div class="clear" style="padding-top: 5px;"></div>
          <div style="float: left;">
           <a onclick="new Ajax.Updater('container', 'sisCadastrar.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" href="#" />
              <div class="register"></div>
            </a>
          </div>
          <div style="float: right; width: 72px;">
 
              <div class="submit"><b><input type="submit"  name="sbmtOk" value="LOGAR" onClick="showProgress()" style="width:72px; height:22px; font-size:12px; " title="LOGAR" /></b></div>
           
          </div>
          <div class="clear"></div>
          <div style="text-align: center; padding: 5px;"><a onclick="new Ajax.Updater('container', 'sisRecSenha.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container');" href="#">Esqueceu a senha ? <u>Clique aqui !</u></a></div>
        </div> </div> </form> 
		<?php
		 }
		?>
      <div style="height:2px;"></div>
       <div id="progressBar" style="display: none;" align="center">   
   <img src="images/loading.gif"/>
 </div>
 
 
<?php
   if(isset($_POST['sbmtOk'])) {
        $txtLogin = $_POST['txtLogin'];
		    $txtSenha = $_POST['txtSenha'];
	if(preg_match("[^0-9a-zA-Z ]", $txtLogin))
     $Error .= "<font color=red>Login inválido</font>";
    if(preg_match("[^0-9a-zA-Z ]", $txtSenha))
      $Error .= "<font color=red>Senha inválida</font>";
	if(empty($Error) == false)
	  echo '<div class=\'ferror\'>
             <center><b>'.$Error.'</b> </center>
            </div>';
	 else 
	 {	
    $sql_Conta = sqlsrv_query($conectionAccount,"select ID from ".DB_ACC.".dbo.cabal_auth_table where ID='".$txtLogin."'");
	$sql_Conta_result = sqlsrv_num_rows($sql_Conta);
		if($sql_Conta_result <= 0){
			echo '<div class=\'ferror\'>
			  <center> <b><font color=red>Login inválido</font></b> </center>
			 </div>' ;} 
		else {  
	$sql_Senha = sqlsrv_query($conectionAccount,'select ID,UserNum,AuthKey from account.dbo.cabal_auth_table where id="'.$txtLogin.'" and PWDCOMPARE("'.$txtSenha.'", Password) = 1 ');
		if (sqlsrv_num_rows($sql_Senha)==0) {
			echo '<div class=\'ferror\'>
			      <center><b><font color=red>Senha inválida</font></b> </center>
				 </div>' ;}	
		else {
		$row = sqlsrv_fetch_row($sql_Senha);
		$_SESSION['ss_txtLogin'] = $txtLogin;
        $_SESSION['ss_txtSenha'] = $txtSenha;
		echo '<div class=\'ferror\'>
			         <center><font color="#39e62c">LOGADO COM SUCESSO</font></center>
					</div>';
						echo"<meta http-equiv=refresh content=\"1;URL=./index.php\">";
		
 }  }
 echo'</li>';

         }
 }
 
 ?>
 
 <div style="height:1px;"></div>
      <div class="serverstatus">SERVER ONLINE</div>
      
      <div style="height:1px;"></div>
      <div id="storemenu" name="storemenu"> </div>
     <div class="button"> <a href="#" onclick="new Ajax.Updater('container', '_shop/shop.index.php', {method: 'get', asynchronous:true, evalScripts:true}); new Ajax.Updater('storemenu', '_shop/shop.menu.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container'); return false;" /><div class="webshop"></div></a></div>
      
      <div style="height:1px;"></div>
      
<?php 
	   if($ck_Config['Conversor'] == 1) { ?>
   <div class="button"><a href="#" onclick="new Ajax.Updater('container', '_userPanel/up.Conversor.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('container'); return false;" /><div class="conversor"></div></a></div>
   <div style="height:1px;"></div>
   <?php }
   
   $ck_Membros = sqlsrv_query($conectionSrv,'select count (*) from '.DB_GAM.'.dbo.cabal_character_table where Nation=1 or Nation=2');
  $tmembers = $ck_Membros[0];
  
  $ck_Capella = sqlsrv_query($conectionSrv,'select count (*) from '.DB_GAM.'.dbo.cabal_character_table where Nation=1');
  $cmembers   = $ck_Capella[0];
  if($tmembers > 0 &&  $cmembers > 0){
    $cper = round((100/$tmembers)*$cmembers,0);
  }
  
  
  $ck_Procyon =  sqlsrv_query($conectionSrv,'select count (*) from '.DB_GAM.'.dbo.cabal_character_table where Nation=2');
  $pmembers   =  $ck_Procyon[0];
  if($tmembers > 0 && $pmembers > 0 ){
    $pper =  round((100/$tmembers)*$pmembers,0);
  }
 
   if($cmembers > 0 || $pmembers > 0) { ?>
   <div class="button">
   <div class="tgstats">
  
   <table width="90%" height="18" cellpadding="0" cellspacing="0" border="0" style="padding-top: 42px;" align="center">
            <tr>
              <td width="45%" style="color: #eaeaea; padding: 2px 5px; text-align: left;">Capella <?=$cmembers?></td>
              <td width="10%" style="color: #eaeaea; padding: 2px 5px; text-align: left;"> -- </td>
              <td width="45%" style="color: #eaeaea; padding: 2px 5px; text-align: right;"><?=$pmembers?> Procyon</td>
            </tr>
          </table>
          <table width="90%" height="18" cellpadding="0" cellspacing="0" border="0" style="" align="center">
            <tr>
              <td width="<?=$cper?>%" style="background: none repeat 0 0 #63185e; color: #eaeaea; padding: 2px 2px; text-align: left;"><?=$cper?>%</td>
              <td width="<?=$pper?>%" style="background: none repeat 0 0 #194963; color: #eaeaea; padding: 2px 2px; text-align: right;"><?=$pper?>%</td>
            </tr>
          </table>
   </div></div><?php } ?>
  <div class="clear"></div>
    
        </div>
        <div style="height: 60px;"></div>
      </div>
    </div>
  </div>
 
</div>

</body>

</html>

<?php
ob_end_flush();
?>
<script type="text/javascript">
			var message="";
			function clickIE() {if (document.all) {(message);return false;}}
			function clickNS(e) {if (document.layers||(document.getElementById&&!document.all)) {if (e.which==2||e.which==3) {(message);return false;}}}
			if (document.layers) {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
			else {document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
			document.oncontextmenu=new Function("return false")
</script>
