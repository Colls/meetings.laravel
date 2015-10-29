@extends('layouts.simple_layout')
@section('content')
<div class="row">
    <div class="my_menu">
        <a href="#">Редактировать профиль</a>
        <a href="#">Найти друга</a>
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
            Диалогов нет
        @endif
    </div>
</div>
@stop