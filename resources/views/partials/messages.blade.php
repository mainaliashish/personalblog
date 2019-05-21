@if (Session::has('status') && !empty(Session::get('status')))
    <div class="alert alert-success col-md-12" role="alert">
        <strong class="message"> Success : </strong>
        <span class="message-body"> {{ Session::get('status') }} </span>
    </div>
    <div class="clear-fix">

    </div>
@endif

@if(Session::has('error') && !empty(Session::get('error')))
    <div class="alert alert-danger col-md-12" role="alert">
        <strong class="message">Warning : </strong> {{ Session::get('error') }}
    </div>
     <div class="clear-fix">

    </div>
@endif