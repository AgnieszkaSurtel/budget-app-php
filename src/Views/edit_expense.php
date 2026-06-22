<?php

/** @var array $expense */
include 'header.php';
?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="login-section w-100 shadow-sm" style="max-width: 500px; background: white; padding: 30px; border-radius: 20px;">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Edit Expense</h2>
            <p class="text-muted">Modify your spending details</p>
        </div>

        <form action="index.php?action=do_edit_expense" method="POST">
            <input type="hidden" name="id" value="<?= $expense['id'] ?>">

            <div class="mb-3">
                <label class="form-label fw-semibold">Amount</label>
                <input type="number" step="0.01" name="amount" class="form-control" value="<?= $expense['amount'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Date</label>
                <input type="date" name="date" class="form-control" value="<?= $expense['date'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Category</label>
                <select name="category" class="form-select">
                    <option <?= $expense['category_id'] == 5 ? 'selected' : '' ?>>Food</option>
                    <option <?= $expense['category_id'] == 11 ? 'selected' : '' ?>>Rent</option>
                    <option <?= $expense['category_id'] == 6 ? 'selected' : '' ?>>Transport</option>
                    <option <?= $expense['category_id'] == 9 ? 'selected' : '' ?>>Entertainment</option>
                    <option <?= $expense['category_id'] == 10 ? 'selected' : '' ?>>Other Expenses</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Comment</label>
                <textarea name="comment" class="form-control" rows="2"><?= htmlspecialchars($expense['comment'] ?? '') ?></textarea>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-custom shadow-sm" style="background: #6c5ce7; border: none; border-radius: 12px; padding: 12px;">Save Changes</button>
                <a href="index.php?action=balance" class="btn btn-light btn-custom" style="border-radius: 12px; padding: 12px;">Cancel</a>
            </div>
        </form>
    </div>
</div>