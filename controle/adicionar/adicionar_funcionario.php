<?php
 
	if(!isset($_POST['nome']) || 
	!isset($_POST["cpf"]) || 
	!isset($_POST["email"]) || 
	!isset($_POST['tipo'])){
		header('Location: ../../');
	}else{
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
require_once("../conexao.php");
$nome = $_POST["nome"]; 
$cpf = $_POST["cpf"];  
$email = $_POST["email"];    
$tipo = $_POST['tipo'];
$cidade = $_POST['cidade'];
$contato = $_POST['contato'];
$senha = "Sobralnet123";
$ver_email = "SELECT usu_email FROM `usuarios` WHERE usu_email = '$email'";
$exe_ver = mysqli_query($conexao, $ver_email);
$linha = mysqli_num_rows($exe_ver);
if ($linha == 1){
    echo "<script>
            alert('Este email já foi cadastrado, tente com outro!');
            window.location.href ='../../usuarios/Administrador/acoes/funcionarios.php';
        </script>";
} else{
    $sql = "INSERT INTO `usuarios`(`usu_nome`, `usu_cpf`, `usu_email`, `usu_senha`, `usu_tipo`,`usu_cidade`,`usu_contato`) VALUES ('$nome','$cpf','$email','$senha','$tipo', '$cidade', '$contato')";
$inserir = mysqli_query($conexao, $sql);
        echo "<script>
            alert('Funcionário cadastrado com sucesso!');
            window.location.href ='../../usuarios/Administrador/acoes/funcionarios.php';
        </script>";
    }
}

?>
</body>
</html>

