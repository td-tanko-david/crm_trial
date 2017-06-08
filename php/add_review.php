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
	<?php 
		$Adminuser = "crm_trial";
		$Adminpass = "crm_trial";
		$db = new PDO('mysql:host=localhost;dbname=crm_trial;charset=utf8', $Adminuser, $Adminpass);
		
		$currUserName = $_POST['username'];
		$currUserReview = $_POST['userreview'];
		$currUserRating = $_POST['userrating'];
			
		if (!($currUserName === '') && !($currUserReview === '') && !($currUserRating === '')){
			$query = $db->prepare("insert into Users (UserName) VALUES (:UserName);");
			$query->bindParam(':UserName',$currUserName);
			$query->execute();
			
			$query = $db->prepare("insert into Comments (UserID,ReviewText,ReviewRating) VALUES ((SELECT UserID FROM Users where UserName=:UserName),:UserReview,:UserRating);" );
			$query->bindParam(':UserName',$currUserName);
			$query->bindParam(':UserReview',$currUserReview);
			$query->bindParam(':UserRating',$currUserRating);
			$query->execute();
			
			echo "<p>Thank you for sharing Your opinion. Redirecting...</p>";
			echo "<script type=\"text/JavaScript\"> setTimeout(\"window.location.assign('index.php');\",2500); </script>";
		} else {
			echo "<p class='well'>The data entered is not valid. Redirecting...</p>";
			echo "<script type=\"text/JavaScript\"> setTimeout(\"window.location.assign('index.php');\",1500); </script>";
		}
	?>
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