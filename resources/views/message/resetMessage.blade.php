 @if (session('resetMessage'))
     <section>
         <div class="alert alert-dismissible fade show alert-success text-center" role="alert">
             <strong>Success</strong>
             {{ session('resetMessage') }}
             <button class="btn btn-close" aria-label="close" data-bs-dismis="alert"></button>
         </div>
     </section>
 @endif
