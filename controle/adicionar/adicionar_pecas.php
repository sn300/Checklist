<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<?php
	if (isset($_POST['descricao']) and isset($_POST['tipo'])) {
		require_once("../conexao.php");
		$descricao = $_POST["descricao"];
		$tipo = $_POST["tipo"];
		$ver_peca = "SELECT pe_descricao FROM `pecas` WHERE pe_descricao = '$descricao'";
		$exe_peca = mysqli_query($conexao, $ver_peca);
		$linha = mysqli_num_rows($exe_peca);
		if ($linha != 0) {
			echo "<script>";
			echo 'alert("Este item já foi cadastrado antes!");';
			echo "window.location.href ='../../usuarios/Administrador/acoes/pecas.php';";
			echo "</script>";
		} else {
			$sql = "INSERT INTO pecas(pe_descricao, pe_tipo) VALUES ('$descricao','$tipo')";
			$inserir = mysqli_query($conexao, $sql);
			echo "<script type='text/javascript'>
		alert('Peça cadastrada com sucesso');
		window.location.href='../../usuarios/Administrador/acoes/pecas.php';
		</script>";
		}
	} else {
		header('Location: ../../');
	}
	?>
</body>

</html>