<div class="sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="pill" href="#top-tuan">Tuần</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#top-thang">Tháng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#top-nam">Năm</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="top-tuan">
            <div class="card mb-3" style="max-width: 540px;">
                <?php
                // Lấy danh sách truyện loại 1 mới cập nhật trong tuần
                $sql = "SELECT truyen.*, MAX(chuong.chuong_so) AS chuong_so 
                        FROM truyen 
                        JOIN chuong ON truyen.truyen_id = chuong.truyen_id 
                        WHERE truyen.truyen_loai = 2 
                        AND truyen.truyen_ngaydang >= CURDATE() - INTERVAL 7 DAY
                        GROUP BY truyen.truyen_id 
                        ORDER BY truyen.truyen_ngaydang DESC 
                        LIMIT 5";
                $result = mysqli_query($conn, $sql);

                $index = 1; // Biến đếm

                while ($row = mysqli_fetch_array($result)) {
                    $truyen_id = $row['truyen_id'];
                    $truyen_ten = $row['truyen_ten'];
                    $truyen_hinhdaidien = $row['truyen_hinhdaidien'];
                    $chuong_so = $row['chuong_so'];

                    // Xác định đường dẫn ảnh
                    $duongdan_anh = "/freetruyen/assets/uploads/truyen-tranh/" . $truyen_hinhdaidien;

                    // Xác định class CSS cho màu sắc
                    $class_mausac = '';
                    if ($index == 1) {
                        $class_mausac = 'text-primary';
                    } else if ($index == 2) {
                        $class_mausac = 'text-warning';
                    } else if ($index == 3) {
                        $class_mausac = 'text-danger';
                    }
                ?>
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= $duongdan_anh ?>" class="img-fluid rounded-start" alt="<?= $truyen_ten ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title <?= $class_mausac ?>">
                                    <?= sprintf('%02d', $index) ?>. <?= $truyen_ten ?>
                                </h5>
                                <p class="card-text">Chương số: <?= $chuong_so ?></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php
                    $index++; // Tăng biến đếm sau mỗi lần lặp
                }
                ?>
            </div>
        </div>

        <div class="tab-pane fade" id="top-thang">
            <div class="card mb-3" style="max-width: 540px;">
                <?php
                // Lấy danh sách truyện loại 1 mới cập nhật trong tháng
                $sql = "SELECT truyen.*, MAX(chuong.chuong_so) AS chuong_so 
                        FROM truyen 
                        JOIN chuong ON truyen.truyen_id = chuong.truyen_id 
                        WHERE truyen.truyen_loai = 2 
                        AND truyen.truyen_ngaydang >= CURDATE() - INTERVAL 1 MONTH
                        GROUP BY truyen.truyen_id 
                        ORDER BY truyen.truyen_ngaydang DESC 
                        LIMIT 5";
                $result = mysqli_query($conn, $sql);

                $index = 1; // Biến đếm

                while ($row = mysqli_fetch_array($result)) {
                    $truyen_id = $row['truyen_id'];
                    $truyen_ten = $row['truyen_ten'];
                    $truyen_hinhdaidien = $row['truyen_hinhdaidien'];
                    $chuong_so = $row['chuong_so'];

                    // Xác định đường dẫn ảnh
                    $duongdan_anh = "/freetruyen/assets/uploads/truyen-tranh/" . $truyen_hinhdaidien;

                    // Xác định class CSS cho màu sắc
                    $class_mausac = '';
                    if ($index == 1) {
                        $class_mausac = 'text-primary';
                    } else if ($index == 2) {
                        $class_mausac = 'text-warning';
                    } else if ($index == 3) {
                        $class_mausac = 'text-danger';
                    }
                ?>
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= $duongdan_anh ?>" class="img-fluid rounded-start" alt="<?= $truyen_ten ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title <?= $class_mausac ?>">
                                    <?= sprintf('%02d', $index) ?>. <?= $truyen_ten ?>
                                </h5>
                                <p class="card-text">Chương số: <?= $chuong_so ?></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php
                    $index++; // Tăng biến đếm sau mỗi lần lặp
                }
                ?>
            </div>
        </div>

        <div class="tab-pane fade" id="top-nam">
            <div class="card mb-3" style="max-width: 540px;">
                <?php
                // Lấy danh sách truyện loại 1 mới cập nhật trong năm
                $sql = "SELECT truyen.*, MAX(chuong.chuong_so) AS chuong_so 
                        FROM truyen 
                        JOIN chuong ON truyen.truyen_id = chuong.truyen_id 
                        WHERE truyen.truyen_loai = 2 
                        AND truyen.truyen_ngaydang >= CURDATE() - INTERVAL 1 YEAR
                        GROUP BY truyen.truyen_id 
                        ORDER BY truyen.truyen_ngaydang DESC 
                        LIMIT 5";
                $result = mysqli_query($conn, $sql);

                $index = 1; // Biến đếm

                while ($row = mysqli_fetch_array($result)) {
                    $truyen_id = $row['truyen_id'];
                    $truyen_ten = $row['truyen_ten'];
                    $truyen_hinhdaidien = $row['truyen_hinhdaidien'];
                    $chuong_so = $row['chuong_so'];

                    // Xác định đường dẫn ảnh
                    $duongdan_anh = "/freetruyen/assets/uploads/truyen-tranh/" . $truyen_hinhdaidien;

                    // Xác định class CSS cho màu sắc
                    $class_mausac = '';
                    if ($index == 1) {
                        $class_mausac = 'text-primary';
                    } else if ($index == 2) {
                        $class_mausac = 'text-warning';
                    } else if ($index == 3) {
                        $class_mausac = 'text-danger';
                    }
                ?>
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= $duongdan_anh ?>" class="img-fluid rounded-start" alt="<?= $truyen_ten ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title <?= $class_mausac ?>">
                                    <?= sprintf('%02d', $index) ?>. <?= $truyen_ten ?>
                                </h5>
                                <p class="card-text">Chương số: <?= $chuong_so ?></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php
                    $index++; // Tăng biến đếm sau mỗi lần lặp
                }
                ?>
            </div>
        </div>
    </div>
</div>
