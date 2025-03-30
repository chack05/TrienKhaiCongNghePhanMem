<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Danh Mục</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
            </div>
            <div class="col-10">
                <div class="text-center">
                    <h2>Thêm Danh Mục</h2>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb alert alert-info">
                        <li class="breadcrumb-item"><a href="/freetruyen/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Danh Sách Danh Mục</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" id="breadcrumb-category"></a></li>
                    </ol>
                </nav>
                <?php
                include_once __DIR__ . '/../../dbconnect.php';

                if (isset($_POST['BtnSave'])) {
                    $danhmuc_ten = $_POST['danhmuc_ten'];

                    // Lấy ID mới cho danh mục
                    $sql = "SELECT MAX(danhmuc_id) AS max_id FROM danhmuc";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $max_id = $row['max_id'];
                    $new_id = $max_id + 1;

                    // Thực hiện INSERT
                    $sql = "INSERT INTO danhmuc (danhmuc_id, danhmuc_ten) VALUES ($new_id, '$danhmuc_ten')";
                    mysqli_query($conn, $sql);

                    echo '<script>location.href ="index.php";</script>';
                }
                ?>

                <form name="frmAdd" action="" method="post">
                    <div class="form-group">
                        <label for="danhmuc_ten">Tên danh mục:</label>
                        <input type="text" class="form-control" id="danhmuc_ten" name="danhmuc_ten" required>
                    </div>
                    <button type="submit" name="BtnSave" class="btn btn-primary">Thêm</button>
                </form>
            </div>
            <div class="col-12">
                <?php include_once __DIR__ . '/../layouts/footer.php'; ?>
            </div>
        </div>
    </div>
    <?php include_once __DIR__ . '/../layouts/js.php'; ?>
</body>

</html>
