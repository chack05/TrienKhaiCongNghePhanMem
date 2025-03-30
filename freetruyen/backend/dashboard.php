<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user_id'])) {
    // Chuyển hướng người dùng đến trang đăng nhập
    header('Location: /freetruyen/login.php');
    exit();
}

// Kết nối CSDL
include_once __DIR__ . '/../dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include_once __DIR__ . '/layouts/styles.php' ?>
    <style>
        .card {
            background-color: #f8f9fa;
            border: none;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            height: 400px;
        }

        .card-title {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .card-body p {
            margin-bottom: 5px;
        }

        .card-body i {
            font-size: 24px;
            margin-right: 5px;
            color: #007bff;
        }
    </style>
</head>

<body>
    <?php include_once __DIR__ . '/layouts/header.php' ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <?php include_once __DIR__ . '/layouts/sidebar.php' ?>
            </div>
            <div class="col-9">
                <h2>Admin</h2>
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <div class="card alert alert-danger">
                            <div class="card-header">
                                <h5 class="card-title"><i class="fa fa-users"></i> User</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                // Truy vấn lấy số lượng người dùng
                                $sqlUser = "SELECT COUNT(*) as total_users FROM user";
                                $resultUser = $conn->query($sqlUser);
                                $rowUser = $resultUser->fetch_assoc();
                                $totalUsers = $rowUser['total_users'];

                                echo "<p><i class='fa fa-user'></i> Tổng số người dùng: " . $totalUsers . "</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card alert alert-warning">
                            <div class="card-header">
                                <h5 class="card-title"><i class="fa fa-bars"></i>Danh Mục</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                // Truy vấn lấy số lượng tiểu thuyết
                                $sqldanhmuc = "SELECT COUNT(*) as danhmucs FROM danhmuc";
                                $resultdanhmuc = $conn->query($sqldanhmuc);
                                $rowdanhmuc = $resultdanhmuc->fetch_assoc();
                                $totaldanhmuc = $rowdanhmuc['danhmucs'];
                                echo "<p><i class='fa fa-bars'></i> Số lượng danh mục: " . $totaldanhmuc . "</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card alert alert-info">
                            <div class="card-header">
                                <h5 class="card-title"><i class="fa fa-picture-o"></i> Truyện tranh</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                // Truy vấn lấy số lượng truyện tranh
                                $sqlComic = "SELECT COUNT(*) as total_comics FROM truyen WHERE truyen_loai = 2";
                                $resultComic = $conn->query($sqlComic);
                                $rowComic = $resultComic->fetch_assoc();
                                $totalComics = $rowComic['total_comics'];
                                echo "<p><i class='fa fa-picture-o'></i> Số lượng truyện tranh: " . $totalComics . "</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card alert alert-warning">
                            <div class="card-header">
                                <h5 class="card-title"><i class="fa fa-book"></i> Tiểu thuyết</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                // Truy vấn lấy số lượng tiểu thuyết
                                $sqlNovel = "SELECT COUNT(*) as total_novels FROM truyen WHERE truyen_loai = 1";
                                $resultNovel = $conn->query($sqlNovel);
                                $rowNovel = $resultNovel->fetch_assoc();
                                $totalNovels = $rowNovel['total_novels'];
                                echo "<p><i class='fa fa-book'></i> Số lượng tiểu thuyết: " . $totalNovels . "</p>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <?php include_once __DIR__ . '/layouts/footer.php' ?>
    </div>

    <?php include_once __DIR__ . '/layouts/js.php' ?>
</body>

</html>

<?php
// Đóng kết nối CSDL
$conn->close();
?>