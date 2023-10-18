<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gescar</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body style=" background-image: linear-gradient(#0d425596,#0b262e9f), url('{{ asset('images/roll.jpg') }}');">
    @yield('content')
    
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>
