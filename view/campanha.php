<?php
include "../includes/header.php";

if (!isset($_SESSION['usuario'])) {
    header("location: ../index.php");
}

require_once "../controller/controllerCampanha.php";
require_once "../vo/campanhaVo.php";

$controllerCampanha = new controllerCampanha();

$campanha = $controllerCampanha->BuscarTodos();
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
                                         <th>#</th>
                                         <th> Nome </th>
                                         <th> Descrição </th>
                                         <th> Data Inicial </th>
                                         <th> Data Final </th>
                                         <th> Código Hemocentro </th>
                                         <th> </th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                     foreach ($campanha as $e) {
                                         ?>
                                         <tr>
                                             <td><?php echo $e->getId(); ?></td>
                                             <td><?php echo $e->getNome(); ?></td>
                                             <td><?php echo $e->getDescricao(); ?></td>
                                             <td><?php echo $e->getDataInicio(); ?></td>
                                             <td><?php echo $e->getDataFim(); ?></td>
                                             <td><?php echo $e->getId_hemocentro(); ?></td>
                                             <td>
                                                 <a class="btn btn-default" href="edit_campanha.php?campanha=<?php echo $e->getId() ?>"><i class="fa fa-fw fa-edit"></i></a></td>
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
