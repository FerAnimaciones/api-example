<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>TEST</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>LISTA</h2>
				<div>
					<table class="table">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Password</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="datos in lista">
								<td>{{datos.usuario}}</td>
								<td>{{datos.contrasena}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view("tools/scripts") ?>
</html>
