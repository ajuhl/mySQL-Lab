<?php
$servername = "mysql.eecs.ku.edu";
$username = "ajuhl";
$password = "password1994";
$dbname = "ajuhl";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$user = $_POST['username'];
$query = "SELECT user_id FROM Users";
$insert = "INSERT INTO Users (user_id) VALUES ('".$user."')";
$continue = 1;
$result = $conn->query($query);

echo "<html>
			<head><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'></head>
				<body>";
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		if($row['user_id'] == $user || $user == null){
			echo "<p>User already exists.</p><br>
								<a href='https://people.eecs.ku.edu/~ajuhl/eecs448/Lab5/CreateUser.html' class='btn btn-info' role='button'>Try again</a>";
			$continue = 0;
			return;
		}
	}
}
if($result->num_rows == 0 || $continue == 1){
	$conn->query($insert);
	echo "<p>User '".$user."' has been created.</p><br>
				<a href='https://people.eecs.ku.edu/~ajuhl/eecs448/Lab5/CreatePosts.html' class='btn btn-info' role='button'>Create Post</a>
				<a href='https://people.eecs.ku.edu/~ajuhl/eecs448/Lab5/CreateUser.html' class='btn btn-info' role='button'>Create User</a>
				<a href='https://people.eecs.ku.edu/~ajuhl/eecs448/Lab5/index.html' class='btn btn-info' role='button'>Home</a>";
}
echo "</body>
		</html>";
/* close connection */
$conn->close();
?>