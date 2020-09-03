<?php if (!isset($_SESSION['username']) && $_SESSION['isloggedin'] != true) {
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