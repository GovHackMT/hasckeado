<?php
include "../includes/header.php";

if (isset($_POST['nome'])) {
    require_once "../controller/controllerCampanha.php";
    require_once "../vo/campanhaVo.php";

    $controller = new controllerCampanha();
    $arrayCampanha = array();

    $arrayCampanha['id'] = null;
    $arrayCampanha['nome'] = $_POST['nome'];
    $arrayCampanha['descricao'] = $_POST['descricao'];
    $arrayCampanha['dataInicio'] = $_POST['dataInicio'];
    $arrayCampanha['dataFim'] = $_POST['dataFim'];
    $arrayCampanha['meta_doador'] = $_POST['meta_doador'];
    $arrayCampanha['id_hemocentro'] = $_POST['id_hemocentro'];

    try {
        $controller->Inserir(new campanhaVo($arrayCampanha));


        //header("Location: index.php");
        ?>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-dismissable alert-success">
                            <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">×</button><?php echo $arrayCampanha['nome']; ?> cadastrado com sucesso.</div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } catch (Exception $e) {
        ?>
        <div class="section bootstrap-iso">
            <div class="container-fluid">
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
        </div>
        <?php
    }
}

require_once "../controller/controllerHemocentro.php";
$controllerHemocentro = new ControllerHemocentro();
$hemocentroList = $controllerHemocentro->BuscarTodosPorUsuario($_SESSION['usuario']);
?>
<script>
    $(document).ready(function () {
        var date_input = $('input[name="dataInicio"]');
        var date_input2 = $('input[name="dataFim"]');
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        var options = {
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
        date_input2.datepicker(options);
    })
</script>
<script type="text/javascript" src="../js/jquery-ui.custom.min.js"></script>
<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nova Campanha</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <form method="POST" action="add_campanha.php">
                                <div class="form-group">
                                    <label class="control-label" for="nome">Nome</label>
                                    <input class="form-control" id="nome" name="nome"
                                           placeholder="" type="text" required="required">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="id_hemocentro" >Hemocentro</label>
                                    <select class="form-control" id="id_hemocentro" name="id_hemocentro">
                                        <?php
                                        foreach ($hemocentroList as $h) {
                                            ?>
                                            <option value="<?php echo $h['id'] ?>">
                                                <?php echo $h['nome'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="meta_doador">Meta quantidade de doadores</label>
                                    <input class="form-control" id="meta_doador" name="meta_doador"
                                           placeholder="" type="text" required="required">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="descricao">Descrição</label>
                                    <textarea class="form-control" id="descricao" name="descricao"
                                              placeholder="" type="text" required="required" rows="5"></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="dataInicio">Data Inicial</label>
                                    <input class="form-control" id="dataInicio" name="dataInicio"
                                           placeholder="" type="text">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="dataFim">Data Final</label>
                                    <input class="form-control" id="dataFim" name="dataFim"
                                           placeholder="" type="text">
                                </div>

                                <input type="submit" class="btn btn-primary" value="Cadastrar" name='submit'/>

                                <a class="btn btn-default" href="campanha.php">Voltar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "../includes/footer.php";
?>
