<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include_once __DIR__ . '/../layouts/styles.php'
    ?>
</head>

<body>
    <?php
    include_once __DIR__ . '/../layouts/header.php'
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php
                include_once __DIR__ . '/../layouts/sidebar.php'
                ?>
            </div>
            <div class="col-10">
                <div class="text-center">
                    <h2>Thêm Mới Truyện</h2>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb alert alert-info">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Danh sách chương</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="create.php">Thêm Mới Truyện</a></li>
                    </ol>
                </nav>
                <form name="frmAdd" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Mã Truyện Tranh</label>
                            <input type="text" name="truyen_ma" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <label>Tên Truyện Tranh</label>
                            <input type="text" name="truyen_ten" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Loại Truyện Tranh</label>
                            <select name="truyen_loai" class="form-control">
                                <option value="1">Tiểu Thuyết</option>
                                <option value="2">Truyện Tranh</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Thể Loại</label>
                            <input type="text" name="truyen_theloai" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <label>Tác Giả</label>
                            <input type="text" name="truyen_tacgia" class="form-control" />
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
                                <img id="defaultImage" src="icon.png" alt="Hình mặc định" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Mô Tả Ngắn</label>
                            <textarea name="truyen_mota_ngan" class="form-control" rows="10" id="editor"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Danh Mục</label>
                            <select name="danhmuc_id" class="form-control">
                                <?php
                                include_once __DIR__ . '/../../dbconnect.php';
                                $sql = "SELECT * FROM danhmuc";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo '<option value="' . $row['danhmuc_id'] . '">' . $row['danhmuc_ten'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="BtnSave" class="btn btn-primary">💾 Lưu Thông Tin</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['BtnSave'])) {
                    $truyen_ma = $_POST['truyen_ma'];
                    $truyen_ten = $_POST['truyen_ten'];
                    $truyen_loai = $_POST['truyen_loai'];
                    $truyen_theloai = $_POST['truyen_theloai'];
                    $truyen_tacgia = $_POST['truyen_tacgia'];
                    $truyen_mota_ngan = $_POST['truyen_mota_ngan'];
                    $danhmuc_id = $_POST['danhmuc_id'];

                    $tentaptin = '';
                    if (isset($_FILES['truyen_hinhdaidien'])) {
                        if ($truyen_loai == 1) {
                            $uploadDir = __DIR__ . '/../../assets/uploads/tieuthuyet/';
                        } else if ($truyen_loai == 2) {
                            $uploadDir = __DIR__ . '/../../assets/uploads/truyen-tranh/';
                        }
                    }
                    $tentaptin = date('Ymd_His') . '_' . $_FILES['truyen_hinhdaidien']['name'];
                    move_uploaded_file($_FILES['truyen_hinhdaidien']['tmp_name'], $uploadDir . $tentaptin);

                    include_once __DIR__ . '/../../dbconnect.php';

                    $sql = "INSERT INTO truyen
                    (truyen_ma, truyen_ten, truyen_hinhdaidien, truyen_loai, truyen_theloai, truyen_tacgia, truyen_mota_ngan, truyen_ngaydang, danhmuc_id)
                    VALUES ('$truyen_ma', '$truyen_ten', '$tentaptin', '$truyen_loai', '$truyen_theloai', '$truyen_tacgia', '$truyen_mota_ngan', NOW(), '$danhmuc_id')";

                    mysqli_query($conn, $sql);

                    echo '<script>location.href ="index.php";</script>';
                }
                ?>
            </div>
        </div>

    </div>
    <?php
    include_once __DIR__ . '/../layouts/js.php'
    ?>
    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var imagePreview = document.getElementById("imagePreview");
                var defaultImage = document.getElementById("defaultImage");
                defaultImage.style.display = "none";
                var img = document.createElement("img");
                img.src = reader.result;
                img.style.maxWidth = "100%";
                img.style.maxHeight = "200px";
                imagePreview.innerHTML = "";
                imagePreview.appendChild(img);
            };
            reader.readAsDataURL(input.files[0]);
        }

        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>
