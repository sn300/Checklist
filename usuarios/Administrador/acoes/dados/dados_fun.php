<?php
if(isset($_POST["user_id"])){
	require_once('../../../../controle/conexao.php');
	
	$resultado = '';
	$funcao = $_GET['funcao'];
	$query_user = "SELECT * FROM usuarios WHERE usu_id = '" . $_POST["user_id"] . "' LIMIT 1";
	$resultado_user = mysqli_query($conexao, $query_user);
	$row_user = mysqli_fetch_assoc($resultado_user);
	$id = $row_user['usu_id'];
    $nome = $row_user['usu_nome'];
    $cpf = $row_user['usu_cpf'];
    $email = $row_user['usu_email'];
    $senha = $row_user['usu_senha'];
	$cidade = $row_user['usu_cidade'];
    $contato = $row_user['usu_contato'];
	$foto = $row_user['usu_foto'];
	$img;
	if($foto != 0){
		$img = $foto;
	}else{
		
		$img = "foto.png";
	}
	$aux = array(1=> 'Canindé',
            2=>'Sobral'
        );
	switch ($funcao) {
        case $funcao == 'editar':

	$resultado .= "<input type='hidden' value='$id' name='id'>";
	$resultado .= "<div class='form-group'><label for='nome'>Nome</label>";
	$resultado .= "<input type='text' class='form-control' id='nome' required='required' name='nome' value = '$nome'>";
	$resultado .= "</div>";

	$resultado .= "<div class='form-group'><label for='cpf'>Cpf</label>";
	$resultado .= "<input type='text' class='form-control' size='14' maxlength='14' required='' id='cpf' name='cpf' value = '$cpf'>";
	$resultado .= "</div>";
	
    $resultado .= "<div class='form-group'><label for='email'>Email</label>";
	$resultado .= "<input type='email' class='form-control' id='email' required='required' name='email' value = '$email'>";
	$resultado .= "</div>";

    $resultado .= "<div class='form-group'><label for='email'>Senha</label>";
    // senha usuario 
	$resultado .= "<input type='password' class='form-control' id='senha' required='required' name='senha' value = '$senha'>";
    $resultado .= " <p onclick='mostrar()'><input type='checkbox' name='' id='senhazinha'> mostrar senha</p>";
	$resultado .= "</div>";

    $resultado .= "<div class='form-group'><label for='contato'>Contato</label>";
	$resultado .= "<input type='text' class='form-control' id='contato' required='required' name='contato' value = '$contato'>";
	$resultado .= "</div>";
	
    $resultado .= "<div class='form-group'><label for='cidade'>Cidade</label>";
    $resultado .= "<select class='form-control' id='cidade' name='cidade'><option value='Canindé'>Canindé</option>
    <option value='Sobral'>Sobral</option>
  </select>";
	$resultado .= "</div>";

    $resultado .= "<div class='form-group'><label for='tipo'>Tipo</label>";
	$resultado .= "<select class='form-control' id='tipo' name='tipo'>
    <option value='2'>Funcionário</option>
    <option value='1'>Administrador</option>
  </select>";
	$resultado .= "</div>";
	echo $resultado;
		break;

		case $funcao == 'ver':
			$resultado .= "<div class='text-center'>";
			$resultado .= "<img class='foto_auto' src='../../../images/perfil/$img'/>";
			$resultado .= "</div>";
			// var_dump($foto);
			$resultado .= "<div class='form-group'><label for='nome'>Nome</label>";
			$resultado .= "<input type='text' class='form-control' id='nome' required='required' name='nome' value = '$nome' disabled>";
			$resultado .= "</div>";
			$resultado .= "<div class='form-group'><label for='modelo'>Email</label>";
			$resultado .= "<input type='text' class='form-control' id='email' required='required' name='email' value = '$email' disabled>";
			$resultado .= "</div>";
			$resultado .= "<div class='form-group'><label for='cidade'>Contato</label>";
			$resultado .= "<input type='text' class='form-control' id='contato' required='required' name='contato' value = '$contato' disabled>";
			$resultado .= "</div>";
			$resultado .= "<div class='form-group'><label for='modelo'>Cidade</label>";
	$resultado .= "<input type='text' class='form-control' id='cidade' required='required' name='cidade' value = '$cidade' disabled>";
	$resultado .= "</div>";
	echo $resultado;
	break;
		}
}else{
    header('Location: ../../../');
}
?>