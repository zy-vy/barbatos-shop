<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App</title>
    <link href="{{asset('bootstrap-5.2.2/css/bootstrap.min.css')}}" rel="stylesheet" >
</head>
<body style="background-color: #e8e8e8">
    @include('template.navbar')

    @yield('body')

    <script src="{{asset('jq/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('bootstrap-5.2.2/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
