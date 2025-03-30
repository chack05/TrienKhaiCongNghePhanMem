<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <div class="text-center">
                    <h2>Chỉnh Sửa Truyện</h2>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb alert alert-info">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Danh sách chương</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="edit.php">Chỉnh Sửa Truyện</a></li>
                    </ol>
                </nav>
                <?php
                include_once __DIR__ . '/../../dbconnect.php';

                // Kiểm tra nếu có ID truyện được truyền vào từ trang trước
                if (isset($_GET['truyen_id'])) {
                    $truyen_id = $_GET['truyen_id'];

                    // Lấy thông tin truyện từ cơ sở dữ liệu
                    $sql = "SELECT * FROM truyen WHERE truyen_id = $truyen_id";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);

                    // Kiểm tra xem truyện có tồn tại hay không
                    if ($row) {
                        $truyen_ma = $row['truyen_ma'];
                        $truyen_ten = $row['truyen_ten'];
                        $truyen_loai = $row['truyen_loai'];
                        $truyen_theloai = $row['truyen_theloai'];
                        $truyen_tacgia = $row['truyen_tacgia'];
                        $truyen_mota_ngan = $row['truyen_mota_ngan'];
                        $danhmuc_id = $row['danhmuc_id'];
                ?>

                        <form name="frmEdit" action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Mã Truyện Tranh</label>
                                    <input type="text" name="truyen_ma" class="form-control" value="<?php echo $truyen_ma; ?>" />
                                </div>
                                <div class="col-md-4">
                                    <label>Tên Truyện Tranh</label>
                                    <input type="text" name="truyen_ten" class="form-control" value="<?php echo $truyen_ten; ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Loại Truyện Tranh</label>
                                    <select name="truyen_loai" class="form-control">
                                        <option value="1" <?php if ($truyen_loai == 1) echo 'selected'; ?>>Tiểu Thuyết</option>
                                        <option value="2" <?php if ($truyen_loai == 2) echo 'selected'; ?>>Truyện Tranh</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Thể Loại</label>
                                    <input type="text" name="truyen_theloai" class="form-control" value="<?php echo $truyen_theloai; ?>" />
                                </div>
                                <div class="col-md-4">
                                    <label>Tác Giả</label>
                                    <input type="text" name="truyen_tacgia" class="form-control" value="<?php echo $truyen_tacgia; ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Hình Đại Diện</label>
                                    <div class="input-group">
                                        <input type="file" name="truyen_hinhdaidien" class="form-control" onchange="previewImage(event)" />
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="inputGroupFileAddon">
                                                <i class="fa fa-image"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div id="imagePreview" class="image-preview">
                                        <?php
                                        $hinhdaidien = $row['truyen_hinhdaidien'];
                                        if (!empty($hinhdaidien) && file_exists(__DIR__ . '/../../assets/uploads/' . $hinhdaidien)) {
                                            echo '<img id="defaultImage" src="/../../assets/uploads/' . $hinhdaidien . '" alt="Hình mặc định" />';
                                        } else {
                                            echo '<img id="defaultImage" src="icon.png" alt="Hình mặc định" />';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Mô Tả Ngắn</label>
                                    <textarea name="truyen_mota_ngan" class="form-control" rows="10"><?php echo $truyen_mota_ngan; ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Danh Mục</label>
                                    <select name="danhmuc_id" class="form-control">
                                        <?php
                                        $sql_danhmuc = "SELECT * FROM danhmuc";
                                        $result_danhmuc = mysqli_query($conn, $sql_danhmuc);
                                        while ($row_danhmuc = mysqli_fetch_array($result_danhmuc, MYSQLI_ASSOC)) {
                                            $selected = ($row_danhmuc['danhmuc_id'] == $danhmuc_id) ? 'selected' : '';
                                            echo '<option value="' . $row_danhmuc['danhmuc_id'] . '" ' . $selected . '>' . $row_danhmuc['danhmuc_ten'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="BtnUpdate" class="btn btn-primary">💾 Lưu Thông Tin</button>
                            </div>
                        </form>

                <?php
                    } else {
                        echo '<div class="alert alert-danger">Truyện không tồn tại.</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger">Không có ID truyện.</div>';
                }

                // Xử lý khi nhấn nút "Lưu Thông Tin"
                if (isset($_POST['BtnUpdate'])) {
                    $truyen_ma = $_POST['truyen_ma'];
                    $truyen_ten = $_POST['truyen_ten'];
                    $truyen_loai = $_POST['truyen_loai'];
                    $truyen_theloai = $_POST['truyen_theloai'];
                    $truyen_tacgia = $_POST['truyen_tacgia'];
                    $truyen_mota_ngan = $_POST['truyen_mota_ngan'];
                    $danhmuc_id = $_POST['danhmuc_id'];

                    $uploadDir = __DIR__ . '/../../assets/uploads/';
                    $tentaptin = '';
                    if (isset($_FILES['truyen_hinhdaidien']) && $_FILES['truyen_hinhdaidien']['size'] > 0) {
                        if ($truyen_loai == 1) {
                            $uploadDir .= 'tieuthuyet/';
                        } else if ($truyen_loai == 2) {
                            $uploadDir .= 'truyen-tranh/';
                        }
                        $tentaptin = date('Ymd_His') . '_' . $_FILES['truyen_hinhdaidien']['name'];
                        move_uploaded_file($_FILES['truyen_hinhdaidien']['tmp_name'], $uploadDir . $tentaptin);
                    }

                    include_once __DIR__ . '/../../dbconnect.php';

                    $sql = "UPDATE truyen SET
                            truyen_ma = '$truyen_ma',
                            truyen_ten = '$truyen_ten',
                            truyen_hinhdaidien = '$tentaptin',
                            truyen_loai = '$truyen_loai',
                            truyen_theloai = '$truyen_theloai',
                            truyen_tacgia = '$truyen_tacgia',
                            truyen_mota_ngan = '$truyen_mota_ngan',
                            danhmuc_id = '$danhmuc_id'
                            WHERE truyen_id = $truyen_id";

                    mysqli_query($conn, $sql);

                    echo '<script>location.href ="index.php";</script>';
                }


                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
    <?php
    include_once __DIR__ . '/../layouts/js.php';
    ?>
</body>

</html>