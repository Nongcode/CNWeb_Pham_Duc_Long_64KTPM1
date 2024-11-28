<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<title>Document</title>
	<style>
		body{
			font-family: Arial, Helvetica, sans-serif;
			margin: 0;
			padding: 0;
			background-color: whitesmoke;
			overflow: hidden;
		}
		.add-btn{
			background-color: #28a745;
			color: white;
			border: none;
			padding: 10px 20px;
			cursor: pointer;
			margin-bottom: 10px;
		}
		table{
			width: 100%;
			border-collapse: collapse;
			margin-top: 10px
		}
		table th, table td{
			border: 1px solid #ddd;
			padding: 8px;
			text-align: center;
		}
		table th{
			background-color: white;
		}
		.edit-icon, .delete-icon{
			cursor: pointer;
			color: #007bff;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<?php
		include 'header.php';
	
	?>

	<main>

		<div class="main">
			<button type="submit" class="add-btn">Thêm mới</button>
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
						$products = array(
							['id' => 1, 'name' => 'Sản phẩm 1', 'price' => '10000'],
							['id' => 2, 'name' => 'Sản phẩm 2', 'price' => '20000'],
							['id' => 3, 'name' => 'Sản phẩm 3', 'price' => '30000'],
						);
						foreach($products as $product): 	
					?>
					
					<tr>
						<td><?= $product['name']?></td>
						<td><?= $product['price']?></td>
						<td><a href="#"><i class="bi bi-pencil-square"></i></a></td>
						<td><a href="#"><i class="bi bi-trash3-fill"></i></a></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</main>
	<?php include 'footer.php' ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>