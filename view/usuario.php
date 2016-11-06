<?php
//require_once "controller/controllerTipoSanguineo.php";
//$controller = new ControllerTipoSanguineo();
//$resultado = $controller->BuscarTodos();
include "../includes/header.php";
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cadastrar Usuário</h3>
                    </div>
                    <div class="panel-body">
                        <form action="inserirUsuario.php" method="POST">
                            <div class="form-group">
                                <label class="control-label" for="nome">Nome</label>
                                <input class="form-control" id="nome" name="nome"
                                       placeholder="" type="text" required="required">
                            </div>          
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
                            <div class="form-group">
                                <label class="control-label" for="tipo">Tipo de Cadastro</label>
                                <select name="tipo" class="form-control selectpicker" 
                                        data-style="btn-info">
                                    <option value="1">Doador</option>
                                    <option value="0">Instituição</option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-default" value="Enviar" />
                        </form>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>

    <?php
    include "../includes/footer.php";
    ?>
