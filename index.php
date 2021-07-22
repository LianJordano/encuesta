<?php require_once("includes/survey.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <form action="#" method="post">
        <?php 
            $survey = new Survey();
            $showResults = false;

            if(isset($_POST["lenguaje"])){
                $showResults = true;
                $survey->setOptionSelected($_POST["lenguaje"]);
                $survey->vote();
            }

        ?>
        <h2>¿Cuál es tu lenguaje de programación favorito?</h2>
        <?php 
            if($showResults){
                $lenguajes = $survey->showResults();
                echo "<h2>". $survey->getTotalVotes(). " votos totales </h2>";

                foreach ($lenguajes as $lenguaje ) {
                    $porcentaje = $survey->getPercentageVotes($lenguaje["votos"]);
                    include("vistas/vista-resultados.php");
                }
            }else{
                include "vistas/vista-votacion.php";
            }
        ?>
      
    </form>

</body>
</html>