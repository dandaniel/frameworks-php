<section class="jumbotron">
	<h1>Login to the website</h1>
	<?php echo "<br/>".$this->getContent() ?>
</section>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<form class="form-horizontal" role="form" method="post" action="login">
			  <div class="form-group">
			    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			      <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-info">Login</button>
			    </div>
			  </div>
			</form>
		</div>
	</div>