<?php
session_start();

include 'database.php';
$db = new database();

//ob_start();

if(!isset($_SESSION['user']))
{
    header('location:login.php');
  exit;
}
$sql="SELECT * FROM Clients";
$e=$db->getMany($sql);

include('listeClients.phtml');
//ob_end_flush();

?>