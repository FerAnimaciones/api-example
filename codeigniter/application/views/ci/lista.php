<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view("tools/header") ?>
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
						<?php
						if ($lista) {
							foreach ($lista as $key => $value) {
								?>
								<tr>
									<td><?= $value->usuario; ?></td>
									<td><?= $value->contrasena; ?></td>
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
