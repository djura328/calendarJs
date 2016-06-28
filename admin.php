<?php
include "connector.php";

if(isset($_POST['submit'])){
$name=$_POST['name'];
$first=$_POST['first_date'];
$second=$_POST['second_date'];
echo "aaa";
$query=mysqli_query($link, "SELECT * FROM `broadcast` INNER JOIN `user` ON user.id=broadcast.id_user WHERE (broadcast.date BETWEEN '$first' AND '$second') AND user.first_name='$name' AND (broadcast.status='complete' OR broadcast.status='edited')");
while($res=mysqli_fetch_array($query)){
	echo "<p>" . $res['id'] . " ";
	echo $res['duration'] . "</br></p>";
	echo $res['article'] . "</br>";
}
}
?>
<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<select class="form-control" name="name">
<?php
$query=mysqli_query($link, "SELECT * FROM `user`");
while($res=mysqli_fetch_array($query)){
?>
<option><?php echo $res['first_name']?></option>
<?php
}
?>
</select>
<input type="date" class="form-control" name="first_date">
<input type="date" class="form-control" name="second_date">
<input type="submit" class="btn btn-default" name="submit">
</form>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>