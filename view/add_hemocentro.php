<?php
include "../includes/header.php";

if (isset($_POST['nome'])) {
    require_once "../controller/controllerHemocentro.php";
    require_once "../vo/hemocentroVO.php";

    $controller = new ControllerHemocentro();
    $arrayHemocentro = array();

    $arrayHemocentro['id'] = null;
    $arrayHemocentro['nome'] = $_POST['nome'];
    $arrayHemocentro['telefone'] = $_POST['telefone'];
    $arrayHemocentro['latitude'] = $_POST['txtLatitude'];
    $arrayHemocentro['longitude'] = $_POST['txtLongitude'];
    $arrayHemocentro['endereco'] = $_POST['txtEndereco'];
    $arrayHemocentro['data_cadastro'] = null;
    $arrayHemocentro['data_atualizacao'] = null;
    $arrayHemocentro['id_usuario'] = 1;
    $arrayHemocentro['status'] = $_POST['status'];
    
    try {
        $controller->Inserir(new HemocentroVO($arrayHemocentro));
        ?>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-dismissable alert-success">
                            <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">×</button><?php echo $arrayHemocentro['nome']; ?> cadastrado com sucesso.</div>
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
                            <form method="POST" action="add_hemocentro.php">
                                <div class="form-group">
                                    <label class="control-label" for="nome">Nome</label>
                                    <input class="form-control" id="nome" name="nome"
                                           placeholder="" type="text" required="required">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="telefone" >Telefone</label>
                                    <input class="form-control telefone" id="telefone" name="telefone"
                                           data-mask="(00) 0000-0000" data-mask-selectonfocus="true"
                                           type="text" required="required">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="txtEndereco">Endereço</label>
                                    <div class="campos">
                                        <input class="form-control" id="txtEndereco" name="txtEndereco"
                                               placeholder="" type="text" required="required">
                                        <!--<input type="button" id="btnEndereco" name="btnEndereco" value="Mostrar no mapa" />-->
                                        <br />

                                        <div id="mapa" style="height: 40%; width: 100%">
                                        </div>
                                    </div>
                                </div>
                                 <div class="form-group">
                                        <label class="control-label" for="status" >Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                    </div>
                                <input type="hidden" id="txtLatitude" name="txtLatitude" />
                                <input type="hidden" id="txtLongitude" name="txtLongitude" />
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

<?php
include "../includes/footer.php";
?>
