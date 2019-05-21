@extends('admin.layouts.app')
@section('main-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Create User
    <small></small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      {{ Form::open(array('method'=>'POST','route' => 'users.store', 'files' => true)) }}
      <div class="box-body">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          {!! Form::label('name', 'Name:') !!}
          {!! Form::text('name',null, ['class' => 'form-control','placeholder'=>'Enter full name']) !!}
          @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ strtoupper($errors->first('name')) }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
          {!! Form::label('email', 'Email:') !!}
          {!! Form::email('email',null, ['class' => 'form-control','placeholder'=>'Enter email address']) !!}
          @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ strtoupper($errors->first('email')) }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
          {!! Form::label('role_id', 'Select Role:') !!}
          @if(isset($roles) && count($roles) > 0)
          {!! Form::select('role_id', [''=>'Choose Options'] + $roles , null, ['class'=>'form-control'])!!}
          @else
          {{ "No Roles Found" }}
          @endif
          @if ($errors->has('role_id'))
          <span class="help-block">
            <strong>{{ strtoupper($errors->first('role_id')) }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
          {!! Form::label('is_active', 'Status:') !!}
          {!! Form::select('is_active', array(1 => 'Active', 0 => 'Inactive'),0, ['class' => 'form-control']) !!}
          @if ($errors->has('is_active'))
          <span class="help-block">
            <strong>{{ strtoupper($errors->first('is_active')) }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
          {!! Form::label('photo_id', 'Image:') !!}
          {!! Form::file('photo_id',null, ['class' => 'form-control']) !!}
          @if ($errors->has('file'))
          <span class="help-block">
            <strong>{{ strtoupper($errors->first('file')) }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
          {!! Form::label('password', 'Password:') !!}
          {!! Form::password('password', ['class' => 'form-control']) !!}

          @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ strtoupper($errors->first('password')) }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="box-footer">
      {{ Form::submit('Create User',['class' => 'btn btn-primary'])}}
      </div>
   {{ Form::close() }}
  </div>
</section>
<!-- /.content -->
</div>
@endsection

@section('headSection')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('admin/dropzone/dropzone.css') }}">
<style type="text/css" media="screen">

</style>
@endsection

@section('footerSection')

<script src="{{ asset('admin/dropzone/dropzone.js') }}"></script>

@endsection