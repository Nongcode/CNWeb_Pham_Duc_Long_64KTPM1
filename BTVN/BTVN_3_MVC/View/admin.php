<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị danh sách hoa</title>
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
            border-radius: 5px;
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

        th,
        td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
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
            color: black;
            margin: 0 10px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Nút điều hướng về thêm loại hoa mới -->
    <div style="display:flex; justify-content: space-between;">
        <button class="btn">
            <a href="index.php?controller=admin&action=create" style="color: white;">Thêm loại hoa mới</a>
        </button>
        <button class="btn">
            <a href="index.php?controller=flower&action=showFlower" class="btn">Xem danh sách hoa</a>
        </button>
    </div>

    <!-- Bảng hiển thị danh sách hoa -->
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
            <?php if (!empty($flowers)): ?>
                <?php foreach ($flowers as $flower): ?>
                    <tr>
                        <td><?= htmlspecialchars($flower['name']); ?></td>
                        <td><?= htmlspecialchars($flower['description']); ?></td>
                        <td>
                            <img src="Public/<?= htmlspecialchars($flower['image']); ?>" alt="<?= htmlspecialchars($flower['name']); ?>">
                        </td>
                        <td>
                            <a href="index.php?controller=admin&action=edit&id=<?= $flower['id']; ?>">Sửa</a>
                            <a href="index.php?controller=admin&action=delete&id=<?= $flower['id']; ?>" 
                                onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Không có loại hoa nào được tìm thấy.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>
