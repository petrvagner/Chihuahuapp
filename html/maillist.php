<?php
        	$email = $_POST['email'];
        	$file = fopen("chihuahuapp-maillist.txt", "a");
        	fwrite($file, "\n" . $email);
        	fclose($file);
        
        	header("Location: thankyou.html");
?>