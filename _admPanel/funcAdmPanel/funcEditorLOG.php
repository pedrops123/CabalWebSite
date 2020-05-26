<?php
function Editor($ssLogin,$txtId,$txtMotivo,$txtItem,$txtOpt,$txtDur,$txtType)  {	
 mssql_query("INSERT INTO ".DB_ACC.".dbo.Editor_Log 
	   (ADM, ID, Motivo, Data, Item, Opt, Duracao, Tipo)
	   VALUES
	   ('".$ssLogin."', '".$txtId."', '".$txtMotivo."', getdate(), '".$txtItem."', '".$txtOpt."', '".$txtDur."', '".$txtType."')");
}
?>