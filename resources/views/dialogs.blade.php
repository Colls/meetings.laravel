@extends('layouts.simple_layout')
@section('css')
{!! Html::style('css/profile.css') !!}
{!! Html::style('css/messages.css') !!}
@stop
@section('content')
<div class="row">
    <div class="my_menu">
        {!! link_to_route('user.edit', 'Редактировать профиль', ['id' => Auth::id()]) !!}
<!--        {!! link_to_route('user.potential', 'Найти друга', ['id' => Auth::id()]) !!}-->
        {!! link_to_route('user.subscriptions', 'Заявки в друзья', ['id' => Auth::id()]) !!}
        {!! link_to_route('user.dialogs', 'Диалоги', ['id' => Auth::id()]) !!}
    </div>
    <div class="dialogs">
        @if($dialogs->count())
            @foreach($dialogs as $d)
                <div class="dialog">
                    <a href="/user/{{ $d->id }}"><img src = "/upload/{{ $d->storage }}/{{ $d->avatar }}" alt="Фото юзера временно недоступно"></a>
                    {!! link_to_route('message.create', $d->first_name . " " . $d->last_name , ['id' => Auth::id(), 'fid' => $d->id]) !!}
                    <a class="hidden" href="#remove">Удалить</a>
                </div>
            @endforeach
        @else
            <span>Диалогов нет</span>
        @endif
    </div>
</div>
@stop
@section('js')
{!! Html::script('js/deleteDialog.js') !!}
@stop