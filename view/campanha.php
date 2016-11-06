<?php
include "../includes/header.php";

if (!isset($_SESSION['usuario'])) {
    header("location: ../index.php");
}

require_once "../controller/controllerCampanha.php";
require_once "../controller/controllerHemocentro.php";
require_once "../vo/campanhaVo.php";

$controllerCampanha = new controllerCampanha();

$campanha = $controllerCampanha->BuscarTodosPorUsuario($_SESSION['usuario']);
?>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Campanhas cadastradas</h3>
                    </div>
                    <div class="panel-body">
                        <a class="btn btn-primary" href="add_campanha.php">Cadastrar</a>
                        <br />    <br />
                        <div class="table-responsive">
                            <table class="table table-condensed table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th> Nome </th>
                                        <th> Descrição </th>
                                        <th> Meta </th>
                                        <th> Local </th>
                                        <th> Data Inicial </th>
                                        <th> Data Final </th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($campanha as $e) {
                                        ?>
                                        <tr>
                                            <td><?php echo $e['campanha']; ?></td>
                                            <td><?php echo $e['descricao'] ?></td>
                                            <td><?php echo $e['meta_doador'] ?></td>
                                            <td><?php echo $e['hemocentro'] ?></td>
                                            <td><?php echo date_format(date_create($e['dataInicio']), "d/m/Y") ?></td>
                                            <td><?php
                                                echo date_format(date_create($e['dataFim']), "d/m/Y")
                                                ?></td>
                                            <td>
                                                <a class="btn btn-default" href="edit_campanha.php?campanha=<?php echo $e['id'] ?>"><i class="fa fa-fw fa-edit"></i></a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div

<?php
include "../includes/footer.php";
?>
