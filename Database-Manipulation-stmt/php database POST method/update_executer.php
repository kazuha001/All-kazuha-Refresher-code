<?php

$servername = "Server_or_localhost";
$username = "username_name";
$password = "password_name";
$dbname = "database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    echo 'Connect Error';

} else {

    echo 'Connected';

}

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $primaryId = $_POST["id"];

    //POST connection
    $yourId = $_POST["name"];
    

    //sql Commands
    $stmt = $conn->prepare("UPDATE tables sample = ? WHERE id = ?");
    
    $stmt->bind_param("si", $yourId, $primaryId);
    
    if ($stmt->execute()) {
        
        echo 'Submited Succesfully';
    
    } else {
    
        echo 'Submiting Form is Down';
    
    }

    $stmt->close();

    } else {
    
        echo 'Request Method POST is down';
    
    }
    

$conn->close();

?>