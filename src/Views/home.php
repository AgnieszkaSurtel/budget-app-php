<?php include 'header.php'; ?>
<div class="container mt-5 text-center">
    <div class="bg-light py-5 mb-5 border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold text-dark mb-3">Take Control of Your Finances</h1>
                    <p class="lead text-muted mb-4">
                        An intuitive tool to track your income, expenses and balance in real-time.
                        Start making smarter financial decisions today.</p>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="img-container"><img class="cash money" src="pictures/money.jpg" alt="money in yellow background" /></div>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['user_id']) && isset($incomes) && isset($expenses)): ?>
        <?php
        $totalIncomes = array_sum(array_column($incomes, 'amount'));
        $totalExpenses = array_sum(array_column($expenses, 'amount'));
        $totalBalance = $totalIncomes - $totalExpenses;
        ?>

        <div class="row mt-4">
            <div class="col-md-4">
                <h4>Total Income</h4>
                <p class="h3 text-success"><?= number_format($totalIncomes, 2) ?> DKK</p>
            </div>
            <div class="col-md-4">
                <h4>Total Expenses</h4>
                <p class="h3 text-danger"><?= number_format($totalExpenses, 2) ?> DKK</p>
            </div>
            <div class="col-md-4">
                <h4>Balance</h4>
                <p class="h3 <?= $totalBalance >= 0 ? 'text-success' : 'text-danger' ?>">
                    <?= number_format($totalBalance, 2) ?> DKK
                </p>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <h4>Expense Structure</h4>
                <canvas id="expensesChart"></canvas>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const rawData = <?php
                            $grouped = [];
                            if (isset($expenses)) {
                                foreach ($expenses as $e) {
                                    $cat = $e['category_name'] ?? 'Inne';
                                    $grouped[$cat] = ($grouped[$cat] ?? 0) + (float)$e['amount'];
                                }
                            }
                            echo json_encode($grouped);
                            ?>;

            const labels = Object.keys(rawData);
            const dataValues = Object.values(rawData);

            if (labels.length > 0) {
                const ctx = document.getElementById('expensesChart').getContext('2d');
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Expenses by Category',
                            data: dataValues,
                            backgroundColor: [
                                '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'
                            ]
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true
                    }
                });
            } else {
                document.getElementById('expensesChart').parentElement.innerHTML += "<p class='text-muted'>No expenses recorded yet.</p>";
            }
        </script>
        <script src="public/app.js"></script>

    <?php endif; ?>

    </body>
    <footer class="footer py-4 ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-center text-lg-start text-dark">
                    <span class="fw-bold">Agnieszka Surtel</span> &copy; 2026
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-4 text-center text-lg-end">
                </div>
            </div>
        </div>
    </footer>
</div>
