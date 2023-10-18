@extends('layout.masterhome')
@section('content')


    <div class="fiche">
    </div>
    <section class="description">
        <h1>Fiche technique d'une voiture</h1>
        <div class="description_contain">
            <div class="description_top">
                <table class="table  table-bordered">
                    <thead style="border:1px solid red">

                    </thead>
                    <tbody>
                        <tr>
                            <td>Boîte_vitesse::</td>
                            <td>{{ $location->car->gearbox }}</td>
                        </tr>
                        <tr>
                            <td>Puissance:</td>
                            <td>{{ $location->car->power }}</td>
                        </tr>
                        <tr>
                            <td>Nombre de porte:</td>
                            <td>{{ $location->car->door }}</td>
                        </tr>
                        <tr>
                            <td>Carburant:</td>
                            <td>{{ $location->car->fuel }}</td>
                        </tr>
                        <tr>
                            <td>Nombre de cylindre:</td>
                            <td>{{ $location->car->cylinder }}</td>
                        </tr>
                        <tr>
                            <td>Soupape:</td>
                            <td>{{ $location->car->valve }}</td>
                        </tr>
                        <tr>
                            <td>Transmission:</td>
                            <td>{{ $location->car->transmission }}</td>
                        </tr>
                        <tr>
                            <td>Frein:</td>
                            <td>{{ $location->car->brake }}</td>
                        </tr>
                        <tr>
                            <td>Accélération:</td>
                            <td>{{ $location->car->acceleration }}</td>
                        </tr>
                        <tr>
                            <td>Couleur:</td>
                            <td>{{ $location->car->color }}</td>
                        </tr>
                        <tr>
                            <td>Modèle:</td>
                            <td>{{ $location->car->model->name }}</td>
                        </tr>
                        <tr>
                            <td>Marque:</td>
                            <td>{{ $location->car->model->brand->name }}</td>
                        </tr>
                        <tr>
                            <td>Catégorie:</td>
                            <td>{{ $location->car->model->brand->categorie->name }}</td>
                        </tr>
                        <tr>
                            <td>Carosserie:</td>
                            <td>{{ $location->car->carbody }}</td>
                        </tr>
                        <tr>
                            <td>Rapidité:</td>
                            <td>{{ $location->car->maxspeed }}</td>
                        </tr>
            </div>
            </tbody>
            </table>
        </div>
        <div class="description_bottom">

            @if (count($photos) > 0)
                @if ($index > 0)
                    <a href="{{ route('carSeeMore', ['id' => $location->car->id, 'photo_index' => ($index - 1 + count($photos)) % count($photos)]) }}"
                        style="color: #17627a; background:white;"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                            height="40" cursor="pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg></a>
                @endif

                <img src="{{ asset($location->car->photo[$index]) }}" alt="">
                @if ($index < count($photos))
                    <a href="{{ route('carSeeMore', ['id' => $location->car->id, 'photo_index' => ($index - 1 + count($photos)) % count($photos)]) }}"
                        style="color: #17627a; background:white;"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                            height="40" cursor="pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg></a>
                @endif
            @endif

        </div>
        </div>
    </section>


@endsection
