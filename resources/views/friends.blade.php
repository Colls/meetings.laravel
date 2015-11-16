@extends('layouts.simple_layout')

@section('css')
{!! Html::style('css/registered.css') !!}
{!! Html::style('css/profile.css') !!}
@stop
@section('content')
<div class="row">
    <div class="my_menu">
        {!! link_to_route('user.edit', 'Редактировать профиль', ['id' => Auth::id()]) !!}
<!--        {!! link_to_route('user.potential', 'Найти друга', ['id' => Auth::id()]) !!}-->
        {!! link_to_route('user.subscriptions', 'Заявки в друзья', ['id' => Auth::id()]) !!}
        {!! link_to_route('user.dialogs', 'Диалоги', ['id' => Auth::id()]) !!}
    </div>
    <div class="my_menu">
        {!! link_to_route('user.potential', 'Найти друга', ['id' => Auth::id()]) !!}
        {!! link_to_route('user.proposals', 'Мне предлагают дружбу...', ['id' => Auth::id()]) !!}
        {!! link_to_route('user.subscriptions', 'Я предлагаю дружбу...', ['id' => Auth::id()]) !!}
    </div>
    @if($friends->count())
        @foreach($friends as $f)
            <div class="user">
                <img  class="img-rounded" src="/upload/{{ $f->storage }}/{{ $f->avatar }}">
                <p class="text-center">{{ $f->first_name }} {{ $f->last_name }}</p>
                @if($destination)
                    {!! link_to_route('cancel.friendship', 'Отменить', ['id' => Auth::id(), 'fid' => $f->id]) !!}
                @else
                    {!! link_to_route('approve.friendship', 'Принять', ['id' => Auth::id(), 'fid' => $f->id]) !!}
                    {!! link_to_route('deny.friendship', 'Отказаться', ['id' => Auth::id(), 'fid' => $f->id]) !!}
                @endif
            </div>
        @endforeach
    @else
        <span>{{ $notice }}</span>
    @endif
</div>
@stop
@section('js')

@stop