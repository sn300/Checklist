<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<?php
	if (isset($_POST["descricao"]) and isset($_POST["tipo"])) {
		require_once("../conexao.php");
		$descricao = $_POST["descricao"];
		$tipo = $_POST["tipo"];
		$direcionamento = "Epi";
		$ver_epi = "SELECT fer_descricao, fer_direcionamento FROM `Ferramentas` WHERE fer_descricao = '$descricao'";
		$exe_epi = mysqli_query($conexao, $ver_epi);
		$linha = mysqli_num_rows($exe_epi);
		if ($linha != 0) {
			while ($dados = mysqli_fetch_assoc($exe_epi)) {
				$direcionamento = $dados['fer_direcionamento'];
			}
			echo "<script>";
			echo 'alert("Este item já foi cadastrado antes! Ele se encontra em ' . $direcionamento . '");';
			echo "window.location.href ='../../usuarios/Administrador/acoes/epi.php';";
			echo "</script>";
		} else {
			$sql = "INSERT INTO ferramentas(fer_descricao, fer_tipo, fer_direcionamento) VALUES ('$descricao','$tipo', '$direcionamento')";
			$inserir = mysqli_query($conexao, $sql);

			echo "<script type='text/javascript'>
 		alert('Epi cadastrado com sucesso');
		window.location.href='../../usuarios/Administrador/acoes/epi.php';</script>";
		}
	} else {
		header('Location: ../../');
	}
	?>


</body>

</html>