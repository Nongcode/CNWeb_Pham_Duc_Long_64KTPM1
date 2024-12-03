<?php
    class flower_model{
        private $db;

        public function __construct() {
            $this->db = $this->connect();
        }

        function connect(){
            $host = '127.0.0.1';        
            $db = 'qlhoa';         
            $user = 'root';      
            $pass = '';         
            $charset = 'utf8mb4';      

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset"; 
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,       
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
                PDO::ATTR_EMULATE_PREPARES => false,              
            ];

            try {
                $pdo = new PDO($dsn, $user, $pass, $options);   
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
            return $pdo;
        }
        
        public function getFlowerById($id) {
            $stmt = $this->db->prepare("SELECT * FROM danhsachhoa WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }        

        public function getAllFlowers(): mixed{
            $rs = $this -> db -> query("select * from danhsachhoa");
            return  $rs -> fetchAll(PDO::FETCH_ASSOC);
        }

        public function addFlower($name, $description, $image): void{
            $stmt = $this -> db -> prepare("insert into danhsachhoa(name,description,image) values (?, ?, ?)");
            $stmt ->execute ([$name, $description, $image]);
        }

        public function updateFlower($name, $description, $image, $id): void{
            $stmt = $this -> db -> prepare('update danhsachhoa set name = ?, description = ?, image = ? where id = ?');
            $stmt -> execute([$name, $description, $image, $id]);
        }

        public function deleteFlower($id): void{
            $stmt = $this -> db-> prepare("delete from danhsachhoa where id = ?");
            $stmt->execute([$id]);
        }
    }