


@if(session("modelAdd"))
<div class="alert alert-dismissible alert-success fade show text-center" role="alert">
<strong>Success</strong><br/>
{{session("modelAdd")}}
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

@if(session("modelDelete"))
<div class="alert alert-dismissible alert-success fade show text-center" role="alert">
<strong>Success</strong><br/>
{{session("modelDelete")}}
<button class="btn btn-close" aria-label="close" data-dismiss-bs="alert"></button>
</div>
@endif



@if(session("updateModelSuccess"))
<div class="alert alert-dismissible alert-success fade show text-center" role="alert">
<strong>Success</strong><br/>
{{session("updateModelSuccess")}}
<button class="btn btn-close" aria-label="close" data-dismiss-bs="alert"></button>
</div>
@endif