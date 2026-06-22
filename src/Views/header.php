<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BudgetApp - Manage Your Finances</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="public/style.css?v=<?= time(); ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php" style="color: #6c5ce7;">
                <i class="fas fa-wallet me-2"></i>BudgetApp
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item"><a class="nav-link" href="index.php?action=add_income">Add Income</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?action=add_expense">Add Expense</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?action=balance">View Balance</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-danger btn-sm ms-lg-3 px-3" href="index.php?action=logout">Logout</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="index.php?action=login">Log in</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-primary btn-sm ms-lg-3 px-3 text-white" href="index.php?action=register" style="background: #6c5ce7; border: none;">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>