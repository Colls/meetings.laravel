@extends('layouts.simple_layout')
@section('content')
{!! link_to_route('user.subscriptions', 'Заявки в друзья', ['id' => Auth::id()]) !!}&nbsp;&nbsp;&nbsp;
{!! link_to_route('user.proposals', 'Предложения дружбы', ['id' => Auth::id()]) !!}
<div class="friends">
    @if($friends->count())
        @foreach($friends as $f)
            <div class = "user">
                <div><img src = "/upload/{{ $f->storage }}/{{ $f->avatar }}"></div>
                <p>{{ $f->first_name }} {{ $f->last_name }}</p>
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