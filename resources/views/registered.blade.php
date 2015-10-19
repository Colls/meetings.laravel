@extends('layouts.simple_layout')
@section('content')
<div class="registered">
    @foreach ($registered as $user)
    <div class="user">
        <div>
            <img src = "upload/{{ $user->storage }}/{{ $user->avatar }}">
        </div>
        {{ $user->first_name }}, {{ Carbon::create(explode('-', $user->birth_date)[0])->diffInYears(Carbon::now()) }}
        {!! link_to_route('user.info', 'Подробнее', ['id' => $user->id]) !!}
    </div>
    @endforeach
</div>
{!! $registered->render() !!}
@stop