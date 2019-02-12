$(document).ready(function(){
	
	$('#add-button').click(function(){

		var data = $('#add-form').serializeArray();

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$.ajax({
			type: 'post',
			url: 'http://localhost/crud/public/home/save',
			data: data,
			success: function(response){
				$('#add-form')[0].reset();
				  window.location.reload();
				
			}
			
		})		

	});


	$('#edit-modal').on('show.bs.modal',function(e){

		$('#edit-form input[name=name]').val($(e.relatedTarget).attr('data-name'));
		$('#edit-form input[name=id]').val($(e.relatedTarget).attr('data-id'));
		$('#edit-form textarea').val($(e.relatedTarget).attr('data-address'));

		$('#edit-button').click(function(){

			var data = $('#edit-form').serializeArray();

			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});			

			$.ajax({
				type: 'post',
				url: 'http://localhost/crud/public/edit',
				data: data,
				success: function(response){
					$('#edit-modal').modal('hide');

					  window.location.reload();
				}
			})
		})
	})

	$('#delete-modal').on('show.bs.modal',function(e){

		$('#delete-button').click(function(){

			var id = $(e.relatedTarget).attr('data-id');

			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});			

			$.ajax({
				type: 'post',
				url: '/delete',
				data: {
					id: id
					},
				success: function(response){
					$('#delete-modal').modal('hide');

					window.location.reload();
				}
			})
		})
	})	

})