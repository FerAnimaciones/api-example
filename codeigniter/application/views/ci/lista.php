<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view("tools/header") ?>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>LISTA</h2>
			<a href="<?= site_url("welcome/formulario") ?>" type="button" class="btn btn-primary">FORMULARIO</a>
			<br><br>
			<div class="table-container">
				<table class="table">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Password</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($lista) {
							foreach ($lista as $key => $value) {
								?>
								<tr>
									<td><?= $value->usuario; ?></td>
									<td><?= $value->contrasena; ?></td>
									<td>
										<td>
											<div class="dropdown">
												<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Opciones
												</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<a class="dropdown-item" href="<?= site_url("welcome/formulario/").$value->idusuario ?>">Editar</a>
													<a class="dropdown-item" href="<?= site_url("welcome/formulario/").$value->idusuario ?>">Eliminar</a>
												</div>
											</div>
										</td>
									</td>
								</tr>
								<?php
							}
						}
						?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view("tools/scripts") ?>
<!-- Area de scripts -->
<?php $this->load->view("tools/footer_end") ?>
