<?php
    require ("connectDB.php");

    $masp =(int) $_GET['id'];
    $sql = "SELECT * FROM `products` WHERE `masp` = '$masp'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $img = $row['imgURL'];

    $adminUser = $_SESSION['adminUser'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style_quantrisanpham.css">
    <title>Cập nhật sản phẩm</title>
</head>
<header class="nav_bar">
    <div class="nav_dad_bar">
        <div class="home_page">
            <a class="text_home" href="./trangchu.php">Home</a>
            <a class="text_home" href="./quanlythemsanpham.php">Thêm sản phẩm</a>
        </div>

        <div class="show_name_admin">
            <a class="name_text_admin" href="./login_admin.php">Xin Chào&nbsp;<?php if ($adminUser == true) {
                echo $adminUser['adminUser'] ?></a>
        </div>
    </div>
<?php } ?>
</header>
<body>
    <h1>Cập nhật sản phẩm</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="img_fix">
            <img style="width: 200px;height: 200px" src="./img/<?= $row["imgURL"]?>" alt="">
        </div>
        <div class="update_img">
            <label for="file">Hình ảnh</label>
            <input type="file" id="file" name="hinhanh">
        </div>

        <div class="update_ten">
            <label for="ten">Tên sản phẩm</label>
            <input type="text" id="ten" name="ten">
        </div>

        <div class="update_gia">
            <label for="gia">Giá sản phẩm</label>
            <input type="number" id="gia" name="gia">
        </div>
        <div class="btn_update">
            <button class="button_update" type="submit" name="submit">
                Cập nhật sản phẩm
            </button>
        </div>
    </form>

    <?php
    if(isset($_POST['submit'])){
        $hinhanh = $_FILES['hinhanh']['name'];
        $tensp = $_POST['ten'];
        $gia = $_POST['gia'];
        $target_dir = "./img/";
        if($hinhanh){
            if(file_exists("./img/".$img)) {
                unlink("./img/".$img);
            }
            $target_file = $target_dir.$hinhanh;
        }else {
            $target_file = $target_dir.$img;
            $hinhanh = $img;
        }
        if(isset($hinhanh) && isset($tensp) && isset($gia)){
            move_uploaded_file($_FILES["hinhanh"]["tmp_name"],$target_file);
            $sql = "UPDATE `products` SET `imgURL` = '$hinhanh', `tensp` = '$tensp',`gia` = '$gia' WHERE `products`.`masp` = '$masp';";
            mysqli_query($conn, $sql);
            header("location:quantrisanpham.php");
        }
    }
    ?>
</body>
</html>