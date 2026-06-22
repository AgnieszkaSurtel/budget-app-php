<?php include('header.php'); ?>

<section class="login-section container">
    <h2 class="mb-4">Log in</h2>
    <form action="index.php?action=do_login" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" required />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" required />
        </div>
        <button type="submit" class="btn btn-primary btn-custom w-100">Log in</button>
    </form>
    <p class="mt-3 text-center">Don't have an account? <a href="index.php?action=register">Register</a></p>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
