<?php



$host = "localhost";
$db = "tp_1";
$user = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
global $oPDO;
try {
    $oPDO = new PDO($dsn, $user, $password);
    if ($oPDO) {
        echo "Connexion reussie";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    //throw $th;
}
require_once "Train.php";
require_once "Train_table.php";
echo "<br>";
echo "<br>";
//6-a
$otrain = new Train;
var_dump($otrain);
echo "<br>";
echo "<br>";
//6-b
$trains = $otrain->getTrains();
var_dump($trains);
echo "<br>";
echo "<br>";
$trains = $otrain->getTrainById(1);
var_dump($trains);
echo "<br>";
echo "<br>";
// $nametrain = "NomDuTrain";
// $nomtrain = $otrain->getTrains();
// $trainsWithSameNametrain = array_filter($allTrains, function ($train) use ($nametrain) {
//     return $train['nametrain'] === $nametrain;
// });

// // Affichez les résultats à l'aide de var_dump
// var_dump($trainsWithSameNametrain);
$atrain_to_insert = [
    'nametrain' => "STM",
    'departure' => "Cote vertu",
    'arrival' => "Montmorency",
    'duration' => 360
];
$train_added = $otrain->addTrain($atrain_to_insert);
echo "<br>";
echo "<br>";
var_dump($train_added);
echo "<br>";
echo "<br>";
//6-b
$trains = $otrain->getTrains();
var_dump($trains);
echo "<br>";
echo "<br>";
$trains = $otrain->getTrainById(1);
$trains["nametrain"] = "transcanadienne";
$trains["departure"] = "laval";
$trains["arrival"] = "longueil";
$trains["duration"] = 200;
echo "<br>";

$otrain->updateTrain($trains['id'], $trains);
$trains = $otrain->getTrains();
var_dump($trains);
echo "<br>";
echo "<br>";
var_dump($otrain->getTrainById(1));
echo "<br>";
echo "<br>";
var_dump($otrain->deleteTrainById(1))

    ?>