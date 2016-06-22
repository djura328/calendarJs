<?php
include "connector.php";
echo $datum=$_GET['datum'];
echo date('l',strtotime($datum));
?>
<!DOCTYPE html>
<html lang="en">
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
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script>
	$(document).ready(function(){
		$("#save").hide();
		$("#edit").hide();
		$("#edit").click(function(){
			$("#trajanje").prop('disabled', function(i, v) { return !v; });
			 $("#save").toggle();
		});
		$("#submit").click(function(){
			$(this).prop('disabled', true);
			$("#edit").show();
		});
		$("#save").click(function(){
			$("#trajanje").prop('disabled', true);
			$("#save").toggle();
		});
	});
	</script>

  </head>
  <body>
    <h1>Hello, world!</h1>
	  <?php
			  $i=0;
			  $result=mysqli_query($link,"SELECT * FROM `user`");
			  while($row=mysqli_fetch_array($result)){
	  ?>
	  <div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingThree">
		  <h4 class="panel-title">
			<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseThree">
			  <?php echo $row['first_name']; ?>
			</a>
		  </h4>
		</div>
		<div id="collapseThree<?php echo $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
		  <div class="panel-body list">
			<table class="table table-hover">
				<thead>
					<tr>
					  <th>#</th>
					  <th>Tv</th>
					  <th>Emisija</th>
					  <th>Trajanje</th>
					  <th>Status</th>
					  <th><span class="glyphicon glyphicon-cog"></span></th>
					</tr>
				 </thead>
				  <tbody>
					<tr>
					  <td></td>
					  <td><input type="text" class="form-control input-sm" value="TV PINK" disabled></td>
					  <td><input type="text" class="form-control input-sm" value="Vesti" disabled></td>
					  <td><input type="text" class="form-control input-sm" value="60" disabled id="trajanje"></td>
					  <td valign="middle"><span class="label label-danger"> Pending </span></td>
					  <td><button type="submit" class="btn btn-primary" id="submit">Submit</button> <button type="submit" class="btn btn-danger" id="edit">Edit</button> <button type="submit" class="btn btn-success" id="save">Save</button></td>
					</tr>
					<tr>
					  <td></td>
					  <td><input type="text" class="form-control input-sm" value="TV PINK" disabled></td>
					  <td><input type="text" class="form-control input-sm" value="Vesti" disabled></td>
					  <td><input type="text" class="form-control input-sm" value="60" disabled id="trajanje"></td>
					  <td valign="middle"><span class="label label-success"> Success </span></td>
					  <td><button type="submit" class="btn btn-primary" id="submit">Submit</button> <button type="submit" class="btn btn-danger" id="edit">Edit</button> <button type="submit" class="btn btn-success" id="save">Save</button></td>
					</tr>
				  </tbody>
			</table>
		  </div>
		</div>
	  </div>
	  <?php
	  $i++;
	  }
	  ?>
	</div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>