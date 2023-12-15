<?php 
class Category{
        private $id;
        private $name;
        function __construct($id,$name) {
            $this->id=$id;
            $this->name = $name;
        }
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
            return $id;
        }

        public function setName($name){
            $this->name = $name;
            return $name;
        }

        public function getName(){
            return $this->name;
        }
        public function getAllCategorys($conn){
            $sql = "SELECT * FROM cms_category";
            try{
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $data = $stmt->fetchAll();
            }catch(PDOException $e){
                echo $e;
            }
        }
    }
?>