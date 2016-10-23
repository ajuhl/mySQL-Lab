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

$array = $_POST['remove'];

echo "<html>
			<head><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'></head>
				<body>";
				
if(sizeof($array) != 0){
	for($i=0; $i<sizeof($array); $i++){
		$query = "DELETE FROM Posts WHERE post_id = '".$array[$i]."'";
		$conn->query($query);
	}
	echo "<p>The selected posts were deleted</p>";
}
else{
	echo "<p>No posts were selected</p>";
}
echo "<br><a href='https://people.eecs.ku.edu/~ajuhl/eecs448/Lab5/DeletePost.html' class='btn btn-info' role='button'>Delete Post</a>
		<a href='https://people.eecs.ku.edu/~ajuhl/eecs448/Lab5/Administrator.html' class='btn btn-info' role='button'>Admin page</a>
		<a href='https://people.eecs.ku.edu/~ajuhl/eecs448/Lab5/index.html' class='btn btn-info' role='button'>Home</a>
		</body>
		</html>";
$conn>close();
?>