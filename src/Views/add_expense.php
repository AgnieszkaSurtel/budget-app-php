<?php include 'header.php'; ?>
<div class="container">
    <div class="login-section" style="max-width: 600px;">
        <h2>Add New Expense</h2>
        <form action="index.php?action=save_expense" method="POST">
            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" step="0.01" name="amount" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" name="date" class="form-control" value="<?= date('Y-m-d') ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Payment Method</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment" value="Cash" checked> Cash
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment" value="Debit Card"> Debit Card
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select">
                    <option>Food</option>
                    <option>Fees</option>
                    <option>Housing</option>
                    <option>Transport</option>
                    <option>Entertainment</option>
                    <option>Other Expenses</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Comment (optional)</label>
                <textarea name="comment" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-custom">Add Expense</button>
            <a href="index.php" class="btn btn-secondary btn-custom">Cancel</a>
        </form>
    </div>
</div>
</body>

</html>