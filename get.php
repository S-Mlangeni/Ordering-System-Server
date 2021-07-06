<?php 
    header('Access-Control-Allow-Origin: http://localhost');
    header('Access-Control-Allow-Methods: GET');
    header("Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization");
    
    include "./db.php";

    $ourQueryString = "SELECT * FROM orders"; 
    $dbresult = mysqli_query($connection, $ourQueryString);
    $rows = mysqli_fetch_all($dbresult, MYSQLI_ASSOC);
    if (mysqli_num_rows($dbresult) > 0) {
        echo "<ol>";
        foreach($rows as $row) {
            echo "<div id='list-item'><li>".$row["name"]." - ".$row["drink"]."</li><button id='cancel-btn' name=".$row["id"].">Cancel</button></div>";
        }
        echo "</ol>";
    } else {
        echo "<p>No orders made. Please make an order.</p>";
    }
    
?>