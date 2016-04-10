<?php

	$to      = "paras.shah@netsmartz.net";
	$subject = 'the subject';
	$message = 'hello';
	$headers = 'From: '. $_CONF['adminEmail']. "\r\n" .
		'Reply-To: webmaster@example.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	if(mail($to, $subject, $message, $headers))
		echo "Mail Sent";
	else
		echo "Error:: Mail can not be Sent";	

?>