<?php
   $con = mysqli_connect("localhost","root","","academy");
   $sql = "select distinct  year from tbl_file order by year";
   $result = mysqli_query($con, $sql);

?>

	      
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<link rel="stylesheet" href="../styles/css/style.css">
<link rel="stylesheet" type="text/css" href="../css/homestyle.css">
		
</head>
    <body style="background:url(../images/99.jpg);background-repeat:no-repeat;background-size:cover">
	
	<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  
		 		<div class="logo">
			<p>IT Academy of Sri Lanka..................</p>
			
			
			
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="">Notice</a></li>
			<li><a href="">Contact Us</a></li>
			<li><a href="">About Us</a></li>
			<li><a href="">login</a></li>
		</ul>
		<h1>Summary Of Assignment</h1>
	</nav> 

        </div>
      </div>
    </nav>
<style>
.p{
	margin-top:360px;
	font-size:16px;
	width: 100%;
}
</style>
</head>

<body>
	<form align="center" class="p" action="pdfReport.php" method="post" target="_blank">
	<select class="" name="year">
	
	<?php
	   
	   
	    while($rows = mysqli_fetch_array($result)){
			echo '<option value="'.$rows["year"].'">'.$rows["year"].'</option>';
		}
	   
	
	?>
	
	
	</select>
	<button type="submit"  name="button">Generate Report</button>
	 </form>
	</body>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	
      <footer class="clearfix">
				<div class="footer-colom">
				
					<h3>Support</h3>
					<div class="tweet">
						<ul>
							<li><a href="">SLIIT</a></li>
							<li><a href="">NIBM</a></li>
							<li><a href="">CADB </a></li>
							<li><a href="">Kanada Uni </a></li>
							<li><a href="">Australia uni </a></li>
						</ul>
					</div><!-- tweet -->
		
				</div><!-- footer-colom -->
				

				<div class="footer-colom">
					<h3>Our Contact</h3>
					<div class="tweet-contact">
						<p>IT Campus<br>25/31 Panideniya road,<br>Kandy.</p>
					</div><!-- tweet-contact -->
					<div class="tweet-contact">
						<p>TelePhone: +9411226546</p>
						<p>Fax   &nbsp &nbsp &nbsp &nbsp &nbsp: +9412244887</p>
						<p>Email     : ITCampus@gmail.com</p>
					</div><!-- tweet-contact -->

				</div><!-- footer-colom -->
				
				<div class="footer-colom">
					<h3>Follow Us</h3>
					<div class="tweet-follow">
				</div><!-- tweet-follow us-->
				
				<div class="footer-colom">
				
					<div class="socialmedia">
						<ul>
							
							<li><a href="#"><img src="../image/social_icon/fb.png"></a></li>
							<li><a href="#"><img src="../image/social_icon/tw.png"></a></li>
							<li><a href="#"><img src="../image/social_icon/in.png"></a></li>
							<li><a href="#"><img src="../image/social_icon/yt.png"></a></li><br>
							<li><a href="#"><img src="../image/social_icon/pin.png"></a></li>
							<li><a href="#"><img src="../image/social_icon/wa.png"></a></li>	
							<li><a href="#"><img src="../image/social_icon/insta.png"></a></li>	
							<li><a href="#"><img src="../image/social_icon/snap.png"></a></li>
							
						</ul>
					</div><!--socialmedeia-->
					</div><!-- tweet -->
		</footer>
	
</html>
	
	