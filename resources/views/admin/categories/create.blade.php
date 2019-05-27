@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
    Create New Category
    <small></small>
    </h1>
  </section>
  <section class="content">
    <div class="box">
    	 {{ Form::open(array('method'=>'POST','route' => 'categories.store')) }}
      	<div class="box-body">

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          {!! Form::label('name', 'Category Name:') !!}
          {!! Form::text('name',null, ['class' => 'form-control','placeholder'=>'Enter category name']) !!}
          @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ strtoupper($errors->first('name')) }}</strong>
          </span>
          @endif
        </div>
        <div class="pull-left">
        {{ Form::submit('Create Category',['class' => 'form-control btn btn-primary'])}}
        </div>

    </div>
    {{ Form::close() }}
</div>
</section>
</div>
@endsection

