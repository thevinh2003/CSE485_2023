<?php
class User
{
    public function getAllUsers($conn)
    {
        $sql = "SELECT COUNT(*) FROM cms_user";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;
    }
    public function getUserByPage($conn, $page)
    {
        $offset = ($page - 1) * 5;
        try {
            $sql = "SELECT id, first_name, last_name, email, type FROM cms_user ORDER BY id DESC LIMIT 5 OFFSET $offset";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo "Failed: " . $e->getMessage();
        }
    }
    public function addUser($conn, $firstName, $lastName, $email, $password, $type)
    {
        $sql = "INSERT INTO cms_user (first_name, last_name, email, password, type) VALUES (:first_name, :last_name, :email, :password, :type)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':type', $type);
        $stmt->execute();
        if ($stmt) {
            return 'success';
        } else {
            return 'failed';
        }
    }
    public function getUserById($conn, $id)
    {
        $sql = "SELECT * FROM cms_user WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function editUser($conn, $id, $firstName, $lastName, $email, $type)
    {
        $sql = "UPDATE cms_user SET first_name = :first_name, last_name = :last_name, email = :email, type = :type WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt) {
            return 'success';
        } else {
            return 'failed';
        }
    }

    public function deleteUser($conn, $id)
    {
        $sql = "DELETE FROM cms_user WHERE id = :id";
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
