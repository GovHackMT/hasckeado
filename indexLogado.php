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
                <br />
                <img src="/hasckeado/images/avatar.jpg" class="img-circle" width="250" height="250" >
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
                <br />

                <div class="panel panel-primary">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Ultimas Doações</div>

                    <!-- Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Hemocentro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($doacao != null){
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
                                </tr> 

                                <?php
                            }
                            } else{
                                echo 'Sem doações registradas.';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3842.7417847101337!2d-56.10354728547629!3d-15.605438989168864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x939db1edbf2f7a53%3A0xb8640a9da5830abf!2sMT-Hemocentro!5e0!3m2!1sen!2sbr!4v1478433835013" width="100%" frameborder="0" style="border:0" ></iframe>
            </div>
        </div>
    </body>

    <?php
}
include "/includes/footer.php";
?>
