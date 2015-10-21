@extends('layouts.simple_layout')
@section('content')
<div class="registered">
    @foreach ($registered as $user)
<!--    --><?php //dd($user); ?>
    <div class="user">
        <div>
            <img src = "upload/{{ $user->storage }}/{{ $user->avatar }}">
        </div>
        {{ $user->first_name }}, {{ AgeHelper::age($user->birth_date) }}
        {!! link_to_route('user.info', 'Подробнее', ['id' => $user->id]) !!}
    </div>
    @endforeach
</div>
{!! $registered->render() !!}
@stop