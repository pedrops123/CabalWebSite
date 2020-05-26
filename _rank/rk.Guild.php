<?PHP
include('../_userPanel/_funcUserPanel/funcDados.php');

$guild1 = mssql_query("select [GuildNo],[GuildName] from ".DB_GAM.".[dbo].[Guild]");
do {
while ($guild = mssql_fetch_array($guild1)){
$guildstuff = $guild['GuildNo'];
$guildname = $guild['GuildName'];
$charidx = mssql_query("Select CharacterIndex from ".DB_GAM.".dbo.GuildMember where GuildNo = '$guildstuff'");
do {
while ($charidxx = mssql_fetch_array($charidx)) {
$charhonor = mssql_query("Select Reputation,Reset from ".DB_GAM.".dbo.cabal_character_table where CharacterIdx = '$charidxx[CharacterIndex]'");
$charhonorx = mssql_fetch_row($charhonor);
$getrep = $charhonorx[0];
$SomaReset = $charhonorx[1];
mssql_query("UPDATE ".DB_GAM.".dbo.GuildMember set Reputation = '$getrep', ID = 1 , Reset = '$SomaReset' where CharacterIndex = '$charidxx[CharacterIndex]'");
}
} while(mssql_next_result($charidx));
$dorepstuff = mssql_query("SELECT  Reputation,ID,Reset from ".DB_GAM.".dbo.GuildMember where GuildNo = '$guildstuff' order by reputation desc");
$reputation = 0;
$ID = 0;
$Reset = 0;
do {
while ($dorepmain = mssql_fetch_array($dorepstuff)){
$reputation = $reputation + $dorepmain['Reputation'];
$ID = $ID + $dorepmain['ID'];
$Reset = $Reset + $dorepmain['Reset'];
}
} while(mssql_next_result($dorepstuff));
$test1 = mssql_query("select * from ".DB_GAM.".dbo.GuildRanking where GuildId = '$guildstuff'");
$test2 = mssql_num_rows($test1);
if ($test2 < 1) {
	
mssql_query("INSERT INTO ".DB_GAM.".dbo.GuildRanking(ReputationTotal,GuildName,GuildId,MemberTotal,ResetTotal) VALUES ('$reputation','$guildname','$guildstuff','$ID','$Reset')");
} elseif ($test2 == 1) {
mssql_query("UPDATE ".DB_GAM.".dbo.GuildRanking SET ReputationTotal= '$reputation' , MemberTotal = '$ID' , ResetTotal = '$Reset'  where GuildId = '$guildstuff'");
mssql_query("UPDATE ".DB_GAM.".dbo.GuildRanking SET GuildName = '$guildname' where GuildId = '$guildstuff'");
}

}
} while (mssql_next_result($guild1)); ?>

<div id="content" name="content" style="margin: 5px 0px;"><div style="font-size: 18px; font-weight: bold; background: none repeat scroll 0% 0% rgb(192, 192, 192); padding: 5px 10px; color: rgb(16, 16, 16); margin: 0px 1px;">GUILD RANK: TOP 20</div>
<table id="fbody" class="fbody" cellpadding="3" cellspacing="1" width="100%" border="0" style="margin-top:5" align="center">
  <tbody><tr align="center" class="rhead">
    <td align="center" width="20"><strong>#</strong></td>
    <td align="center"><strong>Guild Nome</strong></td>
    <td align="center" width="75"><strong>Membros</strong></td>
    <!--<td align="center" width="75"><strong>Reset</strong></td>-->
    <td align="center" ><strong>Honra</strong></td>
    </tr>
    
    <? $selectguild = mssql_query("SELECT top 20 * FROM ".DB_GAM.".dbo.GuildRanking where GuildName <> 'EliteWorldGames'  order by  ReputationTotal DESC");
$i = 1;
do {
while ($getguild = mssql_fetch_array($selectguild)){ ?>
	
	
<tr align="center" class="rrow">
    <td align="center"><?=$i?></td>
    <td align="left" style="padding-left: 10px;"><strong><?=$getguild['GuildName']?></strong></td>
    <td align="center"><strong><?=$getguild['MemberTotal']?></strong></td>
    <!--<td align="center"><strong><?$getguild['ResetTotal']?></strong></td>-->
    <td align="center"><strong><?=$getguild['ReputationTotal']?></strong></td>
  </tr>
  
<?
$i = $i + 1;
}
} while (mssql_next_result($selectguild)); ?>

</tbody></table>
</div>
</div>
<?
mssql_free_result($guild1);
mssql_free_result($charhonor);
mssql_free_result($selectguild);
mssql_free_result($dorepstuff);

?>