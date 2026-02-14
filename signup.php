<?php
session_start();

if (isset($_POST['signup'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    if ($name && $email && $username && $password && $phone) {

        $data = $name . "|" . $email . "|" . $username . "|" . $password . "|" . $phone . "\n";
        file_put_contents("users.txt", $data, FILE_APPEND);

        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .center-box {
            height: 100vh;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center center-box">

        <div class="card shadow p-4" style="width:400px;">
            <h3 class="text-center mb-3">Signup</h3>

            <form method="POST">

                <input class="form-control mb-3" type="text" name="name" placeholder="Name" required>

                <input class="form-control mb-3" type="email" name="email" placeholder="Email" required>

                <input class="form-control mb-3" type="text" name="username" placeholder="Username" required>

                <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>

                <input class="form-control mb-3" type="text" name="phone" placeholder="Phone" required>

                <button class="btn btn-primary w-100" name="signup">Signup</button>

            </form>

            <p class="text-center mt-3">
                <a href="login.php">Already have account? Login</a>
            </p>

        </div>
    </div>

</body>

</html>