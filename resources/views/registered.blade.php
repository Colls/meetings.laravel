@extends('layouts.simple_layout')
@section('content')
<div class="registered">
    @foreach ($registered as $people)
    <div class="user">
        <div>
            <img src = "upload/{{ $people->storage }}/{{ $people->avatar }}">
        </div>
        {{ $people->first_name }}, {{ Carbon::create(explode('-', $people->birth_date)[0])->diffInYears(Carbon::now()) }}
        {!! link_to_route('user.info', 'Подробнее', ['id' => $people->id]) !!}
    </div>
    @endforeach
</div>
{!! $registered->render() !!}
@stop