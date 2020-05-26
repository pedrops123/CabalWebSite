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
	<?
	if ($ck_Rank_Result['Reputation']<=10000) { echo '<td align="center" ><strong>(0)</strong></td>';}
    if ($ck_Rank_Result['Reputation']>=10000 and $ck_Rank_Result['Reputation']<20000) { echo '<td align="center" ><strong>(1)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=20000 and $ck_Rank_Result['Reputation']<40000) { echo '<td align="center" ><strong>(2)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=40000 and $ck_Rank_Result['Reputation']<80000) { echo '<td align="center" ><strong>(3)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=80000 and $ck_Rank_Result['Reputation']<160000) { echo '<td align="center" ><strong>(4)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=160000 and $ck_Rank_Result['Reputation']<320000) { echo '<td align="center" ><strong>(5)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=320000 and $ck_Rank_Result['Reputation']<640000) { echo '<td align="center" ><strong>(6)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=640000 and $ck_Rank_Result['Reputation']<1280000) { echo '<td align="center" ><strong>(7)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=1280000 and $ck_Rank_Result['Reputation']<2560000) { echo '<td align="center" ><strong>(8)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=2560000 and $ck_Rank_Result['Reputation']<5120000) { echo '<td align="center" ><strong>(9)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=5120000 and $ck_Rank_Result['Reputation']<10000000) { echo '<td align="center" ><strong>(10)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=10000000 and $ck_Rank_Result['Reputation']<20000000) { echo '<td align="center" ><strong>(11)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=20000000 and $ck_Rank_Result['Reputation']<50000000) { echo '<td align="center" ><strong>(12)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=50000000 and $ck_Rank_Result['Reputation']<80000000) { echo '<td align="center" ><strong>(13)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=80000000 and $ck_Rank_Result['Reputation']<150000000) { echo '<td align="center" ><strong>(14)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=150000000 and $ck_Rank_Result['Reputation']<300000000) { echo '<td align="center" ><strong>(15)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=300000000 and $ck_Rank_Result['Reputation']<500000000) { echo '<td align="center" ><strong>(16)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=500000000 and $ck_Rank_Result['Reputation']<1000000000) { echo '<td align="center" ><strong>(17)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=1000000000 and $ck_Rank_Result['Reputation']<1500000000) { echo '<td align="center" ><strong>(18)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=1500000000 and $ck_Rank_Result['Reputation']<2000000000) { echo '<td align="center" ><strong>(19)</strong></td>';}
	if ($ck_Rank_Result['Reputation']>=2000000000) { echo '<td align="center" ><strong>(20)</td>';}
	?>
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
