<?php
    require 'connect.php';

    // lấy thông tin hoa
    $id = $_GET['id'];
    $stmt = $pdo -> prepare('select * from danhsachhoa where id = ?');
    $stmt -> execute([$id]);
    $flower = $stmt -> fetch();

    if(!$flower){
        echo "Hoa không tồn tại";
        exit();
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_POST['image'];

        $stmt = $pdo -> prepare('update danhsachhoa set name = ?, description = ?, image = ? where id = ?');
        $stmt -> execute([$name, $description, $image, $id]);

        header("Location: admin.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa hoa</title>
    <link rel="stylesheet" href="./css/style_edit_delete.css">
</head>
<body>
    <h2>Sửa thông tin hoa</h2>
    <form method="POST">
        <div class="form-group">
            <label for="name">Tên hoa</label>
            <input type="text" name="name" id="name" value="<?= htmlspecialchars($flower['name']); ?> " require>
        </div>
        <div class="form-group">
            <label for="description">Mô tả hoa</label>
            <textarea name="description" id="description" rows="5" require><?= htmlspecialchars($flower['description']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="image">Thêm link ảnh hoa</label>
            <input type="text" name="image" id="image" value="<?= htmlspecialchars($flower['image']); ?>">
        </div>
        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>