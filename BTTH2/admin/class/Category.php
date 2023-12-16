<?php
class Category
{
    public function getAllCategories($conn)
    {
        $sql = "SELECT COUNT(*) FROM cms_category";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;
    }
    public function getCategoryByPage($conn, $page)
    {
        $offset = ($page - 1) * 5;
        try {
            $sql = "SELECT id,name FROM cms_category ORDER BY id DESC LIMIT 5 OFFSET $offset";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo "Failed: " . $e->getMessage();
        }
    }
    public function addCategory($conn, $name)
    {
        $sql = "INSERT INTO cms_category (name) VALUES (:name)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        if ($stmt) {
            return 'success';
        } else {
            return 'failed';
        }
    }
    public function getCategoryById($conn, $id)
    {
        $sql = "SELECT * FROM cms_category WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function editCategory($conn, $id, $name)
    {
        $sql = "UPDATE cms_category SET name = :name WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt) {
            return 'success';
        } else {
            return 'failed';
        }
    }

    public function deleteCategory($conn, $id)
    {
        $sql = "DELETE FROM cms_category WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt) {
            return 'success';
        } else {
            return 'failed';
        }
    }
}
