<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "samples";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $search = $_POST["search"];

    $stmt = $conn->prepare("SELECT * FROM tables WHERE id = ? OR name LIKE ?");
    $searchTerm = "%" . $search . "%";
    $stmt->bind_param("is", $search, $searchTerm);
    
    if ($stmt->execute()) {

        echo 'Can Be Execute';

        $result = $stmt->get_result();

    } else {
        echo 'Cannot execute';
    }
    
    if($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    
            echo '
                            
            <p>sample ' . $row["id"] . '</p>
                            
                            
            ';
    }

                        
    
} else{

    echo '
             <h2>No Data are Existing with this Id or Names</h2>
    ';

}

     $stmt->close();

}

               
$conn->close();
                
                
?>
                    