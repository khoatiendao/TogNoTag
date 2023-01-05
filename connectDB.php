<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $nameDB = "TogNoTag";

    $conn = mysqli_connect($servername,$username,$password,$nameDB);

    if (!$conn){
        die("Kết nối thất bại: ".mysqli_connect());
    }else {
        echo "";
    }

    session_start();
?>