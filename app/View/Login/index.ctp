<div class="form-login highlight">
	<form class="form-horizontal" role="form" action="<?php echo $this->Html->url(array('controller'=>'usuario', 'action'=>'login')); ?>" method="post">
	
	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">Login</label>
	    <div class="col-sm-10">
	      <input type="text" name="data[Usuario][login]" class="form-control" id="inputEmail3" placeholder="Login">
	    </div>
	  </div>
	
	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
	    <div class="col-sm-10">
	      <input type="password" name="data[Usuario][senha]" class="form-control" id="inputPassword3" placeholder="Password">
	    </div>
	  </div>

	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Entrar</button>
	    </div>
	  </div>

	</form>
</div>