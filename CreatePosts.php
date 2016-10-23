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
$content = $_POST['post'];
$query = "SELECT user_id FROM Users";
$insert = "INSERT INTO Posts (content, author_id) VALUES ('".$content."', '".$user."')";
$continue = 0;
$result = $conn->query($query);


echo "<html>
			<head><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'></head>
				<body>";
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		if($row['user_id'] == $user){
			$conn->query($insert);
			$continue = 1;
			echo "<p>".$user."'s post was saved!</p><br>";
			echo "<a href='https://people.eecs.ku.edu/~ajuhl/eecs448/Lab5/CreatePosts.html' class='btn btn-info' role='button'>Create Post</a>
		<a href='https://people.eecs.ku.edu/~ajuhl/eecs448/Lab5/CreateUser.html' class='btn btn-info' role='button'>Create User</a>
		<a href='https://people.eecs.ku.edu/~ajuhl/eecs448/Lab5/index.html' class='btn btn-info' role='button'>Home</a>";	
			return;
		}
	}
}
if($result->num_rows == 0 || $continue == 0){
	echo "<p>User does not exist.</p><br>
			<a href='https://people.eecs.ku.edu/~ajuhl/eecs448/Lab5/CreatePosts.html' class='btn btn-info' role='button'>Try again</a>";
}
echo "</body>
	</html>";
/* close connection */
$conn->close();
?>