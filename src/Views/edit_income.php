<?php

/** @var array $income */
include 'header.php';
?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="login-section w-100" style="max-width: 500px;">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Edit Income</h2>
            <p class="text-muted">Update your income details</p>
        </div>

        <form action="index.php?action=do_edit_income" method="POST">
            <input type="hidden" name="id" value="<?= $income['id'] ?>">

            <div class="mb-3">
                <label class="form-label fw-semibold">Amount</label>
                <input type="number" step="0.01" name="amount" class="form-control" value="<?= $income['amount'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Date</label>
                <input type="date" name="date" class="form-control" value="<?= $income['date'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Category</label>
                <select name="category" class="form-select">
                    <option <?= $income['category_id'] == 1 ? 'selected' : '' ?>>Salary</option>
                    <option <?= $income['category_id'] == 2 ? 'selected' : '' ?>>Bank Interest</option>
                    <option <?= $income['category_id'] == 3 ? 'selected' : '' ?>>Sales</option>
                    <option <?= $income['category_id'] == 4 ? 'selected' : '' ?>>Gift</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Comment (optional)</label>
                <textarea name="comment" class="form-control" rows="3"><?= htmlspecialchars($income['comment'] ?? '') ?></textarea>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-custom">Save Changes</button>
                <a href="index.php?action=balance" class="btn btn-light btn-custom text-muted">Cancel</a>
            </div>
        </form>
    </div>
</div>