<?php

 session_start();

if (!isset($_SESSION['username']))
{
  header('location:index.php');
} else
{
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mentor</title>
    <link rel="stylesheet" href="style/cssMentor.css">
    <link rel="stylesheet" href="style/stylesheet.css">
  </head>
  <body>
    <header>
      <h1>Hallo, <?php echo $_SESSION['username'] ?></h1>
    </header>
    <aside>
      <h4>Links voor stages:</h4>
      Hier zijn wat links voor stages:<br>
      <a href="#">indeed.nl</a><br>
      <a href="#">ictergezocht.nl</a>
    </aside>
    <main>
      <?php
      require 'config.php';

      $Klas = $_SESSION['Klas'];
      $sql = "SELECT * FROM studenten WHERE Klas = '$Klas'";
      $result = mysqli_query($mysql, $sql);

      echo "<table>";
      echo "<tr>";
      echo "<th>ID</th>";
      echo "<th>Naam</th>";
      echo "<th>Studentnummer</th>";
      echo "<th>Bedrijfnaam</th>";
      echo "<th>Datum contract getekend</th>";

      echo "</tr>";

      // //var_dump($id);
      if (!$result)
      {
      printf("Error: %s\n", mysqli_error($mysql));
      exit();
      }

      while ($row = mysqli_fetch_array($result))
      {
      echo "<tr>";
      echo "<td>" . $row['StudentID'] . "</td>";
      echo "<td><a href='student_detail.php?id=" . $row['StudentID'] . "'>" . $row['Naam'] . "</td></a>";
      echo "<td>" . $row['StudentNummer'] . "</td>";

       $queryEv = "SELECT * FROM bedrijven WHERE Student_ID = " . $row['StudentID'];
      //resultaat voor de evaluatie
      $resultEv = mysqli_query($mysql, $queryEv);
      //check of er een resultaat is gevonden
      if ($resultEv)
      {
      $row1 = mysqli_fetch_array($resultEv);

       echo "<td>" . $row1['NaamBedrijf'] . "</td>";
      echo "<td>" . $row1['ContractDatum'] . "</td>";
      echo "</tr>";

       }
      }
      echo "</table>";
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
