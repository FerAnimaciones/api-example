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
								<th class="td-col">Opciones</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="datos in lista">
								<td class="td-col">{{datos.usuario}}</td>
								<td class="td-col">{{datos.contrasena}}</td>
								<td>
									<div class="dropdown">
										<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Opciones
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<button class="dropdown-item" v-on:click="formularioEditar(datos)">Editar</button>
											<button class="dropdown-item">Eliminar</button>
										</div>
									</div>
								</td>
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
			modo:0,
			idusario:0,
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
		formularioEditar:function(item) {
			this.form={
				modo:1,
				idusuario:item.idusuario,
				usuario:item.usuario,
				password:item.contrasena,
			}; //En este caso los datos ya estan cargados en vuejs, si necesitas cargar mas lo conveniente sera hacer un get con id y buscar todo lso datos.
			this.modo=2;
		},
		resetForm:function() {
			this.form={
				modo:0,
				idusuario:0,
				usuario:"",
				password:"",
			};
		},
		save:function(e) {
			e.preventDefault();
			let v=this;
			let url="";
			axios.post('<?php echo site_url("welcome/save"); ?>',v.form)
			.then(function (response) {
				console.log(response);
				switch (response.data.action) {
					case "insert":
					if (response.data.estatus) {
						v.modo=0; //Volvemos atras.
						v.resetForm();//Resetamos.
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
