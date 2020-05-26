<?php

  function GMIP($IP) {
mssql_query('exec '.DB_ACC.'.dbo.cabal_addgmip "'. $IP .'"');
		echo'<div class=\'ferrorbig\'>IP Atualizado com sucesso.</div>';
}
  
?>