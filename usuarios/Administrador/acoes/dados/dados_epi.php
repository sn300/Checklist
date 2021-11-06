<?php
if(isset($_POST["epi_id"])){
	require_once('../../../../controle/conexao.php');
	$id_epi = $_POST['epi_id'];
	$resultado = '';
	
	$query_epi = "SELECT * FROM ferramentas WHERE fer_id = '$id_epi' AND fer_direcionamento = 'Epi'";
	$resultado_epi = mysqli_query($conexao, $query_epi);
	$row_epi = mysqli_fetch_assoc($resultado_epi);
	$id = $row_epi['fer_id'];
    $descricao = $row_epi['fer_descricao'];
    $tipo = $row_epi['fer_tipo'];

	$resultado .= "<input type='hidden' value='$id' name='id'>";
	$resultado .= "<div class='form-group'><label for='descricao'>Descrição</label>";
	$resultado .= "<input type='text' class='form-control' id='descricao' required='required' name='descricao' value = '$descricao'>";
	$resultado .= "</div>";

	$resultado .= "<div class='form-group'><label for='tipo'>Autorização</label>";
	$resultado .= "<select class='form-control' id='tipo' name='tipo'>
    <option value='1'>Motociclista</option>
    <option value='2'>Motorista</option>
    <option value='3'>Motoristas</option>
    <option value='4'>Motorista e Auxiliar</option>
    <option value='5'>Todos utilizam</option></select>";
	$resultado .= "</div>";

	echo $resultado;
}else{
    header('Location: ../../../');
}
?>