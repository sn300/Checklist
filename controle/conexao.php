<?php
include "parametros.php";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
date_default_timezone_set('America/Fortaleza');
$data = date("Y-m-d");
mysqli_set_charset($conexao,'utf8');
?>
