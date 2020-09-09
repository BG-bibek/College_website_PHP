<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png" type="image/x-icon"> 
    <title>SUNWAY INTERNATIONAL SCHOOL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="public/app.css">
</head>

<body>
    <header>
        <a href="#" class=" site-logo" aria-label="homepage">sunway</a>
        <nav class="main-nav">
            <ul class="nav__list">
                <li class="nav__list-item"><a href="index.php" class="nav__link">Home</a></li>
                <li class="nav__list-item">
                    <a href="about.php" class="nav__link">About</a>
                </li>
                
                <li class="nav__list-item"><a href="blog.php" class="nav__link">Blog</a></li>
                <li class="nav__list-item"><a href="degree.php" class="nav__link">Degrees</a></li>
            </ul>
        </nav>
        <nav class="account">
            <?php if (isset($_SESSION['username']) && $_SESSION['isloggedin'] = true) {  ?>
                <ul class="nav__list">
                    <li class="nav__list-item">
                        <a class="nav__link nav__link--btn" href="#"><?php echo $_SESSION['username']; ?></a>
                    </li>
                    <li class="nav__list-item">
                        <a class="nav__link nav__link--btn nav__link--btn--highlight" href="logout.php">Logout</a>
                    </li>
                </ul>
            <?php } else { ?>
                <ul class="nav__list">
                    <li class="nav__list-item">
                        <a class="nav__link nav__link--btn" href="login.php">Login</a>
                    </li>
                    <li class="nav__list-item">
                        <a class="nav__link nav__link--btn nav__link--btn--highlight" href="signup.php">Signup</a>
                    </li>
                </ul>
            <?php } ?>
        </nav>
    </header>