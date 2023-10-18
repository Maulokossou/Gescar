@if (session('error'))
    <section>
        <div class="alert alert-dismissible fade show alert-danger text-center" role="alert">
            <strong>Error</strong>
            {{ session('error') }}
            <button class="btn btn-close" aria-label="close" data-bs-dismis="alert"></button>
        </div>
    </section>
@endif
