@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Manage Post
    <small></small>
    </h1>
    @include('partials.messages')
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
   <table id="example1" class="table table-bordered table-striped" cellspacing="0">
          <thead>
            <tr>
              <th>Category</th>
              <th>Photo</th>
              <th>Owner</th>
              <th>Title</th>
              <th>Body</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if($posts)
            @foreach($posts as $post)
            <tr>
              <td>{!! $post->category ? $post->category->name : 'No caterory' !!}</td>
              <td><img height="50" src="{{ $post -> photo ? $post -> photo -> file : 'https://via.placeholder.com/400' }}" alt=""></td>
              <td><b>{!! $post->user->name !!}<b></td>
              <td>{!! $post->title !!}</td>
              <td>{!! str_limit($post->body, 80) !!}</td>
              <td class="row" style="margin-left: 0px"><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success col-sm-6">Edit</a>

                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method'=>'DELETE', 'class' => 'delete']) !!}

                {!! Form::submit('Delete', ['class' => 'btn btn-danger col-sm-6'] ) !!}

                {!! Form::close() !!}
            </td>
              </tr>
              @endforeach
              @endif

              <tfoot>
              <tr>
              <th>Category</th>
              <th>Photo</th>
              <th>Owner</th>
              <th>Title</th>
              <th>Body</th>
              <th>Action</th>
              </tr>
              </tfoot>
            </table>
    </div>
</section>
</div>
@endsection
@section('footerSection')
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
$(function () {
$('#example1').DataTable()
({
'paging'      : true,
'lengthChange': false,
'searching'   : false,
'ordering'    : true,
'info'        : true,
'autoWidth'   : false
})
})
</script>
<script>
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
</script>
@endsection
@section('headSection')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<style type="text/css" media="screen">
  .box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    margin-top: 50px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
}
td {
    width: 200px;
}
</style>
@endsection