<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<?php
	if (isset($_POST['id_inserido']) and isset($_POST['tipo'])) {
		require_once('../../../controle/conexao.php');
		$id = $_POST['id_inserido'];
		$tipo = $_POST['tipo'];

		if ($tipo == '1') {
			for ($i = 0; $i < sizeof($_POST['ferramenta']); $i++) {
				$ferramenta = $_POST['ferramenta'][$i];
				$condicao = $_POST['fer_situacao'][$i];
				// echo $ferramenta . "-" . $condicao . "-->Ferramentas<br>";
				$query_ferramentas = "INSERT INTO ferramentas_has_transacao(ferramentas_fer_id, transacao_tra_id, fer_has_transacao_descricao) VALUES ('$ferramenta','$id','$condicao')";
				$ex_ferramentas = mysqli_query($conexao, $query_ferramentas);
			}
			for ($i = 0; $i < sizeof($_POST['epi']); $i++) {
				$epi = $_POST['epi'][$i];
				$condicao = $_POST['epi_situacao'][$i];
				// echo $epi . "" . $condicao . "--> Epi<br>";
				$query_epi = "INSERT INTO ferramentas_has_transacao(ferramentas_fer_id, transacao_tra_id, fer_has_transacao_descricao) VALUES ('$epi','$id','$condicao')";
				$ex_epi = mysqli_query($conexao, $query_epi);
			}
			for ($i = 0; $i < sizeof($_POST['pecas']); $i++) {
				$pecas = $_POST['pecas'][$i];
				$condicao_pecas = $_POST['pecas_situacao'][$i];
				// echo $pecas . "-" . $condicao_pecas . "-->Pecas<br>";
				$query_pecas = "INSERT INTO `transacao_has_pecas`(`transacao_tra_id`, `pecas_pe_id`, `tran_pe_condicao`) VALUES ('$id','$pecas','$condicao_pecas')";		
				$exe_pecas = mysqli_query($conexao, $query_pecas);
			}
			echo '<script>';
			echo 'alert("Relatório Concluído");';
			echo 'window.open("relatorios/ver_relatorio_moto.php?id='.$id.'");';
			echo '</script>';
			echo "<script type='text/javascript'>
			window.location.href = '../index.php';	
		</script>";
		} 
    
        if ($tipo == '2') {
			for ($i = 0; $i < sizeof($_POST['ferramenta']); $i++) {
				$ferramenta = $_POST['ferramenta'][$i];
				$condicao = $_POST['fer_situacao'][$i];
				// echo $ferramenta."-".$condicao."--> Pecas <br>";
				$query_ferramentas = "INSERT INTO ferramentas_has_transacao(ferramentas_fer_id, transacao_tra_id, fer_has_transacao_descricao) VALUES ('$ferramenta','$id','$condicao')";
				$ex_ferramentas = mysqli_query($conexao, $query_ferramentas);
			}
			for ($i = 0; $i < sizeof($_POST['epi']); $i++) {
				$epi_epc = $_POST['epi'][$i];
				$condicao = $_POST['epi_situacao'][$i];
				// echo $epi_epc."-".$condicao."--> Epi e Epc´s <br>";
				$query_epi = "INSERT INTO ferramentas_has_transacao(ferramentas_fer_id, transacao_tra_id, fer_has_transacao_descricao) VALUES ('$epi_epc','$id','$condicao')";
				$ex_epi = mysqli_query($conexao, $query_epi);
			}
			for ($i = 0; $i < sizeof($_POST['pecas']); $i++) {
				$pecas = $_POST['pecas'][$i];
				$condicao_pecas = $_POST['pecas_situacao'][$i];
				// echo $pecas."-".$condicao_pecas."--> Pecas <br>";
				$query_pecas = "INSERT INTO `transacao_has_pecas`(`pecas_pe_id`, `transacao_tra_id`, `tran_pe_condicao`) VALUES ('$pecas','$id','$condicao_pecas')";
				$exe_pecas = mysqli_query($conexao, $query_pecas);
			}
			echo '<script>';
			echo 'alert("Relatório Concluído");';
			echo 'window.open("relatorios/ver_relatorio_carro.php?id=' . $id . '&&tipo=' . $tipo . '");';
			echo '</script>';
			echo "<script type='text/javascript'>
			window.location.href = '../index.php';	
		</script>";
		}
		 if ($tipo == '3') {
			//  var_dump($_POST);
			for ($i = 0; $i < sizeof($_POST['ferramenta']); $i++) {
				$ferramenta = $_POST['ferramenta'][$i];
				$condicao = $_POST['fer_situacao'][$i];
				$query_ferramentas = "INSERT INTO ferramentas_has_transacao(ferramentas_fer_id, transacao_tra_id, fer_has_transacao_descricao) VALUES ('$ferramenta','$id','$condicao')";
				$ex_ferramentas = mysqli_query($conexao, $query_ferramentas);
			}
			for ($i = 0; $i < sizeof($_POST['epi']); $i++) {
				$epi_epc = $_POST['epi'][$i];
				$condicao = $_POST['epi_situacao'][$i];
				$query_epi = "INSERT INTO ferramentas_has_transacao(ferramentas_fer_id, transacao_tra_id, fer_has_transacao_descricao) VALUES ('$epi_epc','$id','$condicao')";
				$ex_epi = mysqli_query($conexao, $query_epi);
			}
			echo '<script>';
			echo 'alert("Relatório Concluído");';
			echo 'window.open("relatorios/ver_relatorio_aux.php?id=' .$id.'&&tipo='.$tipo .'");';
			echo '</script>';
			echo "<script type='text/javascript'>
			window.location.href = '../index.php';	
		</script>";
		}
	}else{
		header('Location: ../../../');
	}

	?>
</body>

</html>