<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="_token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {!! Html::favicon('favicon.ico') !!}
    <title>Сайт знакомств</title>
    <!-- Bootstrap Core CSS -->
    {!! Html::style('css/bootstrap.min.css') !!}
    <!-- Custom CSS -->
    {!! Html::style('css/commonTheme.css') !!}
    {!! Html::style('css/myCss.css') !!}
    @yield('css')
    <!-- Custom Fonts -->
    <!--<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
    <!--<link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>-->
    <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {!! link_to_route('home', 'Meet::Сайт знакомств', [], ['class' => 'navbar-brand']) !!}
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>{!! link_to_route('boys', 'Парни') !!}</li>
                <li>{!! link_to_route('girls', 'Девушки') !!}</li>
                @if (Auth::check())
                    <li>{!! link_to_route('user.info', 'Моя страница', ['id' => Auth::id()]) !!}</li>
                    <li>{!! link_to_route('logout', 'Выйти ( ' . Auth::user()->first_name . ' ' . Auth::user()->last_name . ' )') !!}</li>
                @else
                    <li>{!! link_to_route('user.create', 'Регистрация') !!}</li>
                    <li>{!! link_to_route('login', 'Войти') !!}</li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Header, big image -->
<header class="intro-header">

</header>