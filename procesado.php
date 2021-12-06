<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesado</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
    <?php
        $tamX = $_POST["tamX"];
        $tamY= $_POST["tamY"];
        $posIniX = $_POST["posIniX"];
        $posIniY = $_POST["posIniY"];
        $orientacion = $_POST["orientation"];
        $secuencia = $_POST["secuencia"];

        //===validaciones
        if (empty($tamX)){
            echo "Variable x empty<br>";
        }
        if (empty($tamY)){
            echo "Variable Y empty<br>";
        }
        if (empty($posIniX)){
            echo "Variable pos ini X empty<br>";
        }
        if (empty($posIniY)){
            echo "Variable pos ini Y empty<br>";
        }
        if (empty($orientacion)){
            echo "Variable orientation empty<br>";
        }
        if (empty($secuencia)){
            echo "Variable sequence empty<br>";
        }
        
        //validacion inicio fuera del area
        if( $posIniX < 0 || $posIniX > $tamX){
            echo "Error: Valor posicion X menor que 0, o mayor que area definida";

            } else {
                $posX = $posIniX;
        }

        if( $posIniY < 0 || $posIniY > $tamY ){
            echo "Error: Valor posicion Y menor que 0, o mayor que area definida";
        } else {
            $posY = $posIniY;
        }
        //


    ?>

    <h1 class="display-5 text-primary bold text-center">Procesado de secuencia movimientos <strong>Mars Rover</strong></h1>

    <div class="jumbotron">
        <h5><strong>Initial values:</strong></h5>
        <h5>Tam X: <?= $tamX; ?> </h5>
        <h5>Tam Y: <?= $tamY; ?> </h5>
        <h5>Posicion inicial X: <?= $posIniX; ?> </h5>
        <h5>Posicion inicial Y: <?=$posIniY; ?> </h5>
        <h5>Orientacion: <?= $orientacion; ?> </h5>
        <h5>Secuencia de movimientos: <?= $secuencia; ?> </h5>

        <br>
        <br>
        <a class="btn btn-primary" href="marsRover.html">Return to home</a>

    </div>

    <!-- bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    
</body>
</html>