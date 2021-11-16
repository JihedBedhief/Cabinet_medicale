<?php
try {
    $pdo= new Pdo('mysql:host=localhost;dbname=phpProjet','root','');
} catch (PDOException $e ) {
         print_r($e);
}
?>