<?php
 include('../funcAdmPanel/funcDados2.php');
 $ck_ShopItem = mssql_fetch_array(mssql_query("SELECT * FROM CabalCash.dbo.ShopItems WHERE Id='".$_GET['Id']."'"));
  
 if($_POST['sbmtRegItem'])
 {
   $txtIemNome   = $_POST['txtIemNome'];
   $txtDesc      = $_POST['txtDesc'];
   $txtItemIdx   = $_POST['txtItemIdx'];
   $txtCash      = $_POST['txtCash'];
   $txtCashEvent = $_POST['txtCashEvent'];
   $txtOptIdx    = $_POST['txtOptIdx'];
   $txtEstoque   = $_POST['txtEstoque'];
   $txtPos       = $_POST['txtPos'];
   $txtTipo      = $_POST['txtTipo'];	
   $txtCat       = $_POST['txtCat'];
   $txtImage     = $_POST['txtImage'];	 
   $txtIdItem    = $_POST['txtIdItem'];
   
   if(eregi("[^0-9]", $txtCash))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em '.$confCabal['NOME_MOEDA'].'.</div>';
   }
   elseif(eregi("[^0-9]", $txtCashEvent))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em '.$confCabal['NOME_MOEDA_EVENT'].'.</div>';
   }
   elseif(eregi("[^0-9]", $txtEstoque))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em Estoque.</div>';
   }
   elseif(eregi("[^0-9]", $txtPos))
   {
	 echo'<div class=\'ferrorbig\'>Digite apenas números em POSIÇÃO.</div>';
   }
   elseif(strlen($txtIemNome) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo ItemNome, minimo 1 digito.</div>';
   }
   elseif(strlen($txtDesc) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo Descrição, minimo 1 digito.</div>';
   }
   elseif(strlen($txtPos) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo Posição, minimo 1 digito.</div>';
   }
   elseif(strlen($txtCash) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo '.$confCabal['NOME_MOEDA'].', minimo 1 digito.</div>';
   }
   elseif(strlen($txtCashEvent) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo '.$confCabal['NOME_MOEDA_EVENT'].', minimo 1 digito.</div>';
   }
   elseif(strlen($txtOptIdx) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo OptionIdx, minimo 1 digito.</div>';
   }
   elseif(strlen($txtEstoque) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo ESTOQUE, minimo 1 digito.</div>';
   }
    elseif(strlen($txtImage) < 1)
   {
	 echo'<div class=\'ferrorbig\'>Campo Imagem, minimo 1 digito.</div>';
   }
   else
   { 

	   mssql_query("UPDATE CabalCash.dbo.ShopItems SET
	     Name        = '".$txtIemNome."',
		 Description = '".$txtDesc."',
		 ItemIdx     = '".$txtItemIdx."',
		 ItemOpt     = '".$txtOptIdx."',
		 Image       = '".$txtImage."',
		 Cash         = '".$txtCash."',
		 CashBonus     = '".$txtCashEvent."',
		 Available   = '".$txtEstoque."',
		 Category    = '".$txtCat."',
		 Weight      = '".$txtPos."',
		 Tipo        = '".$txtTipo."'
		 WHERE   Id  = '".$txtIdItem."'
	   ");
					
		echo'<div class=\'ferrorbig\'>Item <u>'.$txtIemNome.'</u> editado com sucesso.</div>';
   }
   
 }
   else
   {   
   ?>
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
<form  name="editar" id="editar">
<div class="fbar">
  <div class="ftitle">ENVIAR ITEMS</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
  <div style="">
   <br />
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
    
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Nome Item </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtIemNome" type="text" maxlength="255" value="<?=$ck_ShopItem['Name']?>" />
            <input class="ffield" name="txtIdItem" type="hidden" maxlength="255" value="<?=$_GET['Id']?>" />
            </td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td class="flabel" height="24px" style="padding: 0 15px 0;" >Descricao</td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <textarea class="ffield" name="txtDesc" type="text"  ><?=$ck_ShopItem['Description']?></textarea></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >ItemIDX </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtItemIdx" type="text" maxlength="255" value="<?=$ck_ShopItem['ItemIdx']?>" /></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >OptionIDX </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtOptIdx" type="text" maxlength="255" value="<?=$ck_ShopItem['ItemOpt']?>"/></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Imagem</td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtImage" type="text" maxlength="255" value="<?=$ck_ShopItem['Image']?>" /></td>
        </tr>
      
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" ><?=$confCabal['NOME_MOEDA']?> </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtCash" type="text" maxlength="20" value="<?=$ck_ShopItem['Cash']?>"/></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" ><?=$confCabal['NOME_MOEDA_EVENT']?> </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtCashEvent" type="text" maxlength="20" value="<?=$ck_ShopItem['CashBonus']?>"/></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Estoque </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtEstoque" type="text" maxlength="10" value="<?=$ck_ShopItem['Available']?>"/></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Posição </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
            <input class="ffield" name="txtPos" type="text" maxlength="10" value="<?=$ck_ShopItem['Weight']?>"/></td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Tipo </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
          <?
		  switch($ck_ShopItem['Tipo'])
		  {
			case 1 : echo' <select class="ffield" name="txtTipo"  >
                            <option value="1" selected="selected">Ligado a conta</option>
                            <option value="2">Ligado ao personagem</option>
                            <option value="3">Livre</option>
                           </select>';
				     break;
			case 2 : echo' <select class="ffield" name="txtTipo"  >
                            <option value="1">Ligado a conta</option>
                            <option value="2" selected="selected">Ligado ao personagem</option>
                            <option value="3">Livre</option>
                           </select>';
				     break;
			case 3 : echo' <select class="ffield" name="txtTipo"  >
                            <option value="1">Ligado a conta</option>
                            <option value="2">Ligado ao personagem</option>
                            <option value="3" selected="selected">Livre</option>
                           </select>';
				     break;		 		   
		  }
		  ?>
            </td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="24px" style="padding: 0 15px 0;" >Categoria </td>
          <td height="24px" style="padding: 0 15px 0;" >&nbsp;
          <?
		  switch($ck_ShopItem['Category'])
		  {
			case 1 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1" selected="selected">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="18">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 2 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2" selected="selected">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="18">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 3 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3" selected="selected">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="18">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 4 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4" selected="selected">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="18">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 5 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5" selected="selected">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="18">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 6 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1" >Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6" selected="selected">Fantasia: Armas</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="18">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 7 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="7" selected="selected">Set: Guerreiro</option>
              <option value="8">Set: Guardião</option>
              <option value="9">Set: Arqueiro</option>
              <option value="10">Set: Duelista</option>
              <option value="11">Set: Espadachim</option>
              <option value="12">Set: Mago</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="17">Armas</option>
              <option value="18">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 8 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="7">Set: Guerreiro</option>
              <option value="8" selected="selected">Set: Guardião</option>
              <option value="9">Set: Arqueiro</option>
              <option value="10">Set: Duelista</option>
              <option value="11">Set: Espadachim</option>
              <option value="12">Set: Mago</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis/ Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="17">Armas</option>
              <option value="18">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 9 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="7">Set: Guerreiro</option>
              <option value="8">Set: Guardião</option>
              <option value="9" selected="selected">Set: Arqueiro</option>
              <option value="10">Set: Duelista</option>
              <option value="11">Set: Espadachim</option>
              <option value="12">Set: Mago</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="17">Armas</option>
              <option value="18">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 10 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="7">Set: Guerreiro</option>
              <option value="8">Set: Guardião</option>
              <option value="9">Set: Arqueiro</option>
              <option value="10" selected="selected">Set: Duelista</option>
              <option value="11">Set: Espadachim</option>
              <option value="12">Set: Mago</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="17">Armas</option>
              <option value="18">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 11 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="7">Set: Guerreiro</option>
              <option value="8">Set: Guardião</option>
              <option value="9">Set: Arqueiro</option>
              <option value="10">Set: Duelista</option>
              <option value="11" selected="selected">Set: Espadachim</option>
              <option value="12">Set: Mago</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="17">Armas</option>
              <option value="18">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 12 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="7">Set: Guerreiro</option>
              <option value="8">Set: Guardião</option>
              <option value="9">Set: Arqueiro</option>
              <option value="10">Set: Duelista</option>
              <option value="11">Set: Espadachim</option>
              <option value="12" selected="selected">Set: Mago</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="17">Armas</option>
              <option value="18">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 13 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="13" selected="selected">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="18">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 14 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14" selected="selected">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="18">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 15 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15" selected="selected">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="18">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 16 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16" selected="selected">Dragonas</option>
              <option value="18">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 17 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="7">Set: Guerreiro</option>
              <option value="8">Set: Guardião</option>
              <option value="9">Set: Arqueiro</option>
              <option value="10">Set: Duelista</option>
              <option value="11">Set: Espadachim</option>
              <option value="12">Set: Mago</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="17" selected="selected">Armas</option>
              <option value="18">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 18 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="18" selected="selected">Pet</option>
			  <option value="19">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 19 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="18">Pet</option>
			  <option value="19" selected="selected">Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 20 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="18">Pet</option>
			  <option value="19" >Kit: Pet</option>
			  <option value="20" selected="selected">Kit: Craft</option>
			  <option value="21">Dungeons</option>
            </select>';
			break;
			case 21 : echo'
            <select class="ffield" name="txtCat"  >
              <option value="1">Item: Evento</option>
              <option value="2">Conta Vip</option>
              <option value="3">Fantasia: Corpo</option>
              <option value="4">Fantasia: Cabeça</option>
              <option value="5">Fantasia: Nação</option>
              <option value="6">Fantasia: Armas</option>
              <option value="13">Motos e Pranchas</option>
              <option value="14">Consumiveis / Minestas</option>
              <option value="15">Acessorios</option>
              <option value="16">Dragonas</option>
              <option value="18">Pet</option>
			  <option value="19" >Kit: Pet</option>
			  <option value="20">Kit: Craft</option>
			  <option value="21" selected="selected">Dungeons</option>
            </select>';
			break;
		  }
		  ?>
		  </td>
        </tr>
        <tr >
          <td colspan="2" height="4px"></td>
        </tr>
        <tr class="flabel" >
          <td height="30px" colspan="2" style="text-align:center;"><input name="sbmtRegItem" class="fsubmit" type="button" value="ENVIAR" onclick="new Ajax.Updater('checar', '_admPanel/_executarShop/ex.edtItemEditar.php', {method: 'post', asynchronous:true, parameters:Form.serialize(document.editar)}); esperar('checar');" /></td>
        </tr>
     
  
    </table>
    <div style="height: 4px;"></div>
</div>
</div>
</form>




<?php
 }
?>

<div id="checar" name="checar"></div>