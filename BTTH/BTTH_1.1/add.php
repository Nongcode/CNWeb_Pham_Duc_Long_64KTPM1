<?php
require 'connect.php';
// Xử lý khi form được gửi đi 
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    // thực hiện thêm hoa vào cơ sở dữ liệu 
    $stmt = $pdo->prepare("insert into danhsachhoa(name,description,image) values (?, ?, ?)");
    $stmt->execute([$name, $description, $image]);

    //Chuyển hướng về trang chính
    header("Location: admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm loại hoa mới</title>
    <link rel="stylesheet" href="./css/style_edit_delete.css">
</head>
<body>
    <h2>Thêm hoa mới</h2>
    <form method="POST">
        <div class="form-group">
            <label for="name">Tên hoa: </label>
            <input type="text" name="name" id="name" require>
        </div>
        <div class="form-group">
            <label for="description">Thêm mô tả: </label>
            <textarea name="description" id="description" rows="5" require></textarea>
        </div>
        <div class="form-group">
            <label for="image">Thêm link ảnh</label>
            <input type="text" name="image" id="image" require>
        </div>
        <button type="submit">Thêm mới</button>
        <a href="index.php" class="back-btn">Quay lại danh sách hoa</a>
    </form>
</body>
</html>