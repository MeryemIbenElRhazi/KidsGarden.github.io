<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Employés</title>
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
    background-image: url(utilisation2.png);
}
</style>
    <div class="containa">
        <table>
            <tr id="items">
                <th>name</th>
                <th>file_url</th>
                
            </tr>
            <?php 
                //inclure la page de connexion
                include_once "connect.php";
                //requête pour afficher la liste des employés
                $req = mysqli_query($con , "SELECT * FROM files");
                if(mysqli_num_rows($req) == 0){
                    //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore d'employé ajouter !" ;
                    
                }else {
                    //si non , affichons la liste de tous les employés
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['name']?></td>
                            <td><a href="<?=$row['file_url']?>">Télécharger <?=$row['name']?></a></td>
                            
                            <!--Nous alons mettre l'id de chaque employé dans ce lien -->
                           
                        </tr>
                        <?php
                    }
                    
                }
            ?>
      
         
        </table>
   
   
   
   
    </div>
</body>
</html>