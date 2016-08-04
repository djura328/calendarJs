<?php
include "connector.php";
mysqli_set_charset($link,"utf8");
echo $datum=$_REQUEST['datum'];
echo $day=date('l',strtotime($datum));
if(isset($_GET['info'])){
$info=$_GET['info'];
}
else{
$info="";
}
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
		  var article= button.data('article');
		  var idUser= button.data('id_user');
		  var idArtice= button.data('id_article');
		  var date= button.data('date');
		  var date_publish= button.data('date_publish');
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this);
		  modal.find('.modal-title').html(name_tv + '</br>'+ name_emission);
		  modal.find('.modal-body input[name=editTrajanje]').val(duration);
		  modal.find('.modal-body input[name=editBrClanaka]').val(article);
		  modal.find('.modal-body input[name=idUserModal]').val(idUser);
		  modal.find('.modal-body input[name=idArticleModal]').val(idArtice);
		  modal.find('.modal-body input[name=dateModal]').val(date);
		  modal.find('.modal-body input[name=date_publish]').val(date_publish);
		});
		$("#submit2").click(function(){
			var brClanaka=$('#brClanak').val();
			var trajanje=$('#trajanje').val();
			var idUser=$('#idUserModal').val();
			var idArticle=$('#idArticleModal').val();
			var date=$('#dateModal').val();
			var date_publish=$('#date_publish').val();
			$.ajax({
				type: "POST",
				url: "save.php", //process to mail
				data: 'brClanaka='+brClanaka+'&trajanje='+trajanje+'&idUser='+idUser+'&idArticle='+idArticle+'&date='+date+'&date_publish='+date_publish,
				success: function(msg){
					alert(msg);
					location.reload();		
				},
				error: function(){
					alert("failure");
				}
			});
		});
	});
	</script>
	<script>
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
		
		$('.napomena').change(function() {	
			var index = $('.napomena').index( this );
			index=parseInt(index) + 1;
			var str = $( "#se"+index+" option:selected" ).val();
			if(str==='Nije uradjeno'){
				$('#napomena'+index).prop('readonly', false);
			}
			else{
				$('#napomena'+index).prop('readonly', true);
				$('#napomena'+index).val('');
			}
		});
		
    });
	$(document).ready(function() {
		$('#seAdd').change(function() {	
			var str = $( "#seAdd option:selected" ).val();
			if(str==='Nije uradjeno'){
				$('#napomenaAdd').prop('readonly', false);
			}
			else{
				$('#napomenaAdd').prop('readonly', true);
				$('#napomenaAdd').val('');
			}
		});
		
    });
	$(document).ready(function(){
		$('#add_name_tv').change(function(){
			//var index = $('#add_name_tv').index( this );
			var a=$('#add_name_tv').val();
			$.ajax({
				type:"POST",
				url:"add_new.php",
				data:'name='+a,
				success: function(msg){
					$('#add_name_emission').html(msg);
				},
				error: function(){
					alert("failure");
				}
			});
		});
	});
	$(document).ready(function(){
		$('#add_name_emission').change(function(){
			var a=$('#add_name_emission').val();
			var b=$('#add_name_tv').val();
			$.ajax({
				type:"POST",
				dataType: "json",
				url:"add_info.php",
				data:'name='+b+'&name_emission='+a,
				success: function(msg){
					$('#pocetak1').val(msg.a);
					$('#duration1').val(msg.b);
					$('#idEmission1').val(msg.c);
					
				},
				error: function(){
					alert("failure");
				}
			});
		});
	});
	</script>
	<?php
	if(isset($_POST['submit']) && !empty($_POST["submit"])){
		if($_POST['rowCount']==0){
			$user=$_POST['user'];
			$name_tv=$_POST['name_tv'];
			$name_emission=$_POST['name_emission'];
			$brClanaka=$_POST['brClanaka'];
			$duration=$_POST['duration'];
			$da=$_POST['datum'];
				$dan=date('l',strtotime($da));
			echo $idUser=$_POST['idUser'];
			echo $idEmission=$_POST['idEmission'];
			$selekt=$_POST['se'];
			$napomena=$_POST['napomena'];
			$datum_objave=$_POST['datum_objave'];
			
			$ch=mysqli_query($link, "SELECT id FROM `broadcast` WHERE date='$da' AND id_user=$idUser AND id_emission=$idEmission");
			if(mysqli_num_rows($ch)==1){
				//
			}
			else{
				if($selekt=="Uradjeno"){
				mysqli_query($link, "INSERT INTO `broadcast` (id_user, id_emission, date, duration, article, status, napomena, date_publish) VALUES ('$idUser', '$idEmission', '$da', '$duration', '$brClanaka', 'complete', '$napomena', '$datum_objave')");
				}
				else{
				mysqli_query($link, "INSERT INTO `broadcast` (id_user, id_emission, date, duration, article, status, napomena, date_publish) VALUES ('$idUser', '$idEmission', '$da', '0', '0', 'stuck', '$napomena', '$datum_objave')");
				}
			}
			
		}
		else{
			$info="Emisija je vec uneta u bazu, mozete je samo izmeniti";
			}	 
	}
	?>
  </head>
  <body>
    <h1>Hello, world!</h1>
	<?php
	if($info!=''){?>
	<div class="alert alert-danger alert-dismissible" role="alert" id="info">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Warning!</strong> <?php echo $info; ?>
	</div>
	<?php }?>
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
					  <th>#</th>
					  <th>Datum objave</th>
					  <th>Naziv televizije/radija</th>
					  <th>Naziv emisije</th>
					  <th>Pocetak emisije</th>
					  <th>Broj priloga</th>
					  <th>Trajanje emisije</th>
					  <th>Status</th>
					  <th>Napomena</th>
					  <th><span class="glyphicon glyphicon-cog"></span></th>
					  <th></th>
					</tr>
				 </thead>
				  <tbody>
				  <?php
				  $ii=1;
				  $id=1;
// User sa sesije se ubacuje ======================================================================================================
					  echo $idUser=1;
//================================================================================================================================
				  //$res=mysqli_query($link, "SELECT emission.name_tv, emission.name_emission, emission.duration, user.first_name, user.id AS idUser, emission.id AS idEmission, emission.time FROM `user` INNER JOIN `emission` ON user.id=emission.id_user WHERE user.id=$id");
				  //$res=mysqli_query($link, "SELECT emission.name_tv, emission.name_emission, emission.duration, user.first_name, user.id AS idUser, emission.id AS idEmission, emission.time FROM `broadcast` INNER JOIN `emission` ON broadcast.id_emission=emission.id INNER JOIN `user` ON broadcast.id_user=user.id WHERE emission.id IN (SELECT id FROM `emission` UNION SELECT id_emission FROM `broadcast` WHERE broadcast.id_user=$id ) AND broadcast.date='$datum' AND broadcast.id_user=$id");
				  //$res=mysqli_query($link, "SELECT name_tv FROM `emission` WHERE id IN (SELECT id FROM `emission` WHERE emission.id_user=1 UNION SELECT id_emission FROM `broadcast` WHERE broadcast.id_user=1 AND date='2016-06-16')");
				  //$res=mysqli_query($link, "SELECT emission.name_tv, emission.time, emission.name_emission, emission.id, broadcast.id_user FROM `emission` INNER JOIN `broadcast` ON emission.id=broadcast.id_emission WHERE broadcast.date='$datum' AND emission.id IN (SELECT id FROM `emission` WHERE emission.id_user=$id UNION SELECT id_emission FROM `broadcast` WHERE broadcast.id_user=$id AND date='$datum')");
				  $res=mysqli_query($link, "SELECT emission.name_tv, emission.time, emission.name_emission, emission.id, emission.duration FROM `emission` WHERE emission.id IN (SELECT id FROM `emission` WHERE emission.id_user=$id UNION SELECT id_emission FROM `broadcast` WHERE broadcast.id_user=$id AND date_publish='$datum') AND emission.day LIKE '%$day%'");
				  while($row2=mysqli_fetch_array($res)){
					  //$name_user=$row2['first_name'];
					  $name_user=1;
					  //$idEmisije=$row2['idEmission'];
					  $idEmisije=$row2['id'];
					  //$idUser=$row2['idUser'];
// User sa sesije se ubacuje ======================================================================================================
					  //echo $idUser=1;
//================================================================================================================================
					  $status=mysqli_query($link, "SELECT * FROM `broadcast` WHERE date_publish='$datum' AND id_emission=$idEmisije");
					  $rowcount=mysqli_num_rows($status);
					  $stat=mysqli_fetch_array($status);
				  ?>
					<tr>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="action">
						  <td></td>
						  <td><input type="date" class="form-control input-sm" value="<?php if($rowcount!=0){echo $stat['date_publish']; $read="readonly";} else{echo $datum; $read="";} ?>" <?php echo $read; ?> id="trajanje" placeholder="Min" name="datum_objave" id="datum_objave" readonly></td>
						  <td><input type="text" class="form-control input-sm" name="name_tv" value="<?php echo $row2['name_tv']; ?>" readonly ></td>
						  <td><input type="text" class="form-control input-sm" name="name_emission" value="<?php echo $row2['name_emission']; ?>" readonly ></td>
						  <td><input type="text" class="form-control input-sm" name="pocetak" value="<?php echo $row2['time']; ?>" id="pocetak" readonly></td>
						  <td><input type="text" class="form-control input-sm" name="brClanaka" required="required" value="<?php if($rowcount!=0){echo $stat['article']; $read="readonly";} else{echo ""; $read="";}?>" id="brClanaka" <?php echo $read; ?> ></td>
						  <td><input type="text" class="form-control input-sm" name="duration"  value="<?php if($rowcount!=0){echo $stat['duration']; $read="readonly";} else{echo $row2['duration']; $read="";} ?>" id="trajanje" placeholder="Min" <?php echo $read; ?>></td>
						  <td valign="middle">  
						  <?php
						  if($rowcount==1){ 
						  $status2=mysqli_query($link, "SELECT status FROM `broadcast` WHERE date_publish='$datum' AND id_emission=$idEmisije");
						  $stat2=mysqli_fetch_array($status2);
						  $fav=$stat2['status'];
							  switch ($fav) {
									case "stuck":
										echo "<span class='label label-danger'>stuck</span>";
										break;
									case "complete":
										echo "<span class='label label-success'>complete</span>";
										break;
									case "edited":
										echo "<span class='label label-info'>edit</span>";
										break;
									case "changed":
										echo "<span class='label label-primary'>changed</span>";
									break;
										
								}
						   }
						   else{echo "<span class='label label-warning'>pending</span>";}
						  ?>
						  </td>
						  <?php
						  $napomena=mysqli_query($link, "SELECT napomena FROM `broadcast` WHERE date_publish='$datum' AND id_emission=$idEmisije AND id_user=$idUser");
						  $nap=mysqli_fetch_array($napomena);
						  ?>
						  <td>
							<select class="form-control napomena" id="se<?php echo $ii; ?>" name="se">
								<option>Uradjeno</option>
								<option>Nije uradjeno</option>
							</select>
						  </td>
						  <td>
						  <input type="text" class="form-control input-sm napomena2" name="napomena" required="required" value="<?php echo $nap['napomena']; ?>" id="napomena<?php echo $ii; ?>" readonly></td>
						  <input type="hidden" class="form-control input-sm" name="user" value="<?php echo $row2['first_name']; ?>">
						  <input type="hidden" class="form-control input-sm" name="idUser" value="<?php echo $idUser; ?>">
						  <input type="hidden" class="form-control input-sm" name="idEmission" value="<?php echo $idEmisije;?>" >
						  <input type="hidden" class="form-control input-sm" name="datum" value="<?php echo $datum; ?>">
						  <input type="hidden" class="form-control input-sm" name="rowCount" value="<?php echo $rowcount; ?>">
						  <td><button type="submit" class="btn btn-primary" id="submit<?php echo $ii; ?>" name="submit" value="<?php echo $ii; ?>" <?php if($rowcount==1){echo "disabled"; } ?>>Submit</button> <button type="button" class="btn btn-danger" id="edit" name="edit" data-toggle="modal" data-target="#exampleModal" data-name_tv="<?php echo $row2['name_tv']; ?>" data-name_emission="<?php echo $row2['name_emission']; ?>" data-duration="<?php echo $row2['duration']; ?>" data-article="<?php if($rowcount!=0){echo $stat['article']; }?>" data-id_user="<?php echo $idUser; ?>" data-id_article="<?php echo $idEmisije; ?>" data-date="<?php echo $datum; ?>" <?php if($rowcount!=1){echo "disabled"; } ?> data-date_publish="<?php echo $stat['date_publish']; ?>">Edit</button></td>
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
										<input type="hidden" class="form-control" id="idArticleModal" name="idArticleModal">
										<input type="hidden" class="form-control" id="idUserModal" name="idUserModal">
										<input type="hidden" class="form-control" id="dateModal" name="dateModal">
									  </div>
									  <div class="form-group">
										<label for="recipient-name" class="control-label">Trajanje:</label>
										<input type="text" class="form-control" id="trajanje" name="editTrajanje">
									  </div>
									  <div class="form-group">
										<label for="recipient-name" class="control-label" style="color:red;">Datum objave:</label>
										<input type="date" class="form-control" id="date_publish" name="date_publish">
									  </div>
									</form>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary" value="submit2" id="submit2" name="submit2">Save</button>
								  </div>
								</div>
							  </div>
							</div>
					</tr>
				  <?php
				  $ii++;
				  }
				  ?>
				  <?php
				  
				  ?>
					<tr>
						<form action="add_emission.php" method="POST" name="add_form" id="add_form">
						  <td></td>
						  <td><input type="date" class="form-control input-sm" value="<?php echo $datum; ?>" name="datum_objave" id="datum_objave"></td>
						  <td>
							  <select class="form-control input-sm" name="name_tv" value="" id="add_name_tv">
								<option></option>
									<?php
									$find=mysqli_query($link, "SELECT DISTINCT  name_tv FROM `emission`");
									while($fi=mysqli_fetch_array($find)){
										echo "<option>" .$fi['name_tv'] . "</option>";
									}
									?>
							  </select>
						  </td>
						  <td>
						  <select class="form-control input-sm" name="name_emission" value="" id="add_name_emission">
								<option></option>
						  </select>
						  </td>
						  <td><input type="text" class="form-control input-sm" name="pocetak" value="" id="pocetak1" readonly></td>
						  <td><input type="text" class="form-control input-sm" name="brClanaka" value="" id="brClanaka1"></td>
						  <td><input type="text" class="form-control input-sm" name="duration"  value="" placeholder="Min" id="duration1"></td>
						  <td valign="middle">  
						  </td>
						  <td>
							<select class="form-control napomena" id="seAdd" name="se">
								<option>Uradjeno</option>
								<option>Nije uradjeno</option>
							</select>
						  </td>
						  <td><input type="text" class="form-control input-sm napomena2" name="napomena" id="napomenaAdd" readonly></td>
						  <input type="hidden" class="form-control input-sm" name="user" value="<?php echo $name_user; ?>">
						  <input type="hidden" class="form-control input-sm" name="idUser" value="<?php echo $idUser; ?>">
						  <input type="hidden" class="form-control input-sm" name="idEmission" value="" id="idEmission1">
						  <input type="hidden" class="form-control input-sm" name="datum" value="<?php echo $datum; ?>">
						  <input type="hidden" class="form-control input-sm" name="rowCount" value="">
						  <td><button type="submit" class="btn btn-primary" id="submit " name="submit" value="<?php echo $ii; ?>" >Submit</button> <button type="button" class="btn btn-danger" id="edit" name="edit" data-toggle="modal" data-target="#exampleModal" data-name_tv="" data-name_emission="" data-duration="" data-article="" data-id_user="" data-date="">Edit</button></td>
						</form>
					</tr>
				  </tbody>
			</table>

	 
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>