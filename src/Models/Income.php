<?php
require_once 'src/Database.php';

class Income {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getById($id, $userId) {
        $sql = "SELECT * FROM incomes WHERE id = :id AND user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id, ':user_id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add($userId, $amount, $date, $categoryId, $comment) {
        $sql = "INSERT INTO incomes (user_id, amount, date, category_id, comment) 
                VALUES (:user_id, :amount, :date, :category_id, :comment)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':user_id' => $userId, 
            ':amount' => $amount, 
            ':date' => $date, 
            ':category_id' => $categoryId, 
            ':comment' => $comment
        ]);
    }

    public function update($id, $userId, $amount, $date, $categoryId, $comment) {
        $sql = "UPDATE incomes SET amount = :amount, date = :date, category_id = :category_id, comment = :comment 
                WHERE id = :id AND user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id, 
            ':user_id' => $userId, 
            ':amount' => $amount, 
            ':date' => $date, 
            ':category_id' => $categoryId, 
            ':comment' => $comment
        ]);
    }

    public function getAllByUserId($userId) {
        $sql = "SELECT i.*, c.name AS category_name FROM incomes i 
                INNER JOIN income_categories c ON i.category_id = c.id 
                WHERE i.user_id = :user_id ORDER BY i.date DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}