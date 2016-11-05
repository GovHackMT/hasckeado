<?php
//require_once "controller/controllerTipoSanguineo.php";

//$controller = new ControllerTipoSanguineo();

//$resultado = $controller->BuscarTodos();
include "includes/header.php";
?>


<div class="row">
	<div class="col-md-12">
		<form action="inserirUsuario.php" method="POST">
			<div class="form-group">
				<label class="control-label" for="nome">Nome</label>
				<input class="form-control" id="nome" name="nome"
				placeholder="" type="text" required="required">
			</div>
			<!--<div class="form-group">
				<label class="control-label" for="tipoSanguineo">Tipo Sanguíneo</label>

				<select class="form-control" id="tipoSanguineo" name="tipoSanguineo">
					<?php
					foreach ($resultado as $value) {
						echo '<option value="'.$value->getID().'">'.$value->getDescricao().'</option>';
					}
					?>
				</select>
			</div>-->
			<div class="form-group">
				<label class="control-label" for="email">Email</label>
				<input class="form-control" id="email" name="email"
				placeholder="email@email.com" type="email"  required="required">
			</div>
			<div class="form-group">
				<label class="control-label" for="password1">Senha</label>
				<input class="form-control" id="password1" name="password1"
				placeholder="" type="password" required="required">
				<br />
				<input class="form-control" id="password2" name="password2"
				placeholder="" type="password" required="required">
			</div>
			<input type="submit" class="btn btn-default" value="Enviar" />
		</form>
	</div>
</div>

<?php
include "includes/footer.php";
?>