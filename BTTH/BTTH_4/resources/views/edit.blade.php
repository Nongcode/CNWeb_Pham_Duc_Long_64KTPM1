<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sự cố mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: grid;
            justify-content: center;
            align-items: center;
            height: 50vh;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300%;
            max-width: 500px;
        }

        .content {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    
    <div>
        <h2>Cập nhật sự cố</h2>
    </div>
    <form action="{{ route('issues.update', $issue -> id) }}" method="POST" >
        @csrf
        @method('PUT')
        <div class="content">
            <label for="computer_id" class="form-label">Tên máy tính</label>
            <select name="computer_id" id="computer_name" class="form-control" required>
                @foreach($computers as $computer)
                    <option value="{{ $computer -> id}}" {{ $computer -> id == $issue -> computer_id ? 'select': '' }}>{{ $computer -> computer_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="content">
            <label for="computer_id" class="form-label">Tên phiên bản</label>
            <select name="computer_id" id="computer_model" class="form-control" required>
                @foreach($computers as $computer)
                    <option value="{{ $computer -> id}}" {{ $computer -> id == $issue -> computer_id ? 'select': '' }}>{{ $computer -> model }}</option>
                @endforeach
            </select>
        </div>
        <div class="content">
            <label for="reported_by" class="form-label">Người báo cáo sự cố</label>
            <input type="text" name="reported_by" class="form-control" value="{{ $issue -> reported_by }}" required>
        </div>
        <div class="content">
            <label for="reported_date" class="form-label">Thời gian báo cáo sự cố</label>
            <input type="date" class="form-control" name="reported_date" value="{{ $issue -> reported_date }}" required>
        </div>
        <div class="content">
            <label for="urgency" class="form-label">Mức độ sự cố</label>
            <select class="form-control" id="urgency" name="urgency" value="{{ $issue -> urgency }}" required>
                <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>High</option>
            </select>
        </div>
        <div class="content">
            <label for="status" class="form-label">Mức độ sự cố</label>
            <select class="form-control" id="status" name="status" value="{{ $issue -> status }}" required>
                <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
                <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</body>
</html>