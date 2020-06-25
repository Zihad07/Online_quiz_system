@if (session('success'))
    <div class="alert alert-success my-1" role="alert">
        <strong>{{ session('success') }}</strong>
    </div>
@endif
