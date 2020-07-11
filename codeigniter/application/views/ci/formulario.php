<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view("tools/header") ?>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Formulario</h2>
			<form autocomplete="off"  method="post" >
				<input hidden type="text" name="idusuario" class="form-control" id="exampleInputEmail1">
				<div class="form-group">
					<label for="exampleInputEmail1">Usuario</label>
					<input  type="text" name="usuario" class="form-control" id="exampleInputEmail1">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Contraseña</label>
					<input  type="password" name="password"  class="form-control" id="exampleInputPassword1">
				</div>
				<button type="submit" class="btn btn-primary">GUARDAR</button>
				<a href="<?= site_url("welcome/lista") ?>"  type="button" class="btn btn-danger">CANCELAR</a>
			</form>
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
			axios.get('<?php echo site_url("api/usuarios/getlista"); ?>')
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
		itemDelete:function(item) {
			this.form={
				modo:2,
				idusuario:item.idusuario,
				usuario:item.usuario,
				password:item.contrasena,
			};
			this.save();
		},
		resetForm:function() {
			this.form={
				modo:0,
				idusuario:0,
				usuario:"",
				password:"",
			};
		},
		save:function(e=null) {
			if (e!=null) {
				e.preventDefault();
			}
			let v=this;
			let url="";
			axios.post('<?php echo site_url("api/usuarios/save"); ?>',v.form)
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
					if (response.data.estatus) {
						v.modo=0; //Volvemos atras.
						v.resetForm();//Resetamos.
						v.loadLista();//Refrescamos los datos.
					}else{
						console.error("Ocurrio un error.")
					}
					break;
					case "delete":
					if (response.data.estatus) {
						v.modo=0; //Volvemos atras.
						v.resetForm();//Resetamos.
						v.loadLista();//Refrescamos los datos.
					}else{
						console.error("Ocurrio un error.")
					}
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
