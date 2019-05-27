@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <section class="content-header">
    <h1>
    Edit Category {{ $category-> name }}
    <small></small>
    </h1>
  </section>
  <section class="content">
    <div class="box">
        {!! Form::model($category, ['method'=>'PATCH', 'route' => ['categories.update', $category->id]]) !!}
      	<div class="box-body">

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          {!! Form::label('name', 'category:') !!}
          {!! Form::text('name',null, ['class' => 'form-control','placeholder'=>'Enter category name']) !!}
          @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ strtoupper($errors->first('name')) }}</strong>
          </span>
          @endif
        </div>
       <div class="box-footer">
      {{ Form::submit('Update Category',['class' => 'btn btn-primary btn-lg'])}}
      </div>
    </div>
    {{ Form::close() }}
</div>
</section>
</div>
@endsection

