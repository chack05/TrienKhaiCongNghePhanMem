<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Thêm liên kết tới Bootstrap 5.2 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="/freetruyen/backend/layouts/style.css">
</head>

<body>
<header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/freetruyen/backend/dashboard.php">
        <img src="/freetruyen/backend/layouts/logoweb.png" alt="Logo" class="logo-icon">
        FIT TDC Truyện
      </a>
      <div class="action">
        <div class="menu">
          <h3>
          FIT TDC Truyện
            <div>
              <?php
              // Kết nối cơ sở dữ liệu
              include_once __DIR__ . '/../../dbconnect.php';

              // Lấy thông tin tài khoản hiện tại từ cơ sở dữ liệu
              if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
                $query = "SELECT username FROM user WHERE user_id = $user_id";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);

                // Hiển thị tên người dùng
                echo $row['username'];
              }
              ?>
            </div>
          </h3>
          <ul>
            <li>
              <svg class="bi bi-box-arrow-right icons-size" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.646 1.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L13.293 5.5H1.5A.5.5 0 0 1 1 5V4a.5.5 0 0 1 .5-.5h11.793l-2.147-2.146a.5.5 0 0 1 0-.708zM14.5 10H2a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h12.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5zm-3.5 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2.5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2.5z" />
              </svg>
              <a href="/freetruyen/backend/taikhoan/editpassword.php">Đổi Mật Khẩu</a>
            </li>
            <li>
              <svg class="bi bi-box-arrow-right icons-size" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.646 1.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L13.293 5.5H1.5A.5.5 0 0 1 1 5V4a.5.5 0 0 1 .5-.5h11.793l-2.147-2.146a.5.5 0 0 1 0-.708zM14.5 10H2a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h12.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5zm-3.5 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2.5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2.5z" />
              </svg>
              <a href="/freetruyen/logout.php">Đăng Xuất</a>
            </li>
          </ul>
        </div>
        <div class="profile" onclick="menuToggle();">
          <?php
          // Kiểm tra xem người dùng đã đăng nhập hay chưa
          session_start();
          if (isset($_SESSION['user_id'])) {
            // Kết nối cơ sở dữ liệu
            include_once __DIR__ . '/../../dbconnect.php';

            // Lấy thông tin tài khoản hiện tại từ cơ sở dữ liệu
            $user_id = $_SESSION['user_id'];
            $query = "SELECT avatar FROM user WHERE user_id = $user_id";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);

            // Hiển thị ảnh đại diện
            echo '<img src="/freetruyen/assets/' . $row['avatar'] . '" alt="User Account">';
          }
          ?>
        </div>
      </div>
    </div>
  </nav>
</header>

<!-- Thêm liên kết tới Bootstrap 5.2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
<script>
  function menuToggle() {
    var menu = document.querySelector('.menu');
    menu.classList.toggle('active');
  }
</script>


  <!-- Thêm liên kết tới Bootstrap 5.2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
  <script>
    function menuToggle() {
      var menu = document.querySelector('.menu');
      menu.classList.toggle('active');
    }
  </script>
</body>

</html>