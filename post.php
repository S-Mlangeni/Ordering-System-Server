<?php 
    include "./cors.php";
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