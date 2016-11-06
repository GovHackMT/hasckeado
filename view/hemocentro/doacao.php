<?php
include "../../includes/header.php";
//
//if (!isset($_SESSION['usuario'])) {
//    header("location: ../index.php");
//}

require_once "../../controller/controllerDoador.php";
require_once "../../vo/doadorVO.php";
$controllerDoador = new controllerDoador();
$doadores = $controllerDoador->BuscarTodos();

?>
<script>
    
function updateUser(str) {
    if (str == "") {
       // document.getElementById("idDoador").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","updateUser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>


<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Usuários cadastrados</h3>
                    </div>
                    <div class="panel-body">

                        <a  class="btn btn-primary" href="../doador/add_doador.php">+ Cadastrar Usuário</a>
                        <br />    <br />
                        <div class="table-responsive">
                            <table class="table table-condensed table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Endereco</th>
                                        <th>Email</th>
                                        <th> Tipo Sanguineo</th>
                                        <th> Data Última Doação</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($doadores as $d) {
                                        ?>
                                        <tr>
                                            <td><?php echo $d->getId(); ?></td>
                                            <td><?php echo $d->getNome(); ?></td>
                                            <td><?php echo $d->getEndereco(); ?></td>
                                            <td><?php echo $d->getEmail(); ?></td>
                                            <td><?php echo $d->getTipoSanguineo(); ?></td>
                                            <td><?php if (is_null($d->getDataUltimaDoacao())) {
                                        echo "Sem registro";
                                    } else {
                                        echo $d->getDataUltimaDoacao;
                                    }
                                    ?></td>
                                            <td> <button type="button" action="" class="btn btn-success">Registrar Doação</button>

                                            </td>
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
include "../../includes/footer.php";
?>
