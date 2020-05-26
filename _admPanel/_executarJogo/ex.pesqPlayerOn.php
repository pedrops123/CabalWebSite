<?php
 include('../funcAdmPanel/funcDados2.php');
 

 $PegaCharOn  = mssql_query("select * from ".DB_GAM.".dbo.cabal_character_table where Login = 1 order by LEV desc");
    
?>
  <div class="fbar">
  <table id="fbody" class="fbody" cellpadding="3" cellspacing="1" width="98%" border="0" style="margin-top:5" align="center">
  <tbody>
  <tr align="center" class="rhead">
    <td align="center" width="20"><strong>#</strong></td>
    <td align="center"><strong>Jogador Nome</strong></td>
    <td align="center" width="30"><strong>Lev.</strong></td>
    <td align="center" ><strong>Canal</strong></td>
    <td align="center" ><strong>Mapa</strong></td> 
      
  </tr>
  <? for ($i = 1;
          $i <= mssql_num_rows($PegaCharOn);
		  $i++) 
  {
    $ck_Rank_Result = mssql_fetch_array($PegaCharOn);
	
?>	 
  <tr align="center" class="rrow">
    <td align="center"><?=$i?></td>
    <td align="left" style="padding-left: 10px;"><strong><?=$ck_Rank_Result['Name']?></strong></td>
    <td align="center"><strong><?=$ck_Rank_Result['LEV']?></strong></td>
    <td "left" style="padding-left: 10px;"><strong><?=$confCabal['CANAL'][$ck_Rank_Result['ChannelIdx']]?></strong></td>
    <td "left" style="padding-left: 10px;"><strong><?=$confCabal['MAPA'][$ck_Rank_Result['WorldIdx']]?></strong></td>
       </tr>
 <?
  }
 ?>
</tbody></table>
</div>