<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
    <?php
        $usersByRole = [
            'Admin' => [
                'admin' => 'Pass1234',
                'renmark' => 'Pogi1234'
            ],
            'Content Manager' => [
                'pepito' => 'manaloto',
                'juan' => 'delacruz'
            ],
            'System User' => [
                'pedro' => 'penduko'
            ]
        ];
    ?>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $role = $_POST['userRole'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $validUser = isset($usersByRole[$role][$username]) && $usersByRole[$role][$username] === $password;
    ?>
    
    <?php if ($validUser): ?>
        <div class="alert alert-success text-center" style="max-width: 350px; margin: 0 auto;">
            Welcome to the system, <?php echo htmlspecialchars($username); ?>!
        </div>
    <?php else: ?>
        <div class="alert alert-danger text-center" style="max-width: 350px; margin: 0 auto;">
            Incorrect username or password. Please try again.
        </div>
    <?php endif; ?>

    <?php } ?>

        <div class="card mx-auto" style="max-width: 350px;">
            <img id="avatar" class="profile-img-card" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Profile Avatar" />
            <p id="profile-name" class="profile-name-card"></p>
            <form method="post" class="form-signin">
                <div class="form-group">
                    <select name="userRole" id="userRole" class="form-control" required>
                        <option value="Admin">Admin</option>
                        <option value="Content Manager">Content Manager</option>
                        <option value="System User">System User</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required autofocus>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
