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
		
		
		
		
		if($count !=0){
			echo "<script> window.location.href='../register.php?duplicate'; </script>";
		} else {
			$mail = new PHPMailer(true);                              
			try {
				$mail->isSMTP(); // using SMTP protocol                                     
				$mail->Host = 'smtp-relay.sendinblue.com'; // SMTP host as gmail 
				$mail->SMTPAuth = true;  // enable smtp authentication                             
				$mail->Username = 'kevinjayroluna@gmail.com';  // sender gmail host              
				$mail->Password = 'UIqzBvERCFGH9NTd'; // sender gmail host password                          
				$mail->SMTPSecure = 'tls';  // for encrypted connection                           
				$mail->Port = 587;   // port for SMTP     

				$mail->setFrom('administrator@deniela.shop', "DANIELA RICE MILL"); // sender's email and name
				$mail->addAddress($email);

			   $mail->Subject = 'Account Confirmation';
				
				$mail->Body = "<html>
								<body>
									<h1>Hello , " .$name ." </h1>
									<p> Thank you for registering to DANIELA RICE MILL</p>
									<p> Kindly confirm your email address via the link below in order to start using your profile</p>
									<p> <a href='http://localhost/daniela/confirm.php?name=$name&email=$email'> Link Here </a> </p>
								</body>
							</html>";

				$mail->send();
				echo 'Message has been sent';
			} catch (Exception $e) { // handle error.
				echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}
					
			
		$mysqli->query("INSERT INTO pos_customer (firstname,lastname,email,address,contact,password,username) 
								VALUES ('$firstname','$lastname','$email','$address','$contact','$password','$username')");
		echo "<script> window.location.href='../login.php?registered'; </script>";
		
	}
	}
