<?php
$errors = $_SESSION['errors'] ?? null;
unset($_SESSION['errors']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Career Link</title>
    <link rel="stylesheet" href="app/views/public_assets/css/signup.css">
</head>

<body>
    <div class="signup-container">
        <div class="background-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>

        <?php if (!empty($errors)): ?>
            <?php foreach($errors AS $error): ?>
            <div class="signup-card card-header">
                <p style="color: red;"><?= $error ?></p>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <div class="signup-card">
            <div class="card-header">
                <h1>Login into <span>Career Link</span></h1>
                <p>Start your journey with us today</p>
            </div>


            <!-- Candidate Form -->
            <form class="signup-form active" id="loginForm" action="login" method="POST">
                
                <div class="form-group">
                    <label for="candidateEmail">Email Address</label>
                    <input type="email" id="candidateEmail" name="email" placeholder="your.email@example.com" required>
                </div>

                <div class="form-group">
                    <label for="candidatePassword">Password</label>
                    <input type="password" id="candidatePassword" name="password" placeholder="***********"
                        required>
                </div>

                <button type="submit" class="submit-btn">Login</button>
            </form>

    <script src="app/views/public_assets/js/signup.js"></script>
</body>

</html>