@extends('layout.master-register')
    <section>
        <div class="container" style="margin-top: 2%; color:white">
            @section('content')
            @include('message.registerMessage')
            <div class="connexion">
                <h1>Enregistrement</h1>
            </div>
            <div class="form">
                <form action="{{route('registerStore')}}" method="post">
                    @csrf
                   <div class="my-3 py-0 px-5">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom"  class="form-control" placeholder="Votre nom">
                   </div>
                    <div class="my-3 py-0 px-5">
                        <label for="prenom">Prenom:</label>
                        <input type="text" name="prenom"  class="form-control" placeholder="Votre prénom">
                    </div>
                    <div class="my-3 py-0 px-5">
                        <label for="email">Email:</label>
                        <input type="email" name="email"  class="form-control" placeholder="Votre adresse mail">
                    </div>
                    <div class="my-3 py-0 px-5">
                        <label for="password">Mot de passe:</label>
                        <input type="password" name="password"  class="form-control" placeholder="Choisissez un mot de passe">
                    </div password_confirmation>
                    <div class="my-3 py-0 px-5">
                        <label for="password_confirmation"> Confirmer le mot de passe:</label>
                        <input type="password" name="password_confirmation"  class="form-control" placeholder="Confirmer votre mot de passe">
                    </div >
                    <div class="my-3 py-0 px-5">
                     <button type="submit">Enregistrer</button>
                     <p>Avez-vous déja un compte?  <a href="{{route('login')}}">Cliquez ici</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
<script src="{{asset('js/bootstrap.min.js')}}"></script>