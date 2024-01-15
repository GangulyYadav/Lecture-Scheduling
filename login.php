<?php
session_start();
require "./include/connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "admin" && $password === "admin") {
        $_SESSION['user_id'] = 1;
        $_SESSION['role'] = "admin"; 
        header("Location: admin/adminDashboard.php");
        $role="admin";
        exit();
    } else if(empty($username) && empty($password)){
        $error = "Please enter username and password!";
    }else{
        $role="instructor";
    }
    
    if ($role === "instructor") {
        $username = mysqli_real_escape_string($conn, $username);
        $sql = "SELECT id, name,email, password FROM instructors WHERE email = '$username'";

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user["password"])) {
                $_SESSION['user_id'] = $user["id"];
                $_SESSION['role'] = "instructor";
                $_SESSION['user_name']=$user['name'];
                header("Location: dashboard.php");
                exit();
            }
            else{
                echo "<script>alert('Invalid Credential!')</script>";
            }
        } else {
            $error = "Invalid Credential!"; 
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-body">
                <h2 class="text-center mb-4">Login</h2>
                <?php if (isset($error)) echo "<p class='text-danger text-center'>$error</p>"; ?>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php require "./include/footer.php";?>
</html>

