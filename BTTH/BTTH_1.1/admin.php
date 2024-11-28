<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị danh sách hoa</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        padding: 20px;
    }

    .btn {
        display: inline-block;
        padding: 12px 20px;
        font-size: 16px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 20px;
        text-align: center;
        cursor: pointer;
     }

    .btn:hover {
        background-color: #45a049;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,td {
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }

    th {
        background-color: white;
        color: grey;
    }

    td {
        background-color: #f9f9f9;
    }

    img {
        max-width: 80px;
        height: auto;
    }

    a {
        text-decoration: none;
        color: grey;
        margin: 0 10px;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

<body>
    <?php
        // Gọi file kết nối cơ sở dữ liệu
        require 'connect.php';

        // Truy vấn danh sách các loài hoa
        $stmt = $pdo->query("SELECT * FROM danhsachhoa");
        $flowers = $stmt->fetchAll();
    ?>
    <button type="submit"><a href="add.php">Thêm loại hoa mới</a></button>
    <table>
        <thead>
            <tr>
                <th>Tên hoa</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flowers as $index => $flower): ?>
                <tr>
                    <td><?= htmlspecialchars($flower['name']); ?></td>
                    <td><?= htmlspecialchars($flower['description']); ?></td>
                    <td><img src="<?= htmlspecialchars($flower['image']); ?>"
                            alt="<?= htmlspecialchars($flower['name']); ?>"></td>
                    <td>
                        <a href="edit.php?id=<?= $flower['id']; ?>">Sửa</a>
                        <a href="delete.php?id=<?= $flower['id']; ?>"
                            onclick="return confirm ('Bạn có chắc muốn xóa không?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>