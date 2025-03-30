<?php
session_start();

// Kiểm tra và bao gồm dbconnect.php
include_once __DIR__ . '/dbconnect.php';

// Kiểm tra session đầu tiên
if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) {
    // Nếu session không có user_id, nhưng cookie có, khôi phục session từ cookie
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['role'] = $_COOKIE['role'];
}

// Kiểm tra nếu session có user_id
if (!isset($_SESSION['user_id'])) {
    // Nếu không có user_id trong session và cookie, chuyển hướng đến trang login
    header('Location: login.php');
    exit();
}

// Lấy `user_id` từ cookie
$userId = $_SESSION['user_id'];


// Lấy lịch sử xem truyện từ cơ sở dữ liệu
$query = "SELECT truyen.truyen_id, truyen.truyen_ten, truyen.truyen_hinhdaidien, history.viewed_at
          FROM history
          INNER JOIN truyen ON history.truyen_id = truyen.truyen_id
          WHERE history.user_id = ? 
          ORDER BY history.viewed_at DESC";

// Kiểm tra kết nối trước khi thực hiện truy vấn
if ($conn) {
    // Chuẩn bị câu lệnh để tránh SQL Injection
    $stmt = mysqli_prepare($conn, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    } else {
        die("Không thể thực hiện truy vấn: " . mysqli_error($conn));
    }
} else {
    die("Không thể kết nối đến cơ sở dữ liệu.");
}

if (!$result) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử xem truyện</title>
    <link rel="stylesheet" href="/freetruyen/assets/vendors/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/freetruyen/assets/styles/style.css" type="text/css">
    <style>
        .history-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .history-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .cover-image {
            width: 60px;
            height: 80px;
            border-radius: 5px;
        }

        .history-item h3 {
            margin: 0;
        }

        .history-item p {
            margin: 5px 0;
            font-size: 14px;
            color: #777;
        }

        .btn-clear-history {
            background-color: #ff4d4d;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-clear-history:hover {
            background-color: #e60000;
        }

        header {
            text-align: center;
            margin-top: 20px;
            font-size: 2em;
        }

        main {
            margin: 20px;
        }

        form {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Lịch sử xem truyện</h1>
    </header>
    <main>
        <div class="history-list">
            <?php 
            // Kiểm tra và hiển thị truyện đã xem
            if (mysqli_num_rows($result) > 0) { 
                $previousTruyenId = null; // Biến để theo dõi truyện đã hiển thị
                while ($row = mysqli_fetch_assoc($result)) { 
                    if ($previousTruyenId != $row['truyen_id']) { // Kiểm tra nếu truyện chưa hiển thị
                        $previousTruyenId = $row['truyen_id']; 
            ?>
                    <div class="history-item">
                        <img src="/freetruyen/assets/uploads/truyen-tranh/<?php echo htmlspecialchars($row['truyen_hinhdaidien']); ?>" alt="Cover" class="cover-image">
                        <div>
                            <h3><?php echo htmlspecialchars($row['truyen_ten']); ?></h3>
                            <p>Đã xem vào: <?php echo date('d/m/Y H:i', strtotime($row['viewed_at'])); ?></p>
                            <a href="chitiettruyen.php?truyen_id=<?php echo $row['truyen_id']; ?>">Đọc lại</a>
                        </div>
                    </div>
                <?php } // End of check for unique truyen_id
                } // End of while loop
            } else { ?>
                <p>Bạn chưa xem truyện nào!</p>
            <?php } ?>
        </div>
    </main>
</body>

</html>
