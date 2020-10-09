<?php
require 'config.php';
session_start();

if (!isset($_SESSION['username']))
{
    header('location:index.php');
}
//zoekt de student id op via een session die al word gemaakt bij het inloggen
$student = $_GET['id'];
//query om een student zijn of haar bedrijf te vinden
$query = "SELECT * FROM bedrijven WHERE Student_ID = $student";
//resultaat als er een goede verbinding is en de query is uitgevoerd
$resultaat = mysqli_query($mysql, $query);

?>
<html>
  <head>
      <title>Student Detail</title>
      <link rel="stylesheet" href="style/cssDetail.css">
      <link rel="stylesheet" href="style/stylesheet.css">
  </head>
  <body>
      <header>
          <h1> Student Detail </h1>
      </header>
      <aside style="height: 20em;">
        <h4>Links voor stages:</h4>
        Hier zijn wat links voor stages:<br>
        <a href="#">indeed.nl</a><br>
        <a href="#">ictergezocht.nl</a>
      </aside>
      <main style="height: 20em;">
      <?php
if ($resultaat)
{
    //haal de collommen uit de tabel
    $bedrijf = mysqli_fetch_array($resultaat);
?>
  <table>
  <h3>Bedrijf:</h3>
<?php
    //echo alle data van het bedrijf wat op dat moment in de database stond.
    echo "<tr>";
    echo "<td>Bedrijf naam: </td>";
    echo "<td>" . $bedrijf['NaamBedrijf'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Contactpersoon: </td>";
    echo "<td>" . $bedrijf['ContactPersoon'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Contractdatum: </td>";
    echo "<td>" . $bedrijf['ContractDatum'] . " </td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Plaats: </td>";
    echo "<td>" . $bedrijf['Plaats'] . " </td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Website: </td>";
    echo "<td><a href='" . $bedrijf['Link'] . "'>" . $bedrijf['Link'] . "</a></td>";
    echo "</tr>";
    echo "</table>";
    //query voor de evaluatie
    $queryEv = "SELECT * FROM evaluatie WHERE Student_ID = $student";
    //resultaat voor de evaluatie
    $resultEv = mysqli_query($mysql, $queryEv);
    //check of er een resultaat is gevonden
    if ($resultEv)
    {
        $evaluatie = mysqli_fetch_array($resultEv);
?>
                           <h3>Evaluatie:</h3>
                           <table border="1">
                             <tr>
                               <th>Cijfer begeleiding</th>
                               <th>Cijfer geleerde technieken</th>
                               <th>Algemeen Cijfer</th>
                               <th>Opmerking</th>
                             </tr>
                            <?php
        echo "<tr>";
        echo "<td>" . $evaluatie['CijferBegeleiding'] . "</td>";
        echo "<td>" . $evaluatie['CijferGeleerdeTech'] . "</td>";
        echo "<td>" . $evaluatie['AlgemeenCijfer'] . "</td>";
        echo "<td>" . $evaluatie['Opmerking'] . "</td>";
        echo "</tr>";
?>
                           </table>
                           <?php
    }
    else
    {
        //als er geen evaluatie is gevonden
        echo "<p>Er kan geen evaluatie gevonden worden</p>";
    }
}
else
{
    //als er geen bedrijf is gevonden
    echo "<p>Er kunnen geen bedrijven gevonden worden voor deze student!</p>";
    echo "<p><a href='login.php'>Terug</a> naar de login pagina.</p>";
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
<html>
