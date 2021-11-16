<?php
session_start();
include 'database.php';
$db = new database();
include 'coneexion.php';


    if(isset($_SESSION['user'])) $logged = true;
    else $logged = false;
    
    $sql = "SELECT id, nom
            FROM clients";

    $clients = $db->getMany($sql);
    
    $id = $_GET['id'];

    $sql = "SELECT *
            FROM clients
           WHERE id=$id;";

    $q = $pdo->query($sql);
    $client = $db->getOne($sql);
    
    include 'editerClient.phtml';

    if(isset($_POST['Editer']))
    {

        $nom=htmlspecialchars($_POST['nomClient']);
        $prenom=htmlspecialchars($_POST['prenom']);
        $pres=htmlspecialchars($_POST['prescription']);
        $age=$_POST['age'];
    
        
        $sql = "UPDATE clients SET nom='$nom', prenom='$prenom', prescription='$pres',  age='$age' WHERE id=$id";
       
        $db->sendSQL($sql);
        header('Location:listeClients.php');
       
}


?>