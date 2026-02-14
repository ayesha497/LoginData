<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$users = file("users.txt");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .center-box {
            min-height: 100vh;
        }
    </style>

</head>

<body>

    <div class="container center-box py-5">

        <div class="card shadow-lg p-4">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3>Welcome <?php echo $_SESSION['user']; ?></h3>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>

            <h4 class="mb-3">All Users Data</h4>

            <div class="table-responsive">

                <table class="table table-bordered table-hover table-striped">

                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Phone</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        foreach ($users as $user) {

                            $data = explode("|", trim($user));

                            echo "<tr>";
                            echo "<td>" . $data[0] . "</td>";
                            echo "<td>" . $data[1] . "</td>";
                            echo "<td>" . $data[2] . "</td>";
                            echo "<td>" . $data[3] . "</td>";
                            echo "<td>" . $data[4] . "</td>";
                            echo "</tr>";
                        }
                        ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>

</html>