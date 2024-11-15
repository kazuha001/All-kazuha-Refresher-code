
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

//Request Form Post
if($_SERVER["REQUEST_METHOD"] == "POST") {

//POST connection
$yourId = $_POST["name"];

$stmt = $conn->prepare("INSERT INTO tables (sample) VALUES (?)");

$stmt->bind_param("s", $yourId);

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