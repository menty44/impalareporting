<!DOCTYPE HTML>
<?php
	require_once 'session.php';
	require_once 'account_name.php';
?>
<html lang = "eng">
	<head>
		<meta charset =  "UTF-8">
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<title>REPORT Management</title>
	</head>
<body class = "alert-warning">
	<nav class  = "navbar navbar-inverse">
		<div class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand">REPORT Management</a>
			</div>
				<ul class="nav navbar-nav navbar-right">
					<li><a><span class = "glyphicon glyphicon-user"></span> <?php echo $acc_name?></a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
		</div>
	</nav>
	<div class = "container-fluid">
		<ul class="nav nav-pills">
			<li><a href="home.php">Home</a></li>
			<li><a href="account.php">Account</a></li>
			<li class="active"><a href="pos.php">POS</a></li>
			<li><a href="transaction.php">Transactions</a></li>
		</ul>
		<br />
		<div class = "col-md-12 well">
			<button type = "button" class = "btn btn-success"  data-toggle="modal" data-target="#myModal"><span class = "glyphicon glyphicon-plus"></span> Add new device</button>
			<br/>
			<br/>
			<div class = "alert alert-info">
				<table id = "table" class = "table-bordered">
					<thead>
						<tr>
							<th>Username</th>
							<th>Password</th>
							<th>ApiUsername</th>
							<th>Location</th>
							<th>Serial</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $conn->query("SELECT * FROM `member`") or die(mysqli_error());
							while($f_query = $query->fetch_array()){
						?>
						<tr class="danger">
							<td><?php echo $f_query['username']?></td>
							<td><?php echo md5($f_query['password'])?></td>
	                        <td><?php echo $f_query['apiusername']?></td>
	                        <td><?php echo $f_query['location']?></td>
	                        <td><?php echo $f_query['serial']?></td>
	                        <td><?php echo $f_query['status']?></td>
							<td><center><a href = "pos_edit.php?mem_id=<?php echo $f_query['mem_id']?>" class = "btn btn-warning"><span class = "glyphicon glyphicon-edit"></span>  Update</a> | <a  href = "delete_pos.php?mem_id=<?php echo $f_query['mem_id']?>" class = "btn btn-danger"><span class = "glyphicon glyphicon-trash"></span> Delete</a></center></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">POS Registration</h4>
			</div>
			<div class="modal-body">
				<form method = "POST" enctype = "multipart/form-data">
					<!--<div class = "form-group">
						<label>Firstname</label>
						<input type = "text" class = "form-control" id = "firstname"/>
					</div>
					<div class = "form-group">
						<label>Lastname</label>
						<input type = "text" class = "form-control" id = "lastname"/>
					</div>-->
					<div class = "form-group">
						<label>UserName</label>
						<input type = "text" class = "form-control" id = "uname"/>
					</div>
					<div class = "form-group">
						<label>PassWord</label>
						<input type = "password" class = "form-control" id = "password"/>
					</div>
					<div class = "form-group">
						<label>APIUserName</label>
						<input type = "text" class = "form-control" id = "apiuname"/>
					</div>
					<div class = "form-group">
						<label>APIPassWord</label>
						<input type = "password" class = "form-control" id = "apipassword"/>
					</div>
					<div class = "form-group">
						<label>Location</label>
						<input type = "text" class = "form-control" id = "location"/>
					</div>
					<div class = "form-group">
						<label>Serial</label>
						<input type = "text" class = "form-control" id = "serial"/>
					</div>
					<div class = "form-group">
						<label>Longitude</label>
						<input type = "text" class = "form-control" id = "long"/>
					</div>
					<div class = "form-group">
						<label>Latitude</label>
						<input type = "text" class = "form-control" id = "lat"/>
					</div>
					<div class = "form-group">
						<label>Status</label>
						<select id="status">
							  <option value="0">Deactivate</option>
							  <option value="1">Activate</option>
					    </select>
					</div>
					<div id = "loading">
						
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" id= "save_pos" class="btn btn-primary"><span class = "glyphicon glyphicon-save"></span> Save</button>
			</div>
				</form>
		</div>
	</div>
	</div>
	<footer class = "navbar navbar-fixed-bottom navbar-inverse">
		<label class = "pull-right">All rights reserved &copy; <?php echo date('Y', strtotime('+8 HOURS'))?> <a href = "http://www.impalapay.com">www.impalapay.com</a></label>
	</footer>
</body>	
<script src = "js/jquery-3.1.1.js"></script>
<script src = "js/bootstrap.js"></script>
<script src = "js/script.js"></script>
<script src = "js/jquery.dataTables.min.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	})
</script>
</html>