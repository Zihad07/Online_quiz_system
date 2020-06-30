@if (session('success'))
    <div class="alert alert-success my-1" role="alert">
        <strong>{{ session('success') }}</strong>
    </div>
@endif

@if (session('wrong'))
    <div class="alert alert-danger my-1" role="alert">
        <strong>{{ session('wrong') }}</strong>
    </div>
@endif
