@include('layouts.header')
<div class="content">
    @yield('content')
</div>
@if($errors->any())
<div class="rounded">
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Errors</h4>
        <ul>
            {!! implode('', $errors->all('<li>:message</li>')) !!}
        </ul>
    </div>
</div> <!-- /service -->
@endif
@include('layouts.footer')