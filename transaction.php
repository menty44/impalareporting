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
			<li><a href="pos.php">POS</a></li>
			<li class="active"><a href="transaction.php">Transactions</a></li>
		</ul>
		<br />
		<div class = "col-md-12 well">
			<br/>
			<br/>
			<div class = "alert alert-info">
				<table id = "table" class = "table table-striped bootstap-datatable">
					<thead>
						<tr>
							<th>Uuid</th>
							<th>merchant name</th>
							<th>account</th>
							<th>transactiontype</th>
							<th>cardtype</th>
							<th>cardnumber</th>
							<th>Amount</th>
							<th>Time</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $conn->query("SELECT * FROM transactions") or die(mysqli_error());
							while($f_query = $query->fetch_array()){
						?>

						<tr>
							<td><?php echo $f_query['uuid']?></td>
							<td><?php echo $f_query['merchant_name']?></td>
							<td><?php echo $f_query['account']?></td>
							<td><?php echo $f_query['transaction_type']?></td>
							<td><?php echo $f_query['card_type']?></td>
							<td><?php echo $f_query['card_number']?></td>
							<td><?php echo $f_query['amount']?></td>
							<td><?php echo $f_query['transaction_time']?></td>
							<td><?php echo $f_query['transaction_status']?></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
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