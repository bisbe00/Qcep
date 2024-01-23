<?php

class OrganitzacioModel{
    public function __construct(){}

    public function connect()
    {
        $dbhost = 'localhost';
        $dbuser = 'joseph';
        $dbpassword = 'joseph';
        $database = 'qcep';
        $conn = new mysqli($dbhost, $dbuser, $dbpassword, $database);
        return $conn;
    }

    public function read($obj){
        if($obj->nom !== null){
            $query = "SELECT * FROM organitzacio WHERE nom = ?";
            $conn = $this->connect();
            $statement = $conn->prepare($query);
            $statement->bind_param('s', $obj->nom);
            if ($statement->execute()) {
                $results = $statement->get_result();
                $data = [];
                while ($row = $results->fetch_assoc()) {
                    $data[] = new Organitzacio($row["nom"],$row["email"],$row["web"],$row["logo"]);
                }
                $statement->close();
                return $data;
            }
        } else {
            $query = "SELECT * FROM organitzacio";
            $conn = $this->connect();
            $statement = $conn->prepare($query);
            if ($statement->execute()) {
                $results = $statement->get_result();
                $data = [];
                while ($row = $results->fetch_assoc()) {
                    $data[] = new Organitzacio($row["nom"],$row["email"],$row["web"],$row["logo"]);
                }
                $statement->close();
                return $data;
            }
        }
    }
}

?>