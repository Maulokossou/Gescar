<section>
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
</section>

@if(session("SuccessMessage"))
<div class="alert alert-dismissible alert-success fade show text-center" role="alert">
<strong>Success</strong><br/>
{{session("SuccessMessage")}}
<button class="btn btn-close" aria-label="close" data-dismiss-bs="alert"></button>
</div>
@endif 

@if(session("deletecarSuccess"))
<div class="alert alert-dismissible alert-danger fade show text-center" role="alert">
<strong>Success</strong><br/>
{{session("deletecarSuccess")}}
<button class="btn btn-close" aria-label="close" data-dismiss-bs="alert"></button>
</div>
@endif


@if(session("updateCar"))
<div class="alert alert-dismissible alert-success fade show text-center" role="alert">
<strong>Success</strong><br/>
{{session("updateCar")}}
<button class="btn btn-close" aria-label="close" data-dismiss-bs="alert"></button>
</div>
@endif