<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        <form class="container" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?id=<?php echo $id; ?>" method='POST'>
        <h2>Do Edit !!</h2>
        <table>

                <tr>
                    <th>comment</th>
                    <td><input type="text" name="text" value="<?php echo $comment; ?>"></td>
                </tr>
                <tr>
                    <td><input class="btn btn-lg btn-primary btn-block" type="submit"></td>
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
            header('location:../blog.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    ?>
</body>
</html>