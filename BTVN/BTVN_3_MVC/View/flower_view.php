<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách các loài hoa</title>
    <link rel="stylesheet" href="Public/css/style.css">
    <style>
        /* Cố định header ở trên cùng */
        .header {
            position: fixed;  /* Đặt header cố định */
            top: 0;            /* Đặt ở phía trên cùng */
            left: 0;
            width: 100%;       /* Chiếm toàn bộ chiều ngang */
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;     /* Đảm bảo header nằm trên các phần tử khác */
            text-align: center;
            box-sizing: border-box;  /* Đảm bảo không ảnh hưởng đến chiều rộng */
        }
        body{
            padding-top: 120px; 
        }
        .header a{
            color: #4CAF50;
            text-decoration: none;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div>
            <h1><strong>14 loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè</strong></h1>
        </div>
        <div>
            <a href="index.php?controller=admin&action=index" class="btn">Quản trị danh sách hoa</a>
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
                <img src="Public/images/cac_loai_hoa.webp" alt="Các loại hoa">
            </div>
            <div class="flower">
                <?php if (!empty($flowers)): ?>
                    <?php foreach ($flowers as $flower): ?>
                        <div class="flower-content">
                            <h4><?= htmlspecialchars($flower['name']); ?></h4>
                            <p><?= htmlspecialchars($flower['description']); ?></p>
                            <img src="Public/<?= htmlspecialchars($flower['image']); ?>" alt="<?= htmlspecialchars($flower['name']); ?>">
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không có hoa nào được tìm thấy.</p>
                <?php endif; ?>
            </div>
        </div> 
    </div>
</body>
</html>
