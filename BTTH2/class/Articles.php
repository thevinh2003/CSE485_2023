<?php 
    class Article {
        public function getListArticle($conn, $limit) {
            $offset = $limit - 5;
            $sql = "SELECT cms_posts.id, cms_posts.title, cms_posts.message, cms_category.name as cateName , cms_posts.created
                    FROM cms_posts INNER JOIN cms_category ON cms_posts.category_id = cms_category.id 
                    WHERE cms_posts.status = 'published' ORDER by cms_posts.id DESC LIMIT 5 OFFSET $offset";
            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
        public function getDetailArticle($conn, $aid) {
            $sql = "SELECT cms_posts.*, cms_category.name as cateName FROM cms_posts 
                    INNER JOIN cms_category ON cms_posts.category_id = cms_category.id WHERE cms_posts.id = :aid";
            try {
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':aid', $aid, PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>