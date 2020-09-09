<?php 
session_start();
if (!isset($_SESSION['username']) && $_SESSION['isloggedin'] != true) {
    header('location:../login.php');
}    ?>
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

<div id="panel">
    <h3 style="text-align: center;">please fill up the form to comment</h3>
    <hr>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> " method='POST'>
            <table>
                <!-- <tr>
                    <th>Name</th>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <th>password</th>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr> -->
                <th>comment</th>
                <td><input type="text" name="text"></td>
                </tr>
                <tr>
                    <td><input class="btn btn-primary btn-lg btn-block" type="submit"></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
$server_name = 'localhost';
$username = 'root';
$password = '';
$dbname = 'comment';
$conn = new mysqli($server_name, $username, $password, $dbname);

if ($conn->connect_error) {
    die('connect error');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_SESSION['username'];
    $commenter_id = $_SESSION['commenter_id'];
    $text = $_POST['text'];

    $sql = "INSERT INTO Comments(name,commenter_id,comment) VALUES ('$name','$commenter_id','$text')";
    if ($conn->query($sql)) {
        echo "Excuted successfully";
        header('location:../blog.php');
    } else {
        echo "Error inserting into Comment table";
    }
}
?>