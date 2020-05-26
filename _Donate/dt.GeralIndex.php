<?php
include('../_userPanel/_funcUserPanel/funcDados.php');

if($ck_Conta['AuthKey'] == FALSE)
  { 
      include('../_erros/UserPanel.php'); 
  }
  else 
   {

	if($ck_Config['DoacaoT'] == 0)
  { 
      include('../_erros/offPanel.php'); 
  }
  else 
  {
		
?>
<div class="fbar">
  <div class="ftitle" align="center" style="padding: 2px 5px 2px 0px; text-align: center; float: none;">
    <a href="#" onclick="new Ajax.Updater('content', '_Donate/dt.Pagamentos.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('content');"> PAGAMENTOS</a>
   
    <img src="http://cdn.elitecabal.com/images/sp.gif" width="40" height="1">
    <a href="#" onclick="new Ajax.Updater('content', '_Donate/dt.Historico.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('content');">HISTORICO</a>
    <img src="http://cdn.elitecabal.com/images/sp.gif" width="40" height="1">
    <a href="#" onclick="new Ajax.Updater('content', '_Donate/dt.Ajuda.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('content');">AJUDA</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
  <div class="clear"></div>
</div>
<div id="content" name="content" style="margin: 5px 0px;">
<div id="fbody" class="fbody">
  <div style="">
 <div class="fdesc">
      - Doe e ajude-nos ,em troca receba <?=$confCabal['NOME_MOEDA']?> que podem ser utilizadas em nosso webshop.<br />
      - Importante: Cada pacote é atualizado conforme as promoções que estejam ocorrendo em nosso servidor.<br />
      - A entrega de seu pedido pode levar entre 1 a 3 dias úteis.</div>
      </div></div>
<table id="fbody" class="fbody" cellpadding="3" cellspacing="1" width="100%" border="0" style="margin-top:5" align="center">
  <tbody>

	 
  <tr align="center" class="rrow">
    <td height="41">R$ 5,00</td>
    <td><img src="images/pc.png" title="<?=$confCabal['NOME_MOEDA']?>" /> <b><?=number_format($confCabal['PACK0']*$ck_Config['ExpDoacao'])?></b></td>
    <td >
    <form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
    <input type="hidden" name="code" value="D62882332C2CF94444E91FAD56F891BE" />
    <input type="image" src="images/pagseguro.gif" name="submit"  />
    </form>
    </td>
    <td ><form method='post' action='#'>
    <input type='hidden' name='id_carteira' value='#'/>
    <input type='hidden' name='valor' value='500'/>
    <input type='hidden' name='nome' value='Pacote de <?=number_format($confCabal['PACK0']*$ck_Config['ExpDoacao'])?> EVO-COIN'/>
    <input type='image' name='submit' src='images/moip.gif' alt='Pagar' border='0' />
    </form></td>
    <td ><form action="#" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="#">
    <input type="image" src="images/paypal.gif" border="0" name="submit">
    </form></td>
  </tr>
   <tr align="center" class="rrow">
    <td height="41">R$ 10,00</td>
    <td><img src="images/pc.png" title="<?=$confCabal['NOME_MOEDA']?>" /> <b><?=number_format($confCabal['PACK1']*$ck_Config['ExpDoacao'])?></b></td>
    <td ><form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
    <input type="hidden" name="code" value="0D03440E40400EDEE4C92F9710D74E9B" />
    <input type="image" src="images/pagseguro.gif" name="submit"  />
    </form></td>
    <td ><form method='post' action='#'>
    <input type='hidden' name='id_carteira' value='#'/>
    <input type='hidden' name='valor' value='1000'/>
    <input type='hidden' name='nome' value='Pacote de <?=number_format($confCabal['PACK1']*$ck_Config['ExpDoacao'])?> EVO-COIN'/>
    <input type='image' name='submit' src='images/moip.gif' alt='Pagar' border='0' />
    </form></td>
    <td >
    <form action="#" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="#">
    <input type="image" src="images/paypal.gif" border="0" name="submit">
    </form>
</td>
  </tr>
   <tr align="center" class="rrow">
    <td height="41">R$ 20,00</td>
    <td><img src="images/pc.png" title="<?=$confCabal['NOME_MOEDA']?>" /><b><?=number_format($confCabal['PACK2']*$ck_Config['ExpDoacao'])?></b></td>
    <td ><form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
    <input type="hidden" name="code" value="9D8C965EEDED3EF554BCCFAE575C9AE4" />
    <input type="image" src="images/pagseguro.gif" name="submit"  />
    </form></td>
    <td >
    <form method='post' action='#'>
    <input type='hidden' name='id_carteira' value='#'/>
    <input type='hidden' name='valor' value='2000'/>
    <input type='hidden' name='nome' value='Pacote de <?=number_format($confCabal['PACK2']*$ck_Config['ExpDoacao'])?>'/>
    <input type='image' name='submit' src='images/moip.gif' alt='Pagar' border='0' />
    </form>
   </td>
    <td ><form action="#" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="#">
    <input type="image" src="images/paypal.gif" border="0" name="submit">
    </form></td>
  </tr>
   <tr align="center" class="rrow">
    <td height="41">R$ 30,00</td>
    <td><img src="images/pc.png" title="<?=$confCabal['NOME_MOEDA']?>" /> <b><?=number_format($confCabal['PACK3']*$ck_Config['ExpDoacao'])?></b></td>
    <td ><form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
    <input type="hidden" name="code" value="1CA775B172722A06648BDFB428136C55" />
    <input type="image" src="images/pagseguro.gif" name="submit"  />
    </form></td>
    <td ><form method='post' action='#'>
    <input type='hidden' name='id_carteira' value='#'/>
    <input type='hidden' name='valor' value='3000'/>
    <input type='hidden' name='nome' value='Pacote de <?=number_format($confCabal['PACK3']*$ck_Config['ExpDoacao'])?> EVO-COIN'/>
    <input type='image' name='submit' src='images/moip.gif' alt='Pagar' border='0' />
    </form></td>
    <td ><form action="#" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="#">
    <input type="image" src="images/paypal.gif" border="0" name="submit">
    </form></td>
  </tr>
   <tr align="center" class="rrow">
    <td height="41">R$ 40,00</td>
    <td><img src="images/pc.png" title="<?=$confCabal['NOME_MOEDA']?>" /> <b><?=number_format($confCabal['PACK4']*$ck_Config['ExpDoacao'])?></b></td>
    <td ><form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
    <input type="hidden" name="code" value="9CEA71AA6A6A3F6444576FB606EBA548" />
    <input type="image" src="images/pagseguro.gif" name="submit"  />
    </form></td>
    <td ><form method='post' action='#'>
    <input type='hidden' name='id_carteira' value='#'/>
    <input type='hidden' name='valor' value='4000'/>
    <input type='hidden' name='nome' value='Pacote de <?=number_format($confCabal['PACK4']*$ck_Config['ExpDoacao'])?> EVO-COIN'/>
    <input type='image' name='submit' src='images/moip.gif' alt='Pagar' border='0' />
    </form></td>
    <td ><form action="#" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="#">
    <input type="image" src="images/paypal.gif" border="0" name="submit">
    </form></td>
  </tr>
   <tr align="center" class="rrow">
    <td height="41">R$ 50,00</td>
    <td><img src="images/pc.png" title="<?=$confCabal['NOME_MOEDA']?>" /> <b><?=number_format($confCabal['PACK5']*$ck_Config['ExpDoacao'])?></b></td>
    <td ><form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
    <input type="hidden" name="code" value="30C8CB455B5B6C4994F20F9FA8624B20" />
    <input type="image" src="images/pagseguro.gif" name="submit"  />
    </form></td>
    <td ><form method='post' action='#'>
    <input type='hidden' name='id_carteira' value='#'/>
    <input type='hidden' name='valor' value='5000'/>
    <input type='hidden' name='nome' value='Pacote de <?=number_format($confCabal['PACK5']*$ck_Config['ExpDoacao'])?> EVO-COIN'/>
    <input type='image' name='submit' src='images/moip.gif' alt='Pagar' border='0' />
    </form></td>
    <td ><form action="#" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="#">
    <input type="image" src="images/paypal.gif" border="0" name="submit">
    </form></td>
  </tr>
   <tr align="center" class="rrow">
    <td height="41">R$ 100,00</td>
    <td><img src="images/pc.png" title="<?=$confCabal['NOME_MOEDA']?>" /> <b><?=number_format($confCabal['PACK6']*$ck_Config['ExpDoacao'])?></b></td>
    <td ><form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
    <input type="hidden" name="code" value="C0C4DD1485854AD334A98F9F6519D9DE" />
    <input type="image" src="images/pagseguro.gif" name="submit"  />
    </form></td>
    <td ><form method='post' action='#'>
    <input type='hidden' name='id_carteira' value='#'/>
    <input type='hidden' name='valor' value='10000'/>
    <input type='hidden' name='nome' value='Pacote de <?=number_format($confCabal['PACK6']*$ck_Config['ExpDoacao'])?> EVO-COIN'/>
    <input type='image' name='submit' src='images/moip.gif' alt='Pagar' border='0' />
    </form></td>
    <td ><form action="#" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="#">
    <input type="image" src="images/paypal.gif" border="0" name="submit">
    </form></td>
  </tr>

</tbody></table>
</div>

<?php } }  ?> 
