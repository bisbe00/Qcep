<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class User{
    private $pdo;
    private $email;

    public function __construct($email)
    {
        $dsn = 'mysql:dbname=qcep;host=localhost';
        $user = 'joseph';
        $password = 'joseph';
        $this->pdo = new PDO($dsn, $user, $password);
        $this->email = $email;
    }

    public function getEmail() {
    	return $this->email;
    }

    /**
    * @param $email
    */
    public function setEmail($email) {
    	$this->email = $email;
    }

    public function read() {
        $mail = $this->getEmail();
    
        $query = "SELECT email FROM usuari WHERE email = ?";

        $statement = $this->pdo->prepare($query);
        
        if($statement->execute([$mail])){
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if(count($result) !== 0){
                $statement->closeCursor();
                $procesModel = new ProcesModel();
                $results = $procesModel->getTable();
                return $results;
            }else{
                return null;
            }
        }
    }

    // public function create(){
    //     $conn = new mysqli(self::DBHOST, self::DBUSER, self::DBNAME);
    //     if(!$this->read()){
    //         $part = explode($this->email,'@');
    //         $query = "INSERT INTO usuari values ('$this->getEmail()','$part[0]',0)";
    //         $statement = $this->pdo->prepare($query);
    //         if($statement->execute()){
    //             $statement->closeCursor();
    //             $conn->close();
    //             return true;
    //         }
    //     }
    //     return false;
    // }
  
}
