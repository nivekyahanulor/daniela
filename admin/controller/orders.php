<?php
include('../controller/database.php');

	
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require 'phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';


if($_GET['data'] == 'pending'){
	$status = 1;
} else if($_GET['data'] == 'approved'){
	$status = 2;
}if($_GET['data'] == 'cancelled'){
	$status = 5;
}if($_GET['data'] == 'reschedule'){
	$status = 4;
}if($_GET['data'] == 'completed'){
	$status = 6;
}if($_GET['data'] == 'ongoing'){
	$status = 8;
}if($_GET['data'] == 'fordelivery'){
	$status = 7;
}if($_GET['data'] == 'pickup'){
	$status = 9;
}
$checkout   = $mysqli->query("	SELECT a.* ,b.*, c.*,d.* , sum(b.item_price * a.qty)price,c.status as order_status from pos_order a 
								left join pos_items b on a.item_id = b.item_id 
								left join pos_checkout_order c on c.transcode =a.trans_code 
								left join pos_customer d on d.customer_id =a.customer_id 
								where c.status = '$status'  group by a.trans_code");
if(isset($_GET['data-transcode'])){		
$transcode = $_GET['data-transcode'];					
$checkout   = $mysqli->query("	SELECT a.* ,b.*, c.*,d.* , sum(b.item_price * a.qty)price,c.status as order_status from pos_order a 
								left join pos_items b on a.item_id = b.item_id 
								left join pos_checkout_order c on c.transcode =a.trans_code 
								left join pos_customer d on d.customer_id =a.customer_id 
								where  c.transcode='$transcode'  group by a.trans_code");
}
if(isset($_POST['update-order'])){
	
	$checkout_id  = $_POST['checkout_id'];
	$trans_code   = $_POST['trans_code'];
	$status       = $_POST['status'];
	$name         = $_POST['name'];
	$email        = $_POST['email'];
	
	
	if($status  == '1'){
		$statuse = 1;
	} if($status  == '2'){
		$statuse = "Approved and now ready for pickup or delivery";
	}if($status  == '5'){
		$statuse = "Cancelled";
	}if($status  == '4'){
		$statuse = "Cancelled";
	}if($status  == '6'){
		$statuse = "Completed.";
	}if($status  == '8'){
		$statuse = 8;
	}if($status  == '7'){
		$statuse = "For Delivery";
	}if($status  == '8'){
		$statuse = "Pickup";
	}
	
	if($status == 2){
		$orders1    = $mysqli->query("SELECT a.* ,b.* from pos_order a left join pos_items b on a.item_id = b.item_id where a.status = 1 and a.trans_code='$trans_code' ");
		while($val2 = $orders1->fetch_object()){	
			$qty =$val2->qty;
			$item_id  =$val2->item_id ;
			$mysqli->query("UPDATE pos_items set stock =stock-'$qty' where item_id='$item_id'");
		}
		$mysqli->query("UPDATE pos_checkout_order set status ='$status' where checkout_id='$checkout_id'");

	} else {
		
		$mysqli->query("UPDATE pos_checkout_order set status ='$status' where checkout_id='$checkout_id'");
	
	}
	
	
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
			$mail->Subject = 'Order Details';
			$mail->isHTML(true);


			$mail->Body = "<html>
								<body>
									<h1>Hello , " .$name ." </h1>
									<p> Your order status is ". $statuse." </p>
									<p> Thank You!</p>
								</body>
							</html>";

			if ($mail->send()) {
				$message = 'success';
			} else {
				$message = 'failed';
			}
		

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Order Data Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "order.php?updated&data='.$_GET['data'].'";
							});
			</script>';
	
}
