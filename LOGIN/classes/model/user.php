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
    public $password;

    public function __construct($email,$password){
        $this->email = $email;
        $this->password = $password;
    }

    public function read() {
        $conn = new mysqli(self::DBHOST, self::DBUSER, self::DBPASSWORD, self::DBNAME);
    
        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error);
        // }
    
        $mail = $this->email;
        $pass = $this->password;
    
        $sql = "SELECT email, password FROM usuari WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
    
        // if ($stmt === false) {
        //     die("Error: " . $conn->error);
        // }
    
        $stmt->bind_param('ss', $mail, $pass);
        $stmt->execute();
        $stmt->store_result();
    
        if ($stmt->num_rows > 0) {
            $stmt->close();
        //     $query = "SELECT * FROM proces";
        //     $statement = $conn->prepare($query);
        //     if($statement->execute()){
        //         $res = $statement->get_result();
        //         $data =  array();

        //         while ($row = $res->fetch_assoc()) {
        //             $data[] = $row; // Add the current row to the array
        //         }
    
        //             // Store specific data needed for the session
        //         $_SESSION['table'] = $data;
    
        //         $statement->close();
        //         $conn->close();
        //         return true;
        //     }
            $query = "SELECT * FROM proces WHERE usuari_email = ? AND nom = ?";
            if ($statement = $conn->prepare($query)) {
                $nom = 'DAW'; // or adjust as needed
                $statement->bind_param('ss', $mail, $nom);
                if ($res = $statement->execute()) {
                    $res = $statement->get_result();
                    $data =  array();

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
        }
    
        $stmt->close();
        $conn->close();
        return false;
    }
    

}

?>