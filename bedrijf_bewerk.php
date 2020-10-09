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
    <title>Bedrijf Bewerken</title>
    <link rel="stylesheet" href="style/css.css">
    <link rel="stylesheet" href="style/stylesheet.css">
  </head>
  <body>
    <header>
      <h1>Bedrijf bewerken voor <?php echo $_SESSION['naam']; ?></h1>
    </header>
    <aside>
      <h4>Links voor stages:</h4>
      Hier zijn wat links voor stages:<br>
      <a href="#">indeed.nl</a><br>
      <a href="#">ictergezocht.nl</a>
    </aside>
    <main>
    <?php
      require "config.php";

      //pakt de id uit de url
      $id = $_GET['id'];

      if (is_numeric($id))
      {
        $query = "SELECT * FROM bedrijven WHERE BedrijfID = ". $id;

        $resultaat = mysqli_query($mysql, $query);

        if (mysqli_num_rows($resultaat) == 1)
        {
          $rij = mysqli_fetch_array($resultaat);
        } else
        {
          echo "<p>Er is niks gevonden!</p>";
          echo "<p><a href='student_home.php'>Terug</a> naar de homepagina.</p>";
          exit;
        }
      } else
      {
        echo "<p>Onjuist ID!</p>";
        echo "<p><a href='student_home.php'>Terug</a> naar de homepagina.</p>";
        exit;
      }
     ?>
     <form action="bewerk_verwerk.php" method="post">
       <table>
         <tr>
           <td> <input type="hidden" name="bedrijfID" value="<?php echo $rij['BedrijfID']; ?>"> </td>
         </tr>
         <tr>
           <td> <input type="hidden" name="StudentID" value="<?php echo $rij['Student_ID']; ?>"> </td>
         </tr>
         <tr>
           <td>Bedrijf naam:</td>
           <td><input type="text" name="bedrijfNaam" id="bedrijfNaam" value="<?php echo $rij['NaamBedrijf'] ?>" required></td>
         </tr>
         <tr>
           <td>Bedrijf contactpersoon:</td>
           <td><input type="text" name="contactPersoon" id="contactPersoon" value="<?php echo $rij['ContactPersoon'] ?>" required></td>
         </tr>
         <tr>
           <td>Datum contract getekend:</td>
           <td><input type="date" name="contractDatum" id="datumContract" value="<?php echo $rij['ContractDatum'] ?>" requred></td>
         </tr>
         <tr>
           <td>Plaats bedrijf:</td>
           <td><input type="text" name="plaats" id="plaats" value="<?php echo $rij['Plaats'] ?>" required></td>
         </tr>
         <tr>
           <td>Website van het bedrijf:</td>
           <td><input type="text" name="website" id="website" value="<?php echo $rij['Link'] ?>" required></td>
         </tr>
         <tr>
           <td>&nbsp</td>
           <td><input type="submit" name="submit" value="Aanpassen"></td>
         </tr>
         <tr>
           <td>&nbsp</td>
           <td><button onclick="history.back(); return false">Annuleren</button></td>
         </tr>
       </table>
     </form>
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
