<?php
/*  Mudei a equipe na descrição dos pagamentos OP e Project Att. Niicke              */

include('../_userPanel/_funcUserPanel/funcDados.php');

if($ck_Conta['AuthKey'] == FALSE)
  { 
      include('../_erros/UserPanel.php'); 
  }
  else 
  {
	  if($ck_Config['DoacaoT'] == 0)
  { 
      include('./_erros/offPanel.php'); 
  }
  else 
  {
		
?>
<style>
.tbbody {
width: 100%;
padding: 0px;
font-size: 12px;
color: #101010;
background: #696B6C;
border: 1px solid #393831;
display: table;
border-collapse: separate;
border-spacing: 2px;
border-color: gray;
}
.tbbody {
  width:100%;
  padding:0px;
  font-size:12px;
  color:#101010;
  background:#696b6c;
  border:1px solid #393831;
}

.formpsc {
  width:100%;
  padding:0dpx;
  cellpadding:15px;
  font-size:12px;
  color:#101010;
  background:#696b6c;
  border:1px solid #393831;
}

.formpsctd {
  padding:10px 20px;
  cellspacing:10px;
  color:#c0c0c0;
  font-size:12px;
}

.formpsctd2 {
  padding:3px 5px;
  cellspacing:2px;
  color:#f2f2f2;
  font-size:12px;
}

.formpsctd3 {
  padding:3px 5px;
  cellspacing:2px;
  color:#f2f2f2;
  font-size:11px;
}

.tbbody_error {
  width:90%;
  padding:0px;
  font-size:12px;
  color:#ffffff;
  margin:0 auto 0 auto;
  background:#696b6c;
  border:1px solid #393831;
}

.trhead {
  font-size:11px;
  background:#3f3b3b;
  font-weight:bold;
}
.tdhead {
  padding:5px 10px;
  color:#c0c0c0;
  font-size:12px;
}
.trfield {
  background:#c1ccbe;
}
.trfield:hover {
  background:#d8e4d4;
  cursor:pointer;
  color:#000000;
}
.trfield2 {
  background:#c1ccbe;
  line-height:20px;
}
.tdfield {
  padding:3px;
}

.tdfield2 {
  padding:5px;
}

.tdfield2 a:link{
  text-decoration: none;
  color: #a65151;	
}
 
.tdfield2 a:visited{
  text-decoration: none;
  color: #a65151;	
}

.tdfield2 a:hover{
  text-decoration: none;
  color: #9951a6;
  font-weight:bold;	
}

.tdfield2 a:active {
  text-decoration: none;
  color: #a65151;
}
</style>
<div class="fbar">
  <div class="ftitle">AJUDA</div>
  <div class="clear"></div>
</div>

<div id="fbody" class="fbody">

<table class="tbbody" cellpadding="0" cellspacing="0" border="0">
  <tbody><tr class="trhead">
    <td class="ftitle">
Como efetuar uma doação?</td>
  </tr>
  <tr class="trfield2">
    <td class="tdfield2">
      
- Primeiro, escolha qual forma de pagamento lhe agrade. <br />

- Segundo, após ter efetuado o pagamento do pedido escolhido, será preciso preencher o fórmulário de confirmação de pagamento no painel de usuario. 

<br>    </td>
  </tr>
</tbody></table>

<div class="fseparator"></div>
<table class="tbbody" cellpadding="0" cellspacing="0" border="0">
  <tbody><tr class="trhead">
    <td class="ftitle">
O que é PagSeguro ?</td>
  </tr>
  <tr class="trfield2">
    <td class="tdfield2">
      
- No PagSeguro você pode gerar boleto bancário e pagar em qualquer banco ou casa lotérica, ou cartão de crédito/débito em 

conta. Altamente seguro e recomendado pela equipe EVO.



<br>    </td>
  </tr>
</tbody></table>
<div class="fseparator"></div>
<table class="tbbody" cellpadding="0" cellspacing="0" border="0">
  <tbody><tr class="trhead">
    <td class="ftitle">
O que é MoIp?</td>
  </tr>
  <tr class="trfield2">
    <td class="tdfield2">
      
- No MOip você pode gerar boleto bancário e pagar em qualquer banco, casa lotérica, cartão de crédito/débito em

conta.Altamente seguro e recomendado pela equipe EVO.



<br>    </td>
  </tr>
</tbody></table>
<div class="fseparator"></div>
<table class="tbbody" cellpadding="0" cellspacing="0" border="0">
  <tbody><tr class="trhead">
    <td class="ftitle">
O que é PayPal?</td>
  </tr>
  <tr class="trfield2">
    <td class="tdfield2">
      
- No PayPal você pode pagar através de cartão de crédito.Altamente seguro e recomendado pela equipe EVO 

<br>    </td>
  </tr>
</tbody></table>

<div class="fseparator"></div>
</div>
<?php } } ?>
