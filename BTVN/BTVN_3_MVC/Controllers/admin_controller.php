<?php
require_once 'Models/flower_model.php'; // Đảm bảo file được nạp đúng

class AdminController {
    public function index() {
        $flowerModel = new flower_model(); // Sử dụng đúng tên class
        $flowers = $flowerModel->getAllFlowers();
        require 'View/admin.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $flowerModel = new flower_model();
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], 'Public/' . $image);
            $flowerModel->addFlower($name, $description, $image);
            header("Location: index.php?controller=admin&action=index");
            exit();
        }
        require 'View/form.php';
    }

    public function edit($id) {
        $flowerModel = new flower_model();
        $flower = $flowerModel->getFlowerById($id);
    
        if (!$flower) {
            echo "Không tìm thấy hoa với ID: $id";
            exit();
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = $_FILES['image']['name'];
            if ($image) {
                move_uploaded_file($_FILES['image']['tmp_name'], 'Public/images/' . $image);
            } else {
                $image = $flower['image'];
            }
            $flowerModel->updateFlower($name, $description, $image, $id);
            header("Location: index.php?controller=admin&action=index");
            exit();
        }
    
        require 'View/form.php';
    }
    

    public function delete($id) {
        $flowerModel = new flower_model();
        $flowerModel->deleteFlower($id);
        header("Location: index.php?controller=admin&action=index");
        exit();
    }
}
