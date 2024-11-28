<?php
require 'connect.php';

// lấy id hoa
$id = $_GET['id'];

// xóa khỏi csdl
$stmt = $pdo->prepare("delete from danhsachhoa where id = ?");
$stmt->execute([$id]);

// Chuyển hướng về trang chính 

header("Location: admin.php");
exit();
?>