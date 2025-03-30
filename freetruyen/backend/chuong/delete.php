<?php
$chuong_id = $_GET['chuong_id'];
include_once __DIR__. '/../../dbconnect.php';

$sqlDelete = "DELETE FROM chuong WHERE chuong_id = $chuong_id";

mysqli_query($conn, $sqlDelete);

echo '<script>location.href ="index.php";</script>';
?>
