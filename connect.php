<?php
	$Fullname = $_POST['Fullname'];
	$Username = $_POST['Username'];
    $email = $_POST['email'];
    $digits = $_POST['digits'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
	$gender = $_POST['gender'];

	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(Fullname, Username, email, digits, password, cpassword, gender) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssisss", $Fullname, $Username, $email, $digits, $password, $cpassword, $gender);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		header('location:Login.html');
		$stmt->close();
		$conn->close();
	}
?>