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

        <!-- form gửi dữ liệu bằng phương thức POST -->
        <form method="POST" action="result.php">
            <?php
            // Đọc file câu hỏi
            $filename = "questions.txt"; // Đường dẫn đến file câu hỏi

            // Đọc nội dung file thành mảng mỗi dòng tương ứng 1 phần tử 
            $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            
            $current_question = []; // Tạo mảng tạm lưu câu hỏi hiện tại
            $all_questions = []; // Tạo mảng lưu câu hỏi 

            // xử lý dữ liệu từ file
            foreach ($questions as $line) {
                // nếu bắt đầu bằng 'câu' nghãi là 1 câu hỏi mới
                if (strpos($line, "Câu") === 0) {
                    // neesu đã tồn tại câu hỏi trc đó lưu lại vào danh sách tất cả câu hỏi
                    if (!empty($current_question)) {
                        $all_questions[] = $current_question;
                    }
                    $current_question = []; // khởi tạo câu hỏi mới 
                }
                $current_question[] = $line;// Thêm dòng vào câu hỏi hiện tại
            }
            // Thêm câu hỏi cuối cùng vào danh sách
            if (!empty($current_question)) {
                $all_questions[] = $current_question;
            }
            
            // Hiển thị từng câu hỏi
            $question_number = 1; // Đánh số câu hỏi 
            foreach ($all_questions as $question) {
                echo "<div class='card mb-4'>";
                echo "<div class='card-header'><strong>{$question[0]}</strong></div>";
                echo "<div class='card-body'>";
                
                // Hiển thị các đáp án
                for ($i = 1; $i <= 4; $i++) {
                    $answer = substr($question[$i], 0, 1); // Lấy A, B, C, D
                    echo "<div class='form-check'>";
                    echo "<input class='form-check-input' type='radio' name='question{$question_number}' value='{$answer}' id='question{$question_number}{$answer}'>";
                    echo "<label class='form-check-label' for='question{$question_number}{$answer}'>{$question[$i]}</label>";
                    echo "</div>";
                }
                
                echo "</div>";
                echo "</div>";
                $question_number++;
            }
            ?>
            <button type="submit" class="btn btn-primary">Nộp bài</button>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
