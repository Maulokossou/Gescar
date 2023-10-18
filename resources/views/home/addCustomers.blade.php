@extends('layout.masterhome')
@section('content')

    @if (isset($ids))
        <div class="container" style="background: #17617a4f;padding:0px 0px 0px 0px;border-radius:7px">
            <div class="main__content">
                <div class="profil_content  border-primary rounded-2 mx-5 my-5" style="" id="seeMore">
                    <div class="seeMoreTop" style="height:50%">
                        <img class="rounded-top-2" src="{{ asset($ids['photo']) }}" alt="">
                    </div>
                    <div class=" profil_content_item  text-center text-white" class="seeMoreBottom"
                        style="line-height:18px; margin-top:15px; padding:0px 0px 30px 0px;height:50%">
                        <p class=" ">Nom: {{ $ids['nom'] }}</p>
                        <p class=" ">Prenom: {{ $ids['prenom'] }}</p>
                        <p class=" ">Adresse: {{ $ids['adresse'] }}</p>
                        <p class=" ">Téléphone: {{ $ids['tel'] }}</p>
                        <p class=" ">Email: {{ $ids['email'] }}</p>
                        <p class=" ">CNI: {{ $ids['cni'] }}</p>

                        <div class="text-secondary py-3 d-flex justify-content-center fs-3" style="margin-top:-10px;">
                            @include('include.afterAndBefore_button')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @else
        <section>
            <div class="container" style="margin-top: 2%">

                @include('message.customerMessage')

                
                 
                
                <div class="connexion">
                    <h1>Nouveau client</h1>
                </div>
                <div class="form">
                    <form action="{{ route('newCustomers') }}" method="post" enctype="multipart/form-data" style='color:black'>
                        @csrf
                        <div class="my-3 py-0 px-5">
                            <label for="photo">Image:</label>
                            <input type="file" name="photo" class="form-control" placeholder="Choisissez une image"
                                value="{{ old('photo') }}">
                        </div>
                        <div class="my-3 py-0 px-5">
                            <label for="nom">Nom:</label>
                            <input type="text" name="nom" class="form-control" placeholder="Entrer un nom"
                                value="{{ old('nom') }}">
                        </div>
                        <div class="my-3 py-0 px-5">
                            <label for="prenom">Prenom:</label>
                            <input type="text" name="prenom" class="form-control" placeholder="Entrer un prénom"
                                value="{{ old('prenom') }}">
                        </div>
                        <div class="my-3 py-0 px-5">
                            <label for="tel">Téléphone:</label>
                            <input type="tel" name="tel" class="form-control"
                                placeholder="Entrer un numéro de téléphone" value="{{ old('tel') }}">
                        </div>
                        <div class="my-3 py-0 px-5">
                            <label for="adresse">Adresse:</label>
                            <input type="text" name="adresse" class="form-control" placeholder="Entrer l'adresse"
                                value="{{ old('adresse') }}">
                        </div>
                        <div class="my-3 py-0 px-5">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" placeholder="Entrer l'email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="my-3 py-0 px-5">
                            <label for="cni">CNI:</label>
                            <input type="number" name="cni" class="form-control" placeholder="Entrer la CNI"
                                value="{{ old('cni') }}">
                        </div>
                        <div class="my-3 py-0 px-5">
                            <button type="submit">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    @endif
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
@endsection


