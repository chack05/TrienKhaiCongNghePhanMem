<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chương Hình Ảnh - Chỉnh Sửa Ảnh</title>
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
                <h2>Chỉnh Sửa Ảnh</h2>
                <?php
                // 1. Kết nối
                include_once __DIR__ . '/../../dbconnect.php';

                // 2. Lấy chuong_hinhanh_id từ tham số truyền vào
                $chuong_hinhanh_id = $_GET['chuong_hinhanh_id'];

                // 3. Truy vấn để lấy thông tin ảnh cần chỉnh sửa
                $sql = "SELECT cha.*,
                        c.chuong_ten,
                        t.truyen_ten
                        FROM chuong_hinhanh cha 
                        JOIN chuong c ON cha.chuong_id = c.chuong_id 
                        JOIN truyen t ON c.truyen_id = t.truyen_id
                        WHERE cha.chuong_hinhanh_id = $chuong_hinhanh_id";

                // 4. Thực hiện truy vấn
                $result = mysqli_query($conn, $sql);

                // 5. Lấy dữ liệu
                $hinhanh = mysqli_fetch_assoc($result);
                ?>

                <a class="btn btn-primary" href="edit.php?chuong_id=<?= $hinhanh['chuong_id'] ?>">Quay lại</a>
                <form action="process_edit_image.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="chuong_hinhanh_id" value="<?= $hinhanh['chuong_hinhanh_id'] ?>">
                    <div class="form-group">
                        <label for="tenhinh">Tên Hình Ảnh:</label>
                        <input type="text" class="form-control" id="tenhinh" name="tenhinh" value="<?= $hinhanh['chuong_hinhanh_tenhinh'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="hinhanh">Chọn Hình Ảnh Mới:</label>
                        <input type="file" class="form-control-file" id="hinhanh" name="hinhanh">
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
                
                <div class="image-preview">
                    <h3>Hình Ảnh</h3>
                    <img src="/freetruyen/assets/uploads/<?= $hinhanh['chuong_hinhanh_tenhinh'] ?>" alt="Hình ảnh">
                </div>
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
