<?php
	$firstName = $_POST['firstName'];
	$middleName = $_POST['middleName'];
	$lastName = $_POST['lastName'];
	$branch = $_POST['branch'];
	$year = $_POST['year'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','forms');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registrations(firstName, middleName, lastName, branch, year, gender, email, address, number) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssssss", $firstName, $middleName, $lastName, $branch, $year, $gender, $email, $address, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>