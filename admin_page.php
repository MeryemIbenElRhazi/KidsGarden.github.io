<?php
@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
   header('location: login_form.php');
}
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
 </head>

 <body class="tfa">

 

  
<div class="contaainer">
    <main>
        <h3 class="emploi">Emploi de temps</h3>
        <h2 >Lundi :</h2><br>
        <p class="horaire">8h00 - 9h00 : Cours de chimie (4e année) + Exercices pratiques<br>
            9h00 - 10h00 : Cours de chimie (5e année) + Exercices pratiques<br>
            11h00 - 12h00 : Cours de chimie (6e année) + Exercices pratiques<br></p>
        <h2>Mardi :</h2><br>
        <p class="horaire">8h00 - 9h00 : Cours de chimie (2e année) + Exercices pratiques<br>
            9h00 - 10h00 : Cours de chimie (3e année) + Exercices pratiques<br>
            11h00 - 11h30 : Cours de chimie (1re année) + Exercices pratiques<br></p>
        <h2>Vendredi :</h2><br>
        <p class="horaire">8h00 - 9h00 : Cours de chimie (5e année) + Exercices pratiques<br>
            9h00 - 10h00 : Cours de chimie (6e année) + Exercices pratiques <br></p>
    </main>

    <div id="sidebar">

    <img src="professeur1.png" alt="Profile Picture" class="profile-pic">
        <h1>Hello</h1>
         <span><?php echo $_SESSION['admin_name']; ?></span>
         <div>
        <a href="cours.html" class="btn">cours</span></a><br>
        <a href="exercices.html" class="btn">Exercices</a><br>
        <a href="TPS.html" class="btn">TPS</a><br>
       
        <a href="logout.php" class="btn">LogOut</a>
        </div>
        <br>
        <br>
        <span><a href="mailto:gardenkids@gmail.com"><i class='bx bxl-gmail' style="color: #0097B2;"></i></a></span>
        <span><i class='bx bxs-phone bx-tada'  style="color: #0097B2;"></i></span>
    </div>

    <div id="content1">
        <div class="image2">
        <img src="lo.png" style="max-width: 120px ,center;">
        </div>
        <div class="comment">
        <p  style="display:inline ;left:10%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ;"  >Découvrez la science<br> avec nous !
            Articles, découvertes,recherches... <br>
               plongez dans l'univers <br>
               passionnant <br> de la connaissance <br> scientifique.</p>
        </div>
    </div>

    <div id="content2" >
    <div class="image3" >
            <img src="milo.gif" style="max-width: 500px">
        </div>
    </div>

    <div id="content3" style="padding:20%;color:white;">
      <br><br><br>
   <p style="text-decoration : underline 2px;"> Instructions et politiques : </p> <br>
          <p>
          Respectez les délais et consignes.
          Participez activement en classe.
          Utilisez les appareils électroniques de manière appropriée.
          Merci de suivre ces directives pour un cours harmonieux.</p> 
    </div>
</div>
<div >
  <a href="Home.html" class="piw">HOME</a>
  <a href="Home.html" class="piw">ABOUT</a>
 <a href="Home.html" class="piw">Activités</a>
  <a href="contact.html" class="piw">Contact</a>
 <a href="sign in.html" class="piw">Sign in</a>
</div>
<div>
<img src="logo.png" class="logoo" style="max-width: 200px;">
</div>

 </body>
 </html>