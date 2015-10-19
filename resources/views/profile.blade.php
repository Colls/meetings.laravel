@extends('layouts.simple_layout')
@section('content')
<div class="userinfo">
    @foreach ($user as $u)
        @if (Auth::user()->id == $u->id)
            <div class="mymenu">
                <a href="#potential">Найти друга</a>
                <a href="#requests">Предложения дружбы</a>
                <a href="#messages">Cообщения</a>
            </div>
        @endif
    <img src = "/upload/{{ $u->storage }}/{{ $u->avatar }}">
    <div class="data">
        <span>Имя</span><span>{{ $u->first_name }}</span>
        <span>Фамилия</span><span>{{ $u->last_name }}</span>
        <span>Email</span><span>{{ $u->email }}</span>
        <span>Дата рождения</span><span>{{ $u->birth_date }}</span>
        <span>Зарегистрирован</span><span>{{ $u->created_at }}</span>
        <span>Список интересов:</span>
                <span>
                    @if (isset($interests))
                        @foreach ($interests as $i)
                            {{ $i }}
                        @endforeach
                    @else
                        Интересов нет
                    @endif
                </span>
                @if (Auth::user()->id != $u->id)
                    <span>
                        <a href="#addfriend">Добавить в друзья</a>
                    </span>
                    <span>
                        <a href="#sendmessage">Написать</a>
                    </span>
                @endif
    </div>
    @endforeach
    <div class="friends">
        <span>Друзья:</span>
        @if (isset($friends))
            @foreach ($friends as $f)
                <a href="#friendinfo"><img src = "#friendphoto"></a>
                <a href="#sendmessage">Friendname</a>
            @endforeach
        @else
            <span>Друзей нет... (мозгов нет, голова населена тараканами...)</span>
        @endif
    </div>
</div>
@stop