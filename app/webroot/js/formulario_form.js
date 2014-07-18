$(document).ready(function() {
	$('#addPergunta').on('click', function() {
		var tipo_pergunta = $('#tipo_pergunta_id option:selected').text().trim();
		var tipo_pergunta_id = $('#tipo_pergunta_id').val();
		var pergunta = $('#pergunta').val();
		var total = $('#perguntasCadastradas h3').length;
		
		var ordem = parseInt(total)+1;
		
		var tipo_label = 'info';
		
		if(tipo_pergunta == 'Multipla escolha') tipo_label = 'warning';
		if(tipo_pergunta == 'Dissertativa') tipo_label = 'primary';
		
		var html = '<div id="pergunta_num' + ordem + '" class="perguntas_lista">';
		html += '<input type="hidden" name="data[Pergunta][' + ordem + '][tipo_pergunta_id]" value="' + tipo_pergunta_id + '"  />';
		html += '<input type="hidden" id="ordem' + ordem + '" name="data[Pergunta][' + ordem + '][ordem]" value="' + ordem + '"  />';
		html += '<input type="hidden" name="data[Pergunta][' + ordem + '][pergunta]" value="' + pergunta + '"  />';
		html += '<h3>' + ordem + ': ' + pergunta + '</h3>';
		html += '<div class="labels-perguntas">';
		html += '<span class="label label-' + tipo_label + '">' + tipo_pergunta + '</span>';
		html += '<button type="button" class="btn btn-danger no-server btn-excluir" style="margin-left: 4px" id="excluir-' + ordem + '">-</button>';
		html += '</div>';
		html += '</div>';
		
		$('#pergunta').val('').focus();
		
		$('#perguntasCadastradas').append(html);
	});
	
	$(document.body).on('click', '.btn-excluir.no-server', function() { 
		var ordem = $(this).attr('id').replace('excluir-', '');
		$('#pergunta_num' + ordem).remove();
	});
});