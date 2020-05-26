<?php
 include('../funcAdmPanel/funcDados2.php');
 
 $PegaAcc     = mssql_fetch_row(mssql_query("select count(*) from ".DB_ACC.".dbo.cabal_auth_table where UserNum > 0"));
 $PegaBan     = mssql_fetch_row(mssql_query("select count(*) from ".DB_ACC.".dbo.cabal_auth_table where AuthType = 2"));
 $PegaVip     = mssql_fetch_row(mssql_query("select count(*) from ".DB_ACC.".dbo.cabal_charge_auth where ServiceKind = 2"));
 $PegaCharOn  = mssql_fetch_row(mssql_query("select count(*) from ".DB_GAM.".dbo.cabal_character_table where Login = 1 "));
 $PegaChar    = mssql_fetch_row(mssql_query("select count(*) from ".DB_GAM.".dbo.cabal_character_table where CharacterIdx > 0 "));
   
?>
  <div class="fbar">
    <div class="ftitle">ESTATISTICAS</div>
  <div class="clear"></div>
</div>
<div id="fbody" class="fbody">
    <div style="">

    </div>
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Players on</label></div>
      <div class="finput" style="">
       <b><font color="#00FF00"> <?=$PegaCharOn[0]?></font></b>  <a href="#" onclick="new Ajax.Updater('container', '_admPanel/_executarJogo/ex.pesqPlayerOn.php', {method: 'post', asynchronous:true, evalScripts:true}); esperar('container');" >  Ver </a>
        
      </div>
      <div class="clear"></div>
    </div>
    
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Contas criadas</label></div>
      <div class="finput" style="">
       <b> <?=$PegaAcc[0]?></b>
      </div>
      <div class="clear"></div>
    </div>
    
     <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Char criados</label></div>
      <div class="finput" style="">
        <b><?=$PegaChar['0']?></b>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Contas banidas</label></div>
      <div class="finput" style="">
        <b><?=$PegaBan[0]?></b>
      </div>
      <div class="clear"></div>
    </div>
    
    <div class="flabel" style="">
      <div class="fitem" style=""><label for="rusername">Contas vip</label></div>
      <div class="finput" style="">
        <?=$PegaVip['0']?>
      </div>
      <div class="clear"></div>
    </div>
    
