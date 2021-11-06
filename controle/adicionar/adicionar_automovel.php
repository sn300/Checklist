<?php
	if(!isset($_POST['modelo']) || !isset($_POST["placa"]) || !isset($_POST["tipo"])){
		header('Location: ../../');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$marca = $_POST["marca"];
$modelo = $_POST["modelo"]; 
$tipo = $_POST["tipo"];
$placa = $_POST["placa"];
$foto = $_FILES["foto"]; 
$cidade = $_POST["cidade"];     
if (isset($_FILES['foto'])) {
	require_once("../conexao.php");
	$ver_automovel = "SELECT auto_placa FROM `automoveis` WHERE auto_placa = '$placa'";
	$exe_auto = mysqli_query($conexao, $ver_automovel);
	$linha = mysqli_num_rows($exe_auto);
		if ($linha != 0) {
			echo "<script>";
			echo 'alert("Não foi possivel realizar este cadastro;");';
			echo "window.location.href ='../../usuarios/Administrador/acoes/automoveis.php';";
			echo "</script>";
			}
		else{
	$ext = strtolower(substr($_FILES['foto']['name'], -5));
	$new_name = date("Y.m.d-H.i.s").$ext;
	$dir = '../../images/automoveis/'; 
	move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $new_name);
	$sql = "INSERT INTO `automoveis`(`auto_modelo`, `auto_placa`, `auto_tipo`, `auto_foto`, `auto_cidade`, `auto_marca`) VALUES ('$modelo', '$placa', '$tipo', '$new_name','$cidade', '$marca')";
	$executar = mysqli_query($conexao, $sql);
	echo "<script>alert('Automóvel cadastrado com sucesso');
	  window.location.href='../../usuarios/Administrador/acoes/automoveis.php';
 </script>";
}
} else{
	header('Location:../../');
}
?>
</body>
</html>

