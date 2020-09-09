<?php
include('layout/header.php')
?>
<style>
.accordion {
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 10px 18px;
  display: none;
  background-color: white;
  overflow: hidden;
  
}
.to{
    margin: 10px auto;
}
.top{
  margin: 50px 0 0 0 ;
}
</style>
<section class="home-intro">
    <h2>Sunway International Business School</h2>
    <h3>Degree</h3>
</section>
<div class="container">
<h2 class="top">Degrees</h2>
<button class="accordion btn btn-large btn-danger to"><p>Master Of Business Administration(MBA)<i class="fa fa-caret-down w3-xlarge w3-right"></i></p></button>
<div class="panel">
<img style="width:100%;max-width:2000px; height:1100px;" src="images/mbacourse.jpg" alt="MBA course">
</div>

<button  class="accordion btn btn-large btn-danger to"><p>Bachelor Of Computer Science(BCS)<i class="fa fa-caret-down w3-xlarge w3-right"></i></p></button>
<div class="panel">
<img src="images/bcscourse.jpg" alt="BCS course"  style="width:100%;max-width:2000px">
    <img src="images/bcscoursestructure.jpg" alt="BCS course structure" style="width:100%;max-width:2000px; height:1100px;">
</div>
</div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
<br>
<br>
<br>
<?php
include('layout/footer.php')
?>
<script type="text/javascript" src="public/app.js"></script>



