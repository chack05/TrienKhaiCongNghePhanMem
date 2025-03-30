<?php
// Kết nối cơ sở dữ liệu
include_once __DIR__ . '/../../dbconnect.php';

// Lấy thông tin tài khoản từ cơ sở dữ liệu
$query = "SELECT * FROM user";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
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
                    <h1>Thông tin tài khoản</h1>
                </div>

                <?php if (!empty($data)) : ?>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Quyền Hạng</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $row['user_id'] ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td>
                                        <?php if (!empty($row['avatar'])) { ?>
                                            <img src="/freetruyen/assets/<?= $row['avatar'] ?>" alt="Avatar" style="width: 50px; height: 50px;">
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($row['role'] === 'admin') { ?>
                                            Admin
                                        <?php } elseif ($row['role'] === 'member') { ?>
                                            Member
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="edit.php?user_id=<?= $row['user_id'] ?>">Sửa</a>
                                        <a class="btn btn-danger" href="delete.php?user_id=<?= $row['user_id'] ?>">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                <?php else : ?>
                    <p class="text-muted">Không có tài khoản nào.</p>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <?php include_once __DIR__ . '/../layouts/js.php'; ?>
</body>

</html>