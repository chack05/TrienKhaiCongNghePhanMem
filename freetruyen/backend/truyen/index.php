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
                    <h2>Danh Sách Truyện</h2>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb alert alert-info">
                        <li class="breadcrumb-item"><a href="/freetruyen/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Danh Sách Truyện</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" id="breadcrumb-category"></a></li>
                    </ol>
                </nav>
                <?php
                //1 kết nối
                include_once __DIR__ . '/../../dbconnect.php';
                //2
                $sql = "SELECT t.*, d.danhmuc_ten
                FROM truyen t
                JOIN danhmuc d ON t.danhmuc_id = d.danhmuc_id
                ";
        
                //3
                $result = mysqli_query($conn, $sql);
                //4
                $data = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $data[] = array(
                        'truyen_id' => $row['truyen_id'],
                        'truyen_ma' => $row['truyen_ma'],
                        'truyen_ten' => $row['truyen_ten'],
                        'truyen_theloai' => $row['truyen_theloai'],
                        'truyen_loai' => $row['truyen_loai'],
                        'truyen_hinhdaidien' => $row['truyen_hinhdaidien'],
                        'truyen_tacgia' => $row['truyen_tacgia'],
                        'truyen_mota_ngan' => $row['truyen_mota_ngan'],
                        'truyen_ngaydang' => $row['truyen_ngaydang'],
                        'danhmuc_ten' => $row['danhmuc_ten']
                    );
                }
                
                ?>
                <div class="mb-3 text-center">
                    <button type="button" class="btn btn-warning" id="btnLoai1">Tiểu Thuyết</button>
                    <button type="button" class="btn btn-warning" id="btnLoai2">Truyện Tranh</button>
                </div>
                <div class="text-start">
                    <a class="btn btn-primary" href="create.php">Thêm Mới</a>
                </div>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Thể Loại</th>
                        <th>Danh Muc</th>
                        <th>Hình Đại Diện</th>
                        <th>Tác Giả</th>
                        <th>Mô Tả Ngắn</th>
                        <th>Ngày Đăng</th>
                        <th>Hành Động</th>
                    </tr>
                    <?php foreach ($data as $truyen) : ?>
                        <?php if ($truyen['truyen_loai'] == 1) : ?>
                            <tr class="loai1">
                            <?php else : ?>
                            <tr class="loai2">
                            <?php endif; ?>
                            <td><?= $truyen['truyen_id'] ?></td>
                            <td><?= $truyen['truyen_ma'] ?></td>
                            <td><?= $truyen['truyen_ten'] ?></td>
                            <td><?= $truyen['truyen_theloai'] ?></td>
                            <td><?= $truyen['danhmuc_ten'] ?></td>
                            <td>
                                <?php if ($truyen['truyen_loai'] == 1) : ?>
                                    <img style="width: 100px;" src="/freetruyen/assets/uploads/tieuthuyet/<?= $truyen['truyen_hinhdaidien'] ?>" />
                                <?php else : ?>
                                    <img style="width: 100px;" src="/freetruyen/assets/uploads/truyen-tranh/<?= $truyen['truyen_hinhdaidien'] ?>" />
                                <?php endif; ?>
                            </td>
                            <td><?= $truyen['truyen_tacgia'] ?></td>
                            <td><?= $truyen['truyen_mota_ngan'] ?></td>
                            <td><?= $truyen['truyen_ngaydang'] ?></td>
                            <td>
                                <a class="btn btn-success" href="edit.php?truyen_id=<?= $truyen['truyen_id'] ?>">Sửa</a>
                                <a class="btn btn-danger" href="delete.php?truyen_id=<?= $truyen['truyen_id'] ?>">Xóa</a>
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
    <script>
        document.getElementById('btnLoai1').addEventListener('click', function() {
            showLoaiTruyen(1);
        });

        document.getElementById('btnLoai2').addEventListener('click', function() {
            showLoaiTruyen(2);
        });

        function showLoaiTruyen(loai) {
            var rows = document.getElementsByClassName('loai1');
            for (var i = 0; i < rows.length; i++) {
                if (loai === 1) {
                    rows[i].style.display = 'table-row';
                } else {
                    rows[i].style.display = 'none';
                }
            }

            rows = document.getElementsByClassName('loai2');
            for (var i = 0; i < rows.length; i++) {
                if (loai === 2) {
                    rows[i].style.display = 'table-row';
                } else {
                    rows[i].style.display = 'none';
                }
            }

            // Cập nhật breadcrumb
            var breadcrumbCategory = document.getElementById('breadcrumb-category');
            if (loai === 1) {
                breadcrumbCategory.innerHTML = 'Tiểu Thuyết';
            } else {
                breadcrumbCategory.innerHTML = 'Truyện Tranh';
            }
        }
    </script>
</body>

</html>
