<?php
include('../_userPanel/_funcUserPanel/funcDados.php');


  $ck_Rank = mssql_query("SELECT top 50 * FROM ".DB_GAM.".dbo.cabal_character_table WHERE Nation <> 3 and Pg!=1 order by LEV desc , Reputation desc , alz desc");
		
?>
<div class="fbar">
  <div class="ftitle" align="center" style="padding: 2px 5px 2px 5px; text-align: center; float: none;">
    <a href="#" onclick="new Ajax.Updater('content', '_rank/rk.Chars2.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('content');">CHARS RANK</a>
   
    
    <img src="http://cdn.elitecabal.com/images/sp.gif" width="40" height="1">
    <a href="#" onclick="new Ajax.Updater('content', '_rank/rk.Combo.php', {method: 'get', asynchronous:true, evalScripts:true}); esperar('content');">COMBO RANK</a>

  </div>
  <div class="clear"></div>
</div>

<div id="content" name="content" style="margin: 5px 0px;"><div style="font-size: 18px; font-weight: bold; background: none repeat scroll 0% 0% rgb(192, 192, 192); padding: 5px 10px; color: rgb(16, 16, 16); margin: 0px 1px;">CHARS RANK: TOP 50</div>
<table id="fbody" class="fbody" cellpadding="3" cellspacing="1" width="100%" border="0" style="margin-top:5" align="center">
  <tbody><tr align="center" class="rhead">
    <td align="center" width="20"><strong>#</strong></td>
    <td align="center"><strong>Jogador Nome</strong></td>
    <td align="center" width="30"><strong>Lev.</strong></td>
    <td align="center" width="50"><strong>Honra</strong></td>
  <?
      if($ck_Config['Reset'] == 1)
  { 
    echo'<td align="center" width="50"><strong>Reset</strong></td>';
  }
  ?>
    <td align="center"><strong>Guild</strong></td>
  </tr>
  <? for ($i = 1;
          $i <= mssql_num_rows($ck_Rank);
		  $i++) 
  {
    $ck_Rank_Result = mssql_fetch_array($ck_Rank);
	$ck_Guild = mssql_fetch_array(mssql_query('select * from '.DB_GAM.'.dbo.GuildMember where CharacterIndex = "'.$ck_Rank_Result['CharacterIdx'].'"'));
    $n_Guild = mssql_fetch_array(mssql_query('select * from '.DB_GAM.'.dbo.Guild where GuildNo = "'.$ck_Guild['GuildNo'].'"'));

?>	 
  <tr align="center" class="rrow">
    <td align="center"><?=$i?></td>
    <td align="left" style="padding-left: 10px;"><strong><?=$ck_Rank_Result['Name']?></strong></td>
    <td align="center"><strong><?=$ck_Rank_Result['LEV']?></strong></td>
    <td align="center"><strong><?=$ck_Rank_Result['Reputation']?></strong></td>
  <?
      if($ck_Config['Reset'] == 1)
  { 
    echo'
    <td align="center"><strong>'.$ck_Rank_Result['Reset'].'</strong></td>';
  }
  ?>
    <td align="left" style="padding-left: 10px;"><strong><?=$n_Guild['GuildName']?></strong></td>
  </tr>
 <?
  }
 ?>
</tbody></table>
</div>
