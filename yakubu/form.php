<?php 
$name = $_POST['contactname'];
$email = htmlspecialchars($_POST['contactemail']);
$subject = $_POST['contactsubject'];
$message = $_POST['contactmessage'];
saveToFile($name, $email, $subject, $message); 
saveToDatabase($name, $email, $subject, $message);
header('Location:success.html');

function saveToFile($name, $email, $subject, $message) {   
	$fileHandler = fopen('record.txt', 'a');   
	$string = $name . ',' . ',' . $email. ',' . $subject . ',' . $message . "\n";   
	fwrite($fileHandler, $string);   
	fclose($fileHandler); 
}

function saveToDatabase($name, $email, $subject, $message ) {   
$serverName = "localhost";   
$database = "contactform";   
$username = "root";   
$password = "";
   //Open database connection   
$conn = mysqli_connect($serverName, $username, $password, $database);
   // Check that connection exists   
if (!$conn) {       die("Connection failed: " . mysqli_connect_error());   }     
$sql = "INSERT INTO contact (contactname, contactemail, contactsubject, contactmessage, created_date)       
VALUES ('$name', '$email', '$subject', '$message', NOW())";   
	$result = mysqli_query($conn, $sql);
   //Check for errors   
   if (!$result) {       die("Error: " . $sql . "<br>" . mysqli_error($conn));   }   
   //Close the connection   
   mysqli_close($conn); 
}
?>