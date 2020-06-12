<?php

function getAllVisitors(){
    try{
        //open een verbinding met de database
        $conn = openDatabaseConnection();

        //bereid een statement voor
        $stmt = $conn->prepare("SELECT * FROM visitors");

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

function getVisitorById($id){
    try {
    $conn = OpenDatabaseConnection();

    $stmt = $conn->prepare("SELECT * FROM visitors WHERE id = :id");

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



function createVisitor($data) {
    $name = $data["name"];
    $name = sanitizeVisitorData($name);

    $conn = openDatabaseConnection();

    $stmt = $conn->prepare("INSERT INTO visitors (name, adres, phonenumber) VALUES(:name , :adres, :phonenumber)");

    $stmt -> bindParam(':name' , $name);
    $stmt -> bindParam(':adres' , $data['adres']);
    $stmt -> bindParam(':phonenumber' , $data['phonenumber']);

    $stmt -> execute();

    $conn =  null;

}

function deleteVisitorById($id){
    $conn = openDatabaseConnection();

    $stmt = $conn->prepare("DELETE FROM visitors WHERE id = ?");

    $stmt->execute([$id]);

    $conn = null;
}

function updateVisitorById($data) {
        // Maak hier de code om een medewerker te bewerken
        $id = $data ["id"];
        $name = $data["name"];
        $adres = $data["adres"];
        $phonenumber = $data["phonenumber"];
    
        $name = sanitizeVisitorData($name);
        $adres = sanitizeVisitorData($adres);
    
        $conn = openDatabaseConnection();
    
        $stmt = $conn->prepare("UPDATE visitors SET `name` = :name , adres = :adres , phonenumber = :phonenumber WHERE id = :id");
        $stmt -> bindParam(":name",  $name);
        $stmt -> bindParam(":adres", $adres); 
        $stmt -> bindParam(":phonenumber", $phonenumber);
        $stmt -> bindParam(":id", $id);
    
        $stmt -> execute();
    
        $conn = null;
}


function sanitizeVisitorData($data){

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
 }