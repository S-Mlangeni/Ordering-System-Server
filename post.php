<?php 
    header('Access-Control-Allow-Origin: https://ordering-system-client.herokuapp.com');
    header('Access-Control-Allow-Methods: POST');
    header("Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization");

    include "./db.php";
    
    $userName = $_POST["submittedName"];
    $userDrink = $_POST["submittedDrink"];
    if(!empty($userName) && !empty($userDrink)) {
        $ourQueryString = "INSERT INTO orders (name, drink) VALUES ('$userName', '$userDrink')"; 
        $dbresult = mysqli_query($connection, $ourQueryString);
        if($dbresult) {
            include "./get.php";
        } else {
            echo "<p>There's been an error submitting your order. Please try again.</p>";
            console.log(mysqli_error($connection));
        }
    } else {
        echo "<p>Your name and/or drink is not entered.</p>";
    }
        
?>