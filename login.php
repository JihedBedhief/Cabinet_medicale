<?php
    include 'database.php';
    $db = new database();
    
    if(isset($_SESSION['user']))
    {
        header("location: menu.php");
    }
  
    if(!empty($_POST))
    {
        $username = $_POST['username'];
        $psw = $_POST['password'];
        echo $psw;

        $cmd = "SELECT * FROM users ";                                                       
        $e = $db->getMany($cmd);                        

        if(!empty($e))
        { 
            $nb = false;
        
            foreach ($e as $row)
            {
                  
                if($psw==$row['hash'] && $username == $row['username'])
                { 
                    $nb = true;
                    session_start();
                    $_SESSION['user'] = [
                        'id' => $row['id'],
                        'username' => $row['username'],
                        'name' => $row['name'],
                        
                                        ];
                    if($row['admin'] == 1) $_SESSION['isAdmin'] = true;
                    else $_SESSION['isAdmin'] = false;

                    header('location: menu.php');
                    
                }
                // else 
                // {
                //     $error = 'username or password is incorrect';
                //     include 'login.phtml';
                // }
                
            }
            if(!$nb)
            {
                $error = 'username or password is incorrect';
                include 'login.phtml';
                 header("refresh: 0");
            }
        }
    }
    else
    {
        $error = '';
        include 'login.phtml';
    }
?>