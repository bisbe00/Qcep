<?php

class ApartatModel
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

    public function read()
    {
        $query = "SELECT * FROM apartat";
        $conn = $this->connect();
        $statement = $conn->prepare($query);
        if ($statement->execute()) {
            $results = $statement->get_result();
            $data = [];
            while ($row = $results->fetch_assoc()) {
                $data[] = new Apartat($row["nom"], $row["icona"], $row["descripcio"], $row["link"]);
            }
            $statement->close();
            return $data;
        }
    }
}

?>