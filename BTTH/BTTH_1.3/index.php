<?php
// đường dẫn tới file CSV
$filename = "dssinhvien.csv";

// mảng chứa dữ liệu sinh viên
$sinhvien = [];

// các tiêu đề cột 
$headers = ['ID', 'Mã lớp học', 'Họ và tên', 'Giới tính', 'Lớp', 'Email sinh viên', 'Mã môn học'];

// mở file CSV
if (($handle = fopen($filename, "r")) !== FALSE) {
    // đọc từng dòng dữ liệu
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        // kết hợp dữ liệu với tiêu đề cột thành mảng liên kết
        if (count($data) === count($headers)) {
            $sinhvien[] = array_combine($headers, $data);
        }
    }

    fclose($handle);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách sinh viên</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Mã lớp học</th>
                    <th>Họ và tên</th>
                    <th>Giới tính</th>
                    <th>Lớp</th>
                    <th>Email sinh viên</th>
                    <th>Mã môn học</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Hiển thị từng sinh viên
                foreach ($sinhvien as $sv) {
                    echo "<tr>";
                    echo "<td>{$sv['ID']}</td>";
                    echo "<td>{$sv['Mã lớp học']}</td>";
                    echo "<td>{$sv['Họ và tên']}</td>";
                    echo "<td>{$sv['Giới tính']}</td>";
                    echo "<td>{$sv['Lớp']}</td>";
                    echo "<td>{$sv['Email sinh viên']}</td>";
                    echo "<td>{$sv['Mã môn học']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
