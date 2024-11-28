<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách các loài hoa</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="header">
        <div>
            <h1><strong>14 loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè</strong></h1>
        </div> 
        <div>
            <p>LÂM NGỌC, <span style="color: black;">00:00 09/03/2016</span></p>
        </div>      
    </div>
    <div class="main">
        <div class="main-content">
            <h4><strong>Hãy nhanh chóng ghi vào sổ tay của bạn 14 loại hoa tuyệt đẹp để có
                kế hoạch trồng chúng trong dịp xuân hè này nhé!
            </strong></h4>
            <ul>
                <li><a href="#">Cách trồng hoa thạch lan đẹp lạ để trang trí bàn làm việc</a></li>
                <li><a href="#">9 loại hoa trồng trong chậu đẹp ngất ngây cho mùa xuân</a></li>
                <li><a href="#">Sân vườn cực đẹp với 5 loại hoa hồng ngoại dễ trồng</a></li>
            </ul>
            <div>
                <p>Mỗi loại hoa sẽ khoe sắc rực rỡ vào đúng thời điểm thích hợp trong năm, khí hậu đáp ứng thuận lợi sẽ giúp hoa phát triển nhanh và đẹp một cách hoàn hảo. Nếu đang có kế hoạch trồng hoa trong dịp xuân - hè thì bạn hãy tham khảo bài viết dưới đây nhé!</p>
                <img src="images/cac_loai_hoa.webp" alt="Các loại hoa">
            </div>
            <div class="flower">
                <?php
                // Gọi file connect.php để sử dụng kết nối PDO
                require 'connect.php';

                // Truy vấn dữ liệu từ bảng danhsachhoa
                $stmt = $pdo->query("SELECT name, description, image FROM danhsachhoa");

                // Duyệt qua từng dòng dữ liệu và hiển thị
                while ($flower = $stmt->fetch()) {
                    echo '<div class="flower-content">';
                    echo '<h4>' . htmlspecialchars($flower['name']) . '</h4>';
                    echo '<h5>' . htmlspecialchars($flower['description']) . '</h5>';
                    echo '<img src="' . htmlspecialchars($flower['image']) . '" alt="' . htmlspecialchars($flower['name']) . '">';
                    echo '</div>';
                }
                ?>
        </div> 
    </div>
</body>
</html>