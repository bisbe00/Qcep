<?php

class Usuari{
    public $email;
    public $password;
    public $username;
    public $es_administrador;

    public function __construct($email,$password,$username,$es_administrador){
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->es_administrador = $es_administrador;
    }

    public function connect(){
        $dbhost = 'localhost';
        $dbuser = 'joseph';
        $dbpassword = 'joseph';
        $database = 'qcep';
        $conn = new mysqli($dbhost, $dbuser,$dbpassword, $database);
        return $conn;
    }

    public function create(){

    }

    public function read(){
        $query = "SELECT * FROM usuari WHERE email = '$this->email' AND password = '$this->password'";
        $conn = $this->connect();
        $statement = $conn->prepare($query);
        if($statement){
            if($statement->execute()){
                $res = $statement->get_result();
                $data =  array();

                while ($row = $res->fetch_assoc()) {
                    $data[] = $row; // Add the current row to the array
                }
    
                    // Store specific data needed for the session
                $_SESSION['table'] = $data;
    
                $statement->close();
                $conn->close();
            }
        }
    }

    public function update(){

    }

    public function delete(){
        
    }
}

?>