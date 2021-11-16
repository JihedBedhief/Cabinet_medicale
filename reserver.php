<?php
session_start();
include_once 'database.php';
$db = new database();
include "coneexion.php";
//ob_start();

if(isset($_SESSION['user'])) $logged = true;
    else $logged = false;

    $sql = "SELECT id, nom
            FROM clients";

    
     $clients = $db->getMany($sql);

    include 'reserver.phtml';    

if(isset($_POST['envoyer'])){
    if(empty($_POST['nomClient'])||empty($_POST['prenom'])||empty($_POST['age'])){
        echo '<script language="Javascript"> alert ("veuillez remplir le formulaire" )</script>';}
       else {echo 'verifier';}  
           
       $nom=$_POST['nomClient'];
       $prenom=$_POST['prenom'];
       $age=$_POST['age'];
     
        //Ajouter d'un nouveau client
        $insert = "INSERT INTO reservation VALUES ('id', '$nom', '$prenom','$age','etat',NOW())";
       
        if ($db->sendSQL($insert)) 
        {
             header('location:listeAttente.php');
             header('location:listeAttente.phtml');
    //      echo "New record created successfully";
         
       }
    // include "listeClients.php";
      //header('location:listeClients.php'); 
      //ob_end_flush();
        
    }

?>