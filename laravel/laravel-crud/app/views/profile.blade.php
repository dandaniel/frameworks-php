@extends('layouts.master')

@section('content')
    <p>Hi, <strong>{{ ucwords(Auth::user() -> username) }}</strong>! You can edit your profile from the fields bellow:</p>

    <div class="row-fluid">
    {{ Form::open(array('url'=>'profile', 'class'=>'form-horizontal')) }}
    	@if($errors->any())
    	<div class="alert alert-danger">
    		<a href="#" class='close' data-dismiss="alert">&times;</a>
    		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
    	</div>
    	@endif

    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 jumbotron">
          <div class="form-group">
              {{ Form::text('username', $username, array('placeholder'=>'Username', 'class'=>'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::text('email', $email, array('placeholder'=>'Email', 'class'=>'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::submit('Save changes', array('class'=>'btn btn-success')) }}

              {{ HTML::link('delete', 'Delete Profile', array('class'=>'btn btn-danger pull-right'))}}
          </div>
      </div>

      <div class="col-xs-0 col-sm-0 col-md-6 col-lg-8"></div>
    {{ Form::close() }}
    </div>
@stop