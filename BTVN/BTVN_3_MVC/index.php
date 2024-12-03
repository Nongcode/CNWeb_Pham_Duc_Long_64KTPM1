<?php
// Bao gồm các controller
require_once 'Controllers/flower_controller.php';
require_once 'Controllers/admin_controller.php';

// Lấy controller và action từ URL, nếu không có thì mặc định là 'flower' và 'showFlower'
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'flower';
$action = isset($_GET['action']) ? $_GET['action'] : 'showFlower';

// Xử lý logic cho từng controller và action
switch ($controller) {
    case 'flower':
        // Tạo đối tượng FlowerController
        $flowerController = new flower_controllers();
        // Kiểm tra action để gọi phương thức tương ứng
        if ($action == 'showFlower') {
            $flowerController->showFlower(); // Hiển thị danh sách hoa
        } else {
            echo "Action không hợp lệ!";
        }
        break;

    case 'admin':
        // Tạo đối tượng AdminController
        $adminController = new AdminController();
        // Kiểm tra action để gọi phương thức tương ứng
        if ($action == 'index') {
            $adminController->index(); // Hiển thị trang quản lý hoa
        } elseif ($action == 'create') {
            $adminController->create(); // Tạo hoa mới
        } elseif ($action == 'edit') {
            if (isset($_GET['id'])) {
                $adminController->edit($_GET['id']); // Sửa thông tin hoa
            } else {
                echo "ID không hợp lệ!";
            }
        } elseif ($action == 'delete') {
            if (isset($_GET['id'])) {
                $adminController->delete($_GET['id']); // Xóa hoa
            } else {
                echo "ID không hợp lệ!";
            }
        } else {
            echo "Action không hợp lệ!";
        }
        break;

    default:
        echo "Controller không hợp lệ!";
        break;
}
?>
