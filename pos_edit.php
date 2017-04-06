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
		<title>POS Management</title>
	</head>
<body class = "alert-warning">
	<nav class  = "navbar navbar-inverse">
		<div class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand">POS Management</a>
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
			<a class = "btn btn-success" href = "pos.php"><span class = "glyphicon glyphicon-hand-right"></span> Back</a>
			<br/>
			<br/>
			<div class = "alert alert-warning">Device / Update</div>
			<div class = "row">	
				<div class = "col-md-2 ">
				</div>
				<div class = "col-md-2">
				</div>
				<div class = "col-md-4">
					<?php
						$acc_query = $conn->query("SELECT * FROM `member` WHERE mem_id = '$_REQUEST[mem_id]'") or die(mysqli_error());
						$acc_fetch = $acc_query->fetch_array();
					?>
					<form method = "POST">
					<div class = "form-group">
						<label>UserName</label>
						<input type = "text" class = "form-control" id = "uname" value = "<?php echo $acc_fetch['username']?>"/>
						<input  id = "mem_id" type = "hidden" value = "<?php echo $acc_fetch['mem_id']?>" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>PassWord</label>
						<input type = "password" class = "form-control" id = "password" value = "<?php echo $acc_fetch['password']?>"/>
					</div>
					<div class = "form-group">
						<label>APIUserName</label>
						<input type = "text" class = "form-control" id = "apiuname" value = "<?php echo $acc_fetch['apiusername']?>"/>
					</div>
					<div class = "form-group">
						<label>APIPassWord</label>
						<input type = "password" class = "form-control" id = "apipassword" value = "<?php echo $acc_fetch['apipassword']?>"/>
					</div>
					<div class = "form-group">
						<label>Location</label>
						<input type = "text" class = "form-control" id = "location" value = "<?php echo $acc_fetch['location']?>"/>
					</div>
					<div class = "form-group">
						<label>Serial</label>
						<input type = "text" class = "form-control" id = "serial" value = "<?php echo $acc_fetch['serial']?>"/>
					</div>
					<div class = "form-group">
						<label>Longitude</label>
						<input type = "text" class = "form-control" id = "long" value = "<?php echo $acc_fetch['longitude']?>"/>
					</div>
					<div class = "form-group">
						<label>Latitude</label>
						<input type = "text" class = "form-control" id = "lat" value = "<?php echo $acc_fetch['latitude']?>"/>
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
						<br />
						<div class = "form-group">
							<button  type = "button" id = "pos_edit" class = "btn btn-warning form-control"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
						</div>
					</form>
				</div>
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