

@if(session('customerAddSuccessfully'))
<section>
    <div class="alert alert-success alert-dismissible fade show  text-center" role="alert">
        <strong >Success</strong><br/>
        {{session('customerAddSuccessfully')}}
        <button class="btn btn-close " aria-label="close" data-dismiss-bs="alert"></button>
    </div>
</section>
@endif 

@if(session('updateCustomers'))
<section>
    <div class="alert alert-success alert-dismissible fade show  text-center" role="alert">
        <strong >Success</strong><br/>
        {{session('updateCustomers')}}
        <button class="btn btn-close " aria-label="close" data-dismiss-bs="alert"></button>
    </div>
</section>
@endif

@if(session('sucessDeleteCustomer'))
<section>
    <div class="alert alert-success alert-dismissible fade show  text-center" role="alert">
        <strong >Success</strong><br/>
        {{session('sucessDeleteCustomer')}}
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