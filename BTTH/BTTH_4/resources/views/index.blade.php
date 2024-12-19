<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sự cố máy tính</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Liên kết Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f4f4f9;
        color: #333;
    }
    .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .table-title {
        padding-bottom: 15px;
        background: #435d7d;
        color: #fff;
        padding: 10px 20px;
        border-radius: 8px 8px 0 0;
        margin: -25px -25px 20px;
    }
    .table-title h3 {
        margin: 5px 0 0;
        font-size: 22px;
    }
    .btn {
        border-radius: 20px;
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .table {
        border-collapse: collapse;
        border-spacing: 0;
        margin: 0;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }
    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }
    .modal-content {
        border-radius: 10px;
    }
    .modal-header {
        background-color: #435d7d;
        color: #fff;
        border-bottom: none;
    }
    .modal-footer {
        border-top: none;
    }
    .pagination {
        margin-top: 20px;
    }
    .pagination .page-item .page-link {
        border-radius: 20px;
        color: #435d7d;
    }
    .pagination .page-item.active .page-link {
        background-color: #435d7d;
        border-color: #435d7d;
        color: #fff;
    }
    .row{
        display: flex;
        justify-content: space-between;
    }
 
</style>

</head>
<body>
    <div class="container-xl" style="max-width: none;">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3><strong>Quản lý sự cố máy tính</strong></h3>
                        </div>
                        <div class="rol-sm-6">
                            <a href="{{ route('issues.create') }}" class="btn btn-success"><span>Thêm sự cố</span></a>
                        </div>
                    </div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Mã sự cố</th>
                            <th>Tên máy tính</th>
                            <th>Tên phiên bản</th>
                            <th>Người báo cáo sự cố</th>
                            <th>Thời gian báo cáo sự cố</th>
                            <th>Mức độ sự cố</th>
                            <th>Trạng thái hiện tại</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($issues as $issue)
                            <tr>
                                <td>{{$issue -> id}}</td>
                                <td>{{$issue -> computer -> computer_name}}</td>
                                <td>{{$issue -> computer -> model}}</td>
                                <td>{{$issue -> reported_by }}</td>
                                <td>{{$issue -> reported_date}}</td>
                                <td>{{$issue -> urgency}}</td>
                                <td>{{$issue -> status}}</td>
                                <td>
                                    <a href="{{ route('issues.edit', $issue -> id)}}" class="btn btn-primary">Sửa</a>

                                    <!-- Nút xóa kèm modal xác nhận xóa -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $issue->id }}">
                                        Xóa
                                    </button>
                                    <!-- Modal xác nhận xóa -->
                                    <div class="modal fade" id="deleteModal{{ $issue->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $issue->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $issue->id }}">Xác nhận xóa</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc chắn muốn xóa sự cố này không?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                    <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td> 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- phân trang -->
                <div class="d-flex justify-content-center">
                    {{ $issues -> links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <script>
        // Tooltip cho nút xóa
        $(document).ready(function(){
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>