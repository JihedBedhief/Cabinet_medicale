<?php
class database 
{
    var $pdo;
    
    public function __construct()
    {
        try {
            $this->pdo = new Pdo('mysql:host=localhost;dbname=phpProjet', 'root', '');
        } catch (PDOException $e){
            print_r($e);
        }
    }
    public function __destruct()
    {
    
    }
    public function getOne(string $sql)
    {
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $tab = $query->fetchAll(PDO::FETCH_ASSOC);
        return $tab[0];
    }
    public function getMany(string $sql)
    {
        $query = $this->pdo->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function sendSQL(string $sql)
    {
        $query = $this->pdo->prepare($sql);
        return $query->execute();
    }

}
   

?>