@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Create New Post
    <small></small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      {{ Form::open(array('method'=>'POST','route' => 'posts.store', 'files' => true)) }}
      <div class="box-body">

        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
          {!! Form::label('title', 'Title:') !!}
          {!! Form::text('title',null, ['class' => 'form-control','placeholder'=>'Enter full title']) !!}
          @if ($errors->has('title'))
          <span class="help-block">
            <strong>{{ strtoupper($errors->first('title')) }}</strong>
          </span>
          @endif
        </div>

        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
          {!! Form::label('category_id', 'Category:') !!}
          @if(isset($categories) && count($categories) > 0)
          {!! Form::select('category_id', [''=>'Choose Options'] + $categories , null, ['class'=>'form-control'])!!}
          @else
          {{ "No Category Found" }}
          @endif
          @if ($errors->has('category_id'))
          <span class="help-block">
            <strong>{{ strtoupper($errors->first('category_id')) }}</strong>
          </span>
          @endif
        </div>


          <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
            {!! Form::label('body', 'Content:') !!}
              <div class="col-10">
                <textarea class="textarea_editor form-control" name="body" rows="15" placeholder="Content" >

                </textarea>
              </div>
                @if ($errors->has('body'))
                <span class="help-block">
                    <strong>{{ strtoupper($errors->first('body')) }}</strong>
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

      </div>
      <div class="box-footer">
      {{ Form::submit('Create Post',['class' => 'btn btn-primary'])}}
      </div>
   {{ Form::close() }}

    </div>
</section>
</div>
@endsection

@section('headerSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-wysihtml5/bbootstrap3-wysihtml5.css') }}" />
@endsection

@section('footerSection')
<script src="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
<script>
    $(document).ready(function() {

        $('.textarea_editor').wysihtml5();


    });
</script>
@endsection
