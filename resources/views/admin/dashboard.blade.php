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
@endsection