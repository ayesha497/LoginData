<?php
session_start();

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = file("users.txt");

    foreach($users as $user){

        $data = explode("|", trim($user));

        if($data[2] == $username && $data[3] == $password){

            $_SESSION['user'] = $username;
            header("Location: dashboard.php");
            exit();
        }
    }

    $error = "Invalid Login!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f4f6f9;
}
.center-box{
    height:100vh;
}
</style>

</head>

<body>

<div class="container d-flex justify-content-center align-items-center center-box">

<div class="card shadow p-4" style="width:400px;">

<h3 class="text-center mb-3">Login</h3>

<?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

<form method="POST">

<input class="form-control mb-3" type="text" name="username" placeholder="Username" required>

<input class="form-control mb-3" type="password" name="password" placeholder="Password" required>

<button class="btn btn-success w-100" name="login">Login</button>

</form>

<p class="text-center mt-3">
<a href="signup.php">Create account</a>
</p>

</div>
</div>

</body>
</html>
