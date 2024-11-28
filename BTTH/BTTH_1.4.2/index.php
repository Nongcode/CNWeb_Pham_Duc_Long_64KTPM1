<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Tập Trắc Nghiệm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bài Tập Trắc Nghiệm</h1>
        
        <!-- Form upload file -->
        <form action="index.php" method="POST" enctype="multipart/form-data" class="mb-5">
            <div class="mb-3">
                <label for="file" class="form-label">Chọn file mẫu (định dạng .txt)</label>
                <input class="form-control" type="file" name="file" id="file" accept=".txt" required>
            </div>
            <button type="submit" name="upload_file" class="btn btn-primary">Upload và Lưu vào CSDL</button>
        </form>

        <!-- Form hiển thị câu hỏi -->
        <form method="POST" action="result.php">
            <?php
            // Kết nối CSDL
            $host = '127.0.0.1';
            $username = 'root';
            $password = '';
            $dbname = 'quiz';
            $conn = new mysqli($host, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }

            // Xử lý file upload
            if (isset($_POST['upload_file']) && isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['file']['tmp_name'];
                $fileName = $_FILES['file']['name'];
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

                if ($fileExtension !== 'txt') {
                    die("Chỉ chấp nhận file .txt");
                }

                $fileContent = file($fileTmpPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                $current_question = [];
                foreach ($fileContent as $line) {
                    if (strpos($line, "Câu") === 0) {
                        if (!empty($current_question)) {
                            saveToDatabase($conn, $current_question);
                        }
                        $current_question = [];
                    }
                    $current_question[] = $line;
                }
                if (!empty($current_question)) {
                    saveToDatabase($conn, $current_question);
                }

                echo "<div class='alert alert-success text-center'>Upload và lưu dữ liệu thành công!</div>";
            }

            function saveToDatabase($conn, $questionData)
            {
                // Lấy câu hỏi
                $question = $conn->real_escape_string($questionData[0]);

                // Tách các đáp án và loại bỏ tiền tố "A.", "B.", ...
                $answers = [];
                for ($i = 1; $i <= 4; $i++) {
                    $answers[] = $conn->real_escape_string(trim(substr($questionData[$i], 2))); // Bỏ ký tự đầu tiên và dấu cách
                }

                // Lấy đáp án đúng, chỉ giữ lại ký tự "A", "B", "C", hoặc "D"
                $correctAnswer = $conn->real_escape_string(trim(substr(end($questionData), -1)));

                // Lưu vào bảng questions
                $sql = "INSERT INTO questions (question, answer_a, answer_b, answer_c, answer_d, correct_answer)
                VALUES ('$question', '{$answers[0]}', '{$answers[1]}', '{$answers[2]}', '{$answers[3]}', '$correctAnswer')";

                if (!$conn->query($sql)) {
                    die("Lỗi khi lưu dữ liệu: " . $conn->error);
                }
            }

            // Lấy dữ liệu câu hỏi từ CSDL
            $sql = "SELECT * FROM questions";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $question_number = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='card mb-4'>";
                    echo "<div class='card-header'><strong>{$row['question']}</strong></div>";
                    echo "<div class='card-body'>";
                    foreach (['A', 'B', 'C', 'D'] as $index => $answerLabel) {
                        $answerValue = $row['answer_' . strtolower($answerLabel)];
                        echo "<div class='form-check'>";
                        echo "<input class='form-check-input' type='radio' name='question{$question_number}' value='{$answerLabel}' id='question{$question_number}{$answerLabel}'>";
                        echo "<label class='form-check-label' for='question{$question_number}{$answerLabel}'>{$answerLabel}. {$answerValue}</label>";
                        echo "</div>";
                    }
                    echo "</div>";
                    echo "</div>";
                    $question_number++;
                }
            } else {
                echo "<div class='alert alert-warning text-center'>Chưa có câu hỏi nào trong hệ thống.</div>";
            }
            ?>
            <button type="submit" class="btn btn-primary">Nộp bài</button>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
