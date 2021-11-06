<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
if(!isset($_POST['descricao'])){
	header('Location: ../../');
}
else{
require_once("../conexao.php");
$nome = $_POST["descricao"]; 
$tipo = $_POST['tipo'];
$direcionamento = "Ferramentas";
$ver_fer = "SELECT fer_descricao, fer_direcionamento FROM `Ferramentas` WHERE fer_descricao = '$nome'";
$exe_fer = mysqli_query($conexao, $ver_fer);
$linha = mysqli_num_rows($exe_fer);
if ($linha != 0){
	while ($dados = mysqli_fetch_assoc($exe_fer)) {
		$direcionamento = $dados['fer_direcionamento'];
	  }
    echo "<script>";
    echo'alert("Este item já foi cadastrado antes! Ele se encontra em '.$direcionamento.'");';
     echo "window.location.href ='../../usuarios/Administrador/acoes/ferramentas.php';";
      echo "</script>";
} else{
$sql = "INSERT INTO `ferramentas`(`fer_descricao`,`fer_tipo`, `fer_direcionamento`) VALUES ('$nome','$tipo','$direcionamento')";
$inserir = mysqli_query($conexao, $sql);
echo "<script type='text/javascript'>
alert('Ferramenta cadastrada com sucesso');
window.location.href='../../usuarios/Administrador/acoes/ferramentas.php';
</script>"
;
}
}
?>

</body>
</html>

