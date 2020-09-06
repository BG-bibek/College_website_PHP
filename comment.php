


<?php 

session_start();
if (!isset($_SESSION['username']) && $_SESSION['isloggedin'] != true) {
    header('location:login.php');
}    ?>

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
                    <td><input type="submit"></td>
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
        header('location:index.php');
    } else {
        echo "Error inserting into Comment table";
    }
}
?>