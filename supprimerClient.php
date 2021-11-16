<?php
include 'database.php';
$db = new database();


$sql = "SELECT id, nom
            FROM clients";

    $clients = $db->getMany($sql);
    
     $id = $_GET['id'];

    $sql = "SELECT *
            FROM clients
           WHERE id=$id;";
           
$sql=("DELETE from Clients where id=$id");
$db->sendSQL($sql);

header("Refresh:0; url=listeClients.php");
?>