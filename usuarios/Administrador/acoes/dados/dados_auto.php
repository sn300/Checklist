<?php
if(isset($_POST["auto_id"])){
	require_once('../../../../controle/conexao.php');
	$funcao = $_GET['funcao'];
    $resultado = '';
	$query = "SELECT * FROM automoveis WHERE auto_id = '" . $_POST["auto_id"] . "' LIMIT 1";
	$executar = mysqli_query($conexao, $query);
	$row = mysqli_fetch_assoc($executar);
	$id = $row['auto_id'];
    $modelo = $row['auto_modelo'];
    $marca = $row['auto_marca'];
    $placa = $row['auto_placa'];
    $foto = $row['auto_foto'];
    $cidade = $row['auto_cidade'];
    $aux = array(1=> 'Canindé',
            2=>'Sobral'
        );

    switch ($funcao) {
        case $funcao == 'editar':
	$resultado .= "<input type='hidden' value='$id' name='id'>";
	$resultado .= "<div class='form-group'><label for='modelo'>Modelo</label>";
	$resultado .= "<input type='text' class='form-control' id='modelo' required='required' name='modelo' value = '$modelo'>";
	$resultado .= "</div>";

	$resultado .= "<div class='form-group'><label for='marca'>Marca</label>";
	$resultado .= "<input type='text' class='form-control'  required='' id='marca' name='marca' value = '$marca'>";
	$resultado .= "</div>";
	
	$resultado .= "<div class='form-group'><label for='foto'>Foto</label>";
	$resultado .= "<input type='file' class='form-control'  required='' id='foto' name='foto' value = '$foto'>";
	$resultado .= "</div>";

    $resultado .= "<div class='form-group'><label for='placa'>Placa</label>";
	$resultado .= "<input type='text' class='form-control' id='placa' required='required' name='placa' value = '$placa'>";
	$resultado .= "</div>";

    $resultado .= "<div class='form-group'><label for='cidade'>Cidade</label>";
    $resultado .= "<select class='form-control' id='cidade' name='cidade'><option value='Canindé'>Canindé</option>
    <option value='Sobral'>Sobral</option>
  </select>";
  $resultado .= "<div class='form-group'><label for='tipo'>Tipo</label>";
  $resultado .= "<select class='form-control' id='tipo' name='tipo'><option value='1'>Moto</option>
  <option value='2'>Carro</option>
</select>";
	$resultado .= "</div>";
	echo $resultado;
    break;

         case $funcao == 'ver':
	$resultado .= "<div class='text-center'>";
	$resultado .= "<img class='foto_auto' src='../../../images/automoveis/$foto'/>";
	$resultado .= "</div>";
    $resultado .= "<div class='form-group'><label for='modelo'>Modelo</label>";
	$resultado .= "<input type='text' class='form-control' id='modelo' required='required' name='modelo' value = '$modelo' disabled>";
	$resultado .= "</div>";
    $resultado .= "<div class='form-group'><label for='modelo'>Placa</label>";
	$resultado .= "<input type='text' class='form-control' id='placa' required='required' name='placa' value = '$placa' disabled>";
	$resultado .= "</div>";
    $resultado .= "<div class='form-group'><label for='marca'>Marca</label>";
	$resultado .= "<input type='text' class='form-control' id='marca' required='required' name='marca' value = '$marca' disabled>";
	$resultado .= "</div>";
    // $resultado .= "<div class='form-group'><label for='modelo'>Última quilometragem</label>";
	// $resultado .= "<input type='text' class='form-control' id='modelo' required='required' name='quilometragem' value = '$modelo' disabled>";
	// $resultado .= "</div>";
    
    $resultado .= "<div class='form-group'><label for='modelo'>Cidade</label>";
	$resultado .= "<input type='text' class='form-control' id='cidade' required='required' name='cidade' value = '$cidade' disabled>";
	$resultado .= "</div>";
    echo $resultado;
            break;
        }
}else{
    header('Location: ../../../');
}
?>