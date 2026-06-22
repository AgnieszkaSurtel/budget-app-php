<?php

/** @var array $incomes */
/** @var array $expenses */
require_once 'header.php';
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Financial Balance</h2>
    </div>
    <div class="card shadow-sm mb-5">
        <div class="card-header bg-light">
            <h3 class="h6 m-0 fw-bold text-success">Recent Incomes</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="col-date">Date</th>
                        <th class="col-category">Category</th>
                        <th class="col-amount text-end">Amount</th>
                        <th class="col-comment text-center">Comment</th>
                        <th class="col-actions text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($incomes as $income): ?>
                        <tr>
                            <td class="col-date"><?= htmlspecialchars($income['date']) ?></td>
                            <td class="col-category"><?= htmlspecialchars($income['category_name']) ?></td>
                            <td class="col-amount text-end text-success fw-bold">
                                + <?= number_format($income['amount'], 2) ?> DKK
                            </td>
                            <td class="col-comment text-muted small text-center"><?= htmlspecialchars($income['comment'] ?? '') ?></td>
                            <td class="col-actions text-center">
                                <a href="index.php?action=edit_income&id=<?= $income['id'] ?>" class="btn-edit-action">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow-sm mb-5">
        <div class="card-header bg-light">
            <h3 class="h6 m-0 fw-bold text-danger">Recent Expenses</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="col-date">Date</th>
                        <th class="col-category">Category</th>
                        <th class="col-amount text-end">Amount</th>
                        <th class="col-comment text-center">Comment</th>
                        <th class="col-actions text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($expenses as $expense): ?>
                        <tr>
                            <td class="col-date"><?= htmlspecialchars($expense['date']) ?></td>
                            <td class="col-category"><?= htmlspecialchars($expense['category_name']) ?></td>
                            <td class="col-amount text-end text-danger fw-bold">
                              -  <?= number_format($expense['amount'], 2) ?> DKK
                            </td>
                            <td class="col-comment text-muted small text-center"><?= htmlspecialchars($expense['comment'] ?? '') ?></td>
                            <td class="col-actions text-center">
                                <a href="index.php?action=edit_expense&id=<?= $expense['id'] ?>" class="btn-edit-action">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
