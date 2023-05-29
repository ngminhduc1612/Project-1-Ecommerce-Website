<?php
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "javatpoint";

    $conn = new mysqli($host,$user,$password,$db_name);

    if ($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }
    else{
        // echo "Ket noi thanh cong";
    }

    // data from client
    if ($_SERVER["REQUEST_METHOD"] == TRUE){
        $username = $_POST["user"];
        $email = $_POST["email"];
        $password = $_POST["pass"];
    }

    if (empty($username)){
            header("Location: account.php?error=User name is required");
            exit();
    }else if (empty($email)){
            header("Location: account.php?error=Email name is required");
            exit();
    }else if (empty($password)){
            header("Location: account.php?error=Password name is required");
            exit();
    }

    //insert data
    $sql = "INSERT INTO login_account(username,email,pass)
            VALUES('$username','$email','$password')";


    if($conn->query($sql) == TRUE){
        header("Location: product.php");
        exit();
    }
    else{
        echo "Error";
    }
?>