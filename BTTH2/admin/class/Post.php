<?php
class Post
{
        private $conn;

        public function __construct($db)
        {
                $this->conn = $db;
        }
        
        public function getTotalPosts()
        {
                try {
                        $sql = "SELECT COUNT(*) FROM cms_posts";
                        $stmt = $this->conn->prepare($sql);
                        $stmt->execute();
                        $data = $stmt->fetchAll();
                        return $data;
                } catch (PDOException $e) {
                        echo "Failed: " . $e->getMessage();
                }
        }

        public function getPostByPage($page)
        {
                $offset = ($page - 1) * 5;
                try {
                        $sql = "SELECT * FROM cms_posts ORDER BY id DESC LIMIT 5 OFFSET $offset";
                        $stmt = $this->conn->prepare($sql);
                        $stmt->execute();
                        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        return $data;
                } catch (PDOException $e) {
                        echo "Failed: " . $e->getMessage();
                }
        }

        public function getPostById($id) {
                try {
                        $sql = "SELECT * FROM cms_posts WHERE id = :id";
                        $stmt = $this->conn->prepare($sql);
                        $stmt->bindParam(':id', $id);
                        $stmt->execute();
                        $data = $stmt->fetch(PDO::FETCH_ASSOC);
                        return $data;
                } catch (PDOException $e) {
                        echo "Failed: " . $e->getMessage();
                }
        }

        public function editPost($id, $title, $message, $category_id, $userid, $status) {
                try {
                        $sql = "UPDATE cms_posts SET title = :title, message = :message, category_id = :category_id, userid = :userid, status = :status WHERE id = :id";
                        $stmt = $this->conn->prepare($sql);
                        $stmt->bindParam(':id', $id);
                        $stmt->bindParam(':title', $title);
                        $stmt->bindParam(':message', $message);
                        $stmt->bindParam(':category_id', $category_id);
                        $stmt->bindParam(':userid', $userid);
                        $stmt->bindParam(':status', $status);
                        $stmt->bindParam(':id', $_POST['id']);
                        $stmt->execute();
                        if($stmt){
                                return 'success';
                        }else{
                                return 'failed';
                        }
                } catch (PDOException $e) {
                        echo "Failed: " . $e->getMessage();
                        return false;
                }
        }

        public function addPost($title, $message, $category_id, $userid, $status)
        {
                try {
                        $sql = "INSERT INTO cms_posts (title, message, category_id, userid, status) VALUES (:title, :message, :category_id, :userid, :status)";
                        $stmt = $this->conn->prepare($sql);
                        $stmt->bindParam(':title', $title);
                        $stmt->bindParam(':message', $message);
                        $stmt->bindParam(':category_id', $category_id);
                        $stmt->bindParam(':userid', $userid);
                        $stmt->bindParam(':status', $status);
                        $stmt->execute();
                        if($stmt){
                                return 'success';
                        }else{
                                return 'failed';
                        }
                } catch (PDOException $e) {
                        echo "Failed: " . $e->getMessage();
                        return false;
                }
        }

        public function deletePost($id) {
                try {
                        $sql = "DELETE FROM cms_posts WHERE id = $id";
                        $stmt = $this->conn->prepare($sql);
                        $stmt->execute();
                        if($stmt){
                                return 'success';
                        }else{
                                return 'failed';
                        }
                } catch (PDOException $e) {
                        echo "Failed: " . $e->getMessage();
                        return false;
                }
        }

        /**
         * Get the value of conn
         */ 
        public function getConn()
        {
                return $this->conn;
        }

        /**
         * Set the value of conn
         *
         * @return  self
         */ 
        public function setConn($conn)
        {
                $this->conn = $conn;

                return $this;
        }
}
