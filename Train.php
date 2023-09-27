<?php

class Train
{
    private $oPDO;

    private $id;

    private $nametrain;
    private $departure;
    private $arrival;
    private $duration;

    public function getId()
    {
        return $this->id;
    }

    public function getNametrain()
    {
        return $this->nametrain;
    }

    public function getDeparture()
    {
        return $this->departure;
    }

    public function getArrival()
    {
        return $this->arrival;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function getTrains()
    {
        global $oPDO;
        $oPDOStatement = $oPDO->query("SELECT id, nametrain, departure, arrival, duration FROM train ORDER BY id ASC");
        $trains = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
        return $trains;
    }

    public function getTrainById($id)
    {
        global $oPDO;
        $oPDOStatement = $oPDO->prepare("SELECT id, nametrain, departure, arrival, duration FROM train WHERE id = :id");
        $oPDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
        $oPDOStatement->execute();
        $train = $oPDOStatement->fetch(PDO::FETCH_ASSOC);
        return $train;
    }

    public function addTrain($train)
    {
        // Préparation de la requête
        global $oPDO;
        $oPDOStatement = $oPDO->prepare("INSERT INTO train (nametrain, departure, arrival, duration) VALUES (:nametrain, :departure, :arrival, :duration)");
        $oPDOStatement->bindParam(':nametrain', $train['nametrain'], PDO::PARAM_STR);
        $oPDOStatement->bindParam(':departure', $train['departure'], PDO::PARAM_STR);
        $oPDOStatement->bindParam(':arrival', $train['arrival'], PDO::PARAM_STR);
        $oPDOStatement->bindParam(':duration', $train['duration'], PDO::PARAM_INT);

        // Exécution de la requête préparée
        $result = $oPDOStatement->execute();

        if ($result) {
            return $oPDO->lastInsertId();
        } else {
            return false;
        }
    }

    public function updateTrain($id, $data)
    {
        global $oPDO;
        $oPDOStatement = $oPDO->prepare("UPDATE train SET nametrain=:nametrain, departure=:departure, arrival=:arrival, duration=:duration WHERE id=:id");
        $oPDOStatement->bindParam(':nametrain', $data['nametrain'], PDO::PARAM_STR);
        $oPDOStatement->bindParam(':departure', $data['departure'], PDO::PARAM_STR);
        $oPDOStatement->bindParam(':arrival', $data['arrival'], PDO::PARAM_STR);
        $oPDOStatement->bindParam(':duration', $data['duration'], PDO::PARAM_INT);
        $oPDOStatement->bindParam(':id', $id, PDO::PARAM_INT);

        $result = $oPDOStatement->execute();

        if ($result) {
            return $this->getTrainById($id);
        } else {
            return false;
        }
    }

    public function deleteTrainById($id)
    {
        global $oPDO;
        $oPDOStatement = $oPDO->prepare("DELETE FROM train WHERE id=:id");
        $oPDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
        $result = $oPDOStatement->execute();

        if ($result) {
            return "Train avec l'ID " . $id . " supprimé";
        } else {
            return "Train introuvable ou erreur lors de la suppression";
        }
    }

    public function __destruct()
    {
        $this->oPDO = null;
    }
}

?>