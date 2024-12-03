<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="Public/css/style_edit_delete.css">
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Tên hoa:</label>
        <input type="text" name="name" id="name" value="<?php echo isset($flower) ? htmlspecialchars($flower['name']) : ''; ?>" required>

        <label for="description">Mô tả:</label>
        <textarea name="description" id="description" required><?php echo isset($flower) ? htmlspecialchars($flower['description']) : ''; ?></textarea>

        <label for="image">Hình ảnh:</label>
        <input type="file" name="image" id="image">
    
        <?php if (isset($flower)): ?>
            <!-- Hiển thị hình ảnh cũ nếu có -->
            <div>
                <p><strong>Hình ảnh hiện tại:</strong></p>
                <img src="Public/<?php echo htmlspecialchars($flower['image']); ?>" alt="<?php echo htmlspecialchars($flower['name']); ?>" style="max-width: 150px;">
            </div>
        <?php endif; ?>
        <button type="submit">Lưu</button>
    </form>
</body>
</html>
