
<section>
    <div class="container" style="margin-top: 2%; width:90%">
        @include('message.carsMessage')
        <div class="connexion">
            <h1>Formulaire de modification d'une location</h1>
        </div>
        <div class="form">
            <form action="{{ route('modifyLocationStore',$location->id) }}" method="post">
                @csrf
                <div class="formulaire">
                    <div class="left" style="width:100%">
                        <div class="my-3 py-0 px-5">
                            <label for="">Nom du client:</label>
                            <select name="customers_id" id="">
                                @foreach ($customers as $customer)
                                    <option @if ($customer->id == $location->customers_id) selected @endif
                                        value="{{ $customer->id }}">{{ $customer->nom }} {{ $customer->prenom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-3 py-0 px-5">
                            <label for="" class="">Nom de la voiture:</label>
                            <select name="cars_id" id="">
                                @foreach ($cars as $car)
                                    <option @if ($car->id == $location->cars_id) selected @endif
                                        value="{{ $car->id }}">{{ $car->fullname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-3 py-0 px-5">
                            <label for="startDate">Date de location:</label>
                            <input type="date" name="startDate" class="form-control"
                                value="{{ $location->startDate }}" placeholder="Entrer la date de location">
                        </div>
                        <div class="my-3 py-0 px-5">
                            <label for="expectedReturnDate">Date de retour estimée:</label>
                            <input type="date" name="expectedReturnDate" class="form-control"
                                value="{{ $location->expectedReturnDate }}" placeholder="Entrer la date de retour">
                        </div>
                        <div class="my-3 py-0 px-5">
                            <label for="effectiveReturnDate">Date de retour effective:</label>
                            <input type="date" name="effectiveReturnDate" class="form-control"
                                value="{{ $location->effectiveReturnDate }}" placeholder="Entrer la date de retour">
                        </div>
                        <div class="my-3 py-0 px-5" style="display:flex;flex-direction: column">
                            <label for="observation">Observation:</label>
                            <textarea name="observation" id="" cols="30" rows="10" class="form-select" style="border-radius:0"></textarea>
                        </div>
                    </div>
                </div>
                <div class="my-3 py-0 px-5">
                    <button type="submit">Valider la modification</button>
                </div>
            </form>
        </div>

    </div>
</section>
