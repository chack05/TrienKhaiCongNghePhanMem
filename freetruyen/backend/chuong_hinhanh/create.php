<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Ảnh Mới</title>
    <?php
    include_once __DIR__ . '/../layouts/styles.php';
    ?>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                    <h2>Tạo Ảnh Mới</h2>
                </div>

                <?php
                // Assuming you have a connection established, replace 'your_db_connection' with your actual connection variable
                include_once __DIR__ . '/../../dbconnect.php';

                // Fetch truyens with loai 2
                $sql_truyens = "SELECT * FROM truyen WHERE truyen_loai = 2";
                $result_truyens = mysqli_query($conn, $sql_truyens);
                ?>

                <!-- Add your form here for image upload -->
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <!-- Input for selecting file -->
                    <!-- Input for selecting multiple files -->
                    <!-- Dropdown for selecting truyen -->
                    <div class="form-group">
                        <label for="truyen_id">Chọn Truyện:</label>
                        <select class="form-control" name="truyen_id" id="truyen_id" required>
                            <?php while ($row_truyen = mysqli_fetch_assoc($result_truyens)) : ?>
                                <option value="<?= $row_truyen['truyen_id'] ?>"><?= $row_truyen['truyen_ten'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <!-- Dropdown for selecting chuong -->
                    <div class="form-group">
                        <label for="chuong_id">Chọn Chương:</label>
                        <select class="form-control" name="chuong_id" id="chuong_id" required>
                            <!-- Options will be dynamically loaded here using JavaScript -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="uploadImages">Thêm Ảnh:</label>
                        <input type="file" class="form-control" name="uploadImages[]" id="uploadImages" multiple required>
                    </div>

                    <button type="submit" class="btn btn-primary">Tạo Ảnh</button>
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

<!-- Thêm đoạn mã JavaScript vào cuối trang -->
<script>
    $(document).ready(function() {
        $('#truyen_id').change(function() {
            var truyen_id = $(this).val();

            // Gửi yêu cầu AJAX để lấy danh sách chương
            $.ajax({
                url: 'get_chapters.php',
                type: 'POST',
                data: {
                    truyen_id: truyen_id
                },
                dataType: 'json',
                success: function(response) {
                    // Xóa tất cả các option hiện tại trong dropdown chương
                    $('#chuong_id').empty();

                    // Thêm các option mới từ danh sách chương nhận được
                    $.each(response, function(index, chapter) {
                        $('#chuong_id').append('<option value="' + chapter.chuong_id + '">' + chapter.chuong_so + ' - ' + chapter.chuong_ten + '</option>');
                    });
                }
            });
        });
    });
</script>


</html>