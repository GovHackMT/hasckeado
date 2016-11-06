<?php
include "../includes/header.php";

if (isset($_GET['campanha'])) {
    require_once "../controller/controllerCampanha.php";
    require_once "../controller/controllerHemocentro.php";
    require_once "../vo/campanhaVo.php";

    $controllerCampanha = new controllerCampanha();
    $campanha = $controllerCampanha->BuscarPorId($_GET['campanha']);

    $controllerHemocentro = new ControllerHemocentro();
    $hemocentroList = $controllerHemocentro->BuscarTodosPorUsuario($_SESSION['usuario']);
}

if (isset($_POST['id'])) {
    require_once "../controller/controllerCampanha.php";
    require_once "../vo/campanhaVo.php";

    $controller = new controllerCampanha();
    $arrayCampanha = array();

    $arrayCampanha['id'] = $_POST['id'];
    $arrayCampanha['nome'] = $_POST['nome'];
    $arrayCampanha['descricao'] = $_POST['descricao'];
    $arrayCampanha['meta_doador'] = $_POST['meta_doador'];
    $arrayCampanha['dataInicio'] = date("Y-m-d", strtotime($_POST['dataInicio']));
    $arrayCampanha['dataFim'] = date("Y-m-d", strtotime($_POST['dataFim']));
    $arrayCampanha['id_hemocentro'] = $_POST['id_hemocentro'];

    try {
        $controller->Atualizar(new campanhaVo($arrayCampanha));
        ?>
        <div class="modal fade text-center" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header ">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Atualização</h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo $arrayCampanha['nome'] ?> atualizado com sucesso!</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-default" href="campanha.php">Voltar</a>
                    </div>
                </div>
            </div>
        </div>

        <script> $('#myModal').modal('show');</script>;
        <?php
    } catch (Exception $e) {
        ?>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissable">
                            Não foi possível atualizar <?php echo $arrayHemocentro['nome'] ?>!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} else if (isset($_GET['campanha'])) {
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
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Editar Campanha</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="POST" action="edit_campanha.php">
                                    <div class="form-group">
                                        <label class="control-label" for="nome">Nome</label>
                                        <input class="form-control" id="nome" name="nome" value="<?php echo $campanha->getNome() ?>"
                                               placeholder="" type="text">
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
                                                  placeholder="" type="text" rows="5"><?php echo $campanha->getDescricao() ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="dataInicio">Data Inicial</label>
                                        <input class="form-control" id="dataInicio" name="dataInicio" value="<?php echo $campanha->getDataInicio() ?>"
                                               placeholder="" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="dataFim">Data Final</label>
                                        <input class="form-control" id="dataFim" name="dataFim" value="<?php echo $campanha->getDataFim() ?>"
                                               placeholder="" type="text">
                                    </div>

                                    <input type="hidden" id="id_hemocentro" name="id_hemocentro" value="<?php echo $campanha->getId_hemocentro() ?>" />
                                    <input type="hidden" id="id" name="id" value="<?php echo $campanha->getId() ?>" />
                                    <input type="submit" class="btn btn-primary" value="Cadastrar" name="submit" />

                                    <a class="btn btn-default" href="campanha.php">Voltar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>

    <?php
} else
    header("location:campanha.php");
include "../includes/footer.php";
?>
