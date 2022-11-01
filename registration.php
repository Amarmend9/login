<?php
    
    function xoosonbish($field){
        if($field != ""){
            return true;
        }   return false;
    }
    if(isset($_POST['email'])) {
        foreach($_POST as $index => $data) {
            if(xoosonbish($data) == false){
                die("xooson bn" . $index);
            }
        }

        if($_POST['password'] != $_POST['password_confirmation']){
            header('Location: /register.php?error=confirmation');
            exit();
        }   

        $email = $_POST['email'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
 
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

        $result = $conn -> query($sql);
        if ($result->num_rows > 0) {
            header("Location: /register.php?error=email");
            exit();
        }

        $sql = "SELECT * FROM `users` WHERE `username` = '$userName'";
        $result = $conn -> query($sql);

        if ($result->num_rows > 0) {
            header("Location: /register.php?error=username");
            exit();
        }


        $insertSql = "INSERT INTO `users` (`username`, `email`, `name`, `password`)
            VALUES ('$userName', '$email', '$name', '$password')";

            //die($insertSql);

            $result = $conn->query($insertSql);

            if($result === true) {
                header('Location: /profile.php');
                exit();
            } else {
                header('Location: /register.php?error=unknown');
                exit();
            }
        $conn->close();
    
    } else {
        header("Location: /register.php?ugui");
        print_r($_POST);
    }
    
?>