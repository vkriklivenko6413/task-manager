$( document ).ready(function() {
	$('#tasks_table').DataTable({
		lengthChange: false,
		pageLength: 3
	});
  // $('.dataTables_length').addClass('bs-select');
    $('#add_task_modal').submit(function(e) {
    	e.preventDefault();
		$.ajax({
	        url: "Main/add_task",
	        type: "get",
	        data: {
	        	'user_name' : $('#user_name').val(),
	        	'email' : $('#email').val(),
	        	'description' : $('#description').val(),
	        },
	        success: function (success) {
	        	if (success) {
	        		$('#myModal').modal('hide');
	        		alert('Task Added! Thanks!');
	        		location.reload();
	        	}
            }
		});
		return false;
	});

	$('#signin').click(function(e) {
    	$('#signin_modal').modal('show');	
	});

	$('#signin_form').submit(function(e) {
    	e.preventDefault();
		$.ajax({
	        url: "User/signin_admin",
	        type: "post",
	        data: {
	        	'login' : $('#login').val(),
	        	'password' : $('#pwd').val()
	        },
	        success: function (success) {
	        	if (success == true) {
	        		$('#signin_modal').modal('hide');
	        		location.reload();
	        	} else {
	        		alert(success);
	        	}
            }
		});
		return false;
	});
    
    $('#logout').click(function () {
    	$.ajax({
	        url: "User/logout",
	        type: "post",
	        success: function () {
	        	location.reload();
            }
		});
    });

    $('#tasks_table').on('click','.change_status',function () {
    	let task_id =  $(this).data('task-id');
    	let checked = $(this).prop("checked") ? 1 : 0;
    	$.ajax({
	        url: "Main/change_record",
	        type: "get", 
	        data: {
	        	'task_id' : task_id,
	        	'value' : checked,
	        	'column' : 'status'
	        },
	        success: function (success) {
	        	if (success == true) {
	        		$('#signin_modal').modal('hide');
	        		location.reload();
	        	} else {
	        		alert(success);
	        	}
            }
		});
    });

    $('#tasks_table').on('click','.change_description',function () {
     	let description =  $(this).data('task-description');
     	let task_id = $(this).data('task-id');
     	$('#new_description').val(description);
     	$('#new_description').data('task-id', task_id);
    	$('#description_modal').modal('show');
    });

     $('#description_form').submit(function(e) {
    	e.preventDefault();
    	let task_id = $('#new_description').data('task-id');
		$.ajax({
	        url: "Main/change_record",
	        type: "get",
	        data: {
	        	'task_id' : task_id,
	        	'value' : $('#new_description').val(),
	        	'column' : 'description' 
	        },
	        success: function (success) {
	        	if (success == true) {
	        		$('#signin_modal').modal('hide');
	        		location.reload();
	        	} else {
	        		alert(success);
	        		location.reload();
	        	}
            }
		});
		return false;
	});

});