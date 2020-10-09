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
    <title>Bewerk verwerk</title>
    <link rel="stylesheet" href="style/css.css">
    <link rel="stylesheet" href="style/stylesheet.css">
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

            //alle variables voor het bewerken
            $id = $_POST['bedrijfID'];
            $student = $_POST['StudentID'];
            $bedrijfNaam = $_POST['bedrijfNaam'];
            $contactPersoon = $_POST['contactPersoon'];
            $contractDatum = $_POST['contractDatum'];
            $plaats = $_POST['plaats'];
            $website = $_POST['website'];

            //checked de variables of ze leeg zijn of een id een int is
            if (is_numeric($id) || is_numeric($student)
                || strlen($bedrijfNaam) > 0 || strlen($contactPersoon) > 0 ||
                strlen($contractDatum) > 0 || strlen($plaats) > 0
                || strlen($website) > 0)
            {
                //checked of het de student waar het bij hoort ook echt de student is
                if ($student == $_SESSION['Student_ID'])
                {
                    $query = "UPDATE `bedrijven` SET `BedrijfID`
                  =NULL,`NaamBedrijf`='$bedrijfNaam',`Plaats`='$plaats',
                  `Link`='$website',`ContactPersoon`='$contactPersoon',`ContractDatum`
                  ='$contractDatum',`Student_ID`='$student' WHERE BedrijfID =" . $id;

                    $resultaat = mysqli_query($mysql, $query);
                    //als het resultaat is om de query uit te voeren goed gelukt is
                    if ($resultaat)
                    {
                        header("location:student_home.php");
                        exit;
                    }
                    else
                    {
                        header("location:student_home.php");
                        exit;
                    }
                }
                else
                {
                    echo "<p> ID van de student en het ID wat in het bedrijf staat komen niet overeen</p>";
                    echo "<p><a href='student_home.php'>Terug</a> naar de homepagina.</p>";

                }
            }
            else
            {
                echo "<p> Niet alle velden zijn ingevoerd</p>";
                echo "<p><a href='student_home.php'>Terug </a> naar homepagina</p>";

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
