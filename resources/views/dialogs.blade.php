@extends('layouts.simple_layout')
@section('content')
<div class="dialog">
    @if($dialogs->count())
        @foreach($dialogs as $d)
            <div class="currentDialog">
                <a href="/user/{{ $d->id }}"><img src = "/upload/{{ $d->storage }}/{{ $d->avatar }}" alt="Фото юзера временно недоступно"></a>
                {!! link_to_route('message.create', $d->first_name . " " . $d->last_name , ['id' => Auth::id(), 'fid' => $d->id]) !!}
                <a class="hidden" href="#remove">Удалить</a>
            </div>
        @endforeach
    @else
        Диалогов нет
    @endif
</div>
@stop