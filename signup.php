<?php
    session_start();
    include 'database.php';
    $db = new database();
    include 'coneexion.php';
    

    if(!empty($_POST))
    {

        $name = $_POST['name'];
        $username = $_POST['username'];
        $psw = $_POST['password'];
        
        //$hash = password_hash($psw, PASSWORD_DEFAULT);
        
        $cmd = "SELECT * FROM users WHERE username='".$username."'"; 
        $querry = $pdo->prepare($cmd);
        $querry->execute();
        $e = $querry->fetchAll(PDO::FETCH_ASSOC); 
        
         //print_r($e);
         
        if(!empty($e))
        {
        
            if($e['username'] == $username)
            {
                $canSignup = false;
                $error = "Username already exist";
                include "Signup.phtml";
                
            }
        }
         else $canSignup = true;
        
        if($canSignup)
        {
        
            $insert = "INSERT INTO users VALUES ('id', '$name', '$username','$psw','0')";
            $query = $pdo->prepare($insert);
            if($e = $query->execute())
    
            {
                header("location:login.phtml");
            }
        }
    }
       
    else
           
    {
        $error = '';
        include("Signup.phtml");
           
    }
?>