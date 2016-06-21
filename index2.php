<html>
<head>
</head>
<body>
<?php
echo $datum=$_GET['datum'];
echo date('l',strtotime($datum));
?>
</body>
</html>