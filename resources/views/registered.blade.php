@extends('layouts.simple_layout')

@section('css')
{!! Html::style('css/registered.css') !!}
@stop

@section('content')

<div class="row people">
    @include('inc_users')
</div>
@stop

@section('js')
{!! Html::script('js/ajaxPaginator.js') !!}
@stop