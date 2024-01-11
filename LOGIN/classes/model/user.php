<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class User{
    const DBHOST = "localhost";
    const DBUSER = "joseph";
    const DBPASSWORD = "joseph";
    const DBNAME = "qcep";

    public $email;

    public function __construct($email){
        $this->email = $email;
    }

    public function read() {
        $conn = new mysqli(self::DBHOST, self::DBPASSWORD, self::DBUSER, self::DBNAME);
    
        $mail = $this->email;
    
        $sql = "SELECT email FROM usuari WHERE email = ?";
        $stmt = $conn->prepare($sql);
    
        $stmt->bind_param('s', $mail);
        $stmt->execute();
        $stmt->store_result();
    
        if ($stmt->num_rows > 0) {
            $stmt->close();
            $query = "SELECT * FROM proces";
            $statement = $conn->prepare($query);
            if($statement->execute()){
                $res = $statement->get_result();
                $data =  [];

                while ($row = $res->fetch_assoc()) {
                    $data[] = $row; // Add the current row to the array
                }
    
                // Store specific data needed for the session
                $_SESSION['table'] = $data;
    
                $statement->close();
                $conn->close();
                return true;
            }
        }
    
        $stmt->close();
        $conn->close();
        return false;
    }

    public function create($mail){
        $conn = new mysqli(self::DBHOST, self::DBUSER, self::DBNAME);
        if(count($this->read()) === 0){
            $part = explode($mail,'@');
            $query = "INSERT INTO usuari values ('$mail','$part[0]',0)";
            $statement = $conn->prepare($query);
            if($statement->execute()){
                $statement->close();
                $conn->close();
                return true;
            }
        }
        return false;
    }
    

}

?>