@extends('layout.masterhome')

@section('content')

    @if (isset($location))
        @include('locationVoiture.modifyLocation')
    @else
        <section>
            <div class="container" style="margin-top: 2%; width:90%">
                @include('message.carsMessage')
                <div class="connexion">
                    <h1>Formulaire de location d'une voiture</h1>
                </div>
                <div class="form">
                    <form action="{{ route('carLocation') }}" method="post">
                        @csrf
                        <div class="formulaire">
                            <div class="left" style="width:100%">
                                <div class="my-3 py-0 px-5">
                                    <label for="">Nom du client:</label>
                                    <select name="customers_id" id="" style="border-left: 5px solid #17627a">
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->nom }} {{ $customer->prenom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="my-3 py-0 px-5">
                                    <label for="" >Nom de la voiture:</label>
                                    <select name="cars_id" id="" style="border-left: 5px solid #17627a">
                                        @foreach ($cars as $car)
                                            <option value="{{ $car->id }}">{{ $car->fullname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="my-3 py-0 px-5">
                                    <label for="startDate">Date de location:</label>
                                    <input type="date" name="startDate" class="form-control"
                                        value="{{ old('startDate') }}" placeholder="Entrer la date de location">
                                </div>
                                <div class="my-3 py-0 px-5">
                                    <label for="expectedReturnDate">Date de retour estimée:</label>
                                    <input type="date" name="expectedReturnDate" class="form-control"
                                        value="{{ old('expectedReturnDate') }}" placeholder="Entrer la date de retour">
                                </div>
                            </div>
                        </div>
                        <div class="my-3 py-0 px-5">
                            <button type="submit">Valider la location</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    @endif
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
@endsection

