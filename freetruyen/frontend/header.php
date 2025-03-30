<?php
// Đường dẫn đến tệp dbconnect.php
include_once __DIR__ . '/../dbconnect.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$loggedIn = isset($_SESSION['user_id']);

if ($loggedIn) {
    // Lấy đường dẫn avatar từ cơ sở dữ liệu
    $userId = $_SESSION['user_id'];
    $query = "SELECT avatar FROM user WHERE user_id = $userId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $avatarFileName = $row['avatar'];
    $avatarUrl = '/freetruyen/assets/' . $avatarFileName;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/freetruyen/assets/vendors/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <?php
    include_once __DIR__ . '/styles.php';
    ?>
    <style>
        .header-content {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-bar {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            max-width: 400px;
            width: 100%;
            border-radius: 25px;
            padding: 5px;
            position: relative;
            background-color: #ccc;
            transition: background-color 0.3s;
        }

        .search-bar:hover {
            background-color: #ff962d;
        }

        .search-input {
            flex: 1;
            padding: 10px;
            border: none;
            font-size: 16px;
            background-color: transparent;
            outline: none;
        }

        .search-icon {
            color: #555;
            cursor: pointer;
            transition: color 0.3s;
            margin-right: 10px;
        }

        .search-bar:focus-within {
            background-color: #ff962d;
        }

        .search-bar:focus-within .search-icon {
            color: #fff;
        }

        .highlight {
            font-family: 'Cherry Bomb One', cursive;
        }

        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .logo-icon{
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-content">
            <a class="navbar-brand" href="/freetruyen/index.php">
                <img src="backend/layouts/avatartest.jpg" alt="Logo" class="logo-icon">
                <span class="highlight">
                    <h3 style="color:#ff962d">FIT TDC</h3>
                </span>
                <span class="highlight">
                    <h3 style="color:black">TRUYỆN</h3>
                </span>
            </a>
            <div class="search-bar">
                <input type="text" class="search-input" id="search-input" placeholder="Nhập từ khóa" onkeypress="handleKeyPress(event)">
                <i class="fa fa-search search-icon" id="search-icon" aria-hidden="true"></i>
            </div>

            <div class="btn-group">
            <?php if ($loggedIn) { ?>
    <div class="btn-group">
        <a href="history.php" class="btn">
            <i class="fa fa-history" aria-hidden="true"></i> Lịch sử xem
        </a>
    </div>
    <div class="btn-group">
        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo $avatarUrl; ?>" class="avatar">
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="account.php">Thông tin tài khoản</a></li>
            <li><a class="dropdown-item" href="javascript:void(0)" onclick="redirectToUpdatePassword(<?php echo $userId; ?>)">Đổi Mật Khẩu</a></li>
            <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
        </ul>
    </div>
<?php } else { ?>
    <div class="btn-group">
        <a href="login.php" class="btn">
            <i class="fa fa-user-circle-o" aria-hidden="true"></i> Đăng Nhập
        </a>
        <a href="register.php" class="btn">
            <i class="fa fa-user-plus" aria-hidden="true"></i> Đăng Ký
        </a>
    </div>
<?php } ?>

            </div>
        </div>
    </header>

    <?php
    include_once __DIR__ . '/js.php';
    ?>
    <script>
        function redirectToUpdatePassword(userId) {
            window.location.href = "updatepassword.php?user_id=" + userId;
        }

        function handleKeyPress(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                performSearch();
            }
        }

        function performSearch() {
            var keyword = document.getElementById('search-input').value;
            window.location.href = 'timkiem.php?truyen_ten=' + keyword;
        }
    </script>

</body>

</html>
