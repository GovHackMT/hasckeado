<?php
include "../includes/header.php";

if (!isset($_SESSION['usuario'])) {
    header("location: ../index.php");
}

if (isset($_GET['hemocentro'])) {
    require_once "../controller/controllerHemocentro.php";
    require_once "../vo/hemocentroVO.php";

    $controllerHemocentro = new ControllerHemocentro();
    $hemocentro = $controllerHemocentro->BuscarPorId($_GET['hemocentro']);
}

if (isset($_POST['id'])) {
    require_once "../controller/controllerHemocentro.php";
    require_once "../vo/hemocentroVO.php";

    $controller = new ControllerHemocentro();
    $arrayHemocentro = array();

    $arrayHemocentro['id'] = $_POST['id'];
    $arrayHemocentro['nome'] = $_POST['nome'];
    $arrayHemocentro['telefone'] = $_POST['telefone'];
    $arrayHemocentro['latitude'] = $_POST['txtLatitude'];
    $arrayHemocentro['longitude'] = $_POST['txtLongitude'];
    $arrayHemocentro['endereco'] = $_POST['txtEndereco'];
    $arrayHemocentro['data_cadastro'] = $_POST['data_cadastro'];
    $arrayHemocentro['data_atualizacao'] = null;
    $arrayHemocentro['id_usuario'] = 1;
    $arrayHemocentro['status'] = $_POST['status'];
    try {
        $controller->Atualizar(new HemocentroVO($arrayHemocentro));
        ?>
        <div class="modal fade text-center" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header ">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Atualização</h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo $arrayHemocentro['nome'] ?> atualizado com sucesso!</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-default" href="hemocentro.php">Voltar</a>
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
} else if (isset($_GET['hemocentro'])) {
    ?>
    <script type="text/javascript" src="../js/jquery-ui.custom.min.js"></script>

    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAGoVYnUX3JzDCxCNfTcV0kgVO5G3Xz09E&amp;sensor=false"></script>

    <script type="text/javascript" src="../js/maps.js"></script>



    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Novo Hemocentro</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="POST" action="edit_hemocentro.php">
                                    <div class="form-group">
                                        <label class="control-label" for="nome">Nome</label>
                                        <input class="form-control" id="nome" name="nome" value="<?php echo $hemocentro->getNome() ?>"
                                               placeholder="" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="telefone" >Telefone</label>
                                        <input class="form-control telefone" id="telefone" name="telefone"
                                               data-mask="(00) 0000-0000" data-mask-selectonfocus="true"
                                               type="text" value="<?php echo $hemocentro->getTelefone() ?>">
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label" for="txtEndereco">Endereço</label>
                                        <div class="campos">
                                            <input class="form-control" id="txtEndereco" name="txtEndereco"
                                                   placeholder="" type="text" value="<?php echo $hemocentro->getEndereco() ?>">
                                            <!--<input type="button" id="btnEndereco" name="btnEndereco" value="Mostrar no mapa" />-->
                                            <br />

                                            <div id="mapa" style="height: 40%; width: 100%">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label" for="status" >Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="1" <?php if ($hemocentro->getStatus() == 1) echo 'selected' ?>>Ativo</option>
                                            <option value="0" <?php if ($hemocentro->getStatus() == 0) echo 'selected' ?>>Inativo</option>
                                        </select>
                                    </div>

                                    <input type="hidden" id="data_cadastro" name="data_cadastro" value="<?php echo $hemocentro->getData_cadastro() ?>"/>
                                    <input type="hidden" id="txtLatitude" name="txtLatitude" value="<?php echo $hemocentro->getLatitude() ?>"/>
                                    <input type="hidden" id="txtLongitude" name="txtLongitude" value="<?php echo $hemocentro->getLongitude() ?>"/>
                                    <input type="hidden" id="id" name="id" value="<?php echo $hemocentro->getId() ?>"/>
                                    <input type="submit" class="btn btn-primary" value="Cadastrar" name='submit'/>

                                    <a class="btn btn-default" href="hemocentro.php">Voltar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
            initialize();
            carregarNoMapa("<?php echo $hemocentro->getEndereco() ?>");
            console.log("AQUI");
    </script>
    <?php
} else
    header("location:hemocentro.php");

include "../includes/footer.php";
?>
