<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>

    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }
    h1{
        font-weight:bold;
        font-family:'Nunito',sans-serif;
        font-size:30px;
    }
    .span{
        font-weight:bold;
        font-style:italic;
    }

    .links a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
    .link{
        position:absolute;
        top:30px;
        right:400px;
        display:inline-block;
        width: 200px;
        margin-left:60%;
        color:white;
        background-color:#4aa0e6;
        padding:10px;
        border-radius:5px;
        font-family: Fira Sans,sans-serif;
        font-style: normal;
        text-align:center;
        line-height: 25px;
        font-size: 15px;

    }
    .link:hover{
        background-color:green;
        color:white;
        text-decoration:none;
    }

    .selectform{
        margin:0 auto;
    }

    #status{
        margin:0 auto;
    }

    main > div{

        position:relative;
    }

    aside{
        float:left;

    }
    table{
        padding:20px;
        text-align:center;

    }
    table tr,td,th{
        border:1px solid black;
        padding:20px;
    }

    .footer{
        text-align:center;
    }
    .clearfix{
        clear:both;
    }
    .hint{
        font-size:0.7rem;
        color:red;
    }
    .buttonEdit{
        display:inline-block;
        line-height:20px;
        padding:5px;
        background-color:#4aa0e6;
        color:white;
        border-radius:10px;
        margin-left:-20px;
    }
    .buttonEdit:hover{
        background-color:green;
        color:white;
        text-decoration:none;
    }
    .btndel{
        margin-left:-20px;
        border-radius:10px;
    }
    .btndel:hover{
        background-color:red;
        color:white;
    }
    .formdel{
        margin-top:-20px;
    }

</style>
<body>
    <div id="app">
        <header>
            @include('layouts.header')
        </header>

        <main>
              <div class="py-4 {{auth()->user() ? 'col-md-10' :''}}" {{auth()->user() ? ' style=float:right':''}} >

            @yield('content')
              </div>
        </main>
        @if (auth()->user())
        <aside class="col-md-2">
            @include('layouts.aside')
        </aside>
        @endif

        <div class="clearfix"></div>
        <footer>
            @include('layouts.footer')
        </footer>
    </div>


</body>
</html>
