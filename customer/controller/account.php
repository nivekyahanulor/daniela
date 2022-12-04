<?php

$customerid = $_SESSION['id'];


$account     = $mysqli->query("SELECT * from pos_customer where customer_id ='$customerid' ");


if(isset($_POST['update-profile'])){
	
	
	$fname	 = $_POST['fname'];
	$lastname	 = $_POST['lastname'];
	$contact	 = $_POST['contact'];
	$username	 = $_POST['username'];
	$password	 = $_POST['password'];
	$address	 = $_POST['address'];
	
	$mysqli->query("UPDATE 
					pos_customer set 
					firstname='$fname' ,
					lastname='$lastname' ,
					contact='$contact' ,
					username='$username' ,
					password='$password',
					address='$address'
					where customer_id='$customerid'");
		
		
	echo '<script>window.location.href="profile.php?updated"</script>';
	
}
if(isset($_POST['update-verification'])){
	
	$letter = $_POST['valid_id1'];
	$letter1 = $_POST['business_permit1'];
	$letter2 = $_POST['proof1'];
	
	// $image1 = addslashes(file_get_contents($_FILES['valid_id']['tmp_name']));
	// $image_name = addslashes($_FILES['valid_id']['name']);
	// $image_size = getimagesize($_FILES['valid_id']['tmp_name']);
	// move_uploaded_file($_FILES["valid_id"]["tmp_name"], "../admin/assets/documents/" . $_FILES["valid_id"]["name"]);
	// $location1   =  $_FILES["valid_id"]["name"];
	
	
	if ($letter == "") {
		$image = addslashes(file_get_contents($_FILES['valid_id']['tmp_name']));
		$image_name = addslashes($_FILES['valid_id']['name']);
		$image_size = getimagesize($_FILES['valid_id']['tmp_name']);
		move_uploaded_file($_FILES["valid_id"]["tmp_name"], "../admin/assets/documents/" . $_FILES["valid_id"]["name"]);
		$location1   =  $_FILES["valid_id"]["name"];
	} else {
		if ($_FILES["valid_id"]["name"] == "") {
			$location1 = $letter;
		} else {
			$image = addslashes(file_get_contents($_FILES['valid_id']['tmp_name']));
			$image_name = addslashes($_FILES['valid_id']['name']);
			$image_size = getimagesize($_FILES['valid_id']['tmp_name']);
			move_uploaded_file($_FILES["valid_id"]["tmp_name"], "../admin/assets/documents/" . $_FILES["valid_id"]["name"]);
			$location1   =  $_FILES["valid_id"]["name"];
		}
	}
	
	
	
	if ($letter1 == "") {
		$image = addslashes(file_get_contents($_FILES['business_permit']['tmp_name']));
		$image_name = addslashes($_FILES['business_permit']['name']);
		$image_size = getimagesize($_FILES['business_permit']['tmp_name']);
		move_uploaded_file($_FILES["business_permit"]["tmp_name"], "../admin/assets/documents/" . $_FILES["business_permit"]["name"]);
		$location2   =  $_FILES["business_permit"]["name"];
	} else {
		if ($_FILES["business_permit"]["name"] == "") {
			$location2 = $letter1;
		} else {
			$image = addslashes(file_get_contents($_FILES['business_permit']['tmp_name']));
			$image_name = addslashes($_FILES['business_permit']['name']);
			$image_size = getimagesize($_FILES['business_permit']['tmp_name']);
			move_uploaded_file($_FILES["business_permit"]["tmp_name"], "../admin/assets/documents/" . $_FILES["business_permit"]["name"]);
			$location2   =  $_FILES["business_permit"]["name"];
		}
	}
	
	
	
	// $image3 = addslashes(file_get_contents($_FILES['proof']['tmp_name']));
	// $image_name = addslashes($_FILES['proof']['name']);
	// $image_size = getimagesize($_FILES['proof']['tmp_name']);
	// move_uploaded_file($_FILES["proof"]["tmp_name"], "../admin/assets/documents/" . $_FILES["proof"]["name"]);
	// $location3   =  $_FILES["proof"]["name"];
	
	
	if ($letter2 == "") {
		$image = addslashes(file_get_contents($_FILES['proof']['tmp_name']));
		$image_name = addslashes($_FILES['proof']['name']);
		$image_size = getimagesize($_FILES['proof']['tmp_name']);
		move_uploaded_file($_FILES["proof"]["tmp_name"], "../admin/assets/documents/" . $_FILES["proof"]["name"]);
		$location3   =  $_FILES["proof"]["name"];
	} else {
		if ($_FILES["proof"]["name"] == "") {
			$location3 = $letter2;
		} else {
			$image = addslashes(file_get_contents($_FILES['proof']['tmp_name']));
			$image_name = addslashes($_FILES['proof']['name']);
			$image_size = getimagesize($_FILES['proof']['tmp_name']);
			move_uploaded_file($_FILES["proof"]["tmp_name"], "../admin/assets/documents/" . $_FILES["proof"]["name"]);
			$location3   =  $_FILES["proof"]["name"];
		}
	}
	
	
	
	$mysqli->query("UPDATE 
					pos_customer set 
					valid_id = '$location1',
					business_permit = '$location2',
					proof= '$location3'
					where customer_id='$customerid'");
		
		
	echo '<script>window.location.href="profile.php?updated"</script>';
	
}
