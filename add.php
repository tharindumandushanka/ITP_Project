<?php

require_once "connection.php";

if(isset($_REQUEST['btn_insert']))
{
	try
	{
		$name	= $_REQUEST['txt_name'];
        $subject = $_REQUEST['txt_subject'];
        $year    = $_REQUEST['txt_year'];		
			
		$pdf_file	= $_FILES["txt_file"]["name"];	
		$type		= $_FILES["txt_file"]["type"];
		$size		= $_FILES["txt_file"]["size"];
		$temp		= $_FILES["txt_file"]["tmp_name"];
		
		$path="../upload/".$pdf_file;
		
		if(empty($name)){
			$errorMsg="Please Enter Year";
		}
		else if(empty($pdf_file)){
			$errorMsg="Please Select Assignment";
		}
		else if($type=="application/pdf" || $type=='application/pdf' || $type=='application/pdf' || $type=='application/pdf') 
		{	
			if(!file_exists($path)) 
			{
				if($size < 5000000) 
				{
					move_uploaded_file($temp, "../upload/" .$pdf_file); 
				}
				else
				{
					$errorMsg="Your File Too large Please Upload 5MB Size"; 
				}
			}
			else
			{	
				$errorMsg="File Already Exists...Check Upload Folder"; 
			}
		}
		else
		{
			$errorMsg="Upload pdf File Formate.....CHECK FILE EXTENSION"; 
		}
		
		if(!isset($errorMsg))
		{
			$insert_stmt=$db->prepare('INSERT INTO tbl_file(name,subject,pdf,year) VALUES(:fname,:fsubject,:fpdf,:fyear)'); 					
			$insert_stmt->bindParam(':fname',$name);
            $insert_stmt->bindParam(':fsubject',$subject);			
			$insert_stmt->bindParam(':fpdf',$pdf_file);
            $insert_stmt->bindParam(':fyear',$year);			
		
			if($insert_stmt->execute())
			{
				$insertMsg="File Upload Successfully........"; 
				header("refresh:3;Assignment.php"); 
			}
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

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

	<body style="background:url(../images/09.jpg);background-repeat:no-repeat;background-size:cover">
	
	
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
	</nav> 
		  
		  
        </div>
      </div>
    </nav>
	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		
		<?php
		if(isset($errorMsg))
		{
			?>
            <div class="alert alert-danger">
            	<strong>WRONG ! <?php echo $errorMsg; ?></strong>
            </div>
            <?php
		}
		if(isset($insertMsg)){
		?>
			<div class="alert alert-success">
				<strong>SUCCESS ! <?php echo $insertMsg; ?></strong>
			</div>
        <?php
		}
		?>   
		
			<form method="post" class="form-horizontal" enctype="multipart/form-data">
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Semester</label>
				<div class="col-sm-6">
				<input type="text" name="txt_name" class="form-control" placeholder="enter semester" />
				</div>
				</div>
				
				
				<div class="form-group">
				<label class="col-sm-3 control-label">Subject</label>
				<div class="col-sm-6">
				<input type="text" name="txt_subject" class="form-control" placeholder="enter subject" />
				</div>
				</div>
				
				
				<div class="form-group">
				<label class="col-sm-3 control-label">Year</label>
				<div class="col-sm-6">
				<input type="text" name="txt_year" class="form-control" placeholder="enter year" />
				</div>
				</div>
					
					
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Assignment</label>
				<div class="col-sm-6">
				<input type="file" name="txt_file" class="form-control" />
				</div>
				</div>
				
				
				
						
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="btn_insert" class="btn btn-success " value="Insert">
				<a href="index.php" class="btn btn-danger">Cancel</a>
				</div>
				</div>
					
			</form>
			
		</div>
		
	</div>
			
	</div>
										
	</body>
	
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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