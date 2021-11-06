<?php
if (isset($_POST['email']) || isset($_POST['senha'])) {
	session_start();
	include "conexao.php";
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$tipo = $_POST['tipo'];
	$query = "SELECT * FROM usuarios where usu_email = '$email' and usu_senha = '$senha' and usu_tipo = '$tipo'";
	$sql = mysqli_query($conexao, $query);
	$cont = 0;
	while ($dados = mysqli_fetch_assoc($sql)) {
		$cont++;
		$id = $dados['usu_id'];
		$nome = $dados['usu_nome'];
		$email = $dados['usu_email'];
		$senha = $dados['usu_senha'];
		$cidade = $dados['usu_cidade'];
	}
	if ($tipo == 1) {
		if ($cont == 1) {
			$_SESSION['usu_id'] = $id;
			$_SESSION['usu_nome'] = $nome;
			$_SESSION['usu_email'] = $email;
			$_SESSION['usu_senha'] = $senha;
			$_SESSION['usu_tipo'] = $tipo;
			$_SESSION['usu_cidade'] = $cidade;
			echo '<script type="text/javascript">';
			echo  'window.location.href="../usuarios/Administrador/index.php";';
			echo '</script>';
		} else {
			echo "<script type='text/javascript'>
				          alert('Dados Incorretos');
				          window.location.href='../';</script>";
		}
	}
	if ($tipo == 2) {
		if ($cont == 1) {
			$_SESSION['usu_id'] = $id;
			$_SESSION['usu_nome'] = $nome;
			$_SESSION['usu_email'] = $email;
			$_SESSION['usu_senha'] = $senha;
			$_SESSION['usu_tipo'] = $tipo;
			$_SESSION['usu_cidade'] = $cidade;
			echo '<script type="text/javascript">';
			echo 'window.location.href="../usuarios/Funcionario/index.php";';
			echo '</script>';
		} else {
			echo "<script type='text/javascript'>
				          alert('Dados Incorretos');
				          window.location.href='../';</script>";
		}
	}
} else {
	header('Location: ../');
}
?>