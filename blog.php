<?php
include('layout/header.php');
?>
<section class="home-intro">
    <h2>Sunway International Business School</h2>
    <h3>Blog</h3>
</section>
<main role="main " class="">
    <div class="more-stuff-grid">
        <div class="slide-in from-left">
            <h3 class="pb-4 mb-4 font-italic border-bottom">
                From author Ram
            </h3>
            <div class="fst">
                <h2>9th Annual Day</h2>
                <p class="date">December 23 2019 </p>
            </div>
            <p>On the occasion of 9th annual day of sunway international business school,
                our college administration had arranged small party for the student and whole college members.
                There were also different types of programme held in that day like dancing, singing, drama etc.
                The function began at 6 pm. </p>
            <blockquote>
                <p> Firstly there was welcome speech from our director ,
                    then we perform and enjoy other programs.
                </p>
            </blockquote>
            <p>There was selection of best batch i.e best semester of the year
                <em>where our batch won the Tittle.</em></p>
        </div>
        <img src="images/dempo.jpg" class="img-blog slide-in from-right" alt="Responsive image">
    </div>
    <div class="more-stuff-grid">
        <img src="images/fresher.jpg" class="img-blog left slide-in from-left">
        <div class="slide-in from-right">
            <div class="fst">
                <h2>Fresher party</h2>
                <p class="date">July 13 2019 </p>
            </div>
            <p>It was a funny moment, we depart from out college on 13 july. we expend our 3 days on tour,
                where alot of fun events were orgiansed by college management team with the help of <a href="#">Sunway clubs</a>
                I was blessed to be part of this event. although it one time things but it was worth while.
            </p>
            <blockquote>
                <p>Almost of those event we had Mr and Miss fresher competition where student battle each other of the title of
                    Mr and Miss fresher.
                </p>
            </blockquote>
            <p>The competition was neck to neck, in total of 3 round where conducted each challenging each individual.
                At the end, <em> Mr Bibek Gautam and Miss Aatish shrestha </em> won the competition.
            </p>

        </div>
    </div>
    <div class="more-stuff-grid">
        <div class="slide-in from-left">

            <div class="fst">
                <h2>Dashain Event</h2>
                <p class="date">October 23 2019 </p>
            </div>
            <p>Every year before dashin holiday, sunway international school conducts a event where we celebrate our upcoming
                Nepal main event dashin, Student prepare them self with dance and songs to entertain people who are present there. </p>
            <blockquote>
                <p>we students and teacher of sunway international college had organized small cerebration program for it.
                    Different types of dancing and singing programs were organized with the food stall.
                </p>
            </blockquote>
            <p> There was also short prize distribution program for the student who perform and won the TITTLE in different activities.
                At the end there was DJ section were all the students greet each other and enjoy the program.</p>
        </div>
        <img src="images/dashin.jpg" class=" img-blog slide-in from-right">
    </div>
</main>
<div class="container post">
    <h4>Press the button to comment !!</h4>
    <hr>
    <a href="blog/comment.php" class="btn btn-primary"> Comment</a>
</div>
<!-- ===================================================================================================================================================================== -->
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
    $sql = "INSERT INTO Comments(name,commenter_id,text) VALUES ('$name','$commenter_id','$text')";
    if ($conn->query($sql)) {
        echo "Excuted successfully";
    } else {
        echo "Error inserting into student table";
    }
}
?>
<!-- ===================================================================================================================================================================== -->
<?php
$sql = "SELECT * FROM Comments";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<div  id = 'comment_box' class = 'container'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div >";
        echo '<h4>' . $row["name"] . '</h4>';
        echo '<em>-' . $row["created_at"] . '</em>';
        echo '<br>';
        echo '<td>' . $row['comment'] . '</td>';
        echo "<div class='float-right'>";
        if (isset($_SESSION['commenter_id'])) {
            if ($_SESSION['commenter_id'] == $row['commenter_id']) {
                echo '<td>' . "<a class='btn btn-sm btn-warning' href ='blog/update.php?id=$row[id]'>EDIT</a>" . '</td>';
                // echo '<br>';
                echo '<td>' . "<a  class='btn btn-sm btn-danger' href ='blog/delete.php?id=$row[id]'>Delete</a>" . '</td>';
            }
        }
        echo '</div>';
        echo '<hr>';
        echo '</div>';
    }
    echo '<br>';
    echo "</div>";
} else {
    echo "No Comments";
}
$conn->close();
?>
<?php
include('layout/footer.php');
?>
<script type="text/javascript" src="public/app.js"></script>