<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .navbar-orange {
            background-color: #ff962d;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark navbar-orange" data-bs-theme="dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="danhsachmanga.php">Manga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="danhsachtieuthuyet.php">Tiểu Thuyết</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Danh Mục</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            // Kết nối đến cơ sở dữ liệu và truy vấn danh mục
                            include_once './dbconnect.php';
                            $sql = "SELECT * FROM danhmuc";
                            $result = mysqli_query($conn, $sql);

                            // Lặp qua từng dòng kết quả và hiển thị danh mục
                            while ($row = mysqli_fetch_assoc($result)) {
                                $danhmuc_ten = $row['danhmuc_ten'];
                                $danhmuc_id = $row['danhmuc_id'];
                                echo "<li><a class='dropdown-item' href='/freetruyen/timdanhmuc.php?danhmuc_id=$danhmuc_id'>$danhmuc_ten</a></li>";
                            }                            
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
