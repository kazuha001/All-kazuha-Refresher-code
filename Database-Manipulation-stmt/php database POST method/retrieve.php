<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "books_db";

$conn = new mysqli($servername, $username, $password, $dbname);

$stmt = $conn->prepare("SELECT * FROM book");
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0) {

    $rows = $result->fetch_all(MYSQLI_ASSOC);

foreach($rows as $row) {

     echo '
                        
        <h1>hellow world</h1>
                        
        ';

}
    $sql->close();

} else {
    echo '
    
     <p>No Data</p>
    
    ';
}
                
$conn->close();
                
                ?>