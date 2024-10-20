<?php
session_start();
if (isset($_SESSION['admin'])) {
    header('location: admin/home.php');
}

if (isset($_SESSION['applicant'])) {
    header('location: home.php');
}
?>
<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-size: 15px;
        }

        .login-box {
            background: #edfcf2;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            padding: 20px;
            width: 500px;
        }

        .login-logo {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }

        .login-box-body {
            padding: 30px;
            background: #edfcf2;
        }

        .form-control {
            border-radius: 4px;
        }

        .btn-admin {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #1f8f3f;
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .btn-admin:hover {
            background-color: #0056b3;
            transform: scale(1.1);
            color: white;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <div class="login-logo">
            <b>Applicant Login 🗳️</b>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">Enter your Login Details.</p>

            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block" style="background-color:#1f8f3f"
                            name="login"><i class="fa fa-sign-in"></i> Sign In</button>
                    </div>
                </div>
            </form>
        </div>

        <?php
        if (isset($_SESSION['error'])) {
            echo "
        <div class='callout callout-danger text-center mt-3'>
        <p>" . $_SESSION['error'] . "</p> 
        </div>";
            unset($_SESSION['error']);
        }
        ?>
    </div>

    <a href="register_applicant.php" class="btn btn-danger btn-admin"><i class="fa fa-user"></i> Don't have an Account? Register Here</a>

    <?php include 'includes/scripts.php'; ?>
</body>

</html>