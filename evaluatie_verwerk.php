<?php
  session_start();

  if (!isset($_SESSION['username']))
  {
      header('location:index.php');
  }
  else
  {
      $_SESSION['naam'];
      $_SESSION['Student_ID'];
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verwerken...</title>
  </head>
  <body>
    <header>
      <h1>Verwerken...</h1>
    </header>
    <aside >
      <h4>Links voor stages:</h4>
      Hier zijn wat links voor stages:<br>
      <a href="#">indeed.nl</a><br>
      <a href="#">ictergezocht.nl</a>
    </aside>
    <main>
      <?php
        if (isset($_POST['submit']))
        {
          require "config.php";

          //alle variables uit de evaluatie
          $cijferBegeleiding = $_POST['cijferBegeleiding'];
          $cijferTechnieken = $_POST['cijferTechnieken'];
          $algemeenCijfer = $_POST['algemeenCijfer'];
          $opmerking = $_POST['opmerking'];
          $student = $_SESSION['Student_ID'];

          //checked of de velden zijn ingevuld
          if (strlen($cijferBegeleiding) > 0 ||
              strlen($cijferTechnieken) > 0 ||
              strlen($algemeenCijfer) > 0 ||
              strlen($opmerking) > 0)
          {
            //de query om een evaluatie toe te voegen
            $query = "INSERT INTO `evaluatie`
                      (`EvaluatieID`, `CijferBegeleiding`, `CijferGeleerdeTech`, `AlgemeenCijfer`, `Opmerking`, `Student_ID`)
                      VALUES (NULL, '$cijferBegeleiding', '$cijferTechnieken', '$algemeenCijfer', '$opmerking', '$student') ";

            //kijken of er een resultaat is
            $resultaat = mysqli_query($mysql, $query);

            //checked of er een resultaat is
            if ($resultaat)
            {
              //stuurt je gelijk weg
              header("location:student_home.php");
              exit;
            } else
            {
              //als er iets mis is gegaan word het je verteld
              echo "<p> Er is iets mis gegaan!</p>";
              echo "<p><a href='student_home.php'>Terug</a> naar de homepagina.</p>";
              exit;
            }
          } else
          {
            //als de velden wel leeg zijn
            echo "<p> De velden zijn leeg!</p>";
            echo "<p><a href='student_home.php'>Terug</a> naar de homepagina</p>";
          }
        }
       ?>
    </main>
    <div class="logo">
      <img src="img/GLRlogo.png" width="100"
      height="100" alt="logo">
    </div>
    <div class="login">
      <a style="font-family: nimbusantregconregular;" href="index.php">Login</a>
    </div>
    <div class="loguit">
      <a style="font-family: nimbusantregconregular;" href="loguit.php" >Loguit</a>
    </div>
  </body>
</html>
