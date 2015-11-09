@extends('layouts.simple_layout')

@section('css')
{!! Html::style('css/profile.css') !!}
@stop
@section('content')
<div class="row user_info">
    @foreach($user as $u)
        @if (Auth::id() == $u->id)
        <div class="my_menu">
            {!! link_to_route('user.edit', 'Редактировать профиль', ['id' => $u->id]) !!}
            <a href="#potential">Найти друга</a>
            {!! link_to_route('user.subscriptions', 'Заявки в друзья', ['id' => $u->id]) !!}
            {!! link_to_route('user.dialogs', 'Диалоги', ['id' => $u->id]) !!}
        </div>
        @endif
    @endforeach
    <div class="user_photo col-lg-4">
        <img src = "/upload/{{ $u->storage }}/{{ $u->avatar }}">
    </div>

    <div class="data col-lg-4">
        <span>Имя</span><span>{{ $u->first_name }}</span>
        <span>Фамилия</span><span>{{ $u->last_name }}</span>
        <span>Email</span><span>{{ $u->email }}</span>
        <span>Дата рождения</span><span>{{ AgeHelper::birthdate($u->birth_date) }}</span>
        <span>Зарегистрирован</span><span>{{ AgeHelper::birthdate($u->created_at, true) }}</span>
        <span>Список интересов:</span>
        <div>
            <ul>
                @if ($hobbies->count())
                    @foreach ($hobbies as $h)
                        <li>{{ $h->name }}</li>
                    @endforeach
                @else
                    <li>Интересов нет</li>
                @endif
            </ul>
        </div>
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

    <div class="friends col-lg-4">
        <h5>Друзья:</h5>
        @if ($friends->count())
            @foreach ($friends as $f)
                <div class="friend">
                    <a href="/user/{{ $f->id }}"><img src = "/upload/{{ $f->storage }}/{{ $f->avatar }}"></a>
                    {!! link_to_route('message.create', $f->first_name, ['id' => Auth::id(), 'fid' => $u->id]) !!}
                </div>
            @endforeach
        @else
            <span>Друзей нет... (мозгов нет, голова населена тараканами...)</span>
        @endif
    </div>
</div>
@stop
@section('js')

@stop