<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/favicon.ico">
<!--    <title>{{ $title or 'Forget title' }}</title>-->
    <title>Meetings</title>

    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.structure.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.theme.css">

    <link rel="stylesheet" type="text/css" href="/css/myCss.css">

</head>
<body>
    <div class="top">
        <a href="/" class="title">MEET :: Сайт Знакомств</a>

        <ul class="menu">
            <li>{!! link_to_route('home', 'Главная') !!}</li>
            <li>{!! link_to_route('boys', 'Парни') !!}</li>
            <li>{!! link_to_route('girls', 'Девушки') !!}</li>
            <li>{!! link_to_route('user.create', 'Регистрация') !!}</li>
            <li>{!! link_to_route('login', 'Войти') !!}</li>
        </ul>
    </div>
    <header></header>