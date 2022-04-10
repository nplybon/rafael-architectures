<head>
	<link rel="stylesheet" href="../mystyle.css">
	<meta charset="UTF-8">
</head>
<?php
if (isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	// generate a response based on if the email is valid or not
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Invalid email format, please enter a valid email and submit the form again.";
	} else {
		echo "Thanks $name for your response.<br>";
		echo "Email: $email<br>";
		echo "Subject: $subject<br>";
		echo "Message: $message<br>";
	}
}
?>