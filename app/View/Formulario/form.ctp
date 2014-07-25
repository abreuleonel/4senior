<form id="formulario" name="formulario"
	action="<?php echo $this->Html->url(array('controller'=>'formulario', 'action'=>'salva')); ?>"
	method="post" role="form">
	<?php if(!empty($form)): ?>
		<input type="hidden" id="id" name="data[Formulario][id]"
		value="<?php echo $form['Formulario']['id']; ?>" />
	<?php endif; ?>
	<div class="form-group">
		<label>Nome</label> <input type="text" class="form-control"
			id="nome_formulario" name="data[Formulario][nome]"
			value="<?php echo (!empty($form)) ? $form['Formulario']['nome'] : ''; ?>" />
	</div>

	<div class="perguntas form-inline">
		<div class="form-group">
			<label>Tipo de Pergunta: </label> <select id="tipo_pergunta_id"
				class="form-control">
				<option>Selecione um tipo</option>
				<?php foreach($tipo_perguntas as $k_p => $v_p): ?>
					<option value="<?php echo $v_p['TipoPergunta']['id']; ?>"
					title="<?php echo $v_p['TipoPergunta']['campo']; ?>"> 
						<?php echo $v_p['TipoPergunta']['descricao']; ?> 
					</option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label>Pergunta</label> <input type="text" class="form-control"
				id="pergunta" />
			<button id="addPergunta" type="button" class="btn btn-primary">+</button>
		</div>


	</div>

	<div id="perguntasCadastradas">
		<?php if(!empty($perguntas)): ?>
			<?php foreach($perguntas as $pergunta): ?>
				
				<?php 
					$tipo_pergunta = $pergunta['TipoPergunta']['descricao'];
					$tipo_label = 'info';
				
					if($tipo_pergunta == 'Multipla escolha') $tipo_label = 'warning';
					if($tipo_pergunta == 'Dissertativa') $tipo_label = 'primary';
				?>
			
				<div id="pergunta_num<?php echo $pergunta['Pergunta']['ordem']; ?>"
			class="perguntas_lista">
			<h3><?php echo $pergunta['Pergunta']['ordem']; ?>: <?php echo $pergunta['Pergunta']['pergunta']; ?></h3>
			<div class="labels-perguntas">
				<span class="label label-<?php echo $tipo_label; ?>"><?php echo $tipo_pergunta; ?></span>
				<button type="button" class="btn btn-danger server btn-excluir"
					id="excluir-<?php echo $pergunta['Pergunta']['id']; ?>-<?php echo $pergunta['Pergunta']['ordem']; ?>">-</button>
			</div>
					
					<?php if($tipo_pergunta == 'Multipla escolha'): ?>
						<div class="form-group  form-inline opcoes">
							<input type="text" class="form-control" id="opcoes" placeholder="Digite uma opção"/>
							<button id="addOpcoes" type="button" class="btn btn-primary">+</button>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach;?>
		<?php endif;?>
	</div>

	<button type="submit" class="btn btn-default" style="margin-top: 70px !important">Salvar</button>
</form>