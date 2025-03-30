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
            <?php
                //1 kết nối
                include_once __DIR__ . '/../../dbconnect.php';
                //2
                $sql = "SELECT * FROM truyen";
                //3
                $result = mysqli_query($conn, $sql);
                //4
                $datatruyen = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $datatruyen[] = array(
                        'truyen_id' => $row['truyen_id'],
                        'truyen_ten' => $row['truyen_ten'],
                    );
                }

                //
                $chuong_id = $_GET['chuong_id'];
                //
                $sqlchuong = "SELECT * FROM chuong WHERE chuong_id = $chuong_id";
                //
                $resultchuong = mysqli_query($conn, $sqlchuong);
                //
                $datachuong = [];
                while($row = mysqli_fetch_array($resultchuong, MYSQLI_ASSOC)){
                    $datachuong = array(
                        'chuong_id' => $row['chuong_id'],
                        'chuong_so' => $row['chuong_so'],
                        'chuong_ten' => $row['chuong_ten'],
                        'chuong_noidung' => $row['chuong_noidung'],
                        'truyen_id' => $row['truyen_id'],
                    );
                }
            ?>
            <div class="col-10">
                <div class="text-center">
                    <h2>chỉnh Sửa Chương</h2>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Danh Sách Truyện</li>
                    </ol>
                </nav>

                <form name="frmAdd" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Chương Số</label>
                            <input type="text" name="chuong_so" class="form-control"
                            value="<?= $datachuong['chuong_so']?>" />
                        </div>
                        <div class="col-md-4">
                            <label>Chương Tên</label>
                            <input type="text" name="chuong_ten" class="form-control"  value="<?= $datachuong['chuong_ten']?>" />
                        </div>
                        <div class="col-md-4">
                            <label>Truyện</label>
                            <select name="truyen_id" class="form-control">
                                <?php foreach( $datatruyen as $truyen ): ?>
                                <option value="<?= $truyen['truyen_id'] ?>"
                                <?php echo ($truyen['truyen_id']== $datachuong['truyen_id']) ? 'selected': '' ?>
                                >
                                
                                <?= $truyen['truyen_ten'] ?>
                                    
                            </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="rol-md-12">
                            <label>Nội dung chương</label>
                            <textarea name="chuong_noidung" class="form-control" rows="10" id="editor">
                                <?= $datachuong['chuong_noidung'] ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="BtnSave" class="btn btn-primary">💾 Lưu Thông Tin</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['BtnSave'])) {
                    //
                    $chuong_so = $_POST['chuong_so'];
                    $chuong_ten = $_POST['chuong_ten'];
                    $chuong_noidung = $_POST['chuong_noidung'];
                    $truyen_id = $_POST['truyen_id'];

                    //
                    //
                    include_once __DIR__ . '/../../dbconnect.php';
                    //
                    $sql = "INSERT INTO chuong
                    (chuong_so, chuong_ten, chuong_noidung, truyen_id)
                    VALUES ('$chuong_so', '$chuong_ten', '$chuong_noidung', $truyen_id)";
                    //
                    mysqli_query($conn, $sql);
                    //
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
                defaultImage.style.display = "none"; // Ẩn hình mặc định
                var img = document.createElement("img");
                img.src = reader.result;
                img.style.maxWidth = "100%";
                img.style.maxHeight = "200px";
                imagePreview.innerHTML = ""; // Xóa nội dung trong khung hình trước
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