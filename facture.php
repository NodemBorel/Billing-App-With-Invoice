<?php

require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

$conn = new PDO('mysql:host=localhost; dbname=login-registration', 'root', '');

$sql = 'SELECT * FROM facture ORDER BY id_facture DESC LIMIT 1';
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$gt = 0;
$i = 1;

$html = '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Facture</title>
	<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		h2{
			font-family: Verdana, Geneva, Tahoma, sans-serif;
			text-align: center;
		}
		table{
			font-family: Arial, Melvetica, sans-serif;
			border: collapse;
			width: 100%;
		}
		td, th{
			border: 1px solid #444;
			padding: 10px;
			text-align: left;
		}
		.my-table{
			text-align: right;
		}
		#sign{
			padding-top:50px ;
			text-align: right;
		}
	</style>
</head>
<body>
	<h2>Facture</h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Identifiant facture</th>
				<th>libelle document</th>
				<th>Date/heure</th>
				<th>Numbre de page</th>
				<th>Prix Couleur</th>
				<th>Prix Relue</th>
				<th>Prix Total impression </th>

			</tr>
		</thead>
		<tbody>';

		foreach($rows as $row){
			$html .= '<tr>
			<td>'.$row['id_facture'].'</td>
			<td>'.$row['libelle'].'</td>
			<td>'.$row['date_time'].'</td>
			<td>'.$row['num_page'].'</td>
			<td>'.$row['couleur'].'</td>
			<td>'.$row['relue'].'</td>
			<td>'.$row['total'].'</td>
			</tr>
			</tbody>
	</table> 
	<script src="assets/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>';

		}




$dompdf = new Dompdf;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('facture.pdf');
?>

		


        

