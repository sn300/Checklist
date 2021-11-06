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
		$epc = "Epc";
		$tipo = $_POST["tipo"];
		$ver_epc = "SELECT fer_descricao, fer_direcionamento FROM `Ferramentas` WHERE fer_descricao = '$descricao'";
		$exe_epc = mysqli_query($conexao, $ver_epc);
		$linha = mysqli_num_rows($exe_epc);
		if ($linha != 0) {
			while ($dados = mysqli_fetch_assoc($exe_epc)) {
				$direcionamento = $dados['fer_direcionamento'];
			}
			echo "<script>";
			echo 'alert("Este item já foi cadastrado antes! Ele se encontra em ' . $direcionamento . '");';
			echo "window.location.href ='../../usuarios/Administrador/acoes/epc.php';";
			echo "</script>";
		} else {
			$sql = "INSERT INTO ferramentas(fer_descricao, fer_tipo, fer_direcionamento) VALUES ('$descricao','$tipo', '$epc')";
			$inserir = mysqli_query($conexao, $sql);
			echo "<script type='text/javascript'>
 		alert('Epc cadastrado com sucesso');
		window.location.href='../../usuarios/Administrador/acoes/epc.php';</script>";
		}
	} else {
		header('Location: ../../');
	}
	?>
</body>

</html>