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
        // Kết nối CSDL
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'quiz';
        $conn = new mysqli($host, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        // Lấy đáp án từ CSDL
        $sql = "SELECT correct_answer FROM questions";
        $result = $conn->query($sql);

        $answers = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $answers[] = $row['correct_answer'];
            }
        }

        // Tính điểm
        $score = 0;
        foreach ($_POST as $key => $userAnswer) {
            $questionNumber = (int)filter_var($key, FILTER_SANITIZE_NUMBER_INT);
            if (isset($answers[$questionNumber - 1]) && $answers[$questionNumber - 1] === $userAnswer) {
                $score++;
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
