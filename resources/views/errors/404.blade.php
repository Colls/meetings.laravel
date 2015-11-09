@extends('layouts.simple_layout')

@section('css')
{!! Html::style('css/page404.css') !!}
@stop

@section('content')
<div class="row error404">
    <div class="col-lg-6">
        <h3>Страница запрашиваемая не найдена.</h3>
        Вернуться можешь ты на:
        <ul>
            <li>{!! link_to_route('home', 'главную') !!}</li>
            @if (Auth::check())
                <li>{!! link_to_route('user.info', 'свою страницу', ['id' => Auth::id()]) !!}</li>
            @else
                <li>{!! link_to_route('login', 'страницу входа') !!}</li>
            @endif
        </ul>
    </div>
    <div class="col-lg-6">
        {!! Html::image('img/joda.jpg', '404. Not found!') !!}
    </div>
</div>
@stop

@section('js')

@stop