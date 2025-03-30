<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chương Hình Ảnh</title>
    <?php
    include_once __DIR__ . '/../layouts/styles.php';
    ?>
</head>

<body>
    <?php
    include_once __DIR__ . '/../layouts/header.php';
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php
                include_once __DIR__ . '/../layouts/sidebar.php';
                ?>
            </div>
            <div class="col-10">
                <div class="text-center"><h2>Danh Sách Hình Ảnh</h2></div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb alert alert-info">
                        <li class="breadcrumb-item"><a href="/freetruyen/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="index.php">Danh Sách Hình Ảnh</a></li>
                    </ol>
                </nav>
                <?php
                //1 kết nối
                include_once __DIR__ . '/../../dbconnect.php';
                //2
                $sql = "SELECT cha.*,
                c.chuong_ten,
                t.truyen_ten
                FROM chuong_hinhanh cha JOIN chuong c ON cha.chuong_id = c.chuong_id JOIN truyen t ON c.truyen_id = t.truyen_id";
                //3
                $result = mysqli_query($conn, $sql);
                //4
                $data = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $chuong_id = $row['chuong_id'];

                    if (!isset($data[$chuong_id])) {
                        $data[$chuong_id] = [
                            'chuong_id' => $chuong_id,
                            'chuong_ten' => $row['chuong_ten'],
                            'truyen_ten' => $row['truyen_ten'],
                            'hinhanh' => [], // Mảng lưu trữ các ảnh của chương
                        ];
                    }

                    $data[$chuong_id]['hinhanh'][] = $row['chuong_hinhanh_tenhinh'];
                }

                ?>
                <a class="btn btn-primary" href="create.php">Thêm Mới</a>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Chương</th>
                        <th>Hình Đại Diện</th>
                        <th>Hành Động</th>
                    </tr>
                    <?php foreach ($data as $chuong) : ?>
                        <tr>
                            <td><?= $chuong['chuong_id'] ?></td>
                            <td>
                                <?= $chuong['truyen_ten'] ?> <br />
                                <?= $chuong['chuong_ten'] ?>
                            </td>
                            <td>
                                <?php if (!empty($chuong['hinhanh'])) : ?>
                                    <img style="width: 100px;" src="/freetruyen/assets/uploads/<?= $chuong['hinhanh'][0] ?>" alt="Hình đại diện">
                                <?php endif; ?>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="xemanh.php?chuong_id=<?= $chuong['chuong_id'] ?>">Xem tất cả ảnh</a>
                                <a class="btn btn-success" href="edit.php?chuong_id=<?= $chuong['chuong_id'] ?>">Sửa</a>
                                <a class="btn btn-danger" href="delete.php?chuong_id=<?= $chuong['chuong_id'] ?>">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="col-12">
                <?php
                include_once __DIR__ . '/../layouts/footer.php';
                ?>
            </div>
        </div>
    </div>
    <?php
    include_once __DIR__ . '/../layouts/js.php';
    ?>
</body>

</html>
