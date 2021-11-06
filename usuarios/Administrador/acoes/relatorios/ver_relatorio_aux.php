<?php
include'../../../../default/fpdf/fpdf.php';
$id = $_GET['id'];
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Image('../../../../images/logo.png',80,8,33);
//$pdf->Cell(0,0,utf8_decode('Relatório - Check List'),0,2,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial","b",11);
$pdf->Cell(35,7,"Nome - Auxiliar",1,0,"c");
include'../../../../controle/conexao.php';
$query = "SELECT usu_nome, tra_id,auto_modelo, auto_placa, tra_data, tra_horai, tra_horaf, tra_quilometragem,tra_quilometragemf, tra_obs FROM transacao 
INNER JOIN usuarios ON usuarios_usu_id = usu_id INNER JOIN automoveis ON auto_id = automoveis_auto_id WHERE tra_id = '$id'";
$sql = mysqli_query($conexao, $query);
while ($row = mysqli_fetch_array($sql)) {
$pdf->SetFont("Arial","",10);
// $pdf->Cell(15,7,utf8_decode($row["tra_id"]),1,0,"c");
$pdf->Cell(152,7,utf8_decode($row["usu_nome"]),1,0,"c");
$pdf->Ln();

}
$pdf->Ln();
$pdf->SetFont("Arial","b",11);
//$pdf->Cell(45,7,"Nome",1,0,"c");
$pdf->Cell(35,7,utf8_decode("Automóvel"),1,0,"c");
$pdf->Cell(47,7,"Placa",1,0,"c");
$pdf->Cell(50,7,"Data",1,0,"c");
$pdf->Cell(55,7,utf8_decode("Turno"),1,0,"c");
$pdf->Ln();
include'../../../../controle/conexao.php';
$query = "SELECT usu_nome, tra_id,auto_modelo, auto_placa, tra_data, tra_quilometragem, tra_horai, tra_horaf, tra_obs FROM transacao 
INNER JOIN usuarios ON usuarios_usu_id = usu_id INNER JOIN automoveis ON auto_id = automoveis_auto_id WHERE tra_id = '$id'";
$sql = mysqli_query($conexao, $query);

while ($row = mysqli_fetch_array($sql)) {
$pdf->SetFont("Arial","",10);
// $pdf->Cell(15,7,utf8_decode($row["tra_id"]),1,0,"c");
//$pdf->Cell(40,7,utf8_decode($row["usu_nome"]),1,0,"c");
$pdf->Cell(35,7,utf8_decode($row["auto_modelo"]),1,0,"c");
$pdf->Cell(47,7,utf8_decode($row["auto_placa"]),1,0,"c");
//$pdf->Cell(25,7,utf8_decode($row["tra_obs"]),1,0,"c");
$pdf->Cell(50,7,$row["tra_data"],1,0,"c");
$pdf->Cell(55,7,utf8_decode($row["tra_horai"]." até ".$row["tra_horaf"]),1,5,"c");
$pdf->Ln();
}
$pdf->SetFont("Arial","b",11);
// // $pdf->Cell(15,7,"Codigo",1,0,"c");
$pdf->Cell(60,7,"Ferramentas",1,0,"c");
$pdf->Cell(27,7,utf8_decode("Condição"),1,0,"c"); 
$pdf->Ln();
$ferramentas = "SELECT fer_descricao, fer_has_transacao_descricao, fer_direcionamento FROM transacao 
INNER JOIN ferramentas_has_transacao ON transacao_tra_id = tra_id
 INNER JOIN ferramentas ON fer_id = ferramentas_fer_id WHERE tra_id = '$id' 
 AND fer_direcionamento = 'Ferramentas'";

$execute_fer = mysqli_query($conexao, $ferramentas);
while ($row = mysqli_fetch_array($execute_fer)) {
    $pdf->SetFont("Arial","",10);
    $pdf->cell(60,7,utf8_decode($row["fer_descricao"]),1,0,"c");
    $pdf->Cell(27,7,utf8_decode($row["fer_has_transacao_descricao"]),1,0,"c");
    $pdf->Ln();
} 
$pdf->SetY("53"); 
$pdf->Ln();
$pdf->SetX("103");
$pdf->SetFont("Arial","b",11);
$pdf->Cell(60,7,"Epi",1,0,"c");
$pdf->Cell(27,7,utf8_decode("Condição"),1,0,"c");
$pdf->Ln();
$epi = "SELECT fer_descricao, fer_has_transacao_descricao, fer_direcionamento FROM transacao INNER JOIN 
ferramentas_has_transacao ON transacao_tra_id = tra_id INNER JOIN ferramentas ON fer_id = ferramentas_fer_id WHERE tra_id = '$id'
AND fer_direcionamento = 'Epi'";
$execute_epi = mysqli_query($conexao, $epi);
while ($linha = mysqli_fetch_array($execute_epi)) {
    $pdf->SetFont("Arial","",10);
    $pdf->SetX("103");
    $pdf->cell(60,7,utf8_decode($linha["fer_descricao"]),1,0,"c");
    $pdf->Cell(27,7,utf8_decode($linha["fer_has_transacao_descricao"]),1,0,"c");
    $pdf->Ln(); 
    }
    $pdf->Ln();
    $sql = mysqli_query($conexao, $query);
    $pdf->Cell(180,7,utf8_decode("Observação"),1,0,"C");
    $query = "SELECT tra_obs FROM transacao WHERE tra_id = '$id'";
    $pdf->Ln();
    while ($row = mysqli_fetch_array($sql)) {
    //MultiCell(float w, float h, string txt [, mixed border [, string align [, boolean fill]]])
    $pdf->MultiCell(0, 5, utf8_decode($row["tra_obs"]),0,'L', false);
    //$pdf->Cell(180,7,utf8_decode($row["tra_obs"]),1,0,"c");
    }


    $pdf->Output();

?>