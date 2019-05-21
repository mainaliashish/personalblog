@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Users
    <small>Users Section</small>
    </h1>
  </section>
  @include('partials.messages')
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Table With Full Features</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created at</th>
              <th>Updated at</th>
            </tr>
          </thead>
          <tbody>
            @if($users)
            @foreach($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td> <img height="50" src="{{ $user -> photo ? $user -> photo->file : 'https://via.placeholder.com/400' }}" alt=""> </td>
              <td>
                <a href="{{ route('users.edit', $user->id) }}"> {{ $user->name }} </a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role ? ucfirst($user->role->name) : 'No role assigned' }}</td>
                <td> <a href="{{ route('users.status', $user -> id) }}">{{ $user->is_active === 1 ? 'Active' : 'Inactive' }}</td> </a>
                <td>{{ $user->created_at->diffForHumans() }}</td>
                <td>{{ $user->updated_at->diffForHumans() }}</td>
              </tr>
              @endforeach
              @endif

              <tfoot>
              <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created at</th>
                <th>Updated at</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
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
</style>
@endsection