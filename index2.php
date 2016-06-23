<?php
include "connector.php";
echo $datum=$_REQUEST['datum'];
echo $day=date('l',strtotime($datum));
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
    <![endif]
	
	<!-- <script>
	$(document).ready(function(){
		$("#save").hide();
		$("#edit").hide();
		$("#edit").click(function(){
			$("#trajanje").prop('readonly', function(i, v) { return !v; });
			$("#brClanaka").prop('readonly', function(i, v) { return !v; });
			 $("#save").toggle();
		});
		$("#submit").click(function(){
			$(this).prop('readonly', true);
			$("#edit").show();
			$("#brClanaka").prop('readonly', true);
		});
		$("#save").click(function(){
			$("#trajanje").prop('readonly', true);
			$("#brClanaka").prop('readonly', true);
			$("#save").toggle();
		});
	});
	</script>-->
	<!--<script>
	$(document).ready(function(){
	$('form').submit(function(){

     var aaa=$('input[name=name_tv]').val();
	 var asd = $(this).parent('form').find('input[name=name_tv]').val();
	 alert(aaa);
	});
	});
	</script>-->
	<!--<script>
	$(document).ready(function(){
	$('form').submit(function(e) {

		var url = "save.php"; // the script where you handle the form input.
		var a = $('button').val();
		alert(a);
		$.ajax({
			   type: "POST",
			   url: url,
			   data: $('form').serialize(), // serializes the form's elements.
			   success: function(data)
			   {
				   alert(data); // show response from the php script.
			   }
			 });

		e.preventDefault(); // avoid to execute the actual submit of the form.
	});
	});
	</script>-->
	<!--<script>
	$(document).ready(function(){
		$('button').on('click',function(){
			$(this).prop('disabled', true);
		});
	});
	</script>-->
	<script>
	$(document).ready(function(){
		$('#exampleModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var name_tv = button.data('name_tv'); // Extract info from data-* attributes
		  var name_emission= button.data('name_emission');
		  var duration= button.data('duration');
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this);
		  modal.find('.modal-title').html(name_tv + '</br>'+ name_emission);
		  modal.find('.modal-body input[name=editTrajanje]').val(duration);
		});
		$("#submit2").click(function(){
			var brClanaka=$('#brClanak').val();
			var trajanje=$('#trajanje').val();
			$.ajax({
				type: "POST",
				url: "save.php", //process to mail
				data: 'brClanaka='+brClanaka+'&trajanje='+trajanje,
				success: function(msg){
					alert("succes"+msg);
				},
				error: function(){
					alert("failure");
				}
			});
		});
	});
	</script>
	<?php
	if(isset($_POST['submit'])){
	$user=$_POST['user'];
	$name_tv=$_POST['name_tv'];
	$name_emission=$_POST['name_emission'];
	$brClanaka=$_POST['brClanaka'];
	$duration=$_POST['duration'];
	$da=$_POST['datum'];
		$dan=date('l',strtotime($da));
	$idUser=$_POST['idUser'];
	$idEmission=$_POST['idEmission'];
	mysqli_query($link, "INSERT INTO `broadcast` (id_user, id_emission, date, duration, article) VALUES ('$idUser', '$idEmission', '$da', '$duration', '$brClanaka')");
	
	}
	?>
  </head>
  <body>
    <h1>Hello, world!</h1>
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	  <?php
			  $i=0;
			  $result=mysqli_query($link,"SELECT DISTINCT user.first_name, user.last_name, user.id AS idUser FROM `user` INNER JOIN `emission` ON user.id=emission.id_user WHERE emission.day='$day'");
			  while($row=mysqli_fetch_array($result)){
	  ?>
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	  <div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingThree">
		  <h4 class="panel-title">
			<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseThree">
			  <?php echo $row['first_name']; ?>
			</a>
		  </h4>
		</div>
		<div id="collapseThree<?php echo $i; ?>" class="panel-collapse collapse<?php if($user==$row['first_name'])echo "in"; ?>" role="tabpanel" aria-labelledby="headingThree">
		  <div class="panel-body list">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
					  <th>#</th>
					  <th>Tv</th>
					  <th>Emisija</th>
					  <th>Vreme</th>
					  <th>Broj clanaka</th>
					  <th>Trajanje</th>
					  <th>Status</th>
					  <th><span class="glyphicon glyphicon-cog"></span></th>
					</tr>
				 </thead>
				  <tbody>
				  <?php
				  $ii=0;
				  $id=$row['idUser'];
				  $res=mysqli_query($link, "SELECT emission.name_tv, emission.name_emission, emission.duration, user.first_name, user.id AS idUser, emission.id AS idEmission FROM `user` INNER JOIN `emission` ON user.id=emission.id_user WHERE user.id=$id");
				  while($row2=mysqli_fetch_array($res)){
				  ?>
					<tr>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						  <td></td>
						  <td><input type="text" class="form-control input-sm" name="name_tv" value="<?php echo $row2['name_tv']; ?>" readonly ></td>
						  <td><input type="text" class="form-control input-sm" name="name_emission" value="<?php echo $row2['name_emission']; ?>" readonly ></td>
						  <td><input type="text" class="form-control input-sm" name="pocetak" value="" id="pocetak" readonly></td>
						  <td><input type="text" class="form-control input-sm" name="brClanaka" value="" id="brClanaka"></td>
						  <td><input type="text" class="form-control input-sm" name="duration" value="<?php echo $row2['duration']; ?>" id="trajanje" placeholder="HH:MM:SS"></td>
						  <td valign="middle"><span class="label label-danger"> Pending </span></td>
						  <input type="hidden" class="form-control input-sm" name="user" value="<?php echo $row2['first_name']; ?>">
						  <input type="hidden" class="form-control input-sm" name="idUser" value="<?php echo $row2['idUser']; ?>">
						  <input type="hidden" class="form-control input-sm" name="idEmission" value="<?php echo $row2['idEmission']; ?>">
						  <input type="hidden" class="form-control input-sm" name="datum" value="<?php echo $datum; ?>">
						  <td><button type="submit" class="btn btn-primary" id="submit" name="submit" value="<?php echo $ii; ?>">Submit</button> <button type="button" class="btn btn-danger" id="edit" name="edit" data-toggle="modal" data-target="#exampleModal" data-name_tv="<?php echo $row2['name_tv']; ?>" data-name_emission="<?php echo $row2['name_emission']; ?>" data-duration="<?php echo $row2['duration']; ?>">Edit</button></td>
						</form>
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="exampleModalLabel">New message</h4>
								  </div>
								  <div class="modal-body">
									<form name="fo" class="fo">
									  <p></p>
									  <div class="form-group">
										<label for="recipient-name" class="control-label">Broj clanaka:</label>
										<input type="text" class="form-control" id="brClanak" name="editBrClanaka">
									  </div>
									  <div class="form-group">
										<label for="recipient-name" class="control-label">Trajanje:</label>
										<input type="text" class="form-control" id="trajanje" name="editTrajanje">
									  </div>
									</form>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<input type="submit" class="btn btn-primary" value="submit" id="submit2">
								  </div>
								</div>
							  </div>
							</div>
					</tr>
				  <?php
				  $ii++;
				  }
				  ?>
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