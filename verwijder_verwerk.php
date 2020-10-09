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
      <h1>Verwerken..</h1>
    </header>
    <aside>
      <h4>Links voor stages:</h4>
      Hier zijn wat links voor stages:<br>
      <a href="#">indeed.nl</a><br>
      <a href="#">ictergezocht.nl</a>
    </aside>
    <main>
      <?php
        if (isset($_POST['submit']))
        {
          require 'config.php';

          $id = $_POST['bedrijfID'];
          $student = $_POST['StudentID'];
          if (is_numeric($id))
          {
            if ($student == $_SESSION['Student_ID'])
            {
              $query = "DELETE FROM bedrijven WHERE BedrijfID = ". $id;

              $resultaat = mysqli_query($mysql, $query);

              if ($resultaat)
              {
                header("location:student_home.php");
                exit;
              } else
              {
                echo "<p> Er is iets mis gegaan!</p>";
                echo "<p><a href='student_home.php'>Terug</a> naar de homepagina.</p>";
                exit;
              }
            } else
            {
              echo "<p> ID van de student en het ID wat in het bedrijf staat komen niet overeen</p>";
              echo "<p><a href='student_home.php'>Terug</a> naar de homepagina.</p>";
              exit;
            }
          } else
          {
            echo "Je ID blijkt geen getal te zijn!";
            echo "<p><a href='student_home.php'>Terug</a> naar de homepagina.</p>";
            exit;
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
