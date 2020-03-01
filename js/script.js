$(document).ready(function(){
	$error = $('<center><label class = "text-danger">Please fill up the required field!</label></center>');
	$error1 = $('<center><label class = "text-danger">Invalid username or password</label></center>');
	$error2 = $('<center><label class = "text-danger">User Not Found</label></center>');

/*	Student Login*/
	$(document).on('click', '#student_login' ,function(){
		if($('#student_id').val() == ""){
			alert('Please enter your ID');
		}else{	
			$student_id = $('#student_id').val();
			$('#student_content').empty();
			$loader = $(
			'<center><label>Please wait...</label></center>'
			+ '<center><img src = "images/loader.gif" height = "50px"/></center>'
			);
			$loader.appendTo($('#student_content'));
			setTimeout(function(){
				$loader.remove();
				$.post('check_student.php', {student_id: $student_id},
					function(res){
						if(res == "Success"){
							$.ajax({
								url: 'load_student.php',
								type: 'POST',
								data:{
									student_id: $student_id
								},
								success: function(res){
									$('#student_content').html(res);
								}
							});
						}else{
							$error2.appendTo($('#student_content'));
							setTimeout(function(){
								$error2.remove();
								$('#student_content').html(res);
							},2000)
							
						}
					}
				)
			},3000);
		}	
	});

/*	Student Logout*/
	$(document).on('click', '.logout', function(){
		$('#transaction').fadeOut();
		$loader = $(
			'<center><label>Logging Out...</label></center>'
			+ '<center><img src = "images/loader.gif" height = "50px"/></center>'
			);
		$('#student_content').empty();	
		$loader.appendTo($('#student_content'));
			setTimeout(function(){
				$loader.remove();
				$.ajax({
					url: 'logout.php',
					success: function(res){
						$('#student_content').html(res);
					}
				});
			}, 3000);
	});
/*****	*****/
	
	  	/*vid login*/ 
	$('#login1').click(function(){
		$loading = $('<center><img src = "images/loading.gif" height = "10px"/></center>');
		$error.remove();
		$error1.remove();
		$username = $('#username').val();
		$password = $('#password').val();
		if($username == "" && $password == ""){
			$error.appendTo('#loading');
		}else{
			$loading.appendTo('#loading');
			setTimeout(function(){	
				$.post('check_officer.php',{username: $username, password: $password},
					function(result){
						if(result == "Success"){
							window.location = "vid/index.php";
						}else{
							$('#username').val('');
							$('#password').val('');
							$loading.remove();
							$error1.appendTo('#loading');
						}
					}
				)
			}, 3000);
		}
	});
/*   Administrator Login  */	
	$('#login').click(function(){
		$loading = $('<center><img src = "../images/loading.gif" height = "10px"/></center>');
		$error.remove();
		$error1.remove();
		$username = $('#username').val();
		$password = $('#password').val();
		if($username == "" && $password == ""){
			$error.appendTo('#loading');
		}else{
			$loading.appendTo('#loading');
			setTimeout(function(){	
				$.post('check_admin.php',{username: $username, password: $password},
					function(result){
						if(result == "Success"){
							window.location = "home.php";
						}else{
							$('#username').val('');
							$('#password').val('');
							$loading.remove();
							$error1.appendTo('#loading');
						}
					}
				)
			}, 3000);
		}
	});
	
/*   Administrator Toggle  */	
	$('#add_admin').click(function(){
		$('#a_table').hide();
		$('#a_form').show();
		$(this).hide();
		$('#cancel_admin').show();
	});
	$('#cancel_admin').click(function(){
		$('#a_table').show();
		$('#a_form').hide();
		$(this).hide();
		$('#add_admin').show();
	});

/*	 Student Toggle	 */
	$('#add_driver').click(function(){
		$('#s_table').hide();
		$('#s_form').show();
		$(this).hide();
		$('#cancel_driver').show();
	});
	$('#cancel_driver').click(function(){
		$('#s_table').show();
		$('#s_form').hide();
		$(this).hide();
		$('#add_driver').show();
	});
/*    offense add Toggle   */
	$('#add_offense').click(function(){
		$('#act_table').hide();
		$('#act_form').show();
		$(this).hide();
		$('#cancel_offense').show();
	});
	$('#cancel_offense').click(function(){
		$('#act_table').show();
		$('#act_form').hide();
		$(this).hide();
		$('#add_offense').show();
	});
	/* locations/stations add toggle*/
		$('#add_station').click(function(){
		$('#station_table').hide();
		$('#sta_form').show();
		$(this).hide();
		$('#cancel_station').show();
	});
	$('#cancel_station').click(function(){
		$('#station_table').show();
		$('#sta_form').hide();
		$(this).hide();
		$('#add_station').show();
	});
	// impounding add toggle
	
    	$('#add_impound').click(function(){
		$('#recent_table').hide();
		$('#impound_form').show();
		$(this).hide();
		$('#cancel_impound').show();
	});
	$('#cancel_impound').click(function(){
		$('#recent_table').show();
		$('#impound_form').hide();
		$(this).hide();
		$('#add_impound').show();
	});
	
/*	Expenses Toogle	*/
	$('#add_expenses').click(function(){
		$('#exp_table').hide();
		$('#exp_form').show();
		$(this).hide();
		$('#cancel_expenses').show();
	});
	$('#cancel_expenses').click(function(){
		$('#exp_table').show();
		$('#exp_form').hide();
		$(this).hide();
		$('#add_expenses').show();
	});
	

	
/*	Search driver	script*/	
	$('#btn_search').click(function(){
		$load_status = $('<center><h2>Please Wait .....<br><img src = "../images/loading.gif" height = "10px"/></h2></center>');
		$error_status = $('<center><h2 class = "text-danger">licence number  Not Found ,its suspected not be original!</h2></center>'
			);
		if($('#search').val().length < 4){
			alert('Please enter at least characters');
		}
		else{
			$('#result').empty();
			$load_status.appendTo('#result');
			$license_id = $('#search').val();
			setTimeout(function(){
				$.post('check_driverid.php', {license_id: $license_id},
					function(result){
						if(result == "Success"){
							$('#result').load('get_driverid.php?license_id=' + $license_id);
						}else{
							$load_status.remove();
							$error_status.appendTo('#result');
						}
					}
				)
			}, 2000);
		}	
	});	
// validation for inputs
function charactersOnly(input){
	var regex = /[^a-z0-9]/g;
	input.value = input.value.replace(regex,"");
}
function charactermixOnly(input){
	var regex = /[^a-z0-9]/gi;
	input.value = input.value.replace(regex,"");
}
function character1Only(input){
	var regex = /[^a-z]/gi;
	input.value = input.value.replace(regex,"");
}
function namesOnly(input){
	var regex = /[^a-z0-9']/g;
	input.value = input.value.replace(regex,"");
}
function numbersOnly(input){
	var regex = /[^0-9]/g;
	input.value = input.value.replace(regex,"");
}


/*		Student Transact	  */	
	$(document).on('click', '.btn_transact', function(){
			$('.balance').attr('style', 'text-decoration:underline;');
			$('#load_data').load('transact_bal.php');
			$('.btn_transact').hide();
		setTimeout(function(){
			$('#transaction').fadeIn();
		}, 1000);
	});
	$('.close').on('click', function(){
		$('#transaction').fadeOut();
		$('.btn_transact').show();
	});
	$('.paid').on('click', function(){
		$('.balance').removeAttr('style', 'text-decoration:underline;');
		$(this).attr('style', 'text-decoration:underline;');
		$load = $('<center><h2>Please Wait...</h2></center>');
		$('#load_data').empty();
		$load.appendTo('#load_data');
		setTimeout(function(){
			$load.remove();
			$('#load_data').load('transact_paid.php')
		}, 2000);
	});
	$('.balance').on('click', function(){
		$('.paid').removeAttr('style', 'text-decoration:underline;');
		$(this).attr('style', 'text-decoration:underline;');
		$load = $('<center><h2>Please Wait...</h2></center>');
		$('#load_data').empty();
		$load.appendTo('#load_data');
		setTimeout(function(){
			$load.remove();
			$('#load_data').load('transact_bal.php')
		}, 2000);
	});
});	