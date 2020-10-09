<?php

 session_start();

if (!isset($_SESSION['username']))
{
  header('location:index.php');
} else
{
 $_SESSION['naam'];
 $_SESSION['Student_ID'];
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bedrijf Toevoegen</title>
    <link rel="stylesheet" href="style/css.css">
    <link rel="stylesheet" href="style/stylesheet.css">
  </head>
  <body>
    <header>
      <h1>Bedrijf toevoegen voor <?php echo $_SESSION['naam']; ?></h1>
    </header>
    <aside>
      <h4>Links voor stages:</h4>
      Hier zijn wat links voor stages:<br>
      <a href="#">indeed.nl</a><br>
      <a href="#">ictergezocht.nl</a>
    </aside>
    <main>
      <form action="toevoeg_verwerk.php" method="post">
        <table>
          <tr>
            <td>Bedrijf naam:</td>
            <td><input type="text" name="bedrijfNaam" id="bedrijfNaam" required></td>
          </tr>
          <tr>
            <td>Bedrijf contactpersoon:</td>
            <td><input type="text" name="contactPersoon" id="contactPersoon" required></td>
          </tr>
          <tr>
            <td>Datum contract getekend:</td>
            <td><input type="date" name="contractDatum" id="datumContract" required></td>
          </tr>
          <tr>
            <td>Plaats bedrijf:</td>
            <td><input type="text" name="plaats" id="plaats" required></td>
          </tr>
          <tr>
            <td>Website van het bedrijf:</td>
            <td><input type="text" name="website" id="website" required></td>
          </tr>
          <tr>
            <td>&nbsp</td>
            <td><input type="submit" name="submit" value="Toevoegen"></td>
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
