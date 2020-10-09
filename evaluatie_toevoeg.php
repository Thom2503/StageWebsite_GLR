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
     <title>Evaluatie Toevoegen</title>
     <link rel="stylesheet" href="style/css.css">
     <link rel="stylesheet" href="style/stylesheet.css">
   </head>
   <body>
     <header>
       <h1>Evaluatie toevoegen voor <?php echo $_SESSION['naam']; ?></h1>
     </header>
     <aside>
       <h4>Links voor stages:</h4>
       Hier zijn wat links voor stages:<br>
       <a href="#">indeed.nl</a><br>
       <a href="#">ictergezocht.nl</a>
     </aside>
     <main>
     <form action="evaluatie_verwerk.php" method="post">
       <table>
         <tr>
           <td>Cijfer begeleiding:</td>
           <td> <input type="number" name="cijferBegeleiding" id="cijferBegeleiding" required> </td>
         </tr>
         <tr>
           <td>Cijfer geleerde technieken:</td>
           <td> <input type="number" name="cijferTechnieken" id='cijferBegeleiding' required> </td>
         </tr>
         <tr>
           <td>Algemeen cijfer:</td>
           <td> <input type="number" name="algemeenCijfer" id="algemeenCijfer" required> </td>
         </tr>
         <tr>
           <td>Opmerking:</td>
           <td> <textarea name="opmerking" id="opmerking" rows="6" cols="60" required></textarea> </td>
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
