<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

class OrganitzacioModel
{
    private $pdo;

    public function __construct()
    {
        $dsn = 'mysql:dbname=qcep;host=localhost';
        $user = 'joseph';
        $password = 'joseph';
        $this->pdo = new PDO($dsn, $user, $password);
    }

    public function getTable()
    {
        $query = "SELECT * FROM organitzacio";
        $statement = $this->pdo->prepare($query);

        if ($statement->execute()) {
            $results = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $results[] = new Organitzacio(
                    $row['id'],
                    $row["nom"],
                    $row["email"],
                    $row["web"],
                    $row["logo"]
                );
            }
            $statement->closeCursor();
            return $results;
        }
    }
    public function read(Organitzacio $obj)
    {
        $query = "SELECT * FROM organitzacio WHERE id = :id";
        $statement = $this->pdo->prepare($query);

        $id = $obj->__get('id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        if ($statement->execute()) {
            $results = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $results[] = new Organitzacio(
                    $row['id'],
                    $row["nom"],
                    $row["email"],
                    $row["web"],
                    $row["logo"]
                );
            }
            $statement->closeCursor();
            return $results;
        }
    }

    public function create(Organitzacio $obj)
    {
        if (count($this->read($obj)) === 0) {
            $query = "INSERT INTO organitzacio (nom, email, web, logo) VALUES (?, ?, ?, ?)";
            $statement = $this->pdo->prepare($query);
            $state = $statement->execute([$obj->__get('nom'), $obj->__get('email'), $obj->__get('web'), $obj->__get('logo')]);
            if ($state) {
                $statement->closeCursor();
                return true;
            }
        }
        return false;
    }

    public function update(Organitzacio $obj)
    {
        if (count($this->read($obj)) !== 0) {
            $query = "UPDATE organitzacio SET email = :email, web = :web, logo = :logo WHERE id = :id";
            $statement = $this->pdo->prepare($query);

            $email = $obj->__get('email');
            $web = $obj->__get('web');
            $logo = $obj->__get('logo');
            $nom = $obj->__get('nom');
            $id = $obj->__get('id');

            $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':web', $web, PDO::PARAM_STR);
            $statement->bindParam(':logo', $logo, PDO::PARAM_STR);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            $state = $statement->execute();
            if ($state) {
                $statement->closeCursor();
                return true;
            }
        }
        return false;
    }

    public function delete(Organitzacio $obj)
    {
        if (count($this->read($obj)) !== 0) {
            $query = "DELETE FROM organitzacio WHERE id = ?";
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
