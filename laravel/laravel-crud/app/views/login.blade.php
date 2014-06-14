@extends('layouts.master')

@section('content')
    <hr/>
    <div class="form-group">
        <label>Please enter your credentials to login</label>
    </div>
    {{ Form::open(array('url' => 'login', 'class' => 'form-horizontal')) }}
        @if($errors->any())
        <div class="alert alert-danger">
        	<a href="#" class="close" data-dismiss="alert">&times;</a>
        	{{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </div>
        @endif

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <div class="form-group">
                {{ Form::text('email', '', array('placeholder'=>'Email', 'class'=>'form-control', 'required')) }}
            </div>

            <div class="form-group">
                {{ Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control', 'required')) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Login', array('class'=>'btn btn-info')) }}
            </div>
        </div>
    {{ Form::close() }}
@stop