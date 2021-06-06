<?php

require("loader.php");



try{
	$db_con = new PDO('sqlsrv:Server=DESKTOP-TS6Q76K\SQLPC;Database=ventas', "SQLroot", "abcd");
}catch(PDOException $e){
	echo $e->getMessage();
}

$pst = $db_con->query("select * from Clientes");

print_r($pst->fetchAll(PDO::FETCH_OBJ));
