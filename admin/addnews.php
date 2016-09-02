<?php
	session_start();
	if (isset($_SESSION['admin']) && $_SESSION['admin'] = "logged") {
		include 'config.php';
		include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Xeber artir</title>
</head>
<body>
	<center>
	<form action="" method="POST" enctype="multipart/form-data">
		Title: <input type="text" name="title" placeholder="Title" required=""><br><br>
		Content: <input type="text" name="content" placeholder="Content" required=""><br><br>
		Image: <input type="file" name="image" required=""><br><br>
		<input type="submit" name="submit" value="Gonder">
	</form>
	</center>
</body>
</html>
<?php
		if(isset($_POST) && isset($_POST['title']) && isset($_POST['content']) && isset($_FILES['image'])) {
			$title = $_POST['title'];
			$content = $_POST['content'];
			$currentDate = date("dmYHis");
			$filetype = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
			$filename = $currentDate . ".$filetype";
			$target_file = "../images/uploads/".$filename;
			if($filetype == "jpg" || $filetype == "png" || $filetype == "jpeg") {
				if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
					$db = new Database();
	} else {
		echo "Daxil olmamisiniz";
		header("Refresh: 1.5; index.php");
	}
?>