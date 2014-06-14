<?php use \Phalcon\Tag as Tag; ?>

<section class="jumbotron">
	<h1>Dashboard</h1>
	<?php echo "<br/>".$this->getContent() ?>
</section>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<h3>Your profile infromation</h3><br/><br/>
			<form class="form-horizontal" role="form" method="post" action="update">
				<div class="form-group">
			    <label for="inputUsername" class="col-sm-2 control-label">Username</label>
			    <div class="col-sm-10">
			    	<?php echo Tag::textField(array("username", "id"=>"inputUsername", "class"=>"form-control", "name"=>"username", "placeholder"=>"Username")) ?>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			    	<?php echo Tag::textField(array("email", "id"=>"inputEmail", "class"=>"form-control", "name"=>"email", "placeholder"=>"Email")) ?>

			    </div>
			  </div>
			 
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-success">Update profile</button>
			    </div>
			  </div>
			</form>

			<hr/>
			<form class="form-horizontal" role="form" method="post" action="delete">
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-danger">Delete profile</button>
			    </div>
			  </div>
			</form>
		</div>
	</div>