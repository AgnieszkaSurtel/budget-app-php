<?php include 'header.php'; ?>
<div class="container">
    <div class="login-section" style="max-width: 600px;">
        <h2>Add New Income</h2>
        <form action="index.php?action=save_income" method="POST">
            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" step="0.01" name="amount" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" name="date" class="form-control" value="<?= date('Y-m-d') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select">
                    <option>Salary</option>
                    <option>Sales</option>
                    <option>Bank Interest</option>
                    <option>Others</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Comment (optional)</label>
                <textarea name="comment" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-custom">Add Income</button>
            <a href="index.php" class="btn btn-secondary btn-custom">Cancel</a>
        </form>
    </div>
</div>
</body>

</html>