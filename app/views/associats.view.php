<?php include __DIR__ . '/partials/inicio-doc.part.php'; ?>
<?php include __DIR__ . '/partials/nav.part.php'; 
?>

<!-- Principal Content Start -->
<div id="galeria">
	<div class="container">
		<div class="col-xs-12 col-sm-8 col-sm-push-2">
			<h1>ASSOCIATS</h1>
			<hr>
			<?php if($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
				<div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php 
					if(empty($nombre)){
						?>
							<?php
						}else{
							if(empty($errores)) : ?>
								<p><?= $mensajeConfirmacion ?></p>
								<?php else : ?>
									<ul>
										<?php foreach($errores as $error) : ?>
											<li><?= $error ?></li>
										<?php endforeach; ?>
									</ul>
								<?php endif;} ?>
							</div>
						<?php endif; ?>
						<form class="form-horizontal" action="asociados/nueva" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<div class="col-xs-12">
									<label class="label-control">Imagen</label>
									<input class="form-control-file" type="file" name="imagen">
								</div>
							</div>
							

							<label class="label-control">Nombre</label>
							<input class="form-control" type="text" name="nombre" placeholder="Nombre... Obligatorio" required>

							<div class="form-group">
								<div class="col-xs-12">
									<label class="label-control">Descripción</label>
									<textarea class="form-control" name="descripcion" placeholder="Descripción..."><?= $descripcion ?></textarea>
									<button class="pull-right btn btn-lg sr-button" id="boton">ENVIAR</button>
								</div>
							</div>
						</form>
						<hr class="divider">
						<div class="imagen_galeria">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Imagen</th>
										<th scope="col">Nombre</th>
										<th scope="col">Descripción</th>

									</tr>
								</thead>
								<tbody>
									<?php foreach (($associats ?? []) as $associat) :
										?>
										<tr>
											<th scope="row"><?= $associat->getId()?></th>
											<td>
												<img src="<?= $associat->getUrlAsociados()?>" alt="<?= $associat->getDescripcion()?>" title="<?= $associat->getDescripcion()?>" width="100px">

											</td>
											<td><?= $associat->getNombre()?></td>
											<td><?= $associat->getDescripcion()?></td>
										</tr>
									<?php endforeach;?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- Principal Content Start -->

			<?php include __DIR__ . '/partials/fin-doc.part.php'; ?>