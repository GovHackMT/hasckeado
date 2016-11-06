<?php

include "../includes/header.php";

if (!isset($_SESSION['usuario'])) {
    header("location: ../index.php");
}
if (isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 0) {
    ?>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="../js/grafico1.js"></script>
    <script src="../js/grafico2.js"></script>
    <script src="../js/grafico3.js"></script>

    
    <div id="container2" ></div>
    

<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-5"><div id="container1"></div></div>
          <div class="col-md-2"></div>
          <div class="col-md-5"><div id="container3"></div></div>
        </div>
      </div>
</div>
    <?php

} else
    header("location: ../index.php");
include "../includes/footer.php";
?>
