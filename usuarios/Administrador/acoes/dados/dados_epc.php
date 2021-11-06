<?php
if(isset($_POST["epc_id"])){
	require_once('../../../../controle/conexao.php');
	$id_epc = $_POST['epc_id'];
	$resultado = '';
	
	$query_epc = "SELECT * FROM ferramentas WHERE fer_id = '$id_epc' AND fer_direcionamento = 'Epc'";
	$resultado_epc = mysqli_query($conexao, $query_epc);
	$row_epc = mysqli_fetch_assoc($resultado_epc);
	$id = $row_epc['fer_id'];
    $descricao = $row_epc['fer_descricao'];
    $tipo = $row_epc['fer_tipo'];

	$resultado .= "<input type='hidden' value='$id' name='id'>";
	$resultado .= "<div class='form-group'><label for='descricao'>Descrição</label>";
	$resultado .= "<input type='text' class='form-control' id='descricao' required='required' name='descricao' value = '$descricao'>";
	$resultado .= "</div>";

	$resultado .= "<div class='form-group'><label for='tipo'>Autorização</label>";
	$resultado .= "<select class='form-control' id='tipo' name='tipo'>
    <option value='2'>Motorista</option></select>";
	$resultado .= "</div>";

	echo $resultado;
}else{
    header('Location: ../../../');
}
?>