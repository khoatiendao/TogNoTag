<?php
    include ("connectDB.php");
    $id = (int) $_GET['id'];
    $image = "SELECT imgURL FROM `products` WHERE `products`.`masp`= $id";
    $query = mysqli_query($conn, $image);
    $after = mysqli_fetch_assoc($query);

    // DELETE FILE IMG
    if (file_exists("./img/".$after['imgURL'])) {
        unlink("./img/".$after['imgURL']);
    }
    $sql = "DELETE FROM `products` WHERE `products`.`masp` = $id";
    mysqli_query($conn, $sql);
    header("location:quantrisanpham.php");
?>