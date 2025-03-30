<?php
session_start();

// Kiểm tra và bao gồm dbconnect.php
include_once 'C:/xampp/htdocs/freetruyen/dbconnect.php';

// Kiểm tra session đầu tiên
if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['role'] = $_COOKIE['role'];
}

// Kiểm tra nếu session có user_id
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Lấy thông tin trang hiện tại từ URL, mặc định là trang 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 12; // Số lượng truyện hiển thị trên mỗi trang
$offset = ($page - 1) * $items_per_page;

// Lấy tổng số truyện để tính số trang
$sqlCount = "SELECT COUNT(*) FROM truyen WHERE truyen_loai = 2";
$resultCount = mysqli_query($conn, $sqlCount);
$total_items = mysqli_fetch_row($resultCount)[0];
$total_pages = ceil($total_items / $items_per_page);

// Lấy danh sách truyện cho trang hiện tại
$sql = "SELECT * FROM truyen WHERE truyen_loai = 2 LIMIT $offset, $items_per_page";
$result = mysqli_query($conn, $sql);

// Bóc tách dữ liệu thành mảng ARRAY
$data = [];
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $data[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách truyện</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Your existing CSS styles */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-gap: 20px;
        }

        .card {
            width: 100%;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .pagination a {
            padding: 10px 20px;
            background-color: #f47a00;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .pagination a:hover {
            background-color: #e37000;
        }
    </style>
</head>

<body>
    <?php
    include_once __DIR__ . '/./frontend/header.php';
    ?>

    <?php
    include_once __DIR__ . '/./frontend/sidebar.php';
    ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 style="font-family: 'Prompt', sans-serif;" class="rainbow-text"><i class="fa fa-book" aria-hidden="true"></i>Truyện Hay</h4>
            </div>
            <div class="col-12">
                <?php include_once __DIR__ . '/truyenhay.php'; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <h4 style="font-family: 'Prompt', sans-serif;"><i class="fa fa-cloud-upload" aria-hidden="true"></i>Danh Sách Manga</h4>
                <div class="grid-container">
                    <?php foreach ($data as $truyen) : ?>
                        <div class="card">
                            <a href="chitiettruyen.php?truyen_id=<?= $truyen['truyen_id'] ?>">
                                <img src="./assets/uploads/truyen-tranh/<?= $truyen['truyen_hinhdaidien'] ?>" style="width: 100%; height: 300px;" />
                            </a>
                            <div class="card-body">
                                <h5 style="font-family: 'Prompt', sans-serif;" class="card-title"><?= $truyen['truyen_ten'] ?></h5>
                                <a href="chitiettruyen.php?truyen_id=<?= $truyen['truyen_id'] ?>" class="btn btn-primary">Đọc Truyện</a>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="pagination">
                    <!-- Previous Page Link -->
                    <?php if ($page > 1) : ?>
                        <a href="?page=<?= $page - 1 ?>">Trước</a>
                    <?php endif; ?>

                    <!-- Next Page Link -->
                    <?php if ($page < $total_pages) : ?>
                        <a href="?page=<?= $page + 1 ?>">Sau</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-3">
                <div class="col-12">
                    <h4 style="font-family: 'Prompt', sans-serif; color: #f7262c;" class="rainbow-text"><i class="fa fa-star" aria-hidden="true"></i>Truyện Mới</h4>
                </div>
                <?php include_once __DIR__ . '/./frontend/sidebartl.php'; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="alert alert-warning" role="alert">
                    <div class="marquee-container">
                        <div class="marquee">
                            Website được tạo bởi FIT TDC<i class="fa fa-heart" aria-hidden="true"></i>
                            <button onclick="showToast()">Click</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showToast() {
            Toastify({
                text: "Chúc Bạn Đọc Truyện Vui Vẻ",
                duration: 3000,
                gravity: "bottom",
                position: "right",
                backgroundColor: "orange",
                className: "toastify-custom-class"
            }).showToast();
        }
    </script>
</body>

</html>
