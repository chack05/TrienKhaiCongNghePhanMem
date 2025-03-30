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
                    <h2>Danh Sách Chương</h2>
                </div>

                <nav aria-label="breadcrumb alert alert-info">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/freetruyen/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="index.php">Danh Sách Chương</a></li>
                    </ol>
                </nav>

                <div class="text-center">
                    <div class="btn-group" role="group" aria-label="Loại truyện">
                        <a class="btn btn-primary" href="index.php?loai=1">Tiểu Thuyết</a>
                        <a class="btn btn-primary" href="index.php?loai=2">Truyện Tranh</a>
                    </div>
                </div>

                <?php
                //1 kết nối
                include_once __DIR__ . '/../../dbconnect.php';

                //2 Kiểm tra tham số loai trong URL
                $loaiTruyen = isset($_GET['loai']) ? $_GET['loai'] : 0;

                //3 Xây dựng câu truy vấn SQL với mệnh đề WHERE tương ứng
                $sql = "SELECT * 
                        FROM chuong ch 
                        JOIN truyen tr ON ch.truyen_id = tr.truyen_id";

                if ($loaiTruyen == 1) {
                    $sql .= " WHERE tr.truyen_loai = 1";
                } elseif ($loaiTruyen == 2) {
                    $sql .= " WHERE tr.truyen_loai = 2";
                }

                //4 Thực hiện câu truy vấn và lấy dữ liệu
                $result = mysqli_query($conn, $sql);
                $data = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $data[] = array(
                        'chuong_id' => $row['chuong_id'],
                        'chuong_so' => $row['chuong_so'],
                        'chuong_ten' => $row['chuong_ten'],
                        'chuong_noidung' => $row['chuong_noidung'],
                        'truyen_id' => $row['truyen_id'],
                        'truyen_ten' => $row['truyen_ten'],
                    );
                }
                ?>

                <a class="btn btn-primary" href="create.php">Thêm Mới</a>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Số</th>
                        <th>Tên</th>
                        <th>Nội Dung</th>
                        <th>Tên Truyện</th>
                        <th>Hành Động</th>
                    </tr>
                    <?php foreach ($data as $chuong) : ?>
                        <tr>
                            <td><?= $chuong['truyen_id'] ?></td>
                            <td><?= $chuong['chuong_so'] ?></td>
                            <td><?= $chuong['chuong_ten'] ?></td>
                            <td><?= $chuong['chuong_noidung'] ?></td>
                            <td><?= $chuong['truyen_ten'] ?></td>
                            <td>
                                <a class="btn btn-success" href="edit.php?chuong_id=<?= $chuong['chuong_id'] ?>">Sửa</a>
                                <a class="btn btn-danger" href="delete.php?chuong_id=<?= $chuong['chuong_id'] ?>">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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
