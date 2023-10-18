@if (session('resetSuccess'))
    <section>
        <div class="alert alet-dismissible alert-success fade show text-center" role="alert">
            <strong>Success</strong>
            {{ session('resetSuccess') }}
            <button class="btn btn-close" aria-label="close" data-bs-dismiss="alert"></button>
        </div>
    </section>
@endif

@if (session('success'))
    <section>
        <div class="alert alet-dismissible alert-success fade show text-center" role="alert">
            <strong>Success</strong>
            {{ session('success') }}
            <button class="btn btn-close" aria-label="close" data-bs-dismiss="alert"></button>
        </div>
    </section>
@endif

<section>
    @if($errors->all() )
    <div class="alert alert-dismissible alert-warming fade show bg-danger 
    " role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li><br/>
            @endforeach
        </ul>
        <button class="btn btn-close" aria-label="close" data-bs-dismiss="alert"></button>
    </div>
    @endif
</section>


@if (session(' loginError'))
    <section>
        <div class="alert alet-dismissible alert-success fade show text-center" role="alert">
            <strong>Success</strong>
            {{ session(' loginError') }}
            <button class="btn btn-close" aria-label="close" data-bs-dismiss="alert"></button>
        </div>
    </section>
@endif