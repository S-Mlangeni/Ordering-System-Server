<?php 
    header('Access-Control-Allow-Origin: https://ordering-system-client.herokuapp.com');
    header('Access-Control-Allow-Methods: POST');
    header("Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization");

    include "./db.php";
    
    $userCancellation = $_POST["cancelledDrink"];
    $ourQueryString = "DELETE FROM orders WHERE id=$userCancellation"; 
    $dbresult = mysqli_query($connection, $ourQueryString);
    if($dbresult) {
        include "./get.php";
    } else {
        echo "<p>There's been an error deleting your order. Please try again.</p>";
        console.log(mysqli_error($connection));
    }
        
?>