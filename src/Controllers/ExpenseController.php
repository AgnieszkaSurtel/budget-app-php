<?php
require_once 'src/Models/Expense.php';
class ExpenseController
{
    public function edit()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $id = $_GET['id'] ?? null;
        $expenseModel = new Expense();
        $expense = $expenseModel->getById($id, $_SESSION['user_id']);

        if (!$expense) {
            header("Location: index.php?action=balance");
            exit;
        }
        include 'src/Views/edit_expense.php';
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() === PHP_SESSION_NONE) session_start();

            $expenseModel = new Expense();
            $categoryMap = ['Food' => 5, 'Fees' => 8, 'Housing' => 10, 'Transport' => 6, 'Entertainment' => 9, 'Other Expenses' => 11];
            $categoryId = $categoryMap[$_POST['category']] ?? 10;
            $paymentMethodId = ($_POST['payment'] === 'Debit Card') ? 2 : 1;

            $expenseModel->update(
                $_POST['id'],
                $_SESSION['user_id'],
                $_POST['amount'],
                $_POST['date'],
                $categoryId,
                $paymentMethodId,
                $_POST['comment']
            );
            header("Location: index.php?action=balance&success=updated");
            exit;
        }
    }
    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $userId = $_SESSION['user_id'];
            $amount = $_POST['amount'] ?? 0;
            $date = $_POST['date'] ?? date('Y-m-d');
            $categoryName = $_POST['category'] ?? 'Other Expenses';
            $comment = $_POST['comment'] ?? '';
            $paymentName = $_POST['payment'] ?? 'Cash';

            $expenseModel = new Expense();
            $categoryMap = [
                'Food' => 5,
                'Fees' => 8,
                'Housing' => 11,
                'Transport' => 6,
                'Entertainment' => 9,
                'Other Expenses' => 10
            ];
            $categoryId = $categoryMap[$categoryName] ?? 10;
            $paymentMethodId = ($paymentName === 'Debit Card') ? 2 : 1;

            if ($expenseModel->add($userId, $amount, $date, $categoryId, $paymentMethodId, $comment)) {
                header("Location: index.php?action=home&success=expense_added");
                exit;
            } else {
                echo "Error while adding expense.";
            }
        }
    }
}
