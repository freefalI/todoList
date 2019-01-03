
@if (session("flash_message"))
    <div class="container-fluid notification  w-100 is-info" role="alert">
        {{session("flash_message")}}
    </div>
@endif


@if ($errors->any())
    <ul class="notification is-danger w-100">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif