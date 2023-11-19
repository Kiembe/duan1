<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="../public/css/reset.css">
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <script src="./ckeditor5/build/ckeditor.js"></script>
    <title>Trang Quản Trị</title>
</head>

<body>
    <div class="wrapper">
        <aside>
            <div class="logo">
                <h1>ADMIN</h1>
            </div>
            <ul class="nav">
                <a href="index.php?act=trangchu">
                    <li><i class="fa-solid fa-house-chimney"></i>Trang Chủ</li>
                </a>
                <a href="index.php?act=danhmuc">
                    <li><i class="fa-solid fa-list-check"></i>Danh Mục</li>
                </a>
                <a href="index.php?act=thuoctinh" class="propertiesAct">
                    <li>
                        <i class="fa-solid fa-gear"></i>
                        Thuộc Tính
                        <i class="fa-solid fa-chevron-down"></i>
                    </li>
                </a>
                <div class="properties">
                    <a href="index.php?act=dungluong">
                        <li><i class="fa-solid fa-microchip"></i>Bộ Nhớ</li>
                    </a>
                    <a href="index.php?act=mausac">
                        <li><i class="fa-solid fa-palette"></i>Màu Sắc</li>
                    </a>
                </div>
                <a href="index.php?act=sanpham">
                    <li><i class="fa-solid fa-mobile-screen"></i>Sản Phẩm</li>
                </a>
                <a href="index.php?act=donhang">
                    <li><i class="fa-solid fa-cart-shopping"></i>Đơn Hàng</li>
                </a>
                <a href="index.php?act=binhluan">
                    <li><i class="fa-solid fa-comments"></i>Bình Luận</li>
                </a>
                <a href="index.php?act=nguoidung">
                    <li><i class="fa-solid fa-user"></i>Người Dùng</li>
                </a>
                <a href="index.php?act=thongke">
                    <li><i class="fa-solid fa-money-bill-trend-up"></i>Thống Kê</li>
                </a>
            </ul>
        </aside>