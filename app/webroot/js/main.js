$(document).ready(function(){
	if($('#flashMessage').length) {
		setTimeout(function() {
		      $('#flashMessage').hide('slow');
		}, 5000);
	}
	
	$('.deleta').on('click', function() {
		$('#confirmModal').modal('show');
		$('#confirmModal .confirma-exclusao').attr('href', $(this).attr('href'));
		
		return false;
	});
	
	
});

