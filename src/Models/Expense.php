<?php
require_once 'src/Database.php';

class Expense
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    public function getById($id, $userId)
    {
        $sql = "SELECT * FROM expenses WHERE id = :id AND user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id, ':user_id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add($userId, $amount, $date, $categoryId, $paymentId, $comment)
    {
        $sql = "INSERT INTO expenses (user_id, amount, date, category_id, payment_method_id, comment) 
                VALUES (:user_id, :amount, :date, :category_id, :payment_id, :comment)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':user_id' => $userId,
            ':amount' => $amount,
            ':date' => $date,
            ':category_id' => $categoryId,
            ':payment_id' => $paymentId,
            ':comment' => $comment
        ]);
    }

    public function update($id, $userId, $amount, $date, $categoryId, $paymentId, $comment)
    {
        $sql = "UPDATE expenses SET amount = :amount, date = :date, category_id = :category_id, 
                payment_method_id = :payment_id, comment = :comment 
                WHERE id = :id AND user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':user_id' => $userId,
            ':amount' => $amount,
            ':date' => $date,
            ':category_id' => $categoryId,
            ':payment_id' => $paymentId,
            ':comment' => $comment
        ]);
    }

    public function getAllByUserId($userId)
    {
        $sql = "SELECT e.*, c.name AS category_name FROM expenses e 
                INNER JOIN expense_categories c ON e.category_id = c.id 
                WHERE e.user_id = :user_id ORDER BY e.date DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
