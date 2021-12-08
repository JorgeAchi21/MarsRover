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
        // variables de entrada
        $tamX = $_POST["tamX"];
        $tamY= $_POST["tamY"];
        $posIniX = $_POST["posIniX"];
        $posIniY = $_POST["posIniY"];
        $orientacionIni = $_POST["orientation"];
        $secuencia = $_POST["secuencia"];

        // variables de procesado
        $arrTxtOutput = []; //arr de salida de datos
        $posX;
        $posY;
        $orientacion;
        $resultaOk = True;
    

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
        if (empty($orientacionIni)){
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

        //validar secuencia de movimientos
        if( strlen($secuencia) < 1 ){
            echo "Secuencia vacia.";
        } else {
            for($i = 0 ; $i < strlen($secuencia); $i++){
                $car = substr($secuencia, $i, 1);
                if ( $car == "A" || $car == "L" || $car == "R"){
                    //..si todo ok no hace nada
                } else {
                    echo "Secuencica con caracteres incorrectos: " . $car . " en la posicion: " . $i . "<br>";
                    $resultaOk = False;
                }
            }
        }

        //preparando bucle...
        $orientacion = $orientacionIni;
        $txtOutput = "Initial position: X:" . $posX . " - Y:" . $posY . " -Course:" . $orientacion;
        array_push($arrTxtOutput, $txtOutput);

        // === Analisis secuencia de movimientos.
        $tamSecuencia = strlen($secuencia);
        for($i = 0 ; $i<= $tamSecuencia ; $i ++ ){
            $paso = substr($secuencia, $i , 1);            
            
            
            if ($paso == "A"){ //Advance
                switch($orientacion){
                    case "N": 
                        $posY++;
                        break;
                    case "S": 
                        $posY--;
                        break;
                    case "E": 
                        $posX++;
                        break;
                    case "W": 
                        $posX--;
                        break;
                }

            } else if ($paso == "L"){ //l Cambio de orientacion
                switch ($orientacion){
                    case "N":
                        $orientacion = "W";
                        break;
                    case "S":
                        $orientacion = "E";
                        break;
                    case "E":
                        $orientacion = "N";
                        break;
                    case "W":
                        $orientacion = "S";
                        break;
                }    

            } else if ($paso == "R"){
                switch ($orientacion){
                    case "N":
                        $orientacion = "E";
                        break;
                    case "S":
                        $orientacion = "W";
                        break;
                    case "E":
                        $orientacion = "S";
                        break;
                    case "W":
                        $orientacion = "N";
                        break;
                }

            }

            //comprobar que no se han excedido los limites de la cuadricula
            if ($posX > $tamX || $posX <0 ){
                $resultaOk = False;
                break;
                
            }
            if ($posY > $tamY || $posY <0 ){
                $resultaOk = False;
                break;
            }
            $txtOutput = "Step: " . $i . "/" . $tamSecuencia . " - Movement/Orientation: " . $paso . " - PosX: " . $posX . " - PosY: " . $posY . " - Orientation: " . $orientacion;
            array_push($arrTxtOutput, $txtOutput);
        }


    ?>

    <h1 class="display-5 text-primary bold text-center">Processing sequence movements<strong>Mars Rover</strong></h1>

    <div class="jumbotron">
        <h5 class="text text-primary"><strong>Initial values:</strong></h5>
        <h5>Size X: <?= $tamX; ?> </h5>
        <h5>Size Y: <?= $tamY; ?> </h5>
        <h5>Initial position X: <?= $posIniX; ?> </h5>
        <h5>Initial position Y: <?=$posIniY; ?> </h5>
        <h5>Course: <?= $orientacion; ?> </h5>
        <h5>Sequence movements: <?= $secuencia; ?> </h5>

        <br>
        <br>
        <h5 class="text text-primary"><strong>Secuence analysis:</strong></h5>
        <?php
        $text="";

        //mensaje de salida
        if ($resultaOk== True){
            echo "<h1 class='bg-primary text-center'><strong>Secuence succefull</strong></h1>";
        } else {
            echo "<h1 class='bg-danger text-center'>Secuence error...</h1>";
        }

        //impresion de secuencia
        for ($i = 0 ; $i < count($arrTxtOutput) ; $i++){
            echo "<p>" . $arrTxtOutput[$i] . "</p>";
        }

        ?>
        <br>
        <a class="btn btn-primary" href="marsRover.html">Return to home</a>

    </div>

    <!-- bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    
</body>
</html>