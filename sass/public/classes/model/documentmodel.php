<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

class DocumentModel
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
        $query = "SELECT * FROM document";
        $statement = $this->pdo->prepare($query);

        if ($statement->execute()) {
            $results = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $results[] = new Document(
                    $row['id'],
                    $row["nom"],
                    $row["tipus"],
                    $row["link"],
                    $row["proces_nom"]
                );
            }
            $statement->closeCursor();
            return $results;
        }
    }

    public function read(Document $obj)
    {
        
        $query = "SELECT * FROM document WHERE id = :id";
        $statement = $this->pdo->prepare($query);

        $id = $obj->__get('id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        if ($statement->execute()) {
            $results = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $results[] = new Document(
                    $row['id'],
                    $row["nom"],
                    $row["tipus"],
                    $row["link"],
                    $row["proces_nom"]
                );
            }
            $statement->closeCursor();
            return $results;
        }
    }

    public function create(Document $obj)
    {
        if (count($this->read($obj)) === 0) {
            $query = "INSERT INTO document (nom, tipus, link, proces_nom) VALUES (?, ?, ?, ?)";
            $statement = $this->pdo->prepare($query);
            $state = $statement->execute([$obj->__get('nom'), $obj->__get('tipus'), $obj->__get('link'), $obj->__get('proces_nom')]);
            if ($state) {
                $statement->closeCursor();
                return true;
            }
        }
        return false;
    }

    public function update(Document $obj)
    {
        if (count($this->read($obj)) !== 0) {
            $query = "UPDATE document SET nom = :nom, tipus = :tipus, link = :link, proces_nom = :proces_nom WHERE id = :id";
            $statement = $this->pdo->prepare($query);

            $nom = $obj->__get('nom');
            $tipus = $obj->__get('tipus');
            $link = $obj->__get('link');
            $proces_nom = $obj->__get('proces_nom');
            $id = $obj->__get('id');

            $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
            $statement->bindParam(':tipus', $tipus, PDO::PARAM_STR);
            $statement->bindParam(':link', $link, PDO::PARAM_STR);
            $statement->bindParam(':proces_nom', $proces_nom, PDO::PARAM_STR);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            $state = $statement->execute();
            if ($state) {
                $statement->closeCursor();
                return true;
            }
        }
        return false;
    }

    public function delete(Document $obj)
    {
        if (count($this->read($obj)) !== 0) {
            $query = "DELETE FROM document WHERE id = ?";
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

?>