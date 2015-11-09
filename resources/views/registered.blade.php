@extends('layouts.simple_layout')

@section('css')
{!! Html::style('css/registered.css') !!}
@stop

@section('content')
<div class="row people">
    <h3>Всего зарегистрировано {{ $gender }}: {{ $registered->total()}}</h3>
    @foreach ($registered as $user)
    <div class="user">
        <div>
            <img src = "upload/{{ $user->storage }}/{{ $user->avatar }}">
        </div>
        <p class="text-center">{{ $user->first_name }}, {{ AgeHelper::age($user->birth_date) }}</p>
        {!! link_to_route('user.info', 'Подробнее', ['id' => $user->id]) !!}
    </div>
    @endforeach
    <div class="clear"></div>
    {!! $registered->render() !!}
</div>
@stop

@section('js')

@stop