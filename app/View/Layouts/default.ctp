<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="/css/main.css" type="text/css" />
	
</head>
<body>
	
		<?php echo $this->Session->flash(); ?>
		<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
		  <div class="container">
		  	<?php if($this->Session->read('Auth.User')): ?>
			    <div class="navbar-header">
			      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a href="../" class="navbar-brand">4Senior</a>
			    </div>
			    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
			      <ul class="nav navbar-nav">
			        <li>
			          <a href="<?php echo $this->Html->url(array('controller'=>'formulario', 'action'=>'index')); ?>">Formulários</a>
			        </li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        <li>
			        	<a href="http://blog.getbootstrap.com" onclick="ga('send', 'event', 'Navbar', 'Community links', 'Blog');">
			        		<?php echo $this->Session->read('Auth.User.login'); ?>
			        	</a>
			        </li>
			      </ul>
			    </nav> 
		    <?php endif; ?>
		  </div>
		</header>
		
		<div class="container bs-docs-container">
			<div id="content">
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		
		<div id="footer">
			
		</div>
	
	<?php //echo $this->element('sql_dump'); ?>

	<div id="confirmModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Confirma a exclusão?</h4>
				</div>
				<div class="modal-body">
					<p>Tem certeza que deseja excluir esse item?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<a href="" class="btn btn-primary confirma-exclusao">Confirmar</a>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->


</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
<script src="/js/bootstrap.min.js" ></script>
<script src="/js/main.js" ></script>
<?php if(isset($js)): ?>
	<?php foreach($js as $js_k => $js_v): ?>
		<script src="<?php echo $js_v; ?>" ></script>
	<?php endforeach; ?>
<?php endif; ?>
</html>
