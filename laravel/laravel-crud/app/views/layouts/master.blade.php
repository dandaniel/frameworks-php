<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>

	{{HTML::style('css/bootstrap.css')}}
</head>
  <body>
  	<nav class="navbar navbar-default" role="navigation">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="home">Laravel tryout</a>
		    </div>

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		      	@if(Auth::check())
			        <li>{{ HTML::link('profile', 'View profile')}}</li>
			        <li class="active">{{ HTML::link('logout', 'Logout')}}</li>
			      @else
			      	<li>{{ HTML::link('login', 'Login')}}</li>
			      	<li>{{ HTML::link('register', 'Register')}}</li>
			      @endif
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

    <div class="container-fluid">
    	<div class="row-fluid">
    		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
        	@if(Session::has('message'))
		        <div class="alert alert-success">
		          <a href="#" class='close' data-dismiss="alert">&times;</a>
		          {{ Session::get('message') }}
		        </div>
		      @endif
        	
        	<h1>Welcome to a brand new Laravel Website</h1>        	
        	<div class="content">
        		@yield('content')
        	</div>
        </div>
        
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
    	</div>
    </div>

	  <footer>
	  	{{HTML::script('js/jquery.js')}}
			{{HTML::script('js/bootstrap.js')}}
	  </footer>
  </body>
</html>