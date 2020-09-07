<?php
include('layout/header.php');
?>
<section class="home-intro">
    <h2>Sunway International Business School</h2>
    <h3>Blog</h3>
</section>
<div class="container">
    <div class="row mb-2 post ">
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">Similar</strong>
                    <h2 class="mb-0">Other Student blog </h2>
                    <div class="mb-1 text-muted">Nov 12</div>
                    <p class="card-text mb-auto">This is a wider card with supporting text below as a natural
                        lead-in to additional content.</p>
                    <a href="#" class="stretched-link">Continue reading</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-success">Design</strong>
                    <h2 class="mb-0">Post title</h2>
                    <div class="mb-1 text-muted">Nov 11</div>
                    <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to
                        additional content.</p>
                    <a href="#" class="stretched-link">Continue reading</a>
                </div>
            </div>
        </div>
    </div>
</div>

<main role="main " class="">
    <div class="more-stuff-grid">
        <div class="slide-in from-left">
            <h3 class="pb-4 mb-4 font-italic border-bottom">
                From author name
            </h3>
            <div class="fst">
                <h2>Another blog post</h2>
                <p class="date">December 23 2019 </p>
            </div>
            <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus
                mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere
                consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
            <blockquote>
                <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong>
                    ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </blockquote>
            <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non
                commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus,
                porta ac consectetur ac, vestibulum at eros.</p>

        </div>
        <img src="images/ganesh.jpg" class="img slide-in from-right" alt="Responsive image">
    </div>



    <div class="more-stuff-grid">
        <img src="images/fresher.jpg" class="img left slide-in from-left">
        <div class="slide-in from-right">
            <div class="fst">
                <h2>Another blog post</h2>
                <p class="date">December 23 2019 </p>
            </div>
            <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus
                mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere
                consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
            <blockquote>
                <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong>
                    ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </blockquote>
            <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non
                commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus,
                porta ac consectetur ac, vestibulum at eros.</p>

        </div>
    </div>



    <div class="more-stuff-grid">
        <div class="slide-in from-left">

            <div class="fst">
                <h2>Another blog post</h2>
                <p class="date">December 23 2019 </p>
            </div>
            <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus
                mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere
                consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
            <blockquote>
                <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong>
                    ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </blockquote>
            <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non
                commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus,
                porta ac consectetur ac, vestibulum at eros.</p>
        </div>
        <img src="images/single.jpg" class=" img slide-in from-right">
    </div>
</main>

<!-- ===================================================================================================================================================================== -->
<!-- ===================================================================================================================================================================== -->
<!-- ===================================================================================================================================================================== -->
<!-- ===================================================================================================================================================================== -->
<!-- ===================================================================================================================================================================== -->
<!-- ===================================================================================================================================================================== -->
<!-- ===================================================================================================================================================================== -->
<!-- ===================================================================================================================================================================== -->


<!-- ==================================================================================== -->

<a href="comment.php" class="btn btn-primary"> Comment</a>

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
                echo '<td>' . "<a class='btn btn-sm btn-warning' href ='update.php?id=$row[id]'>EDIT</a>" . '</td>';
                // echo '<br>';
                echo '<td>' . "<a  class='btn btn-sm btn-danger' href ='delete.php?id=$row[id]'>Delete</a>" . '</td>';
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



<script type="text/javascript">
    const faders = document.querySelectorAll('.fade-in');
    sliders = document.querySelectorAll('.slide-in');
    const appearOptions = {
        threshold: 0.45,
    };
    const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
        entries.forEach(entry => {
            if (!entry.isIntersecting) {
                return;
            }
            entry.target.classList.toggle('appear');
            appearOnScroll.unobserve(entry.target);
        });

    }, appearOptions);


    faders.forEach(fader => {
        appearOnScroll.observe(fader);
    });

    sliders.forEach(slider => {
        appearOnScroll.observe(slider);
    });



    const header = document.querySelector("header");
    const sectionOne = document.querySelector(".home-intro");

    const sectionOneOptions = {
        rootMargin: "-200px 0px 0px 0px"
    };

    const sectionOneObserver = new IntersectionObserver(function(
            entries,
            sectionOneObserver
        ) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) {
                    header.classList.add("nav-scrolled");
                } else {
                    header.classList.remove("nav-scrolled");
                }
            });
        },
        sectionOneOptions);

    sectionOneObserver.observe(sectionOne);
</script>