<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel="stylesheet" href="/freetruyen/assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/freetruyen/assets/vendors/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .wrapper {
            display: flex;
        }

        .header {
            width: 100%;
            background-color: #f5f5f5;
            padding: 20px;
            transition: all 0.3s ease-in-out;
        }

        .sidebar-wrapper {
            position: fixed;
            top: 1;
            left: -250px;
            width: 250px;
            height: 100vh;
            background-color: #f5f5f5;
            padding: 20px;
            transition: all 0.3s ease-in-out;
        }

        .sidebar-wrapper.open {
            left: 0;
        }

        .logo {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .menu {
            list-style: none;
            padding: 0;
            margin-bottom: 20px;
        }

        .menu li {
            margin-bottom: 10px;
        }

        .menu li a {
            color: #000;
            text-decoration: none;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .logout a {
            color: #000;
            text-decoration: none;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo .logo-icon {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .logo .logo-text {
            font-weight: bold;
        }

        .toggle-button {
            position: fixed;
            top: 66px;
            left: 0;
            background-color: #f5f5f5;
            padding: 10px;
            cursor: pointer;
            border-radius: 0 5px 5px 0;
            transition: all 0.3s ease-in-out;
        }

        .toggle-button i {
            color: #000;
            font-size: 20px;
        }

        .toggle-button.open {
            left: 250px;
        }

        @import url('https://fonts.googleapis.com/css2?family=Geologica:wght@700&family=Prompt:wght@500&family=Quicksand:wght@500&display=swap');
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar-wrapper">
            <div class="logo">
                <img src="/freetruyen/backend/layouts/logoweb.png" alt="Logo" class="logo-icon">
                <span class="logo-text">FIT TDC Truyện</span>
            </div>
            <ul class="menu">
                <li>
                    <a href="/freetruyen/backend/dashboard.php"><h5 style="font-family: 'Quicksand', sans-serif;"><i class="fa fa-area-chart" aria-hidden="true"></i>Dashboard</h5></a>
                </li>
                <br />
                <li>
                    <a href="/freetruyen/backend/truyen/index.php"><h5 style="font-family: 'Quicksand', sans-serif;"><i class="fa fa-bookmark" aria-hidden="true"></i>Quản Lý Truyện</h5></a>
                </li>
                <br />
                <li>
                    <a href="/freetruyen/backend/danhmuc/index.php"><h5 style="font-family: 'Quicksand', sans-serif;"><i class="fa fa-bars" aria-hidden="true"></i>Danh Mục Truyện</h5></a>
                </li>
                <br />
                <li>
                    <a href="/freetruyen/backend/chuong/index.php"><h5 style="font-family: 'Quicksand', sans-serif;"><i class="fa fa-book" aria-hidden="true"></i>Danh Sách Chương</h5></a>
                </li>
                <br />
                <li>
                    <a href="/freetruyen/backend/chuong_hinhanh/index.php"><h5 style="font-family: 'Quicksand', sans-serif;"><i class="fa fa-picture-o" aria-hidden="true"></i></i>Danh Sách
                        Chương Hình Ảnh</h5></a>
                </li>
            </ul>
            <br />
            <div class="section-title">Quản Lý Tài Khoản</div>
            <ul class="menu">
                <li>
                    <a href="/freetruyen/backend/taikhoan/index.php"><h5 style="font-family: 'Quicksand', sans-serif;"><i class="fa fa-users" aria-hidden="true"></i> User</h5></a>
                </li>
            </ul>
            <br />
            <div class="section-title">Trang Đọc Truyện</div>
            <ul class="menu">
                <li>
                    <a href="/freetruyen/index.php"><h5 style="font-family: 'Quicksand', sans-serif;"><i class="fa fa-home" aria-hidden="true"></i>Home</h5></a>
                </li>
            </ul>
        </div>

        <div class="header">
            <div class="toggle-button">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.toggle-button').click(function() {
                $('.sidebar-wrapper').toggleClass('open');
                $('.toggle-button').toggleClass('open');
                $('.header').toggleClass('open');
            });
        });
    </script>
</body>

</html>