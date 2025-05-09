<?php
session_start();

include_once __DIR__ . '/dbconnect.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Mã hóa mật khẩu
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Set default role to 'member'
    $role = 'member';

    $query = "INSERT INTO user (username, password, email, role) VALUES ('$username', '$hashedPassword', '$email', '$role')";
    mysqli_query($conn, $query);

    // Lấy ID của người dùng vừa tạo
    $userID = mysqli_insert_id($conn);

    // Cập nhật đường dẫn avatar mặc định
    $defaultAvatarPath = 'uploads/avatar/avatarmd.jpg';
    $updateQuery = "UPDATE user SET avatar = '$defaultAvatarPath' WHERE user_id = $userID";
    mysqli_query($conn, $updateQuery);

    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;

    // Redirect to login page
    header("Location: login.php");
    exit();
}
?>



<!-- Mã HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Đăng Ký Tài Khoảng</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
    * {
      margin: 0;
      padding: 0;
      font-family: 'poppins', sans-serif;
    }

    section {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      width: 100%;

      background: url('imglogin1.jpg') no-repeat;
      background-position: center;
      background-size: cover;
    }

    .form-box {
      position: relative;
      width: 400px;
      height: 450px;
      background: transparent;
      border: 2px solid rgba(255, 255, 255, 0.5);
      border-radius: 20px;
      backdrop-filter: blur(15px);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    h2 {
      font-size: 2em;
      color: #fff;
      text-align: center;
    }

    .inputbox {
      position: relative;
      margin: 30px 0;
      width: 310px;
      border-bottom: 2px solid #fff;
    }

    .inputbox label {
      position: absolute;
      top: 50%;
      left: 5px;
      transform: translateY(-50%);
      color: #fff;
      font-size: 1em;
      pointer-events: none;
      transition: .5s;
    }

    input:focus~label,
    input:valid~label {
      top: -5px;
    }

    .inputbox input {
      width: 100%;
      height: 50px;
      background: transparent;
      border: none;
      outline: none;
      font-size: 1em;
      padding: 0 35px 0 5px;
      color: #fff;
    }

    .inputbox ion-icon {
      position: absolute;
      right: 8px;
      color: #fff;
      font-size: 1.2em;
      top: 20px;
    }

    .forget {
      margin: -15px 0 15px;
      font-size: .9em;
      color: #fff;
      display: flex;
      justify-content: space-between;
    }

    .forget label input {
      margin-right: 3px;
    }

    .forget label a {
      color: #fff;
      text-decoration: none;
    }

    .forget label a:hover {
      text-decoration: underline;
    }

    button {
      width: 100%;
      height: 40px;
      border-radius: 40px;
      background: #fff;
      border: none;
      outline: none;
      cursor: pointer;
      font-size: 1em;
      font-weight: 600;
    }

    .register {
      font-size: .9em;
      color: #fff;
      text-align: center;
      margin: 25px 0 10px;
    }

    .register p a {
      text-decoration: none;
      color: #fff;
      font-weight: 600;
    }

    .register p a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
<section>
    <div class="form-box">
      <div class="form-value">
        <form action="register.php" method="POST">
          <h2>Register</h2>
          <div class="inputbox">
            <ion-icon name="person-outline"></ion-icon>
            <input type="text" name="username" required>
            <label for="username">Username</label>
          </div>
          <div class="inputbox">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="email" name="email" required>
            <label for="email">Email</label>
          </div>
          <div class="inputbox">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input type="password" name="password" required>
            <label for="password">Password</label>
          </div>
          <button type="submit" name="register">Register</button>
          <div class="login">
            <p>Already have an account? <a href="login.php">Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </section>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
