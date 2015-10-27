@extends('layouts.simple_layout')
@section('content')
<div class="userinfo">
    @foreach ($user as $u)
        @if (Auth::id() == $u->id)
            <div class="mymenu">
                {!! link_to_route('user.edit', 'Редактировать профиль', ['id' => $u->id]) !!}&nbsp;&nbsp;
                <a href="#potential">Найти друга</a>&nbsp;&nbsp;
                {!! link_to_route('user.subscriptions', 'Заявки в друзья', ['id' => $u->id]) !!}&nbsp;&nbsp;
                {!! link_to_route('user.dialogs', 'Диалоги', ['id' => $u->id]) !!}&nbsp;&nbsp;
            </div>
        @endif
    <img src = "/upload/{{ $u->storage }}/{{ $u->avatar }}">
    <div class="data">
        <span>Имя</span><span>{{ $u->first_name }}</span>
        <span>Фамилия</span><span>{{ $u->last_name }}</span>
        <span>Email</span><span>{{ $u->email }}</span>
        <span>Дата рождения</span><span>{{ AgeHelper::birthdate($u->birth_date) }}</span>
        <span>Зарегистрирован</span><span>{{ AgeHelper::birthdate($u->created_at, true) }}</span>
        <span>Список интересов:</span>
                <span>
                    @if ($hobbies->count())
                        @foreach ($hobbies as $h)
                            {{ $h->name }}<br>
                        @endforeach
                    @else
                        Интересов нет
                    @endif
                </span>
                @if (Auth::id() != $u->id)
                    @if($friendshipExist)
                        <span>
                            {!! link_to_route('remove.friendship', 'Удалить из друзей', ['id' => Auth::id(), 'fid' => $u->id]) !!}
                        </span>
                    @else
                        <span>
                            {!! link_to_route('add.friendship', 'Добавить в друзья', ['id' => Auth::id(), 'fid' => $u->id]) !!}
                        </span>
                    @endif
                    <span>
                        {!! link_to_route('message.create', 'Написать', ['id' => Auth::id(), 'fid' => $u->id]) !!}
                    </span>
                @endif
    </div>
    @endforeach
    <div class="friends">
        <span>Друзья:</span>
        @if ($friends->count())
            @foreach ($friends as $f)
                <a href="/user/{{ $f->id }}"><img src = "/upload/{{ $f->storage }}/{{ $f->avatar }}"></a>
                <a href="#sendmessage">{{ $f->first_name }}</a>
            @endforeach
        @else
            <span>Друзей нет... (мозгов нет, голова населена тараканами...)</span>
        @endif
    </div>
</div>
@stop