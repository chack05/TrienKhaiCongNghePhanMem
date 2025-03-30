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
                <h2>Danh Sách Ảnh Cần Sửa</h2>
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
                    $data[] = array(
                        'chuong_hinhanh_id' => $row['chuong_hinhanh_id'],
                        'chuong_id' => $row['chuong_id'],
                        'chuong_hinhanh_tenhinh' => $row['chuong_hinhanh_tenhinh'],
                        'chuong_ten' => $row['chuong_ten'],
                        'truyen_ten' => $row['truyen_ten'],
                    );
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
                    <?php foreach ($data as $hinhanh) : ?>
                        <tr>
                            <td><?= $hinhanh['chuong_hinhanh_id'] ?></td>
                            <td>
                                <?= $hinhanh['truyen_ten'] ?> <br />
                                <?= $hinhanh['chuong_ten'] ?>
                            </td>
                            <td>
                            <img style="width: 100px;" src="/freetruyen/assets/uploads/<?= $hinhanh['chuong_hinhanh_tenhinh'] ?>" />
                            </td>
                            <td>
                            <a class="btn btn-success" href="edit_single_image.php?chuong_hinhanh_id=<?= $hinhanh['chuong_hinhanh_id'] ?>">Sửa</a>
                            <a class="btn btn-danger" href="delete_image.php?chuong_hinhanh_id=<?= $hinhanh['chuong_hinhanh_id'] ?>">Xóa</a>
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
