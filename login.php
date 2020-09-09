<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        input {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        .container {
            padding: 24px;
            margin: 40px;
            margin-left: 250px;
            border: 1px solid #ccc;
        }
    </style>

    <title>Sign up</title>
</head>

<body>
    <?php
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $dbname = "comment";
    $conn = new mysqli($server_name, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('connection error');
    }

    $username = $username_err = "";
    $password = $password_err = $password_match_err = $confirm_password = $confirm_password_err = "";

    $err_count = 0;
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty(trim($_POST['username']))) {
            $username_err = "username is required";
            $err_count++;
        } else {
            $username = trim($_POST['username']);
        }

        if (empty(trim($_POST['password']))) {
            $password_err = "password is required";
            $err_count++;
        } else {
            $password = trim($_POST['password']);
        }

        if ($err_count == 0) {
            $sql = "SELECT * from users WHERE username='$username' AND password='$password' ";
            // echo $sql;
            $result = $conn->query($sql);
            // echo var_dump($result->fetch_assoc());
            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();
                $_SESSION['isloggedin'] = true;
                $_SESSION['username'] = $data['username'];
                $_SESSION['commenter_id'] = $data['id'];
                //redirection
                header('location:index.php');
                // echo var_dump($_SESSION);
            } else {
                echo "please enter valid user and password";
            }
        }
    }
    ?>
    <div class="container">
        <h2>Login</h2>
        <p>please fill the form below to Login</p>
        <p style="color: red;font-weight:bold;"><?php echo $password_match_err; ?></p>
        <form action="<? echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <table>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username">
                        <span style="color: red;"><?php echo $username_err ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password">
                        <span style="color: red;"><?php echo $password_err; ?></span>
                    </td>
                <tr>
                    <td>
                        <input type="submit" class="btn btn-primary btn-lg btn-block">
                    </td>
                </tr>

            </table>
        </form>
        <p>if you are not registered ? <a href="signup.php">click here</a></p>
    </div>


</body>

</html>