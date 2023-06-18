<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Kinder Garten</title>
</head>
<body>
    <header class="header">
        <nav>
            <a href="Home.html"><img src="logo.png" alt=""></a>
        </nav>
        <nav class="navbar">
            <a href="Home.html">Home</a>
            <a href="Home.html">About</a>
            <a href="Home.html">Activités</a>
            <a href="contact.html">Contact</a>
            <a href="sign in.html">Sign in</a>
        </nav>
    </header>
    <section class="sign in" id="sign in">
        <div class="box">
            <span class="borderline"></span>
            <form action="" method="post">
                <h2>Login in</h2>
                <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
                ?>
                <div class="inputbox">
                    <input type="email" required="required"  name="email"  >
                    <span>Email</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input  required="required" type="password" name="password">
                    <span>Password</span>
                    <i></i>
                </div>
                <div class="links">
                    <a href="#">Forget password</a>
                    <a href="#">Sign up</a>
                </div>
                <input type="submit" name="submit" value="login">
            </form>
        </div>
    </section>
    <footer>
        <div class="waves">
          <div class="wave" id="wave1"></div>
          <div class="wave" id="wave2"></div>
          <div class="wave" id="wave3"></div>
          <div class="wave" id="wave4"></div>
        </div>
        <ul class="menu">
        <li><a href="Home.html">HOME</a></li>
        <li><a href="Home.html">ABOUT</a></li>
        <li><a href="Home.html">Activités</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="sign in.html">Sign in</a></li>
        </ul>
        <p>Copyright © 2023 All Rights Reserved by Meryem&Najlae.</p>
      </footer>
</body>
</html>
