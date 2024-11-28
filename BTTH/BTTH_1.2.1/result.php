<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Kết Quả Bài Làm</h1>
        <?php
        // Đọc file câu hỏi và đáp án
        $filename = "questions.txt";

        // Đọc file và xử lý
        $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $answers = []; // Tạo mảng lưu các đáp án đúng
        foreach ($questions as $line) {
            // Tìm các dòng chứa đáp án 
            if (strpos($line, "Đáp án:") !== false) {
                // Cắt chuỗi lấy sau dâu ':' làm đáp án đúng
                $answers[] = trim(substr($line, strpos($line, ":") + 1));
            }
        }

        $score = 0; // Khởi tạo số đáp án đúng ban đầu 
        foreach ($_POST as $key => $userAnswer) {
             // lấy câu hỏi từ trên input
            $questionNumber = (int)filter_var($key, FILTER_SANITIZE_NUMBER_INT);
            // Kiểm tra đáp án của người dùng với đáp án đúng
            if (isset($answers[$questionNumber - 1]) && $answers[$questionNumber - 1] === $userAnswer) {
                $score++; // nếu đúng biến score tăng 1 
            }
        }

        // Hiển thị kết quả
        echo "<div class='alert alert-success text-center'>";
        echo "Bạn trả lời đúng <strong>$score</strong>/" . count($answers) . " câu.";
        echo "</div>";
        ?>
        <div class="text-center">
            <a href="index.php" class="btn btn-primary">Làm lại</a>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
