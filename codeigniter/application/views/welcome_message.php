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
			<div class="col-md-6">
				<h2>CODEIGTNER MODE</h2>
				<a href="<?php echo site_url("welcome/lista"); ?>" type="button" class="btn btn-primary">Lista</a>
				<a type="button" class="btn btn-primary">Formulario</a>
			</div>
			<div class="col-md-6">
				<h2>VueJS MODE</h2>
				<a href="<?php echo site_url("welcome/vuejslista"); ?>" type="button" class="btn btn-primary">Lista / Formulario</a>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view("tools/scripts") ?>
</html>
