<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .content {
            display: flex;
            text-align: center;
            justify-items: center;
            margin-left: 150px;
            margin-right: 150px;
        }
        .content a {
            text-decoration: none;
            color: black;
        }
        .content a:hover {
            color: black;
            font-weight: bold;
        }
        .options li{
            padding: 10px;
            
        }
        .options{
            display: flex;
            list-style: none;
        }
    </style>
</head>
<body>
    <header class="header-content" style="margin: 100px;">
        <?php 
        $current_page = basename($_SERVER['PHP_SELF']);
        ?>
        <nav>
            <div class="content">
                <a href="#"><h3><strong>Administration</strong></h3></a>
                <ul class="options">
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Trang ngoài</a></li>
                    <li><a href="#">Thể loại</a></li>
                    <li><a href="#">Tác giả</a></li>
                    <li><a href="#">Bài viết</a></li>
                </ul>
            </div>
        </nav>
    </header>
</body>
</html>
