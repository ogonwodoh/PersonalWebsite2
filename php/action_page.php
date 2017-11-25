<?php
 
	// grab recaptcha library
	require_once "recaptchalib.php";

	// your secret key
	$secret = "6Lf7LDoUAAAAAF2r3jMOlM1TXKJLd_nbDzbU2kk1";
	
	// empty response
	$response = null;
 
	// check secret key
	$reCaptcha = new ReCaptcha($secret);

	if ($_POST["g-recaptcha-response"]) {
		$response = $reCaptcha->verifyResponse(
		$_SERVER["REMOTE_ADDR"],
		$_POST["g-recaptcha-response"]);
	}
	
	if($response != null && $response->success) {
		$sender_name=$_POST['fname'];
		$sender_email=$_POST['femail'];
		$message=$_POST['fmessage'];
		$subject = 'www.ogonwodoh.com Message from visitor ' . $sender_name;

		$email_message = "From: " . $sender_name . "\r\nMessage: " . $message ."\r\n";
		$mail_sent = mail("ogonwodoh@gmail.com", $subject, $email_message);


		if ($mail_sent == true){ ?>
        	<script language="javascript" type="text/javascript">
        		alert('Thank you for the message. I will contact you shortly.');
        		window.location = '../#contact';
        	</script>
    	<?php } else { ?>
    		<script language="javascript" type="text/javascript">
        		alert('Message not sent.');
        		window.location = '../#contact';
    		</script>
    	<?php
    	}
	} else { ?>
    	<script language="javascript" type="text/javascript">
        	alert('Message not sent.');
        	window.location = '../#contact';
    	</script>
    <?php
	}
?>
