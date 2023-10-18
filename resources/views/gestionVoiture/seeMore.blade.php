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
                            <td>Boite_vitesse:</td>
                            <td>{{$collection->gearbox}}</td>
                        </tr>
                        <tr>
                            <td>Puissance:</td>
                            <td>{{$collection->power}}</td>
                        </tr>
                        <tr>
                            <td>Nombre de porte:</td>
                            <td>{{$collection->door}}</td>
                        </tr>
                        <tr>
                            <td>Carburant:</td>
                            <td>{{$collection->fuel}}</td>
                        </tr>
                        <tr>
                            <td>Nombre de cylindre:</td>
                            <td>{{$collection->cylinder}}</td>
                        </tr>
                        <tr>
                            <td>Soupape:</td>
                            <td>{{$collection->valve}}</td>
                        </tr>
                        <tr>
                            <td>Transmission:</td>
                            <td>{{$collection->transmission}}</td>
                        </tr>
                        <tr>
                            <td>Frein:</td>
                            <td>{{$collection->brake}}</td>
                        </tr>
                        <tr>
                            <td>Accélération:</td>
                            <td>{{$collection->acceleration}}</td>
                        </tr>
                        <tr>
                            <td>Couleur:</td>
                            <td>{{$collection->color}}</td>
                        </tr>
                        <tr>
                            <td>Modèle:</td>
                            <td>{{$collection->model->name}}</td>
                        </tr>
                        <tr>
                            <td>Marque:</td>
                            <td>{{$collection->model->brand->name}}</td>
                        </tr>
                        <tr>
                            <td>Catégorie:</td>
                            <td>{{$collection->model->brand->categorie->name}}</p>
                        </tr>
                        <tr>
                            <td>Carosserie:</p>
                            <td>{{$collection->carbody}}</td>
                        </tr>
                        <tr>
                            <td>Vitesse Maximale:</td>
                            <td>{{$collection->maxspeed}}</td>
                        </tr>
                    </div>
                </tbody>
            </table>
        </div>
        <div class="description_bottom">
            
                @if (count($photos) > 0)
                        @if ($index > 0)
                            @include('include.before')
                        @endif
                        
                            <img src="{{ asset($collection->photo[$index]) }}" alt="">
                        @if ($index < count($photos))
                            @include('include.after')
                        @endif
                @endif
        
        </div>
    </div>
</section>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@endsection
