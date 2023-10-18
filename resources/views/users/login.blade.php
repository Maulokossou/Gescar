@extends('layout.master-register')
    <section>
        <div class="container" style="margin-top: 10%; color:white">
            @section('content')
            <section>
                @include('message.messageLogin')
            </section>
            <div class="connexion">
                <h1>Connexion</h1>
            </div>
            <div class="form">
                <form action="{{route('storeLogin')}}" method="post">
                    @csrf
                    <div class="my-3 py-0 px-5">
                        <label for="email">Email:</label>
                        <input type="email" name="email"  class="form-control"  placeholder="Votre adresse mail">
                    </div>
                    <div class="my-3 py-0 px-5">
                        <label for="password">Mot de passe:</label>
                        <input type="password" name="password"  class="form-control"  placeholder="Votre mot de passe">
                    </div>
                    <div class="my-3 py-0 px-5">
                        <button type="submit">Enregistrer</button>
                      <div class="back">
                        <p>Nouveau?  <a href="{{route('register')}}">Cliquez ici</a></p>
                        <p><a href="{{route('modifypassword')}}">Mot de passe oublié ?</a></p>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <p style="color: white; display:flex; align-items:center; justify-content:center; margin-top:100px">Copyright 2023| Made by Maurel LOKOSSOU and Canelle ADOTEVI</p>
@endsection
<script src="{{asset('js/bootstrap.min.js')}}"></script>
