<?php
	session_start();
	if (isset($_SESSION['admin']) && $_SESSION['admin'] = "logged") {
		include 'config.php';
		if(isset($_GET['logout']) && $_GET['logout'] == "out") {
			session_destroy();
			echo "Hesabdan cixdiniz";
			header("Refresh: 1.5; index.php");
		} else {
			include 'database.php';
			$db = new Database($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="pull-right" style="margin: 10px 0;">
	<a href="addnews.php" class="btn btn-success">Xeber artir</a>
	<a href="admin.php?logout=out" class="btn btn-danger">Cixis</a>
</div>
	<br><br>
<table class="table table-bordered table-striped table-hover">
	<thead>
		<th>#</th>
		<th>Title</th>
		<th>Subcontent</th>
		<th>Content</th>
		<th>Image</th>
		<th>Image Path</th>
		<th>Date</th>
		<th>View Count</th>
		<th>Action</th>
	</thead>
	<tbody>
		<?php
			$all = $db->getAllNews();
			while($result = mysqli_fetch_assoc($all)) {
					$id = $result['id'];
		?>
				<tr>
					<td><?= $id ?></td>
					<td><?=$result['title']?></td>
					<td><?=$result['subcontent']?></td>
					<td><?=$result['content']?></td>
					<td><img width="100px" height="100px" src="<?=$result['image_path']?>"></td>
					<td><?=$result['image_path']?></td>
					<td><?=$result['date']?></td>
					<td><?=$result['view_count']?></td>
					<td>soon</td>
				</tr>
		<?php
			}
		?>
	</tbody>
</table>

</body>
</html>
<?php
		}
	} else {
		echo "Xeta!";
		header("Refresh: 1.5; index.php");
	}
?>