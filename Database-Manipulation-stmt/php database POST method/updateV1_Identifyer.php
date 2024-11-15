
           
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


if ($_SERVER["REQUEST_METHOD"] == "POST") {

$update = $_POST["update"];

$sql = $conn->prepare("SELECT * FROM book WHERE id = ?");
$sql->bind_param("i", $update);

if ($stmt->execute()) {
    
    echo 'Submited Succesfully';

} else {

    echo 'Submiting Form is Down';

}
    
$result = $sql->get_result();
    
if($result->num_rows > 0) {
    
while($row = $result->fetch_assoc()) {
    
echo '
                            
<div class="sample">
<h1>Edit Data ID Number ' . $row["id"] . '</h1>
<form id="update">
<div class="buttons">
    <button type="submit">Submit</button>
</div>             
<input type="hidden" name="updateS1" value="' . $row["id"] . '" required>
</form>
</div>
                            
';
    
}                    
    
}

$sql->close();


} else {

    echo "POST error";

}

                
$conn->close();
                
?>
                    
                  