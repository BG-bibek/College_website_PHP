    <?php
    $server_name = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'comment';
    $conn = new mysqli($server_name, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('connect error');
    }
    if (!empty($_GET['id'])) {
        $id =  $_GET['id'];
        $sql = "DELETE FROM Comments where id = $id";
        if ($conn->query($sql) == TRUE) {
            //redirection
            header('location:../blog.php');
        } else {
            echo "Error";
            echo "<a href='index.php'>GO back </a>";
        }
    }
    ?>
