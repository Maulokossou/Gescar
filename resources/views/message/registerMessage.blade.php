@if (session('message'))
    <section>
        <div class="alert alert-dismissible fade show alert-success text-center" role="alert">
            <strong>Success</strong>
            {{ session('message') }}
            <button class="btn btn-close" aria-label="close" data-bs-dismis="alert"></button>
        </div>
    </section>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    <strong>Error</strong>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button class="btn btn-close"aria-label="close" data-dismiss-bs="alert"></button>

</div>
@endif

<script src="{{asset('bootstrap.min.js')}}"></script>