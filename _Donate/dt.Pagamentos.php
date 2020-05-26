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
    <input type="hidden" name="code" value="6555D6C20B0BFEF66443AF8D92F489AD" />
    <input type="image" src="images/pagseguro.gif" name="submit"  />
    </form>
    </td>
    <td ><form method='post' action='https://www.moip.com.br/PagamentoSimples.do'>
    <input type='hidden' name='id_carteira' value='andrebuzzo'/>
    <input type='hidden' name='valor' value='500'/>
    <input type='hidden' name='nome' value='Pacote de <?=number_format($confCabal['PACK0']*$ck_Config['ExpDoacao'])?> EVO-COIN'/>
    <input type='image' name='submit' src='images/moip.gif' alt='Pagar' border='0' />
    </form></td>
    <td ><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="HAJSBFRNJA9VC">
    <input type="image" src="images/paypal.gif" border="0" name="submit">
    </form></td>
  </tr>
   <tr align="center" class="rrow">
    <td height="41">R$ 10,00</td>
    <td><img src="images/pc.png" title="<?=$confCabal['NOME_MOEDA']?>" /> <b><?=number_format($confCabal['PACK1']*$ck_Config['ExpDoacao'])?></b></td>
    <td ><form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
    <input type="hidden" name="code" value="900D73FFD0D0778334750F985BD5CF2A" />
    <input type="image" src="images/pagseguro.gif" name="submit"  />
    </form></td>
    <td ><form method='post' action='https://www.moip.com.br/PagamentoSimples.do'>
    <input type='hidden' name='id_carteira' value='andrebuzzo'/>
    <input type='hidden' name='valor' value='1000'/>
    <input type='hidden' name='nome' value='Pacote de <?=number_format($confCabal['PACK1']*$ck_Config['ExpDoacao'])?> EVO-COIN'/>
    <input type='image' name='submit' src='images/moip.gif' alt='Pagar' border='0' />
    </form></td>
    <td >
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="MZE83H637N49Q">
    <input type="image" src="images/paypal.gif" border="0" name="submit">
    </form>
</td>
  </tr>
   <tr align="center" class="rrow">
    <td height="41">R$ 20,00</td>
    <td><img src="images/pc.png" title="<?=$confCabal['NOME_MOEDA']?>" /><b><?=number_format($confCabal['PACK2']*$ck_Config['ExpDoacao'])?></b></td>
    <td ><form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
    <input type="hidden" name="code" value="5C8C46B791919B6AA4F38F965B27E376" />
    <input type="image" src="images/pagseguro.gif" name="submit"  />
    </form></td>
    <td >
    <form method='post' action='https://www.moip.com.br/PagamentoSimples.do'>
    <input type='hidden' name='id_carteira' value='andrebuzzo'/>
    <input type='hidden' name='valor' value='2000'/>
    <input type='hidden' name='nome' value='Pacote de <?=number_format($confCabal['PACK2']*$ck_Config['ExpDoacao'])?>'/>
    <input type='image' name='submit' src='images/moip.gif' alt='Pagar' border='0' />
    </form>
   </td>
    <td ><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="SS25EUE4Z6M5S">
    <input type="image" src="images/paypal.gif" border="0" name="submit">
    </form></td>
  </tr>
   <tr align="center" class="rrow">
    <td height="41">R$ 30,00</td>
    <td><img src="images/pc.png" title="<?=$confCabal['NOME_MOEDA']?>" /> <b><?=number_format($confCabal['PACK3']*$ck_Config['ExpDoacao'])?></b></td>
    <td ><form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
    <input type="hidden" name="code" value="0F5628B0DADA810CC45C2FAA125EC6D9" />
    <input type="image" src="images/pagseguro.gif" name="submit"  />
    </form></td>
    <td ><form method='post' action='https://www.moip.com.br/PagamentoSimples.do'>
    <input type='hidden' name='id_carteira' value='andrebuzzo'/>
    <input type='hidden' name='valor' value='3000'/>
    <input type='hidden' name='nome' value='Pacote de <?=number_format($confCabal['PACK3']*$ck_Config['ExpDoacao'])?> EVO-COIN'/>
    <input type='image' name='submit' src='images/moip.gif' alt='Pagar' border='0' />
    </form></td>
    <td ><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="HK8BB79BJWVHN">
    <input type="image" src="images/paypal.gif" border="0" name="submit">
    </form></td>
  </tr>
   <tr align="center" class="rrow">
    <td height="41">R$ 40,00</td>
    <td><img src="images/pc.png" title="<?=$confCabal['NOME_MOEDA']?>" /> <b><?=number_format($confCabal['PACK4']*$ck_Config['ExpDoacao'])?></b></td>
    <td ><form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
    <input type="hidden" name="code" value="AAC9A8374E4E58A884731FBC9903CF0E" />
    <input type="image" src="images/pagseguro.gif" name="submit"  />
    </form></td>
    <td ><form method='post' action='https://www.moip.com.br/PagamentoSimples.do'>
    <input type='hidden' name='id_carteira' value='andrebuzzo'/>
    <input type='hidden' name='valor' value='4000'/>
    <input type='hidden' name='nome' value='Pacote de <?=number_format($confCabal['PACK4']*$ck_Config['ExpDoacao'])?> EVO-COIN'/>
    <input type='image' name='submit' src='images/moip.gif' alt='Pagar' border='0' />
    </form></td>
    <td ><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="UP3AEV67WCZME">
    <input type="image" src="images/paypal.gif" border="0" name="submit">
    </form></td>
  </tr>
   <tr align="center" class="rrow">
    <td height="41">R$ 50,00</td>
    <td><img src="images/pc.png" title="<?=$confCabal['NOME_MOEDA']?>" /> <b><?=number_format($confCabal['PACK5']*$ck_Config['ExpDoacao'])?></b></td>
    <td ><form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
    <input type="hidden" name="code" value="5222BD80C1C129DDD4BEBF9C79208311" />
    <input type="image" src="images/pagseguro.gif" name="submit"  />
    </form></td>
    <td ><form method='post' action='https://www.moip.com.br/PagamentoSimples.do'>
    <input type='hidden' name='id_carteira' value='andrebuzzo'/>
    <input type='hidden' name='valor' value='5000'/>
    <input type='hidden' name='nome' value='Pacote de <?=number_format($confCabal['PACK5']*$ck_Config['ExpDoacao'])?> EVO-COIN'/>
    <input type='image' name='submit' src='images/moip.gif' alt='Pagar' border='0' />
    </form></td>
    <td ><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="V67BQFM2XVHGQ">
    <input type="image" src="images/paypal.gif" border="0" name="submit">
    </form></td>
  </tr>
   <tr align="center" class="rrow">
    <td height="41">R$ 100,00</td>
    <td><img src="images/pc.png" title="<?=$confCabal['NOME_MOEDA']?>" /> <b><?=number_format($confCabal['PACK6']*$ck_Config['ExpDoacao'])?></b></td>
    <td ><form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
    <input type="hidden" name="code" value="F62ABD8454543E7334971FA2508D7D0F" />
    <input type="image" src="images/pagseguro.gif" name="submit"  />
    </form></td>
    <td ><form method='post' action='https://www.moip.com.br/PagamentoSimples.do'>
    <input type='hidden' name='id_carteira' value='andrebuzzo'/>
    <input type='hidden' name='valor' value='10000'/>
    <input type='hidden' name='nome' value='Pacote de <?=number_format($confCabal['PACK6']*$ck_Config['ExpDoacao'])?> EVO-COIN'/>
    <input type='image' name='submit' src='images/moip.gif' alt='Pagar' border='0' />
    </form></td>
    <td ><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="77C37TGPUJPPE">
    <input type="image" src="images/paypal.gif" border="0" name="submit">
    </form></td>
  </tr>

</tbody></table>
</div>
<?php } } ?>