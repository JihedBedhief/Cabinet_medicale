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

    include 'ajoutClient.phtml';    

if(isset($_POST['envoyer'])){
    if(empty($_POST['nomClient'])||empty($_POST['prescription'])||empty($_POST['prenom'])||empty($_POST['age'])){
        echo '<script language="Javascript"> alert ("veuillez remplir le formulaire" )</script>';}
       else {echo 'verifier';}  
       
        $dir = "./img/";
        $filename = $_FILES['photo']['name'];
        $taille = $_FILES['photo']['size'];
        $type = $_FILES['photo']['type'];
        $nom_tmp = $_FILES['photo']['tmp_name'];
        if(is_uploaded_file($_FILES['photo']['tmp_name']))
        {
            move_uploaded_file($nom_tmp,$dir.$filename);
        }
        else $filename = ''; 

        
       $nom=$_POST['nomClient'];
       $pres=$_POST['prescription'];
       $prenom=$_POST['prenom'];
       $age=$_POST['age'];
     
        //Ajouter d'un nouveau client
        $insert = "INSERT INTO clients VALUES ('id', '$nom', '$prenom','$pres','$filename','$age',NOW(),NOW())";
       
        if ($db->sendSQL($insert)) 
        {
             header('location:listeClients.php');
             header('location:listeClients.phtml');
    //      echo "New record created successfully";
         
       }
    // include "listeClients.php";
      //header('location:listeClients.php'); 
      //ob_end_flush();
        
    }

?>