<head>
	<link rel="stylesheet" href="../mystyle.css">
	<meta charset="UTF-8">
</head>

<!DOCTYPE html>
<html lang="en">

<!--Set the title and set up css-->

<head>
	<title>Contact</title>
	<link rel="stylesheet" href="../mystyle.css">
	<meta charset="UTF-8">
</head>

<body>

	<!--Link each button in the menu bar to their respective page-->
	<ul>
		<li><a href="../index.html">Home</a></li>
		<li><a href="../pages/gallery.html">Gallery</a></li>
		<li><a href="../pages/resume.html">Resume</a></li>
		<li><a class="active" href="contact.php">Contact</a></li>
		<li><a href="../pages/about.html">About</a></li>

	</ul>
	<!--Set the header and display entry fields for First and Last name along with
	a comment entry field so the user can leave any personal info or message they desire credit goes to w3schools-->
	<div class="grid-container">
		<div class="item1">
			<h1>
				Contact
			</h1>
		</div>
		<div class="item2">

			<!-- We used a contact form instead of a login feature becuase it made more sense-->
			<div class="container">
				<form action="contact.php" method="post">
					<div>
						<label for="name">Name: *</label>
						<input type="text" name="name" required="required" placeholder="Enter your name" />
					</div>
		
					<div>
						<label for="name">Email: *</label>
						<input type="text" name="email" required="required" placeholder="Enter your email" />
					</div>
					<div>
						<label for="name">Subject: *</label>
						<input type="text" name="subject" required="required" placeholder="Enter a subject" />
					</div>
					<div>
						<label for="name">Message: *</label>
						<input type="text" name="text" required="required" placeholder="Enter a message" />
					</div>
		
					<input type="submit" value="Submit">
				</form>
			</div>


		</div>

		<!--Create three links one to the company insta, company email and linkedin profile-->
		<div class="item3">
			<p>Follow
				<a href="https://www.instagram.com/rafaelarchitectures/">@rafaelarchitectures</a>
				on Instagram!
			</p>
			<p>Email 
				<a href="mailto:rafanic12@gmail.com">rafanic12@gmail.com</a>
			</p>
			<p>Connect with me on LinkedIn
				<a
					href="https://www.linkedin.com/in/rafael-manzanares-129161220?trk=people-guest_people_search-card">here</a>
			</p>

		</div>
	</div>
</body>
</html>

<?php
include_once 'database.php';

$query = "SELECT * FROM users";
if($result = mysqli_query($conn, $query)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>name</th>";
                echo "<th>email</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['userID'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else{
        echo "No comments about Rafael Architectures at this time.";
    }
} else{
    echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
}

if (isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['text'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$time = date("F j, Y, g:i a"); 
	$text = $_POST['text'];		
	$insertusers = "INSERT INTO users (name, email)
	VALUES ('$name','$email')";

	if (!mysqli_query($conn, $insertusers)) {
		echo "Error inserting into users table";
	} 
	$sql = "SELECT userID FROM users WHERE name = $name";
	$userID = mysqli_query($conn, $sql);
	echo "$userID";
	$insertmessages = "INSERT INTO messages (userID, subject, text, time)
	VALUES ('$userID', '$subject', '$text', '$time')";
	 if (mysqli_query($conn, $insertmessages)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $insertmessages . "" . mysqli_error($conn);
	 }

	$query = "SELECT * FROM users";
	$result = mysqli_query($conn, $query);

	// while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
	// 	//echo "<tr><td>" . htmlspecialchars($row['name']) . "</td><td>" . htmlspecialchars($row['email']) . "</td></tr>";  //$row['index'] the index here is a field name
	// 	echo "<p>{$name} <br> {$email}";
	// }

	mysqli_close($conn);

} 
?>