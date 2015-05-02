<?php
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	
	$formcontent="Name: $name\n\nEmail: $email\n\nMessage: $message";

	//sathy code
	$connection = mysql_connect("localhost","fur13358_sathya","Furnify_20"); 
	if (!$connection) { die('Could not connect: ' . mysql_error()); }
	                 
	mysql_select_db('fur13358_landingpage',$connection);

	// validation of email
	if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) 
		{
  
	$sql="INSERT INTO store_user_data (email,name) VALUES ('$_POST[email]','$_POST[name]')";
		
	if ((!mysql_query($sql,$connection)))

		{ die('Error: ' . mysql_error()); }
	mysql_close($connection);
	
	// Enter the email where you want to receive the notification when someone submit form
	$recipient = "hello@furnify.in";
	
	$subject = "Some one likes us!";
	
	$mailheader = "From: $email\\r\\n";
	$mailheader .= "Reply-To: $email\\r\\n";
	$mailheader .= "MIME-Version: 1.0\\r\\n";
	
	$success = mail($recipient, $subject, $formcontent, $mailheader);
	
	if ($success == true){
	
?>
	
	<script language="javascript" type="text/javascript">
		alert('Thank you for you e-mail. We will contact you shortly.');
		window.location = "../index.html";
	</script>
	
<?php
	
	} else {
	
?>

    <script language="javascript" type="text/javascript">
		alert('Message not sent.');
		window.location = "../index.html";
    </script>
	
<?php

    }

	  }
	else
	{ 

?>

    <script language="javascript" type="text/javascript">
		alert('Oops! Did you enter a valid e-mail? You could miss out on our launch date.');
		window.location = "../index.html";
    </script>
	
<?php
		die('Error: ' . mysql_error()); }
	mysql_close($connection);
?>