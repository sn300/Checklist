<?php
include'../../../../default/fpdf/fpdf.php';
$tra_data = $_GET['tra_data'];
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
 $pdf->Ln(5);
$pdf->Image('../../../../images/logo.png',80,1,33);

$pdf->SetFont("Arial","b",9);
$pdf->Cell(60,7,"Nome",1,0,"c");
$pdf->Cell(20,7,utf8_decode("Automóvel"),1,0,"c");
$pdf->Cell(25,7,"Placa",1,0,"c");
$pdf->Cell(48,7,utf8_decode("Direcionamento"),1,0,"c");
$pdf->Cell(35,7,utf8_decode("Situação"),1,0,"c");
$pdf->Ln();
include'../../../../controle/conexao.php';
$query_pendencias_auto = "SELECT tra_id, auto_modelo, tra_tipo, auto_placa, tra_data, usu_nome, pe_descricao, usu_cidade, tran_pe_condicao FROM transacao INNER JOIN transacao_has_pecas ON transacao_tra_id = tra_id INNER JOIN pecas ON pe_id = pecas_pe_id INNER JOIN usuarios ON usu_id = usuarios_usu_id INNER JOIN automoveis ON automoveis_auto_id = auto_id WHERE tran_pe_condicao <> 'Conforme' AND tra_data = '$tra_data' AND usu_cidade = 'Canindé'";
                          $query_pendencias_ferramentas = "SELECT tra_id, auto_modelo, tra_tipo, auto_placa, tra_data, usu_nome, usu_cidade, fer_descricao, fer_has_transacao_descricao , fer_direcionamento FROM transacao INNER JOIN ferramentas_has_transacao ON transacao_tra_id = tra_id INNER JOIN ferramentas ON fer_id = ferramentas_fer_id INNER JOIN usuarios ON usu_id = usuarios_usu_id INNER JOIN automoveis ON automoveis_auto_id = auto_id WHERE fer_has_transacao_descricao <> 'Conforme' AND tra_data = '$tra_data' AND usu_cidade = 'Canindé'";
                          $sql_pendencias_auto = mysqli_query($conexao, $query_pendencias_auto) or die("Erro");
                          $sql_pendencias_fer = mysqli_query($conexao, $query_pendencias_ferramentas) or die("Erro");
                          while ($dados = mysqli_fetch_assoc($sql_pendencias_auto)) {
                            $pdf->SetFont("Arial","",8);
$pdf->Cell(60,7,utf8_decode($dados["usu_nome"]),1,0,"c");
$pdf->Cell(20,7,utf8_decode($dados["auto_modelo"]),1,0,"c");
$pdf->Cell(25,7,utf8_decode($dados["auto_placa"]),1,0,"c");
$pdf->Cell(48,7,utf8_decode($dados["pe_descricao"]),1,0,"c");
$pdf->Cell(35,7,utf8_decode($dados["tran_pe_condicao"]),1,0,"c");
$pdf->Ln();
                          }
                          while ($dados = mysqli_fetch_assoc($sql_pendencias_fer)) {
                            $pdf->Cell(60,7,utf8_decode($dados["usu_nome"]),1,0,"c");
$pdf->Cell(20,7,utf8_decode($dados["auto_modelo"]),1,0,"c");
$pdf->Cell(25,7,utf8_decode($dados["auto_placa"]),1,0,"c");
$pdf->Cell(48,7,utf8_decode($dados["fer_descricao"]),1,0,"c");
$pdf->Cell(35,7,utf8_decode($dados["fer_has_transacao_descricao"]),1,0,"c");
$pdf->Ln();
                          }

    $pdf->Output();

?>