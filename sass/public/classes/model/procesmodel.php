<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

class ProcesModel
{

    public function __construct()
    {
    }

    public function connect()
    {
        $dbhost = 'localhost';
        $dbuser = 'joseph';
        $dbpassword = 'joseph';
        $database = 'qcep';
        $conn = new mysqli($dbhost, $dbuser, $dbpassword, $database);
        return $conn;
    }

    public function read($obj)
    {
        if ($obj->nom !== null) {
            $query = "SELECT * FROM proces WHERE nom = ?";
            $conn = $this->connect();
            $statement = $conn->prepare($query);
            $statement->bind_param('s', $obj->nom);
            if ($statement->execute()) {
                $results = $statement->get_result();
                $data = [];
                while ($row = $results->fetch_assoc()) {
                    $data[] = new Proces($row["nom"],$row["tipus"],$row["objectiu"],$row["usuari_email"]);
                }
                $statement->close();
                return $data;
            }
        } else {
            $query = "SELECT * FROM proces";
            $conn = $this->connect();
            $statement = $conn->prepare($query);
            if ($statement->execute()) {
                $results = $statement->get_result();
                $data = [];
                while ($row = $results->fetch_assoc()) {
                    $data[] = new Proces($row["nom"],$row["tipus"],$row["objectiu"],$row["usuari_email"]);
                }
                $statement->close();
                return $data;
            }
        }
    }
}

?>