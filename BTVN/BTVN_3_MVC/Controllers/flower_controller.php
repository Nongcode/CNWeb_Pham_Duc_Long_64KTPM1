<?php
    include 'Models/flower_model.php';
    class flower_controllers{
        private $flowerMo;

        public function __construct()
        {
            $this -> flowerMo = new flower_model(); // kết nối với model 
        }

        // Hiển thị dữ liệu từ model
        public function showFlower(): void{ 
            $flowers = $this -> flowerMo -> getAllFlowers();
            include 'View/flower_view.php';
        }
    }