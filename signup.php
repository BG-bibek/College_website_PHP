<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
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

</head>
<body>
    <?php
    $server_name = "localhost";
    $username = "root";
    $password= "";
    $dbname = "comment";
    $conn = new mysqli($server_name, $username, $password, $dbname);
    
    if($conn->connect_error)
    {
        die('connection error');
    }

    $username=$username_err="";
    $email=$email_err="";
    $password=$password_err=$password_match_err=$confirm_password=$confirm_password_err=""; 

    $err_count = 0;
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        if(empty(trim($_POST['username'])))
        {
            $username_err = "username is required";
            $err_count++;
        }
        else
        {
            $username = trim($_POST['username']);
        }

        if(empty(trim($_POST['email'])))
        {
            $password_err = "email is required";
            $err_count++;
        }
        else
        {
            $password = trim($_POST['email']);
        }


        if(empty(trim($_POST['password'])))
        {
            $password_err = "password is required";
            $err_count++;
        }
        else
        {
            $password = trim($_POST['password']);
        }

        if(empty(trim($_POST['confirm_password'])))
        {
            $confirm_password_err = "This field is required too";
            $err_count++;
        }
        else
        {
            $confirm_password = trim($_POST['confirm_password']);
            if($password!=$confirm_password)
            {
                $password_match_err = "password do not match";
                $err_count++;
            }
        }
        if($err_count==0)
        {
            $sql = "INSERT INTO users(username,password,email) VALUES('$username','$password','$email')";
            // echo $sql;
            if($conn->query($sql)===true)
            {
                echo "registration is successful";
                header('location:login.php');

            }

        }
    }
    ?>
    <div class="container">
    <h2>Sign Up</h2>
    <p>please fill the form below for registration</p>
    <p style="color: red;font-weight:bold;"><?php echo $password_match_err; ?></p>
    <form action = "<? echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <table>
        <tr>
            <td>Username</td>
            <td>
                <input type="text" name="username">
                <span style="color: red;"><?php echo $username_err?></span>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type="email" name="email">
                <span style="color: red;"><?php echo $email_err; ?></span>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="password">
                <span style="color: red;"><?php echo $password_err; ?></span>
            </td>
        </tr>
        <tr>
            <td>confirm password</td>
            <td>
                <input type="password" name="confirm_password">
                <span style="color: red;"><?php echo $confirm_password_err;?></span>
            </td>
        </tr>
        <tr>
            <td><input class="btn btn-primary  btn-lg btn-block" type="submit"></td>
        </tr>
    </table>
    </form>
    <p>Already registerd ? <a href="login.php">Login</a></p>
    </div>
</body>
</html>