<?php 
	$Adminuser = "root";
	$Adminpass = "";
	$db = new PDO('mysql:host=localhost;dbname=crm_trial;charset=utf8', $Adminuser, $Adminpass);
	
	$currUserName = $_POST['username'];
	$currUserReview = $_POST['userreview'];
	$currUserRating = $_POST['userrating'];
		
	if (!($currUserName === '') && !($currUserReview === '') && !($currUserRating === '')){
		$query = $db->prepare("insert into Users (UserName) VALUES (:UserName);");
		$query->bindParam(':UserName',$currUserName);
		$query->execute();
		
		$query = $db->prepare("insert into comments (UserID,ReviewText,ReviewRating) VALUES ((SELECT UserID FROM users where UserName=:UserName),:UserReview,:UserRating);" );
		$query->bindParam(':UserName',$currUserName);
		$query->bindParam(':UserReview',$currUserReview);
		$query->bindParam(':UserRating',$currUserRating);
		$query->execute();
		echo "<script type=\"text/JavaScript\"> setTimeout(\"window.location.assign('index.php');\",1500); </script>";
	} else {
		echo 'The data entered is not valid. Redirecting...';
		echo "<script type=\"text/JavaScript\"> setTimeout(\"window.location.assign('index.php');\",1500); </script>";
	}
?>