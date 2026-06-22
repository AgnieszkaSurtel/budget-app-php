<?php

require_once 'src/Models/Income.php';

class IncomeController {
    

    public function edit() {
    if (session_status() === PHP_SESSION_NONE) session_start();
    $id = $_GET['id'] ?? null;
    $incomeModel = new Income();
    $income = $incomeModel->getById($id, $_SESSION['user_id']);

    if (!$income) die("Nie znaleziono przychodu.");

    include 'src/Views/edit_income.php';
}

public function update() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $incomeModel = new Income();
        
        $categoryMap = ['Salary' => 1, 'Bank Interest' => 2, 'Sales' => 3, 'Gift' => 4];
        $categoryId = $categoryMap[$_POST['category']] ?? 1;

        $incomeModel->update($_POST['id'], $_SESSION['user_id'], $_POST['amount'], $_POST['date'], $categoryId, $_POST['comment']);
        
        header("Location: index.php?action=balance&success=updated");
        exit;
    }
}
    public function save() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() === PHP_SESSION_NONE) { session_start(); }

            $userId = $_SESSION['user_id'];
            $amount = $_POST['amount'] ?? 0;
            $date = $_POST['date'] ?? date('Y-m-d');
            $categoryName = $_POST['category'] ?? 'Others';
            $comment = $_POST['comment'] ?? '';

            $incomeModel = new Income();
            $categoryMap = [
                'Salary'        => 1,
                'Bank Interest' => 2,
                'Sales'         => 3,
                'Gift'          => 4
            ];
            
            $categoryId = $categoryMap[$categoryName] ?? 1;

            if ($incomeModel->add($userId, $amount, $date, $categoryId, $comment)) {
                header("Location: index.php?action=home&success=income_added");
                exit;
            } else {
                echo "Error while adding income.";
            }
        }
    }

    public function showAddForm() {
        include 'src/Views/add_income.php';
    }
}