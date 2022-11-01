<?php  
    //Update `users` Set `password` = '$2y$10$Zu9xejH.O2nBFB7.oFAZp.IBVzuBxPu./NvEaG6TJT4TagMRHsIRq' WHERE id > 0;
    // password_hash('sadfasdf', PASSWORD_DEFAULT);
    // die();
    //echo($_POST['email '] . $_POST[' password']);
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];

        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "mysql";
        $dbname = "1stdb";

        //Create connection
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname); 

        //Check connection
        if($conn->connect_error){
            header("Location: /register.php?error=database");
            exit();
        }

        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if(password_verify($_POST['password'], $row['password'])){

                header("Location: /profile.php");
                exit();
            } else {
                header("Location: /?aldaa=password");
                exit();
            }
        } else {
            header("Location: /?aldaa=num_rows");
            exit();
        }
    } else {
        header("Location: /"); 
        exit();
    }
?>