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

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $deleteId = $_POST["delete"];

    $stmt = $conn->prepare("DELETE FROM book WHERE id = ?");
    $stmt->bind_param("i", $deleteId);

    if ($stmt->execute()) {

        echo 'Submited Successfully';

    } else {

        echo 'Error Form';

    }
    

    $stmt->close();

    header('Location: ');

} else {
    echo 'POST method is Down';
}


$conn->close();

?>