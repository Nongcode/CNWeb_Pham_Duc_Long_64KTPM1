<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Quản lý sản phẩm</title>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
        background-color: whitesmoke;
        overflow: hidden;
    }

    .add-btn {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    table th {
        background-color: white;
    }

    .edit-icon,
    .delete-icon {
        cursor: pointer;
        color: #007bff;
        text-decoration: none;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        max-width: 500px;
        width: 100%;
        text-align: center;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
    }

    .editbtn,
    .delellbtn {
        all: unset;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <?php
		include 'header.php';
		include 'process.php';
	?>

    <main>

        <div class="main">
            <button id="btnAddProduct" class="add-btn">Thêm mới</button>
            <div id="addModal" class="modal">
                <div class="modal-content">
                    <h3>Thêm sản phẩm</h3>
                    <span class="close" data-close-modal="addModal">Đóng</span>
                    <form method="POST">
                        <input type="hidden" name="action" value="add">
                        <input type="text" name="name" placeholder="Tên sản phẩm mới" require>
                        <input type="text" name="price" placeholder="Giá tiền sản phẩm" require>
                        <button type="submit">Thêm sản phẩm</button>
                    </form>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá thành</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					   if (session_status() == PHP_SESSION_NONE) {
						session_start();
					}
					   $_SESSION['products'] = array(
							['id' => 1, 'name' => 'Sản phẩm 1', 'price' => '10000'],
							['id' => 2, 'name' => 'Sản phẩm 2', 'price' => '20000'],
							['id' => 3, 'name' => 'Sản phẩm 3', 'price' => '30000'],
						);
						?>
                    <?php 
						foreach($products as $product): 	
					?>

                    <tr>
                        <td><?= $product['name']?></td>
                        <td><?= $product['price']?></td>
                        <td><button class="editbtn" data-id="<?= $product['id']?>" data-name="<?= $product['name']?>"
                                data-price="<?= $product['price']?>"><i class="bi bi-pencil-square"></i></button></td>
                        <td><button class="deletebtn" data-id="<?= $product['id']?>"><i
                                    class="bi bi-trash3-fill"></i></button></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div id="btnSua" class="modal">
            <div class="modal-content">
                <span class="close" data-close-modal="btnSua">Đóng</span>
                <h3>Sửa sản phẩm</h3>
                <form method="POST" id="SuaForm">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" id="SuaID">
                    <input type="text" name="name" id="SuaName" require>
                    <input type="text" name="price" id="SuaPrice" require>
                    <button type="submit">Cập nhật</button>
                </form>
            </div>
        </div>
        <div id="btnXoa" class="modal">
            <div class="modal-content">
                <span class="close" data-close-modal="btnXoa">Đóng</span>
                <h3>Xóa sản phẩm</h3>
                <form method="POST" id="XoaForm">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" id="XoaID">
                    <p>Bạn có chắc muốn xóa sản phẩm này không</p>
                    <button type="submit">Xóa</button>
                </form>
            </div>
        </div>
    </main>
    <?php include 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>