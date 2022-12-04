<?php
include('database.php');

	// error_reporting(0);
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
	require 'phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require 'phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';
	
	if(isset($_POST['register'])){
		
		$firstname    = $_POST['firstname'];
		$lastname     = $_POST['lastname'];
		$email        = $_POST['email'];
		$address      = $_POST['address'];
		$contact 	  = $_POST['contact'];
		$password     = $_POST['password'];
		$username     = $_POST['username'];
		$name         = $firstname .' '.$lastname;
		$check        = $mysqli->query("SELECT * from pos_customer where email='$email'");
		$count        = $check->num_rows;
		
		
		$image1 = addslashes(file_get_contents($_FILES['valid_id']['tmp_name']));
		$image_name = addslashes($_FILES['valid_id']['name']);
		$image_size = getimagesize($_FILES['valid_id']['tmp_name']);
		move_uploaded_file($_FILES["valid_id"]["tmp_name"], "../admin/assets/documents/" . $_FILES["valid_id"]["name"]);
		$location1   =  $_FILES["valid_id"]["name"];
		
	
		$image2 = addslashes(file_get_contents($_FILES['business_permit']['tmp_name']));
		$image_name = addslashes($_FILES['business_permit']['name']);
		$image_size = getimagesize($_FILES['business_permit']['tmp_name']);
		move_uploaded_file($_FILES["business_permit"]["tmp_name"], "../admin/assets/documents/" . $_FILES["business_permit"]["name"]);
		$location2   =  $_FILES["business_permit"]["name"];
	
	
		$image3 = addslashes(file_get_contents($_FILES['proof']['tmp_name']));
		$image_name = addslashes($_FILES['proof']['name']);
		$image_size = getimagesize($_FILES['proof']['tmp_name']);
		move_uploaded_file($_FILES["proof"]["tmp_name"], "../admin/assets/documents/" . $_FILES["proof"]["name"]);
		$location3   =  $_FILES["proof"]["name"];
	
		
		if($count !=0){
			echo "<script> window.location.href='../register.php?duplicate'; </script>";
		} else {
			
			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->Host     = 'smtp.hostinger.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'administrator@deniela.shop';
			$mail->Password = '@Programmer2013';
			$mail->SMTPSecure = 'ssl'; // tls
			$mail->Port     = 465; // 587
			$mail->setFrom('administrator@deniela.shop', 'DANIELA RICE MILL');
			$mail->addAddress($email);
			$mail->Subject = 'Account Confirmation';
			$mail->isHTML(true);


			$mail->Body = "<html>
								<body>
									<h1>Hello , " .$name ." </h1>
									<p> Thank you for registering to DANIELA RICE MILL</p>
									<p> Kindly confirm your email address via the link below in order to start using your profile</p>
									<p> <a href='http://deniela.shop/confirm.php?name=$name&email=$email'> Link Here </a> </p>
								</body>
							</html>";

			if ($mail->send()) {
				$message = 'success';
			} else {
				$message = 'failed';
			}
			
		$mysqli->query("INSERT INTO pos_customer (firstname,lastname,email,address,contact,password,username,valid_id,business_permit,proof) 
								VALUES ('$firstname','$lastname','$email','$address','$contact','$password','$username','$location1','$location2','$location3')");
		echo "<script> window.location.href='../login.php?registered'; </script>";
		
	}
	}
