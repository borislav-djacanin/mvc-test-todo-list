function deleteEntry( id ) {
	full_id = "#todo_" + id;
	$.ajax({ 
		type: 'POST', 
		url: 'deleteEntry.php', 
		data: 'id=' + id, 

		success: function( results ){ 
			$( full_id ).fadeOut( "slow", function() {
				// Animation complete.
				// Call sort function
				sortTodo();
			});
		} 
	})
}


function addNewToDo() {

	newToDo = $("#inputToDoTask").val();

	$.ajax({ 
		type: 'POST', 
		url: 'addNewTodo.php', 
		data: 'todo=' + newToDo, 

		success: function( id ) {

			var obj = JSON.parse( id );
			id = obj.id;
			todo = obj.todo;

			$("#inputToDoTask").val("");

			text = '';
			text = text + '<div class="row" id="todo_'+id+'">';
			text = text + '<div class="col-md-10">';
			text = text + '<ul class="list-group">';
			text = text + '<li class="list-group-item">';
			text = text + todo;
			text = text + '</li>';
			text = text + '</ul>';
			text = text + '</div>';
			text = text + '<div class="col-md-2">';
			text = text + '<i class="fas fa-minus fa-2x" onclick="myFunction('+id+')"></i>';
			text = text + '</div>';
			text = text + '</div>';

			$( "#todo_list" ).append( text );
			// Call sort function
			sortTodo();	

		} 
	});	
}

$(function() { 
	$("#todo_list").sortable({
		axis: 'y',
		update : function () {
			// Call sort function 
			sortTodo();
		} 
	}); 
}); 

function sortTodo() {
	var order = $("#todo_list").sortable('serialize'); 

	$.ajax({
		data: order,
		type: 'POST',
		url: 'sortTodo.php'
	});	
}