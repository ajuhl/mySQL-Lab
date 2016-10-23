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

$query = "SELECT user_id FROM Users";
$continue = 1;
$result = $conn->query($query);
echo "<html>
			<head><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'></head>
			<style>
				table, th, td {
					border: 1px solid black;
					border-collapse: collapse;
				}
				th, td {
					padding: 5px;
				}
				th {
					text-align: left;
				}
				</style>
				<body>";
if($result->num_rows > 0){
	echo "<table>
						<tr>
							<th>Users</th>
						</tr>";
	while($row = $result->fetch_assoc()){
		echo "
						<tr>
							<td>".$row['user_id']."</td>
						</tr>";							
	}
	echo	 "</table>
				</body>
		</html>";
}
if($result->num_rows == 0){
	 echo "<p>0 results</p>";
}
echo "<br><a href='https://people.eecs.ku.edu/~ajuhl/eecs448/Lab5/Administrator.html' class='btn btn-info' role='button'>Admin page</a>
<a href='https://people.eecs.ku.edu/~ajuhl/eecs448/Lab5/index.html' class='btn btn-info' role='button'>Home</a>";	
/* close connection */
$conn->close();
?>