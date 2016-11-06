<?php
include "../includes/header.php";


require_once "../controller/controllerHemocentro.php";
require_once "../vo/hemocentroVO.php";

$controllerHemocentro = new ControllerHemocentro();

$hemocentro = $controllerHemocentro->BuscarTodos();
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Hemocentros cadastrados</h3>
                    </div>
                    <div class="panel-body">
                        <a class="btn btn-primary" href="add_hemocentro.php">Cadastrar</a>
                        <table class="table table-condensed table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Nome </th>
                                    <th> Telefone </th>
                                    <th> Endereco </th>
                                    <th> Data cadastro </th>
                                    <th> Data Atualização </th>
                                    <th> Status </th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($hemocentro as $e) {
                                    ?>
                                    <tr>
                                        <td><?php echo $e->getId(); ?></td>
                                        <td><?php echo $e->getNome(); ?></td>
                                        <td><?php echo $e->getTelefone(); ?></td>
                                        <td><?php echo $e->getEndereco(); ?></td>
                                        <td><?php echo $e->getData_cadastro(); ?></td>
                                        <td><?php echo $e->getData_atualizacao(); ?></td>
                                        <td><?php echo $e->getStatus()==1?  'ATIVO' :  'INATIVO' ?></td>
                                        <td>
                                            <a class="btn btn-default" href="edit_hemocentro.php?hemocentro=<?php echo $e->getId()?>"><i class="fa fa-fw fa-edit"></i></a></td>
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
</div

<?php
include "../includes/footer.php";
?>
