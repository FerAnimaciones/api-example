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
				<div id="app">
					<h4>{{message}}</h4>
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
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">
var app = new Vue({
	el: '#app',
	data: {
		message: 'Prueba',
		lista:[],
	},
	created: function (){
		this.loadLista();
	},
	methods: {
		loadLista: function () {
			var v=this;
			axios.get('<?php echo site_url("welcome/getlista"); ?>')
			.then(function (response) {
				v.lista=response.data.lista;
				console.log(response);
			})
			.catch(function (error) {

				console.log(error);
			})
			.then(function () {

			});
		}
	}
});
</script>
</html>
