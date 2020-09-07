<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        $sql = "SELECT comment FROM Comments WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $comment = $row["comment"];
            }
        }
    ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?id=<?php echo $id; ?>" method='POST'>
            <table>

                <tr>
                    <th>comment</th>
                    <td><input type="text" name="text" value="<?php echo $comment; ?>"></td>
                </tr>
                <tr>
                    <td><input type="submit"></td>
                </tr>
            </table>
        </form>
    <?php
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $comment = $_POST['text'];
        $id = $_GET['id'];
        $sql = "UPDATE Comments SET comment = '$comment' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            //redirection
            header('location:index.php');
            echo "its here ";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    ?>
</body>
</html>