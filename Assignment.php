<?php

	require_once "connection.php";
	
	if(isset($_REQUEST['delete_id']))
	{
		
		$id=$_REQUEST['delete_id'];	
		
		$select_stmt= $db->prepare('SELECT * FROM tbl_file WHERE id =:id');	
		$select_stmt->bindParam(':id',$id);
		$select_stmt->execute();
		$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
		unlink("../upload/".$row['pdf']); 
		
		
		$delete_stmt = $db->prepare('DELETE FROM tbl_file WHERE id =:id');
		$delete_stmt->bindParam(':id',$id);
		$delete_stmt->execute();
		
		header("Location:Assignment.php");
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
    <body style="background:url(../images/11.jpg);background-repeat:no-repeat;background-size:cover">
	
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
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3><a href="add.php"><span class="glyphicon glyphicon-plus"></span>&nbsp; Add Assignment</a></h3>
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Semester</th>
											<th>Subject</th>
											<th>Year</th>
                                            <th>Assignment</th>		
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$select_stmt=$db->prepare("SELECT * FROM tbl_file");	
									$select_stmt->execute();
									while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
                                        <tr>
                                            <td><?php echo $row['name']; ?></td>
											<td><?php echo $row['subject']; ?></td>
											<td><?php echo $row['year']; ?></td>
                                            <td><img src="../image/images/pdf.png" width="40px" height="40px"></td>
                                            <td><a href="edit.php?update_id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a></td>
                                            <td><a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
											
                                        </tr>
										
                                    <?php
									}
									?>
                                      
                                    </tbody>
									
                                </table>
								
								<a href="AssignmentReport.php" class="btn">Summary Report</a>
								
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
				
		</div>
		
	</div>
			
	</div>	         					
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