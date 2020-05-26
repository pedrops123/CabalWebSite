<?php
include('../_userPanel/_funcUserPanel/funcDados.php');
if($ck_Config['Reset'] == 0)
  { 
      include('./_erros/offPanel.php'); 
  }
  else 
  {

  $ck_Rank = mssql_query("SELECT top 20 * FROM ".DB_GAM.".dbo.cabal_character_table WHERE Nation <> 3 order by Reset2 desc , Reset desc , LEV desc,alz desc");
		
?>

<div id="content" name="content" style="margin: 5px 0px;"><div style="font-size: 18px; font-weight: bold; background: none repeat scroll 0% 0% rgb(192, 192, 192); padding: 5px 10px; color: rgb(16, 16, 16); margin: 0px 1px;">MASTER RESET RANK: TOP 20</div>
<table id="fbody" class="fbody" cellpadding="3" cellspacing="1" width="100%" border="0" style="margin-top:5" align="center">
  <tbody><tr align="center" class="rhead">
    <td align="center" width="20"><strong>#</strong></td>
    <td align="center"><strong>Jogador Nome</strong></td>
    <td align="center" width="30"><strong>Master</strong></td>
    <td align="center" width="50"><strong>Reset</strong></td>
    <td align="center"><strong>Guild</strong></td>
  </tr>
  <?php 
  for ($i = 1;
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
    <td align="center"><strong><?=$ck_Rank_Result['Reset2']?></strong></td>
    <td align="center"><strong><?=$ck_Rank_Result['Reset']?></strong></td>
    <td align="left" style="padding-left: 10px;"><strong><?=$n_Guild['GuildName']?></strong></td>
  </tr>
  <?php
  }
 
 ?>
</tbody></table>
</div>
</div>
<?php } ?>