<?php
include("connectDB.php");
$sql = "SELECT * FROM `products`";
$query = mysqli_query($conn, $sql);

$adminUser = $_SESSION['adminUser'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style_quantrisanpham.css">
    <title>Quản trị sản phẩm</title>
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
    <div class="flex_dad_manager">
        <!-- <div class="left_manger">
            <div>
                <p class="text_manager">Manager</p>
            </div>
            <ul class="list_manager">
                <li class="add_product"><a class="text_manage_product" href="">Add product</a></li>
                <li class="update_product"><a class="text_manage_product" href="">Update product</a></li>
                <li class="delete_product"><a class="text_manage_product" href="">Delete product</a></li>
            </ul>
        </div> -->
        <div class="right_manager">
            <table id="productList">
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Cập nhật sản phẩm</th>
                </tr>
                <?php
                    while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?= $row["masp"] ?></td>
                        <td><img style="width:200px;height:200px" src='./img/<?= $row["imgURL"] ?>' alt=""></td>
                        <td><?= $row["tensp"] ?></td>
                        <td><?= $row["gia"] ?>&nbsp; VNĐ</td>
                        <td>
                            <a href="capnhatsanpham.php?id=<?= $row['masp'] ?>">Sửa</a>
                            <a onclick="return xoasanpham()" href="xoasanpham.php?id=<?= $row['masp'] ?>">Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>