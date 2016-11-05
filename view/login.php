<?php
//require_once "controller/controllerTipoSanguineo.php";

//$controller = new ControllerTipoSanguineo();

//$resultado = $controller->BuscarTodos();
include "../includes/header.php";
?>
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1">
        <div class="form-group">
          <label class="control-label" for="email">Email</label>
          <input class="form-control" id="email" name="email"
          placeholder="email@email.com" type="email"  required="required">
        </div>
        <div class="form-group">
          <label class="control-label" for="password">Senha</label>
          <input class="form-control" id="password" name="password"
          placeholder="" type="password" required="required">
          <br />
        </div>
        <a class="btn btn-primary" href="/hasckeado/indexLogado.php">Confirmar</a>
      </div>
    </div>
  </div>
</div>

<?php
include "../includes/footer.php";
?>
