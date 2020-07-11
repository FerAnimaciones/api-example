<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view("tools/header") ?>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Formulario</h2>
			<form autocomplete="off" action="<?= site_url("welcome/save") ?>"  method="post" >
				<input hidden type="text" name="idusuario" value="<?= $usuario_data->idusuario; ?>" class="form-control" id="exampleInputEmail1">
				<div class="form-group">
					<label for="exampleInputEmail1">Usuario</label>
					<input  type="text" name="usuario" value="<?= $usuario_data->usuario ?>"  class="form-control" id="exampleInputEmail1">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Contraseña</label>
					<input  type="password" name="contrasena" value="<?= $usuario_data->contrasena ?>"  class="form-control" id="exampleInputPassword1">
				</div>
				<button type="submit" class="btn btn-primary">GUARDAR</button>
				<a href="<?= site_url("welcome/lista") ?>"  type="button" class="btn btn-danger">CANCELAR</a>
			</form>
		</div>
	</div>
</div>
<?php $this->load->view("tools/scripts") ?>
<!-- Area de scripts -->
<?php $this->load->view("tools/footer_end") ?>
