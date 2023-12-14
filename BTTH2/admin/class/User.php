<?php 
    class User{
        private $id;
        private $first_name;
        private $last_name;
        private $email;
        private $password;
        private $type;
        function __construct($id,$first_name,$last_name,$email,$password,$type) {
            $this->id=$id;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->email = $email;
            $this->password = $password;
            $this->type = $type;
        }
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
            return $id;
        }

        public function getFirst_name(){
            return $this->first_name;
        }
        
        public function setFirst_name($first_name){
            $this->first_name = $first_name;
            return $first_name;
        }

        public function getLast_name(){
            return $this->last_name;
        }
        
        public function setLast_name($last_name){
            $this->last_name = $last_name;
            return $last_name;
        }
        
        
        public function getEmail(){
            return $this->email;
        }
        
        public function setEmail($email){
            $this->email = $email;
            return $email;
        }

        
        public function getPassword(){
            return $this->password;
        }
        
        public function setPassword($password){
            $this->password = $password;
            return $password;
        }

        
        public function getType(){
            return $this->type;
        }
        
        public function setType($type){
            $this->type = $type;
            return $type;
        }

        public function getAllUsers($conn){
            $sql = "SELECT * FROM cms_user";
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