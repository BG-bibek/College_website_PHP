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
        $sql = "SELECT name,text,id FROM Comments WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $name = $row["name"];
                $text = $row["text"];
                $id = $row["id"];
            }
        }
    ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?id=<?php echo $id; ?>" method='POST'>
            <table>
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                </tr>

                <tr>
                    <th>comment</th>
                    <td><input type="text" name="text" value="<?php echo $text; ?>"></td>
                </tr>
                <tr>
                    <td><input type="submit"></td>
                </tr>
            </table>
        </form>
    <?php





        // $sql = "DELETE FROM Comments where id = $id";

        // if($conn->query($sql)==TRUE){
        //     echo "Record Deleted Sucessfully";
        //     echo "<a href='index.php'>GO back </a>";
        // }else{
        //     echo "Error";
        //     echo "<a href='index.php'>GO back </a>";
        // }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = $_POST['name'];
        $text = $_POST['text'];
        $id = $_GET['id'];
        $sql = "UPDATE Comments SET name= '$name' , text = '$text' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            //redirection
            header('location:index.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    ?>
</body>

</html>