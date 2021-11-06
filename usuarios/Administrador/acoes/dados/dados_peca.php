<?php
if(isset($_POST["pe_id"])){
	require_once('../../../../controle/conexao.php');
	$id_pe = $_POST['pe_id'];
	$resultado = '';
	
	$query_pe = "SELECT * FROM pecas WHERE pe_id = '$id_pe'";
	$resultado_pe = mysqli_query($conexao, $query_pe);
	$row_pe = mysqli_fetch_assoc($resultado_pe);
	$id = $row_pe['pe_id'];
    $descricao = $row_pe['pe_descricao'];
    $tipo = $row_pe['pe_tipo'];

	$resultado .= "<input type='hidden' value='$id' name='id'>";
	$resultado .= "<div class='form-group'><label for='descricao'>Descrição</label>";
	$resultado .= "<input type='text' class='form-control' id='descricao' required='required' name='descricao' value = '$descricao'>";
	$resultado .= "</div>";

	
	$resultado .= "<div class='form-group'><label for='tipo'>Autorização</label>";
	$resultado .= "<select class='form-control' id='tipo' name='tipo'>
    <option value='1'>Moto</option>
    <option value='2'>Carro</option>
    <option value='3'>Moto e Carro</option>
    </select>";
	$resultado .= "</div>";

	echo $resultado;
}else{
    header('Location: ../../../');
}
?>