<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Generic E-Shop</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/styling.css" rel="stylesheet">
</head>



<body>
    <div class="container theme-showcase" role="main">
	
		<div class="jumbotron">
			<h1>Welcome to Generic E-Shop</h1>
		</div>
		
		<section id="description">			
			<div id="desc_text">			
				<h3>About us</h3>
				<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et imperdiet dolor, nec aliquam urna. Praesent feugiat libero sit amet congue pellentesque. Praesent dictum, elit porta pretium cursus, nulla est aliquam arcu, sed tempus magna est eu eros. In sed elit bibendum, laoreet velit posuere.
				</p>
				
				<h3>Contact us</h3>
				<ul>
					<li>Address: Standard st. 5, Default city</li>
					<li>Email: ouremail@generic.com</li>
					<li>Phone number: 0021CALLUSHERE</li>
				</ul>				
			</div>			
			<figure>
				<img src="eshop.png" id="desc_img">
			</figure>			
		</section>
		
		<section id="reviews" >	
			<h1>Reviews</h1>			
			<?php
				try{
					// Connect to DB
					$Adminuser = "crm_trial";
					$Adminpass = "crm_trial";
					$db = new PDO('mysql:host=localhost;dbname=crm_trial;charset=utf8mb4', $Adminuser, $Adminpass);
					
					// Get all the reviews and the corresponging usernames from the tables Comments and Users
					$query = $db->prepare("SELECT UserName,ReviewText,ReviewRating FROM Comments c,Users u WHERE c.UserID=u.UserID" );
					$query->execute();
					$result = $query->fetchAll();
					
					// Display each review
					foreach($result as $row){
						$currName=$row['UserName'];
						$currReview=$row['ReviewText'];
						$currRating=$row['ReviewRating'];
						
						echo '<div class="well" >';
						echo '<h3>'.$currName.'</h3>';
						echo '<p class="ReviewText">';
						echo $currReview;
						echo '</p>';
						echo '<div class="ReviewRating">';
						echo 'Review rating: ' . $currRating . '/5';
						echo '</div>';
						echo '</div>';
					}				
				} catch(PDOException $ex) {
					print($ex->getMessage());
				}
			?>	
			<div>
				<form action="add_review.php" method="POST">
					<p>Enter your name:</p> 
					<input type="text" name="username"></input>
					<p>Enter your review:</p> 
					<textarea type="text" name="userreview" maxlength="255"></textarea>
					<p>Select your rating:</p> 
					<p>
					<select type="text" name="userrating">
						<option value="1">1</option> 
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
					</p>
					<p>
						<button type="submit" class="btn btn-primary">Submit new review</button>
					</p>	
				</form>
			</div>			
		</section>
	</div>
	
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>