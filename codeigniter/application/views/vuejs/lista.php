<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view("tools/header") ?>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>LISTA</h2>
			<div id="app" v-cloak>
				<h4>{{message}}</h4>
				<div v-if="modo==0" class="table-container">
					<button type="button"  v-on:click="formulario" class="btn btn-primary">FORMULARIO</button>
					<button type="button"  v-on:click="loadLista" class="btn btn-primary">REFRESCAR TABLA</button>
					<br><br>
					<table class="table">
						<thead>
							<tr>
								<th class="td-col">Nombre</th>
								<th class="td-col">Password</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="datos in lista">
								<td class="td-col">{{datos.usuario}}</td>
								<td class="td-col">{{datos.contrasena}}</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div v-if="modo>=1">
					<form autocomplete="off"  method="post"  @submit="save" ref="form">
						<div class="form-group">
							<label for="exampleInputEmail1">Usuario</label>
							<input  v-model="form.usuario" type="text" class="form-control" id="exampleInputEmail1">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Contraseña</label>
							<input v-model="form.password" type="password" class="form-control" id="exampleInputPassword1">
						</div>
						<button type="submit" class="btn btn-primary">GUARDAR</button>
						<button v-on:click="formulario"  type="button" class="btn btn-danger">CANCELAR</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view("tools/scripts") ?>
<!-- Area de scripts -->
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">
var app = new Vue({
	el: '#app',
	data: {
		message: 'Prueba',
		lista:[],
		modo:0,
		form:{
			usuario:"",
			password:"",
		}
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
		},
		formulario:function() {
			if (this.modo==0) {
				this.modo=1;
			}else{
				this.modo=0;
			}
		},
		save:function(e) {
			e.preventDefault();
			let v=this;
			axios.post('<?php echo site_url("welcome/save"); ?>',v.form)
			.then(function (response) {
				console.log(response);
				switch (response.data.action) {
					case "insert":
					if (response.data.estatus) {
						v.modo=0; //Volvemos atras.
						v.form={
							usuario:"",
							password:"",
						}; //Resetamos.
						v.loadLista();//Refrescamos los datos.
					}else{
						console.error("Ocurrio un error.")
					}
					break;
					case "update":

					break;
					default:
					break;
				}
			})
			.catch(function (error) {
				console.log(error);
			});
		}
	}
});
</script>
<?php $this->load->view("tools/footer_end") ?>
