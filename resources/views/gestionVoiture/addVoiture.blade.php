@extends('layout.masterhome')

@section('content')
@if(isset($car))
@include('gestionVoiture.carModifyForm')
@else
<section>
    <div class="container" style="margin-top: 2%; width:90%">
        @include('message.carsMessage')
        <div class="connexion">
            <h1>Ajouter une voiture</h1>
        </div>
        <div class="form">
            <form action="{{route('addCarStore')}}" method="post" enctype="multipart/form-data">
                @csrf
               <div class="formulaire">
                <div class="left" style="width:50%">
                    <div class="my-3 py-0 px-5">
                        <label for="photo[]">Photo:</label>
                        <input type="file" multiple name="photo[]" class="form-control" 
                            value="">
                    </div>
                   
                    <div class="my-3 py-0 px-5">
                        <label for="models_id">Modèle:</label>
                        <select name="models_id" id="">
                           @foreach($models as $model)
                           <option value="{{$model->id}}" >{{$model->name}}</option>
                           @endforeach
                        </select>
                    </div>
                    <div class="my-3 py-0 px-5">
                        <label for="transmission">Transmission:</label>
                        <input type="text" name="transmission" class="form-control"
                        value="{{old('transmission')}}">
                    </div>
                    <div class="my-3 py-0 px-5">
                        <label for="color">Couleur:</label>
                        <input type="text" name="color" class="form-control" 
                        value="{{old('color')}}">
                    </div>
                   
                    <div class="my-3 py-0 px-5">
                        <label for="maxspeed">Vitesse maximale:</label>
                        <input type="number" name="maxspeed" id="" class="form-control" 
                        value="{{old('maxspeed')}}" >
                    </div>
                    <div class="my-3 py-0 px-5">
                        <label for="brake">Frein:</label>
                        <input type="text" name="brake" id="" class="form-control" 
                        value="{{old('brake')}}">
                    </div>
                    <div class="my-3 py-0 px-5">
                        <label for="carbody">Carrosserie:</label>
                        <input type="text" name="carbody" class="form-control" 
                        value="{{old('carbody')}}">
                    </div>
                </div>
                <div class="right" style="width:50%">
                    <div class="my-3 py-0 px-5">
                        <label for="gearbox">Boîte à vitesse:</label>
                        <input type="text" name="gearbox" class="form-control" 
                            value="{{old('gearbox')}}">
                    </div>
                    <div class="my-3 py-0 px-5">
                        <label for="power">Puissance:</label>
                        <input type="number" name="power" class="form-control" 
                        value="{{old('power')}}">
                    </div>
                    <div class="my-3 py-0 px-5">
                        <label for="door">Nombre de Porte:</label>
                        <input type="number" name="door" id="" class="form-control" 
                        value="{{old('door')}}">
                    </div>
                    <div class="my-3 py-0 px-5">
                        <label for="fuel">Carburant:</label>
                        <input type="text" name="fuel" id="" class="form-control" 
                        value="{{old('fuel')}}">
                    </div>
                    <div class="my-3 py-0 px-5">
                        <label for="cylinder">Nombre de cylindre:</label>
                        <input type="number" name="cylinder" class="form-control"
                        value="{{old('cylinder')}}">
                    </div>
                    <div class="my-3 py-0 px-5">
                        <label for="valve">Soupape:</label>
                        <input type="number" name="valve" class="form-control" 
                        value="{{old('valve')}}">
                    </div>
                    <div class="my-3 py-0 px-5">
                        <label for="acceleration">Accéleration:</label>
                        <input type="number" name="acceleration" id="" class="form-control" 
                        value="{{old('acceleration')}}">
                    </div>
                </div>
               </div>
                <div class="my-3 py-0 px-5">
                    <button type="submit">Enregistrer</button>
                </div>
            </form>
        </div>

    </div>
</section>
@endif
@if(isset($collection))
@include('gestionVoiture.seeMore')
@endif
    
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@endsection
