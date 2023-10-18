@extends('layout.master-register')
<section>
    <div class="container" style="margin-top: 14%; color:white">
        @section('content')
        <div class="form">
            <form action="{{route('reinitializeStore')}}" method="post">
                @csrf
                <div class="my-3 py-2 px-5">
                    <label for="newpassword">Nouveau mot de passe:</label>
                    <input type="password" name="newpassword"  class="form-control"  placeholder="Votre nouveau mot de passe">
                </div>
                <div class="my-3 py-2 px-5">
                    <label for="newpassword">Confirmer le mot de passe:</label>
                    <input type="password" name="newpassword_confirmation"  class="form-control"  placeholder="Confirmer votre nouveau mot de passe">
                </div>
                <div class="my-3 py-2 px-5">
                    <button type="submit">Enregistrer</button>
                   </div>
            </form>
        </div>
    </div>
</section>
@endsection
<script src="{{asset('js/bootstrap.min.js')}}"></script>