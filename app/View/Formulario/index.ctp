<a href="<?php echo $this->Html->url(array('controller'=>'formulario', 'action'=>'form')); ?>" class="btn btn-primary novo">Novo Formulário</a>

<table class="table table-hover">
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('Formulario.id', '#'); ?></th>
			<th><?php echo $this->Paginator->sort('Formulario.nome', 'Nome'); ?></th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($forms as $k => $v): ?>
			<tr>
				<td><?php echo $v['Formulario']['id']; ?></td>
				<td><?php echo $v['Formulario']['nome']; ?></td>
				<td>
					<a class="btn btn-warning" href="<?php echo $this->Html->url(array('controller'=>'formulario', 'action'=>'form')); ?>/<?php echo $v['Formulario']['id']; ?>">Editar</a>
				</td>
				<td>
					<a class="btn btn-danger deleta" href="<?php echo $this->Html->url(array('controller'=>'formulario', 'action'=>'deletar')); ?>/<?php echo $v['Formulario']['id']; ?>">Excluir</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php echo $this->Paginator->numbers(array('first' => '«  ','last' => ' »','separator'=>' ','class' => 'pager_list', 'url' => array('controller'=>'formulario','action'=>'index'))); ?>