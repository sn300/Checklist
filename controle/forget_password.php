<?php
if(isset($_POST['email'])){
    require_once('conexao.php');
    $novasenha = substr(md5(time()), 0, 6);
    $email = $_POST['email'];
    $ver_email = "SELECT usu_email FROM `usuarios` WHERE usu_email = '$email'";
    $exe_ver = mysqli_query($conexao, $ver_email);
    $linha = mysqli_num_rows($exe_ver);
    if ($linha =! 0){
        $sql = "UPDATE usuarios set usu_senha = '$novasenha' where usu_email = '$email'";
        
            echo "<script>";
            echo "alert('Sua nova senha é ".$novasenha.":!');";
            echo "window.location.href ='../';";
            echo "</script>";
    }else{
        echo "<script>
                alert('Vossa senhoria não se encontra em nosso sistema! Contate um administrador;');
                window.location.href ='../';
            </script>";
    }

 
}else{
    header('Location: ../');
}
?>