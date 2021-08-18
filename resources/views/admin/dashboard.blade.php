@extends('admin.layout.layout')
@section('contents')
    
@endsection
@section('my-scripts')
@if (Session::has('success_login'))
<script>
    swal("Welcome to Admin Laptop Computer web","{!! Session::get('success_login') !!}", "success",{
        button: "OK"
    });
</script>
@endif

@if (Session::has('success_update'))
<script>
    swal("Update account success","{!! Session::get('success_update') !!}", "success",{
        button: "OK"
    });
</script>
@endif


@if (Session::has('success_create'))
<script>
    swal("Create account success","{!! Session::get('success_create') !!}", "success",{
        button: "OK"
    });
</script>
@endif
@endsection