<?php
$con = new db_conect();
$con->query("select * from persona where PERNOMBRE = :nombre ");
$con->value(':nombre', "pepa", null);
$personas = $con->registros();

echo json_encode($personas);