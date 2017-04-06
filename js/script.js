$(document).ready(function(){
	$error = $('<center><label class = "text-danger">Please Fill up the form!</label></center>');
	$error1 = $('<center><label class = "text-danger">Invalid username or password</label></center>');
	$loading = $('<center><img src = "images/loading.gif"></center>');
	$load_status= $('<center><label class = "text-success">Waiting...</label></center>');
	$valid = $('<center><label class = "text-danger">Username already taken!</label></center>');
	$mem_valid = $('<center><label class = "text-danger">Device name already exist!</label></center>');
	$mem_valid2 = $('<center><label class = "text-danger">Unknown Device!</label></center>');
	$club_valid = $('<center><label class = "text-danger">Club name already exist!</label></center>');
	$group_valid = $('<center><label class = "text-danger">Device already Registered!</label></center>');
	
// Administrator Login	
	$('#login').click(function(){
		$error.remove();
		$error1.remove();
		$username  = $('#username').val();
		$password = $('#password').val();
		if($username == "" && $password == ""){
			$error.appendTo('#loading');
		}else{
			$loading.appendTo('#loading');
			setTimeout(function(){
				$.post('validate.php', {username: $username, password: $password},
					function(result){
						if(result == "Success"){
							window.location = 'home.php';
							$('#username').val('');
							$('#password').val('');
							$loading.remove();
						}else{
							$error1.appendTo('#loading');
							$('#username').val('');
							$('#password').val('');
							$loading.remove();
						}
					}
				)	
			}, 3000);	
		}
	});
	
//Administrator Registration	
	$('#signup').click(function(){
		$error.remove();
		$valid.remove();
		$username = $('#username').val();
		$password = $('#password').val();
		if($username == "" || $password == ""){
			$error.appendTo('#loading');
		}else{
			$load_status.appendTo('#loading');
			setTimeout(function(){
				$.post('valid_signup.php', {username: $username},
					function(result){
						if(result == "Success"){
							$valid.appendTo('#loading');
						}else{
							$.ajax({
								type: 'POST',
								url: 'save_data.php',
								data: {username: $username, password: $password},
								success: function(){
									window.location = 'account.php';
								}
							});
						}
					}
				)
				$load_status.remove();
			}, 3000)
		}
	});
//Administrator Edit
	$('#acc_edit').click(function(){
		$admin_id = $('#admin_id').val();
		$error.remove();
		$valid.remove();
		$username = $('#username').val();
		$password = $('#password').val();
		if($username == "" || $password == ""){
			$error.appendTo('#loading');
		}else{
			$load_status.appendTo('#loading');
			setTimeout(function(){
				$.post('valid_signup.php', {username: $username},
					function(result){
						if(result == "Success"){
							$valid.appendTo('#loading');
						}else{
							$.ajax({
								type: 'POST',
								url: 'account_edit_query.php?admin_id=' + $admin_id,
								data: {username: $username, password: $password},
								success: function(){
									window.location = 'account.php';
								}
							});
						}
					}
				)
				$load_status.remove();
			}, 3000)
		}
	});
// POS Registration
	$('#save_pos').click(function(){
		$error.remove();
		$mem_valid.remove();
		$username = $('#uname').val();
		$password = $('#password').val();
		$apiusername = $('#apiuname').val();
		$apipassword = $('#apipassword').val();
		$status = $('#status').val();
		$location = $('#location').val();
		$serial = $('#serial').val();
		$longitude = $('#long').val();
		$latitude = $('#lat').val();

		

		if($username == "" || $password == "" || $apiusername == "" || $apipassword == ""|| $location == "" || $serial == ""){
			$error.appendTo('#loading');
		}else{
			$load_status.appendTo('#loading');
			setTimeout(function(){
				$.post('pos_validator.php', {username: $username, apiusername: $apiusername},
					function(result){
						if(result == "Success"){
							$mem_valid.appendTo('#loading');
						}else{
							$.ajax({
								type: 'POST',
								url: 'save_pos.php',
								data: {username: $username, password: $password, apiusername: $apiusername, apipassword: $apipassword, status: $status, location: $location, serial: $serial, longitude: $longitude, latitude: $latitude},
								success: function(){
									window.location = 'pos.php';
								}
							});
						}
					}
				)
			$load_status.remove();	
			}, 3000)
		}
	});
// POS Edit
$('#pos_edit').click(function(){
		$error.remove();
		$mem_id = $('#mem_id').val();
		$mem_valid2.remove();
		$username = $('#uname').val();
		$password = $('#password').val();
		$apiusername = $('#apiuname').val();
		$apipassword = $('#apipassword').val();
		$status = $('#status').val();
		$location = $('#location').val();
		$serial = $('#serial').val();
		$longitude = $('#long').val();
		$latitude = $('#lat').val();
		if($username == "" || $password == "" || $apiusername == "" || $apipassword == ""|| $location == "" || $serial == ""){
			$error.appendTo('#loading');
		}else{
			$load_status.appendTo('#loading');
			setTimeout(function(){
				$.post('pos_edit_validator.php', {username: $username, apiusername: $apiusername},
					function(result){
						if(result == "Success"){
							$mem_valid2.appendTo('#loading');
						}else{
							$.ajax({
								type: 'POST',
								url: 'pos_edit_query.php?mem_id=' + $mem_id,
								data: {username: $username, password: $password, apiusername: $apiusername, apipassword: $apipassword, status: $status, location: $location, serial: $serial, longitude: $longitude, latitude: $latitude},
								success: function(){
									window.location = 'pos.php';
								}
							});
						}
					}
				)
			$load_status.remove();	
			}, 3000)
		}
	});
// Club Registration
$('#save_club').click(function(){
		$error.remove();
		$club_valid.remove();
		$club = $('#club').val();
		if($club == "" ){
			$error.appendTo('#loading');
		}else{
			$load_status.appendTo('#loading');
			setTimeout(function(){
				$.post('club_validator.php', {club: $club},
					function(result){
						if(result == "Success"){
							$club_valid.appendTo('#loading');
						}else{
							$.ajax({
								type: 'POST',
								url: 'save_club.php',
								data: {club: $club},
								success: function(){
									window.location = 'club.php';
								}
							});
						}
					}
				)
			$load_status.remove();	
			}, 3000)
		}
	});
// Club Edit
$('#club_edit').click(function(){
		$error.remove();
		$club_id = $('#club_id').val();
		$club_valid.remove();
		$club = $('#club').val();
		if($club == ""){
			$error.appendTo('#loading');
		}else{
			$load_status.appendTo('#loading');
			setTimeout(function(){
				$.post('club_validator.php', {club: $club},
					function(result){
						if(result == "Success"){
							$club_valid.appendTo('#loading');
						}else{
							$.ajax({
								type: 'POST',
								url: 'club_edit_query.php?club_id=' + $club_id,
								data: {club: $club},
								success: function(){
									window.location = 'club.php';
								}
							});
						}
					}
				)
			$load_status.remove();	
			}, 3000)
		}
	});
	$('#save_group').click(function(){
		$error.remove();
		$group_valid.remove();
		$mem_id = $('#member').val();
		$club_id = $('#club').val();
		if($mem_id == "" ){
			$error.appendTo('#loading');
		}else{
			$load_status.appendTo('#loading');
			setTimeout(function(){
				$.post('group_validator.php', {mem_id: $mem_id, club_id: $club_id},
					function(result){
						if(result == "Success"){
							$group_valid.appendTo('#loading');
						}else{
							$.ajax({
								type: 'POST',
								url: 'save_group.php',
								data: {mem_id: $mem_id, club_id: $club_id},
								success: function(){
									window.location = 'group.php?club_id=' + $club_id;
								}
							});
						}
					}
				)
			$load_status.remove();	
			}, 3000)
		}
	});
});