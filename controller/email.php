<?php

	// error_reporting(0);
			$name = "Kevin Roluna";
			$email = "kevinjayroluna@gmail.com";
			
			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\Exception;

			require 'phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
			require 'phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
			require 'phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';
			$mail = new PHPMailer(true);                              
			try {
				$mail->isSMTP(); // using SMTP protocol                                     
				$mail->Host = 'smtp-relay.sendinblue.com'; // SMTP host as gmail 
				$mail->SMTPAuth = true;  // enable smtp authentication                             
				$mail->Username = 'kevinjayroluna@gmail.com';  // sender gmail host              
				$mail->Password = 'UIqzBvERCFGH9NTd'; // sender gmail host password                          
				$mail->SMTPSecure = 'tls';  // for encrypted connection                           
				$mail->Port = 587;   // port for SMTP     

				$mail->setFrom('jkbrsystems@gmail.com', "Sender"); // sender's email and name
				$mail->addAddress('kevinjayroluna@gmail.com', "Receiver");  // receiver's email and name

				$mail->Subject = 'Test subject';
				$mail->Body    = 'Test body';

				$mail->send();
				echo 'Message has been sent';
			} catch (Exception $e) { // handle error.
				echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}
						
			