<?php

function getAllHorses(){
    try{
        //open een verbinding met de database
        $conn = openDatabaseConnection();

        //bereid een statement voor
        $stmt = $conn->prepare("SELECT * FROM horses");

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

function getHorseById($id){
    try {
    $conn = OpenDatabaseConnection();

    $stmt = $conn->prepare("SELECT * FROM horses WHERE id = :id");

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



function createHorse($data) {
    $name = $data["name"];
    $name = sanitizeHorseData($name);

    $conn = openDatabaseConnection();

    $stmt = $conn->prepare("INSERT INTO horses (name, race, height) VALUES(:name , :race, :height)");

    $stmt -> bindParam(':name' , $name);
    $stmt -> bindParam(':race' , $data['race']);
    $stmt -> bindParam(':height' , $data['height']);

    $stmt -> execute();

    $conn =  null;

}

function deleteHorseById($id){
    $conn = openDatabaseConnection();

    $stmt = $conn->prepare("DELETE FROM horses WHERE id = ?");

    $stmt->execute([$id]);

    $conn = null;
}

function updateHorseById($data) {
        // Maak hier de code om een medewerker te bewerken
        $id = $data ["id"];
        $name = $data["name"];
        $race = $data["race"];
        $height = $data["height"];
    
        $name = sanitizeHorseData($name);
        $race = sanitizeHorseData($race);
    
        $conn = openDatabaseConnection();
    
        $stmt = $conn->prepare("UPDATE horses SET `name` = :name , race = :race , height = :height WHERE id = :id");
        $stmt -> bindParam(":name",  $name);
        $stmt -> bindParam(":race", $race); 
        $stmt -> bindParam(":height", $height);
        $stmt -> bindParam(":id", $id);
    
        $stmt -> execute();
    
        $conn = null;
}


function sanitizeHorseData($data){

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
 }