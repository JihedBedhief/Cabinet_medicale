<?php 
session_start();
include 'database.php';
$db = new database();
include "coneexion.php";

$sql = "SELECT id
            FROM reservation";

    $reservation = $db->getMany($sql);
    
    $id = $_GET['id'];

    $sql = " UPDATE reservation SET etat=1 WHERE id=$id;";

    $res = $db->getOne($sql);
    
    header("Refresh:0; url=listeAttente.php");

?>