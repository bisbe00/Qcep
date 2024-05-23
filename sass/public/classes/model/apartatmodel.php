<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

class ApartatModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = DbConnection::getInstance();
    }

    public function getTable()
    {
        $query = "SELECT * FROM apartat";
        $statement = $this->pdo->prepare($query);

        if ($statement->execute()) {
            $results = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $results[] = new Apartat(
                    $row["id"],
                    $row["nom"],
                    $row["icona"],
                    $row["descripcio"],
                    $row["link"]
                );
            }
            $statement->closeCursor();
            return $results;
        }
    }

    public function read(Apartat $obj)
    {
        $nom = $obj->__get('nom');
        $query = "SELECT * FROM apartat WHERE nom = :nom";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':nom', $nom, PDO::PARAM_STR);

        if ($statement->execute()) {
            $results = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $results[] = new Apartat(
                    $row["id"],
                    $row["nom"],
                    $row["icona"],
                    $row["descripcio"],
                    $row["link"]
                );
            }
            $statement->closeCursor();
            return $results;
        }
    }

    public function create(Apartat $obj)
    {
        if (count($this->read($obj)) === 0) {
            $query = "INSERT INTO apartat (nom, icona, descripcio, link) VALUES (?, ?, ?, ?)";
            $statement = $this->pdo->prepare($query);
            $state = $statement->execute([$obj->__get('nom'), $obj->__get('icona'), $obj->__get('descripcio'), $obj->__get('link')]);
            if ($state) {
                $statement->closeCursor();
                return true;
            }
        }
        return false;
    }

    public function update(Apartat $obj)
    {
        if (count($this->read($obj)) !== 0) {
            $query = "UPDATE apartat SET nom = :nom, icona = :icona, descripcio = :descripcio, link = :link WHERE id = :id";
            $statement = $this->pdo->prepare($query);

            $nom = $obj->__get('nom');
            $icona = $obj->__get('icona');
            $descripcio = $obj->__get('descripcio');
            $link = $obj->__get('link');
            $id = $obj->__get('id');

            $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
            $statement->bindParam(':icona', $icona, PDO::PARAM_STR);
            $statement->bindParam(':descripcio', $descripcio, PDO::PARAM_STR);
            $statement->bindParam(':link', $link, PDO::PARAM_STR);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            $state = $statement->execute();
            if ($state) {
                $statement->closeCursor();
                return true;
            }
        }
        return false;
    }

    public function delete(Apartat $obj)
    {
        if (count($this->read($obj)) !== 0) {
            $query = "DELETE FROM apartat WHERE id = ?";
            $statement = $this->pdo->prepare($query);
            $state = $statement->execute([$obj->__get('id')]);
            if ($state) {
                $statement->closeCursor();
                return true;
            }
        }
        return false;
    }

}
