<!DOCTYPE html>
<html lang="en">
    <head>
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Laravel -CRUD</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet"/>
    </head>
    
    <body>
        <input type="hidden" name="basepath" id='basepath' value="{{url('/')}}"/>
        @yield('content')
        <script src="{{asset('js/jquery.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/ajax_crud.js')}}"></script>
    </body>
</html>


