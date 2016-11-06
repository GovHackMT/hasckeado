<?php
include "../../includes/header.php";

if (isset($_POST['nome']) && isset($_POST['endereco']) && isset($_POST['telefone'])) {
    require_once "../../controller/controllerDoador.php";
    require_once "../../vo/doadorVO.php";

    $controller = new ControllerDoador();
    $arrayDoador = array();

    $arrayDoador['id'] = null;
    $arrayDoador['nome'] = $_POST['nome'];
    $arrayDoador['email'] = $_POST['email'];
    $arrayDoador['endereco'] = $_POST['endereco'];
    $arrayDoador['tipoSanguineo'] = $_POST['tipoSanguineo'];

    // $arrayDoador['tipoSanguineoID'] = $_POST['tipoSanguineoID'];

    try {
        $controller->Inserir(new DoadorVO($arrayDoador));
        ?>

        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-dismissable alert-success">
                            <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">×</button><?php echo $arrayDoador['nome']; ?> cadastrado com sucesso.</div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } catch (Exception $e) {
        ?>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">×</button>
                                    <?php print_r($e) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div
        <?php
    }


    //header("Location: index.php");
}
?>
<div class="section">
    <div class="container">
        <div class="row">

            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Novo Doador</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <form method="POST" action="add_doador.php">
                                <div class="form-group">
                                    <label class="control-label" for="iptNome">Nome</label>
                                    <input class="form-control" id="iptNome" name="nome"
                                           placeholder="" type="text">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="iptNome" >Telefone</label>
                                    <input class="form-control telefone" id="iptNome" name="telefone"
                                           data-mask="(00) 0000-0000" data-mask-selectonfocus="true"
                                           type="text">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="iptEndereco">Endereço</label>
                                    <div class="campos">
                                        <input class="form-control" id="iptEndereco" name="endereco"
                                               placeholder="" type="text">
                                        <br />
                                    </div>
                                </div>

                                <!-- tipoSanguineoID  -->

                                <div class="form-group">
                                    <select name="tipoSanguineo" class="form-control selectpicker btn-danger" data-style="btn-info">
                                        <option value="1">A+</option>
                                        <option value="2">A-</option>
                                        <option value="3">B+</option>
                                        <option value="4">B-</option>
                                        <option value="5">AB+</option>
                                        <option value="3">AB-</option>
                                        <option value="3">0+</option>
                                        <option value="3">0-</option>
                                    </select>
                                </div>
                                <!-- email  -->
                                <div class="form-group">
                                    <label class="control-label" for="iptEmail">Email</label>
                                    <div class="campos">
                                        <input class="form-control" id="iptEmail" name="email"
                                               placeholder="" type="text">
                                        <br />
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Cadastrar" name='submit'/>

                                <a class="btn btn-default" href="/hasckeado/index.php">Voltar</a>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>

<?php
include "../../includes/footer.php";
?>
