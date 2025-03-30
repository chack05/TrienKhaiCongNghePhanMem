<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <h2>Danh Sách Danh Mục</h2>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb alert alert-info">
                        <li class="breadcrumb-item"><a href="/freetruyen/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Danh Sách Danh Mục</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" id="breadcrumb-category"></a></li>
                    </ol>
                </nav>
                <div class="row">
                    <div class="col-12 mb-3">
                        <a href="create.php" class="btn btn-primary">Thêm mới</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Kết nối cơ sở dữ liệu
                        include_once __DIR__ . '/../../dbconnect.php';

                        // Truy vấn danh sách danh mục
                        $sql = "SELECT * FROM danhmuc";
                        $result = mysqli_query($conn, $sql);
                        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

                        // Hiển thị danh sách danh mục
                        foreach ($data as $danhmuc) :
                        ?>
                            <tr>
                                <td><?= $danhmuc['danhmuc_id'] ?></td>
                                <td><?= $danhmuc['danhmuc_ten'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $danhmuc['danhmuc_id'] ?>" class="btn btn-primary">Sửa</a>
                                    <a href="delete.php?id=<?= $danhmuc['danhmuc_id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <?php include_once __DIR__ . '/../layouts/footer.php'; ?>
            </div>
        </div>
    </div>
    <?php include_once __DIR__ . '/../layouts/js.php'; ?>
</body>

</html>
