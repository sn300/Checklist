<?php
if (isset($_GET['atualizar']) || isset($_POST['id'])) {
    include "../conexao.php";
    $id = $_POST['id'];
    $atualizar = $_GET['atualizar'];
    switch ($atualizar) {
        case $atualizar == 'fun':
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $contato = $_POST['contato'];
            $cidade = $_POST['cidade'];
            // $senha = $_POST['senha'];
            $tipo = $_POST['tipo'];
            $query = "UPDATE usuarios set usu_nome = '$nome', usu_cpf= '$cpf', usu_email= '$email', usu_senha= '$senha', usu_tipo = '$tipo', usu_contato = '$contato', usu_cidade = '$cidade' WHERE usu_id = '$id'";
            $sql = mysqli_query($conexao, $query);
            echo "<script>alert('Dados editados com sucesso');
         	 window.location.href='../../usuarios/Administrador/acoes/funcionarios.php';
        </script>";
            break;
        case $atualizar == 'auto':
            $modelo = $_POST['modelo'];
            $placa = $_POST['placa'];
            $marca = $_POST['marca'];
            $tipo = $_POST['tipo'];
            $cidade = $_POST['cidade'];
            $foto = $_FILES['foto'];
            // var_dump($foto);
                    if (isset($_FILES['foto'])) {
                        $ext = strtolower(substr($_FILES['foto']['name'], -5)); //Pegando extensão do arquivo
                        $new_name = date("Y.m.d-H.i.s").$ext; //Definindo um novo nome para o arquivo
                        $dir = '../../images/automoveis/'; //Diretório para uploads
                        move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $new_name); //Fazer upload do arquivo
                        $sql = "UPDATE `automoveis` SET `auto_modelo`= '$modelo',`auto_marca`= '$marca',`auto_placa`= '$placa',`auto_tipo`= '$tipo',`auto_foto`='$new_name',`auto_cidade`= '$cidade' WHERE auto_id = '$id'";
                        $executar = mysqli_query($conexao, $sql);
                        echo "<script>alert('Alteração feita com sucesso');
                          window.location.href='../../usuarios/Administrador/acoes/automoveis.php';
                     </script>";
                    }
            break;
        case $atualizar == 'epc':
            $descricao = $_POST['descricao'];
            $tipo = $_POST['tipo'];
            $query = "UPDATE ferramentas SET fer_descricao = '$descricao', fer_tipo = $tipo WHERE fer_id = $id";
            $sql = mysqli_query($conexao, $query);
            echo "<script>alert('Epc atualizado com sucesso');
        	window.location.href='../../usuarios/Administrador/acoes/epc.php';
        </script>";
            break;
        case $atualizar == 'epi':
            $descricao = $_POST['descricao'];
            $tipo = $_POST['tipo'];
            $query = "UPDATE ferramentas SET fer_descricao = '$descricao', fer_tipo = $tipo WHERE fer_id = $id";
            $sql = mysqli_query($conexao, $query);
            echo "<script>alert('Epi atualizado com sucesso!');
        	window.location.href='../../usuarios/Administrador/acoes/epi.php';
        </script>";
            break;
        case $atualizar == 'pecas':
            $descricao = $_POST['descricao'];
            $tipo = $_POST['tipo'];
            $query = "UPDATE pecas SET pe_descricao = '$descricao', pe_tipo = $tipo WHERE pe_id = $id";
            $sql = mysqli_query($conexao, $query);
            echo "<script>alert('Equipamentos do Veículo atualizado com sucesso');
        	window.location.href='../../usuarios/Administrador/acoes/pecas.php';
        </script>";
            break;
        case $atualizar == 'fer':
            $descricao = $_POST['descricao'];
            $tipo = $_POST['tipo'];
            $query = "UPDATE ferramentas SET fer_descricao = '$descricao', fer_tipo = '$tipo' WHERE fer_id = '$id'";
            $sql = mysqli_query($conexao, $query);
            echo "<script>alert('Ferramenta atualizada com sucesso');
        	window.location.href='../../usuarios/Administrador/acoes/ferramentas.php';
        </script>";
            break;
            case $atualizar == 'editar_fun_perfil':
                    $id = $_POST['id'];
                    $nome = $_POST['nome'];
                    $email = $_POST['email'];
                    $cpf = $_POST['cpf'];
                    $senha = $_POST['senha'];
                    $contato = $_POST['contato'];
                    $cidade = $_POST['cidade'];
                    $foto = $_FILES['foto'];
                    if (isset($_FILES['foto'])) {
                        $ext = strtolower(substr($_FILES['foto']['name'], -5)); //Pegando extensão do arquivo
                        $new_name = date("Y.m.d-H.i.s").$ext; //Definindo um novo nome para o arquivo
                        $dir = '../../images/perfil/'; //Diretório para uploads
                        move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $new_name); //Fazer upload do arquivo
                        $sql = "UPDATE usuarios SET usu_nome = '$nome', usu_cpf = '$cpf', usu_email = '$email', usu_senha = '$senha', usu_foto = '$new_name', usu_contato = '$contato' WHERE usu_id = '$id'";
                        $executar = mysqli_query($conexao, $sql);
                        echo "<script>alert('Perfil atualizado com sucesso');
                          window.location.href='../../usuarios/Funcionario/acoes/ver_perfil.php';
                     </script>";
                    }
                    break;
                    case $atualizar == 'editar_adm_perfil':
                        // var_dump($_POST);
                        $id = $_POST['id'];
                        $nome = $_POST['nome'];
                        $email = $_POST['email'];
                        $cpf = $_POST['cpf'];
                        $senha = $_POST['senha'];
                        $contato = $_POST['contato'];
                        $foto = $_FILES['foto'];
                        if (isset($_FILES['foto'])) {
                            $ext = strtolower(substr($_FILES['foto']['name'], -5)); //Pegando extensão do arquivo
                            $new_name = date("Y.m.d-H.i.s").$ext; //Definindo um novo nome para o arquivo
                            $dir = '../../images/perfil/'; //Diretório para uploads
                            move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $new_name); //Fazer upload do arquivo
                            $sql = "UPDATE usuarios SET usu_nome = '$nome', usu_cpf = '$cpf', usu_email = '$email', usu_senha = '$senha', usu_foto = '$new_name', usu_contato = '$contato' WHERE usu_id = '$id'";
                            $executar = mysqli_query($conexao, $sql);
                            echo "<script>alert('Perfil atualizado com sucesso');
                              window.location.href='../../usuarios/Administrador/acoes/seu_perfil.php';
                         </script>";
                        }
                        break;
                    
    }
} else {
    header('Location: ../../');
}
?>