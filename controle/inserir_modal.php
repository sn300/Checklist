<?php
include "conexao.php";
$usuario = $_POST['usuario'];
$tipo = $_POST['tipo'];
$data = $_POST['data'];
$horai = $_POST['horai'];
$horaf = $_POST['horaf'];
$automovel = $_POST['automoveis'];
var_dump($_POST);

if ($tipo == '1') {
    $km = $_POST['km'];
    $km2 = $_POST['km2'];
    $obs = $_POST['obs'];
    $query = "INSERT INTO transacao(tra_quilometragem, tra_quilometragemf, tra_data, tra_obs, automoveis_auto_id, usuarios_usu_id, tra_tipo, 
    tra_horai, tra_horaf) VALUES ('$km','$km2','$data','$obs','$automovel','$usuario', '1', '$horai', '$horaf')";
} else if ($tipo == '2') {
    var_dump($_POST);
    $km = $_POST['km'];
    $km2 = $_POST['km2'];
    $obs = $_POST['obs'];
    $query = "INSERT INTO transacao(tra_quilometragem, tra_quilometragemf, tra_data, tra_obs, automoveis_auto_id, usuarios_usu_id, tra_tipo, tra_horai, tra_horaf) 
     VALUES ('$km','$km2','$data','$obs','$automovel','$usuario', '2', '$horai', '$horaf')";
} else if ($tipo == '3') {
    var_dump($_POST);
    $km = $_POST['km'];
    $km2 = $_POST['km2'];
    $obs = $_POST['obs'];
    $query = "INSERT INTO transacao(tra_quilometragem, tra_quilometragemf, tra_data, tra_obs, automoveis_auto_id, usuarios_usu_id, tra_tipo, tra_horai, tra_horaf) 
     VALUES ('$km','$km2','$data','$obs','$automovel','$usuario', '3', '$horai', '$horaf')";
}
$executar = mysqli_query($conexao, $query);
$teste = "SHOW TABLE STATUS LIKE 'transacao'";
$ex = mysqli_query($conexao, $teste);
$cont = 0;
while ($dados = mysqli_fetch_assoc($ex)) {
    $cont++;
    $ver_id = $dados['Auto_increment'];
}
$id_inserido = $ver_id - 1;
echo $id_inserido;
header('Location: ../usuarios/Funcionario/acoes/check_list.php?tipo=' . $tipo . "&&id_inserido=" . $id_inserido);
?>