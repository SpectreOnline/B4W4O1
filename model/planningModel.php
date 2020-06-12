<?php

function getAllPlannings(){
    try{
        //open een verbinding met de database
        $conn = openDatabaseConnection();

        //bereid een statement voor
        $stmt = $conn->prepare("SELECT * FROM planning");

        //voor de voorbereide statement uit
        $stmt-> execute();

        //zet de variabele result gelijk aan alles wat in de statement zit
        $result = $stmt->fetchAll();
    }
   catch(PDOException $e){
    // Zet de foutmelding op het scherm
    echo "Connection failed: " . $e->getMessage();
}

// Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
// van de server opgeschoond blijft
$conn = null;

// Geef het resultaat terug aan de controller
return $result;
}

function getPlanningById($id){
    try {
    $conn = OpenDatabaseConnection();

    $stmt = $conn->prepare("SELECT * FROM planning WHERE id = :id");

    $stmt->bindParam(':id', $id);

    $stmt->execute();

    $result = $stmt->fetch();
    }
    catch(PDOException $e){

        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;

    return $result;
}



function createPlanning($data) {
    $rider = $data["rider"];
    $horse =  $data["horse"];
    $rider = sanitizePlanningData($rider);
    $horse = sanitizePlanningData($horse);

    $conn = openDatabaseConnection();

    $stmt = $conn->prepare("INSERT INTO planning (datetime, duration, rider, horse) VALUES(:datetime , :duration, :rider, :horse)");

    $stmt -> bindParam(':datetime' , $data['datetime']);
    $stmt -> bindParam(':duration' , $data['duration']);
    $stmt -> bindParam(':rider' , $rider);
    $stmt -> bindParam(':horse' , $horse);

    $stmt -> execute();

    $conn =  null;

}

function deletePlanningById($id){
    $conn = openDatabaseConnection();

    $stmt = $conn->prepare("DELETE FROM planning WHERE id = ?");

    $stmt->execute([$id]);

    $conn = null;
}

function updatePlanningById($data) {
        // Maak hier de code om een medewerker te bewerken
        $id = $data ["id"];
        $datetime = $data["datetime"];
        $duration = $data["duration"];
        $rider = $data["rider"];
        $horse = $data["horse"];
    
        $rider = sanitizePlanningData($rider);
        $horse = sanitizePlanningData($horse);
    
        $conn = openDatabaseConnection();
    
        $stmt = $conn->prepare("UPDATE planning SET `datetime` = :datetime , duration = :duration , rider = :rider , horse = :horse WHERE id = :id");
        $stmt -> bindParam(":datetime",  $datetime);
        $stmt -> bindParam(":duration", $duration); 
        $stmt -> bindParam(':rider' , $rider);
        $stmt -> bindParam(':horse' , $horse);
        $stmt -> bindParam(":id", $id);
    
        $stmt -> execute();
    
        $conn = null;
}


function sanitizePlanningData($data){

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
 }