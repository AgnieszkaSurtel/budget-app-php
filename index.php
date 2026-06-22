<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'src/Database.php';
require_once 'src/Controllers/AuthController.php';
require_once 'src/Controllers/IncomeController.php';
require_once 'src/Controllers/ExpenseController.php';
require_once 'src/Models/Income.php';
require_once 'src/Models/Expense.php';
require_once 'src/Models/User.php';

$action = $_GET['action'] ?? 'home';

try {
    match ($action) {
        'home' => (function () {
            $incomes = [];
            $expenses = [];
            if (isset($_SESSION['user_id'])) {
                $incomeModel = new Income();
                $expenseModel = new Expense();
                $incomes = $incomeModel->getAllByUserId($_SESSION['user_id']);
                $expenses = $expenseModel->getAllByUserId($_SESSION['user_id']);
            }
            include 'src/Views/home.php';
        })(),

        'balance' => (function () {
            if (!isset($_SESSION['user_id'])) {
                header("Location: index.php?action=login");
                exit;
            }
            $incomeModel = new Income();
            $expenseModel = new Expense();
            $incomes = $incomeModel->getAllByUserId($_SESSION['user_id']);
            $expenses = $expenseModel->getAllByUserId($_SESSION['user_id']);
            include 'src/Views/balance.php';
        })(),

        'add_income'  => (fn() => include 'src/Views/add_income.php')(),
        'add_expense' => (fn() => include 'src/Views/add_expense.php')(),

        'edit_expense'    => (fn() => (new ExpenseController())->edit())(),
        'edit_income'     => (fn() => (new IncomeController())->edit())(),
        'do_edit_expense' => (fn() => (new ExpenseController())->update())(),
        'do_edit_income'  => (fn() => (new IncomeController())->update())(),

        'login'       => (fn() => include 'src/Views/login.php')(),
        'register'    => (fn() => include 'src/Views/register.php')(),
        'do_register' => (fn() => (new AuthController())->doRegister())(),
        'do_login'    => (fn() => (new AuthController())->doLogin())(),
        'logout'      => (fn() => (new AuthController())->logout())(),
        'save_income' => (fn() => (new IncomeController())->save())(),
        'save_expense' => (fn() => (new ExpenseController())->save())(),

        default => header("Location: index.php?action=home"),
    };
} catch (Exception $e) {
    die("Critical system error: " . $e->getMessage());
}
