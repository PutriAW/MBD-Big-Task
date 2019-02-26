<?php 	
	$notif = '';
	if(!empty($_POST)){
		$conn = mysqli_connect("localhost","root","","smart_kuy") or die("koneksi gagal!");
		if($conn){
			#berhasil
			$sql = 'INSERT INTO book_data (nama,class,email,subject,comment)
						VALUES ("'.$_POST["name"].'", "'.$_POST["class"].'", "'.$_POST["email"].'", "'.$_POST["subject"].'", "'.$_POST["comment"].'")';
			
			if(mysqli_query($conn, $sql)){
				$notif = '<div class="alert alert-success">
						    <strong>Success!</strong> Data anda telah terkirim !
						  </div>';
			}else{
				$notif = '<div class="alert alert-danger">
						    <strong>Error!</strong> '.mysqli_error($conn).'.
						  </div>';
			}
		}else{
			#gagal
			$notif = '<div class="alert alert-danger">
						    <strong>Error!</strong> Koneksi Gagal.
						  </div>';
		}
		mysqli_close($conn);
	}
?>
<!DOCTYPE html>

<head>
	<title>SmartKuy</title>
	<meta charset="utf-8">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="header">
		<?php include 'header.php'; ?>
	</div>
	<div id="body">
		<div class="content">
			<div>
				<div>
					<h1>Book Form</h1>
					<?php echo $notif; ?>
					<form method="post" action="book.php">
						<label for="name"> <span class="text">Name :</span>
							<input type="text" name="name" id="name" placeholder="Your Name" required="">
						</label>
						<label for="email"> <span>Class :</span>
							<input type="text" name="class" id="class" placeholder="IF-XX-XX" required="">
						</label>
						<label for="email"> <span>E-mail :</span>
							<input type="text" name="email" id="email" placeholder="Your E-mail" required="">
						</label>
						<label for="subject"> <span>Subject :</span>
							<input type="text" name="subject" id="subject" placeholder="Ex: STD" required="">
						</label>
						<label for="message"> <span>Notes :</span>
							<textarea name="comment" id="message"></textarea>
						</label>
						<input type="submit" value="">
					</form>
				</div>
			</div>
		</div>
		<div class="sidebar">
			<h1>Open Everyday</h1>
			<span>including holidays</span> <span>from 8AM until 9PM</span>
			<h1>Address</h1>
			<span>Telkom University,</span> <span>01 Telekomunikasi Street,</span> <span>Bandung, 40257</span>
			<h1>Phone Number</h1>
			<span>081212797119</span>
		</div>
	</div>
	<div id="footer">
		<?php include 'footer.php'; ?>
	</div>
</body>
</html>