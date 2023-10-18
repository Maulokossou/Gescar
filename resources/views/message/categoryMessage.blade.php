

@if(session("addCategorySuccess"))
<div class="alert alert-dismissible alert-success fade show text-center" role="alert">
<strong>Success</strong><br/>
{{session("addCategorySuccess")}}
<button class="btn btn-close" aria-label="close" data-dismiss-bs="alert"></button>
</div>
@endif

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


@if(session("categoryUpdate"))
<div class="alert alert-dismissible alert-success fade show text-center" role="alert">
<strong>Success</strong><br/>
{{session("categoryUpdate")}}
<button class="btn btn-close" aria-label="close" data-dismiss-bs="alert"></button>
</div>
@endif

@if(session("categoryDelete"))
<div class="alert alert-dismissible alert-danger fade show text-center" role="alert">
<strong>Success</strong><br/>
{{session("categoryDelete")}}
<button class="btn btn-close" aria-label="close" data-dismiss-bs="alert"></button>
</div>
@endif