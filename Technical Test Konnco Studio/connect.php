<?php
	$name = $_POST['name'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$detail = $_POST['detail'];
	$fileName = $_POST['fileName'];

	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, quantity, price, detail, fileName) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("siiss", $name, $quantity, $price, $detail, $fileName);
		$execval = $stmt->execute();
		echo $execval;
		echo "A new product has been added!";
		$stmt->close();
		$conn->close();
	}
?>