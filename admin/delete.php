<?php
	// Create connection
	$conn=mysqli_connect("localhost","root","mbd2018","smart");
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	// sql to delete a record
	$sql = "DELETE FROM book_data WHERE id='".$_GET['id']."'";

	if (mysqli_query($conn, $sql)) {
	    echo "Record deleted successfully";
	} else {
	    echo "Error deleting record: " . mysqli_error($conn);
	}

	function Redirect($url, $permanent = false)
	{
	    header('Location: ' . $url, true, $permanent ? 301 : 302);

	    exit();
	}

	Redirect('http://localhost/smart%20kuy/admin/listbook.php', false);
	mysqli_close($conn);
?>

