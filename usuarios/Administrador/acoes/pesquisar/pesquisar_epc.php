
<?php
include_once '../../../../controle/conexao.php';

$descricao = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//Pesquisar no banco de dados nome do usuario referente a palavra digitada
$result_user = "SELECT * FROM ferramentas WHERE fer_descricao LIKE '%$descricao%' AND fer_direcionamento ='Epc'";
$resultado_user = mysqli_query($conexao, $result_user);

if(($resultado_user) AND ($resultado_user->num_rows != 0 )){
	while($dados = mysqli_fetch_assoc($resultado_user)){
        $id = $dados['fer_id'];
        $descricao = $dados['fer_descricao'];
        $tipo = $dados['fer_tipo'];
        $aux = array(
            1 => "Motociclista",
            2 => "Motorista",
            3 => "Motoristas",
            4 => "Motorista e Auxiliar",
            5 => "Todos usam"
        );
        echo "<tr>
<td class='text-center'>$id</td>
<td class='text-center'>$descricao</td>
<td class='text-center'>$aux[$tipo]</td>
<td class='text-center'><a href='#' class='editar_epc' id='$id'><i class='fa fa-pencil-square' aria-hidden='true'></i></a></td>
<td class='text-center'><a href='#' onClick='apagar_epc($id)'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
</tr>";
                        }
                    }else{
	echo "<center><td class='text-center'>Nenhum registro encontrado ...</td></center>";
}
?>
   

