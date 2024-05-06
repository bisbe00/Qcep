<?php

class ProcesModel
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = DbConnection::getInstance();
    }

    public function getTable()
    {
        $query = "SELECT * FROM proces";
        $statement = $this->pdo->prepare($query);

        if ($statement->execute()) {
            $results = [];
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $results[] = new Proces(
                    $row["id"],
                    $row["nom"],
                    $row["tipus"],
                    $row["objectiu"],
                    $row["usuari_id"]
                );
            }
            $statement->closeCursor();
            return $results;
        }
    }

    public function read(Proces $obj)
    {
        $nom = $obj->__get("nom");
        $query = "SELECT * FROM proces WHERE nom = :nom";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':nom', $nom, PDO::PARAM_STR);

        if ($statement->execute() && $row = $statement->fetch(PDO::FETCH_ASSOC)) {
            return new Proces(
                $row["id"],
                $row["nom"],
                $row["tipus"],
                $row["objectiu"],
                $row["usuari_id"]
            );
        }
        return null; // Return null if no process is found
    }

    public function create(Proces $proces)
    {
        if ($this->read($proces->__get('id')) === null) {
            $query = "INSERT INTO proces (id, nom, tipus, objectiu, usuari_id) VALUES (?, ?, ?, ?, ?)";
            $statement = $this->pdo->prepare($query);
            $values = [
                $proces->__get('id'),
                $proces->__get('nom'),
                $proces->__get('tipus'),
                $proces->__get('objectiu'),
                $proces->__get('usuari_id')
            ];
            return $statement->execute($values);
        }
        return false; // Return false if proces already exists
    }

    public function update(Proces $proces)
    {
        if ($this->read($proces->__get('id')) !== null) {
            $query = "UPDATE proces SET nom = ?, tipus = ?, objectiu = ?, usuari_id = ? WHERE id = ?";
            $statement = $this->pdo->prepare($query);
            $values = [
                $proces->__get('nom'),
                $proces->__get('tipus'),
                $proces->__get('objectiu'),
                $proces->__get('usuari_id'),
                $proces->__get('id')
            ];
            return $statement->execute($values);
        }
        return false; // Return false if the proces does not exist
    }

    public function delete(Proces $proces)
    {
        if ($this->read($proces->__get('id')) !== null) {
            $query = "DELETE FROM proces WHERE id = ?";
            $statement = $this->pdo->prepare($query);
            return $statement->execute([$proces->__get('id')]);
        }
        return false; // Return false if the proces does not exist
    }

    public function getProcesByID($id)
    {
        if ($id !== null) {

            $proces = [];
            $query = "SELECT * FROM proces WHERE id = :id";
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            if ($statement->execute()) {
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    $proces = new Proces(
                        $row["id"],
                        $row["nom"],
                        $row["tipus"],
                        $row["objectiu"],
                        $row["usuari_id"]
                    );
                }
                $statement->closeCursor();
                return $proces;
            }

        }
    }

}
