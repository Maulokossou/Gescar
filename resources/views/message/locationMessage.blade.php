
@if(session('addLocationSuccess'))
<section>
    <div class="alert alert-success alert-dismissible fade show  text-center" role="alert">
        <strong >Success</strong><br/>
        {{session('addLocationSuccess')}}
        <button class="btn btn-close " aria-label="close" data-dismiss-bs="alert"></button>
    </div>
</section>
@endif

@if(session('modifyLocationSuccess'))
<section>
    <div class="alert alert-success alert-dismissible fade show  text-center" role="alert">
        <strong >Success</strong><br/>
        {{session('modifyLocationSuccess')}}
        <button class="btn btn-close " aria-label="close" data-dismiss-bs="alert"></button>
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

@if(session('locationDeleteSuccess'))
<section>
    <div class="alert alert-success alert-dismissible fade show  text-center" role="alert">
        <strong >Success</strong><br/>
        {{session('locationDeleteSuccess')}}
        <button class="btn btn-close " aria-label="close" data-dismiss-bs="alert"></button>
    </div>
</section>
@endif