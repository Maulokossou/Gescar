@extends('layout.masterhome')

@section('content')
    <section>
        <div class="container" style="margin-top: 2%; width:90%">

            @include('message.carsMessage')


            <div class="connexion">
                <h1>Formulaire de modification d'une voiture</h1>
            </div>
            <div class="form">
                <form action="{{ route('modifyCarStore', $car->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="formulaire">
                        <div class="left" style="width:50%">
                            <div class="my-3 py-0 px-5">
                                <label for="photo[]">Photo:</label>

                                <input type="file" multiple name="photo[]" class="form-control"
                               {{--  @foreach ($photos as $photo) --}} value="
                   {{--  {{ $photo }} --}}
                     ">
                     {{-- @endforeach --}}


                            </div>

                            
                            <div class="my-3 py-0 px-5">
                                <label for="models_id">Modèle:</label>
                                <select name="models_id" id="" style="border-left: 5px solid #17627a  ">
                                    @foreach ($models as $model)
                                        <option @if ($model->id == $car->model_id) selected @endif
                                            value="{{ $model->id }}">{{ $model->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="my-3 py-0 px-5">
                                <label for="transmission">Transmission:</label>
                                <input type="text" name="transmission" class="form-control"
                                    value="{{ $car->transmission }}">
                            </div>
                            <div class="my-3 py-0 px-5">
                                <label for="color">Couleur:</label>
                                <input type="text" name="color" class="form-control" value="{{ $car->color }}">
                            </div>

                            <div class="my-3 py-0 px-5">
                                <label for="maxspeed">Vitesse maximale:</label>
                                <input type="number" name="maxspeed" id="" class="form-control"
                                    value="{{ $car->maxspeed }}">
                            </div>
                            <div class="my-3 py-0 px-5">
                                <label for="brake">Frein:</label>
                                <input type="text" name="brake" id="" class="form-control"
                                    value="{{ $car->brake }}">
                            </div>
                            <div class="my-3 py-0 px-5">
                                <label for="carbody">Carrosserie:</label>
                                <input type="text" name="carbody" class="form-control" value="{{ $car->carbody }}">
                            </div>

                        </div>
                        <div class="right" style="width:50%">
                            <div class="my-3 py-0 px-5">
                                <label for="gearbox">Boîte à vitesse:</label>
                                <input type="text" name="gearbox" class="form-control" value="{{ $car->gearbox }}">
                            </div>
                            <div class="my-3 py-0 px-5">
                                <label for="power">Puissance:</label>
                                <input type="number" name="power" class="form-control" value="{{ $car->power }}">
                            </div>
                            <div class="my-3 py-0 px-5">
                                <label for="door">Nombre de Porte:</label>
                                <input type="number" name="door" id="" class="form-control"
                                    value="{{ $car->door }}">
                            </div>
                            <div class="my-3 py-0 px-5">
                                <label for="fuel">Carburant:</label>
                                <input type="text" name="fuel" id="" class="form-control"
                                    value="{{ $car->fuel }}">
                            </div>
                            <div class="my-3 py-0 px-5">
                                <label for="cylinder">Nombre de cylindre:</label>
                                <input type="number" name="cylinder" class="form-control" value="{{ $car->cylinder }}">
                            </div>
                            <div class="my-3 py-0 px-5">
                                <label for="valve">Soupape:</label>
                                <input type="number" name="valve" class="form-control" value="{{ $car->valve }}">
                            </div>
                            <div class="my-3 py-0 px-5">
                                <label for="acceleration">Accéleration:</label>
                                <input type="number" name="acceleration" id="" class="form-control"
                                    value="{{ $car->acceleration }}">
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
    
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @endsection

