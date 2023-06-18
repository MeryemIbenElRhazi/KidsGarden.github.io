<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
            *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;

}
            body {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    position: relative;
    background-image: url(utilisation2.png);

}


</style>


<?php 
require 'connect_db.php';

if(!empty($_FILES)){
   $file_name = $_FILES['fichier']['name'];
   $file_extension = strrchr($file_name,".");
   $file_tmp_name = $_FILES['fichier']['tmp_name'];
   $file_dest = 'files/' .$file_name;
   

   $extensions_autorisees = array('.pdf', '.PDF', '.jpg', '.jpeg','.png','.PNG');
   if(in_array($file_extension, $extensions_autorisees)){
       if(move_uploaded_file($file_tmp_name, $file_dest)){
          $req = $db->prepare('INSERT INTO files(name, file_url) VALUES(?,?)');
          $req->execute(array($file_name, $file_dest));
           
       } else {
           echo "une erreur est survenue";
       }
   } else {
       
       echo 'seuls les fichiers pdfs et les images sont autorisés';
   }
}
?>
    <div class="forma">
        <h1 class="fichier" >Ajouter un fichier</h1><br>
        <form action="" method="POST" enctype="multipart/form-data">
        <p class="erreur_message"></p>
            <input type="file" name="fichier" class="ay"/>
            
            <input type="submit" value="ajouter" name="send"/><br>
           <br>
        </form>

        <h1 class="fichier" >fichiers enregistés</h1><br>
        <?php 
        $req = $db->query('SELECT name, file_url FROM files');
        while($data = $req->fetch()){
            
           
        }
        ?>
        <?php 
            // si la variable message existe , affichons son contenu
            if(isset($message)){
                echo $message;
            }
            ?>


    


    <div class="containa">
        <table>
            <tr id="items">
                <th>Name</th>
                <th>File_url</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
     
            <?php 

                //inclure la page de connexion
                include_once "connect.php";
                $req = mysqli_query($con , "SELECT * FROM files");
                if(mysqli_num_rows($req) == 0){
                    //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore de cours ajouter !" ;
                    
                }else {
                    //si non , affichons la liste de tous les employés
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['name']?></td>
                            <td><a href="<?=$row['file_url']?>">Télécharger <?=$row['name']?></a></td>

                            <!--Nous alons mettre l'id de chaque employé dans ce lien -->
                            <td ><a href="modifier.php?id=<?=$row['id']?>"><img src="pen.png"></a></td>
                            <td ><a href="supprimer.php?id=<?=$row['id']?>"><img src="trash.png"></a></td>
                        </tr>
                        <?php
                    }
                    
                }
            ?>
      
         
        </table>
   
   
   
   
    </div>
    </div>
    </form>
</body>
</html>


