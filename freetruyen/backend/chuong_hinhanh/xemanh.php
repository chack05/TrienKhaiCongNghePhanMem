<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem Ảnh</title>
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
                <div class="text-center"><h2>Tất Cả Ảnh của Chương</h2></div>

                <?php
                $chuong_id = $_GET['chuong_id']; // Lấy chương_id từ tham số truyền vào
                $sql = "SELECT * FROM chuong_hinhanh WHERE chuong_id = $chuong_id";
                $result = mysqli_query($conn, $sql);
                $hinhanh = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $hinhanh[] = $row['chuong_hinhanh_tenhinh'];
                }
                ?>

                <?php foreach ($hinhanh as $tenhinh) : ?>
                    <img src="/freetruyen/assets/uploads/<?= $tenhinh ?>" alt="Ảnh chương">
                <?php endforeach; ?>
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
