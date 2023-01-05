<?php
include 'connectDB.php';

if (isset($_POST['submit'])){
    $hinhanh = $_FILES['hinhanh']['name'];
    $tensp = $_POST['ten'];
    $gia = $_POST['gia'];

    $target_dir = "./img/";

    $target_file = $target_dir.$hinhanh;

    if(isset($hinhanh) && isset($tensp) && isset($gia)){
        move_uploaded_file($_FILES['hinhanh']["tmp_name"],$target_file);
        $sql = "INSERT INTO `products`(`masp`, `imgURL`, `tensp`, `gia`) VALUES (NULL,'$hinhanh','$tensp','$gia')";
        $query = mysqli_query($conn, $sql);
        header("location:quantrisanpham.php");
    }
}

$adminUser = $_SESSION['adminUser'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style_quantrisanpham.css">
    <title>Quản lý thêm sản phẩm</title>
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
    <h1>Trang quản lý thêm sản phẩm</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="img_product">
            <label for="file">Chọn hình ảnh</label>
            <input type="file" name="hinhanh" id="file" value="Choose file" require>
        </div>
        <div class="name_product">
            <label for="ten">Tên sản phẩm</label>
            <input type="text" name="ten" id="ten" require>
        </div>
        <div class="cost_product">
            <label for="gia">Giá sản phẩm</label>
            <input type="number" name="gia" id="gia" require>
        </div>
        <div class="btn_product">
            <button class="btn_add" name="submit" type="submit">
                Thêm sản phẩm
            </button>
        </div>
    </form>
</body>

</html>