<!DOCTYPE html>
<html>
	<head>
		<title>Simple crud app</title>
		<!-- can use {/{ get_title() }/} is then set in the initAction of each controller --> 
		{{ stylesheet_link("css/bootstrap.min.css") }}
	</head>
	<body>
		{{ content() }}

		<br/><br/></hr/>
		<footer>
			<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">Crud App, inc.</a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <?php $current_page = $this->dispatcher-> getControllerName() . $this->dispatcher-> getActionName(); ?>
			      <ul class="nav navbar-nav">
			        <li>{{ link_to('/', 'Home')  }}</li>
			        
			        {{ elements.getMenu() }}

			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		</footer>
	</body>
</html>