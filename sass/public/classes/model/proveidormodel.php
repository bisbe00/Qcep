<?php

class ProveidorModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = DbConnection::getInstance();
    }

    public function getTable()
    {
        $query = "SELECT * FROM proveidor";
        $statement = $this->pdo->prepare($query);

        if ($statement->execute()) {
            $results = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $proveidor = new Proveidor();
                $proveidor->__set("proces_id", $row["proces_id"]);
                $proveidor->__set("grupInteres_id", $row["grupInteres_id"]);
                $proveidor->__set("entrada", $row["entrada"]);
                $results[] = $proveidor;
            }
            $statement->closeCursor();
            return $results;
        }
    }

    public function getProveidorsByID($id)
    {
        if ($id !== null) {

            $query = "SELECT * FROM proveidor WHERE proces_id = :id";
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            if ($statement->execute()) {
                $results = [];
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    $proveidor = new Proveidor();
                    $proveidor->__set("proces_id", $row["proces_id"]);
                    $proveidor->__set("grupInteres_id", $row["grupInteres_id"]);
                    $proveidor->__set("entrada", $row["entrada"]);
                    $results[] = $proveidor;
                }
                $statement->closeCursor();
                return $results;
            }

        }
    }
}