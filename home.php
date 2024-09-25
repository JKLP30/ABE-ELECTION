
<?php 
	require_once('Connection/conn.php'); 

	include('includes/inc_security.php'); 

	$sql="SELECT `desc`
	FROM tbl_announcement
	WHERE status = 1";
	$q = mysqli_query($conn,$sql);

?>
<!-- header -->
<?php include('includes/inc_header.php'); ?>
<!-- navigation bar -->
<?php require_once('includes/inc_nav.php'); ?>

<?php if($_SESSION['user_level'] != 1): ?>
<div class="container">
	<div class="col-md-3">
		<div class="panel panel-default">
		    <div class="panel-heading">
		      <h3 class="panel-title">Announcement</h3>
		    </div>
		    <div class="panel-body">
		    	<?php while($row = mysqli_fetch_assoc($q)){ ?>
				<ul>
				    <li><?= $row['desc'] ?></li>
				</ul>
				<?php } ?>	
		    </div>
 		 </div>
	</div>
	<div class="col-md-9 home-section">
		<center><img src="assets/img/logo.png"></center>
		<h2>Welcome <?= $_SESSION['fullname'] ?></h2>
	
		<p>“The pure and simple truth is rarely pure and never simple <br>- Oscar Wilde"</p>

		<center><a href="evaluate-form.php" class="btn btn-success">Proceed to Evaluate</a></center>
	</div>
</div>
<?php endif; ?>

<?php if($_SESSION['user_level'] == 1): ?>
<div class="container">
	<div >
		<center><img src="assets/img/logo.png"></center>
		<div>
		<p>Welcome Admin, <?= $_SESSION['fullname'] ?></p>
		<blockquote>
		<p>&nbsp &nbsp &nbsp &nbsp &nbspABE International Business College is a premiere business and management learning institution in the Philippines. It is currently considered one of the best colleges for cultivating leadership education in the country, and is continuously working for the progressive improvement of the students’ learning experience by investing on state-of-the-art facilities and highly competent educators. Aside from business courses, ABE is also known for its hotel and restaurant management and tourism programs. ABE is deeply anchored in the principles and vision implemented by ABE in London in providing quality British management education. Just like its British counterpart, ABE International Business College 
			pursues the same global vision of providing a holistic, quality education. It also features international accreditation and flexible payment schemes.&nbsp <a class="read" type="button" onclick="this.style.visibility='hidden'; [myFunction()]";  style="color: #000;">Read more....</a></p>
		</blockquote>
		</div>
		</div>

		<center></center>
	<div id="myDIV">
		<blockquote>
		<p id="justify" hidden>&nbsp &nbsp &nbsp &nbsp &nbspABE was established in 1999 in response to the growing demands for a world- class yet affordable business education experience in the Philippines. It is a vital part of 
			the AMA Education System, Asia’s first and largest information technology-based educational institution.</p>
		<p id="justify" hidden>&nbsp &nbsp &nbsp &nbsp &nbspABE International Business College aims to produce not only leaders in the business world, but also techno entrepreneur professionals. These individuals are taught and trained to be responsive to the needs of the global community and to be strategic thinkers. The school also has a progressive curricula recognized by institutions and organizations worldwide.
		&nbsp &nbsp &nbsp &nbsp &nbspJust like other business schools, ABE teaches the basic theories of business and commerce, but its approach is unique and modern, for it uses information technology and telecommunication tools. The school embraces digital culture in the same way that it treasures traditional teaching and learning methods. ABE students are expected to be self- reliant and innovative in their way of applying business ideals and principles.
		ABE International Business College also trains its students to be prepared for the current and forthcoming trends in the world.</p>
 		<p id="justify" hidden>&nbsp &nbsp &nbsp &nbsp &nbspCurrently, ABE is enjoying a strong and solid reputation because of the success of its competitive graduates in both the local and international business scenes. ABE even has an international OJT program which gives its participants priceless first- hand experience in working in the global business world.</p>
 		</blockquote>
	</div>


<?php endif; ?>
<!-- footer part -->
<?php require_once('includes/inc_footer.php'); ?>



<script>

$(document).ready(function(){
    $("a").click(function( ){
        $("p").show(1000);
    });
    
});
</script>
