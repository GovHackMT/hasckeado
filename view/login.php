<?php
//require_once "controller/controllerTipoSanguineo.php";
//$controller = new ControllerTipoSanguineo();
//$resultado = $controller->BuscarTodos();

require_once "../controller/controllerLogin.php";
include "../includes/header.php";
if(isset($_SESSION['usuario'])){    
    header("location: ../index.php");
}
if (isset($_POST['email']) && isset($_POST['password'])) {

    $controllerLogin = new ControllerLogin();
    $resultado = $controllerLogin->BuscarPorLogin($_POST['email'], $_POST['password']);

    if (strlen($resultado->getId()) > 0) {
        $_SESSION['usuario'] = $resultado->getId();
        $_SESSION['tipousuario'] = $resultado->getTipo();
        header("location: ../indexLogado.php");
    } else {
        ?>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissable">
                            Não foi possível realizar login</div>
                    </div>
                </div>
            </div>
        </div
        <?php
    }
}


?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1">
                <form method="POST" action="login.php">
                    <div class="form-group">
                        <label class="control-label" for="email">Email</label>
                        <input class="form-control" id="email" name="email"
                               placeholder="" type="email"  required="required">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Senha</label>
                        <input class="form-control" id="password" name="password"
                               placeholder="" type="password" required="required">
                        <br />
                    </div>
                    <!--<a class="btn btn-primary" href="/hasckeado/indexLogado.php">Confirmar</a>-->
                    <input type="submit" class="btn btn-primary" value="Entrar" name='submit'/>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "../includes/footer.php";
?>
