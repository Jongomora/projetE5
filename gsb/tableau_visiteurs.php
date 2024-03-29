<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tableau visiteurs</title>
    <link rel="stylesheet" href="">
</head>
<body>
<h1>tableau visiteurs</h1>
<form action="tableau_visiteurs.php" method="get">
    Num_visiteurs :     <input type="text" name="num_visiteurs" />

    <input type="submit" name="submit" /> 
</form>

    
</body>
</html>


 
<?php
 
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gestions_de_comptes_rendus;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}




   if ( isset( $_GET['submit'] ) ) 



     $id = $_GET['num_visiteurs']; 

    $sql = "SELECT * FROM visiteurs WHERE num_visiteurs='$id'";


    $req = $bdd -> prepare($sql); //insert dans la table utilisateur le pseudo et le message
    $req -> execute();
    $res = $req->fetchAll();

    var_dump($res);

    echo "<br/>";
    echo $res[0][1];
    echo $res[0][2];
    echo $res[0][3];

 
?>