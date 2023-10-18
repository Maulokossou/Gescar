@php
   use App\Models\Location; 
@endphp
@extends('layout.masterhome')
@section('content')
    <section>
        @include('message.locationMessage')
    </section>
    <div class="button" style="">
        <li>
            <a href="{{ route('addlocation') }}">Ajouter une location</a>
        </li>
    </div>
    <table class="table table-bordered">
        <thead class="" style="background: var(--secondary-color );">
            <tr>
                <th scope="col" style="background:  #17627a; color:white">Client</th>
                <th scope="col" style="background:  #17627a; color:white">Modèle</th>
                <th scope="col" style="background:  #17627a; color:white">Marque</th>
                <th scope="col" style="background:  #17627a; color:white">Année</th>
                <th scope="col" style="background:  #17627a; color:white">Date de sortie</th>
                <th scope="col" style="background:  #17627a; color:white">Date de retour</th>
                <th scope="col" style="background:  #17627a; color:white">Date de retour effective</th>
                <th scope="col" style="background:  #17627a; color:white">Délai respecté</th>
                <th scope="col" style="background:  #17627a; color:white">Observations</th>
                <th scope="col" style="background:  #17627a; color:white">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $location)
                <tr class="py-2 px-2">
                    <td class="py-3 px-3" style="height: 70px; width:70px">{{$location->customer->nom}} {{$location->customer->prenom}}</td>
                    <td class="py-4 px-4">{{$location->car->model->name}}</td>
                    <td class="py-4 px-4">{{$location->car->model->brand->name}}</td>
                    <td class="py-4 px-4">{{$location->car->model->year}}</td>
                    <td class="py-4 px-4">{{$location->startDate}}</td>
                    <td class="py-4 px-4">{{$location->expectedReturnDate}}</td>
                    <td class="py-4 px-4">@if ($location->effectiveReturnDate)
                        {{$location->effectiveReturnDate}}
                    @else
                        "Pas disponible"
                    @endif </td>
                    <td class="py-4 px-4">@if(Location::getTimeAttribute($location['id']))
                        {{Location::getTimeAttribute($location['id'])}}
                        @else
                        "Pas disponible"
                        @endif
                    </td>
                    <td class="py-4 px-4">@if($location->observation)</td>
                    {{$location->observation}}
                    @else
                    "Non disponible"
                    @endif
                    <td>
                        <a href="{{route('locationSeeMore',['id'=>$location['id']])}}" title="Voir plus" class="btn btn-success"> @include('include.seeIcon')</a>
                        <a href="{{route('modifyLocation',['id'=>$location['id']])}}" title="Modifier" class="btn btn-warning">
                            @include('include.editIcon')</a>
                        <a href="{{route('locationDelete',['id'=>$location['id']])}}" title="Supprimer" class="btn btn-danger"
                            title="Supprimer">@include('include.deleteIcon')</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="boss">
        {{ $locations->links() }}
    </div>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
@endsection


