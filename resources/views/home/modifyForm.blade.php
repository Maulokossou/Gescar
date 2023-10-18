@extends('layout.masterhome')

@section('content')
<section>
    <div class="container" style="margin-top: 2%">

        @include('message.registerMessage')

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
        <div class="connexion">
            <h1>Modifier un client</h1>
        </div>
        <div class="form">
            <form action=" {{route('modifyCustomerStore',$data->id)}} " method="post" enctype="multipart/form-data">
                @csrf
                <div class="my-3 py-0 px-5">
                    <label for="photo">Image:</label>
                    <input type="file" name="photo" class="form-control" placeholder="Choisissez une image"
                        value="{{ $data->photo}}">
                </div>
                <div class="my-3 py-0 px-5">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" class="form-control" placeholder="Entrer un nom"
                    value="{{ $data->nom }}">
                </div>
                <div class="my-3 py-0 px-5">
                    <label for="prenom">Prenom:</label>
                    <input type="text" name="prenom" class="form-control" placeholder="Entrer un prénom"
                    value="{{ $data->prenom }}">
                </div>
                <div class="my-3 py-0 px-5">
                    <label for="tel">Téléphone:</label>
                    <input type="tel" name="tel" class="form-control"
                        placeholder="Entrer un numéro de téléphone"  value="{{ $data->tel }}">
                </div>
                <div class="my-3 py-0 px-5">
                    <label for="adresse">Adresse:</label>
                    <input type="text" name="adresse" class="form-control" placeholder="ENtrer l'adresse"
                    value="{{ $data->adresse }}">
                </div>
                <div class="my-3 py-0 px-5">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Entrer l'email"
                    value="{{ $data->email }}">
                </div>
                <div class="my-3 py-0 px-5">
                    <label for="cni">CNI:</label>
                    <input type="number" name="cni" class="form-control" placeholder="Entrer la CNI"
                    value="{{ $data->cni }}">
                </div>
                <div class="my-3 py-0 px-5">
                    <button type="submit">Enregistrer</button>
                </div>
            </form>
        </div>

    </div>
</section>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
@endsection