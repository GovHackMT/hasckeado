<?php
include "/includes/header.php";
require_once "controller/controllerDoador.php";

if (isset($_SESSION['usuario'])) {
    $controllerDoador = new ControllerDoador();
    $doacao = $controllerDoador->BuscarTodasDoacoes($_SESSION['usuario']);
    ?>
    <body>
        <div class="section">
            <div class="container" style="text-align:center;" >
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
           <!--<p>Olá Fulano, você poderá fazer novas doações a partir de X!</p>-->
                        <img src="/hasckeado/images/avatar.jpg" class="img-circle" width="60%" >
                        <br />
                        <br />

                        <button class="btn btn-primary" type="button">
                            Total de Doações <span class="badge">
                                <?php
                                echo count($doacao);
                                ?>
                            </span>
                        </button>
                        <br />
                        <br /></div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">


                        <div class="panel panel-primary">
                            <!-- Default panel contents -->
                            <div class="panel-heading">Suas Ultimas Doações</div>

                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-condensed table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Hemocentro</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($doacao != null) {
                                            foreach (array_slice($doacao, 0, 10) as $d) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php
                                                        echo
                                                        date_format(date_create($d['data']), "d/m/Y");
                                                        ?>
                                                    </td>
                                                    <td><?php echo $d['hemocentro'] ?>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-success">Detalhar<i class="fa fa-fw fa-search"></i></a>
                                                    </td>
                                                </tr> 

                                                <?php
                                            }
                                        } else {
                                            echo 'Sem doações registradas.';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Campanhas próximas</h3>
                            </div>
                            <div class="panel-body">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3842.7417847101337!2d-56.10354728547629!3d-15.605438989168864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x939db1edbf2f7a53%3A0xb8640a9da5830abf!2sMT-Hemocentro!5e0!3m2!1sen!2sbr!4v1478433835013" 
                                        width="100%" height="30%"frameborder="0" style="border:0" ></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>

            </div>
        </div>
    </div>
    </body>

    <?php
}
include "/includes/footer.php";
?>
