@extends('layout.masterhome')
@section('content')
    <section>
        @include('message.carsMessage')
    </section>
    <div class="button">
        <li>
            <a href="{{ route('marqueVoiture') }}">Liste des marques</a>
            <a href="{{ route('modeleVoiture') }}">Liste des modèles</a>
            <a href="{{ route('categorieVoiture') }}">Liste des catégories</a>
            <a href="{{ route('addVoiture') }}">Ajouter une voiture</a>
        </li>
    </div>

    <table class="table table-bordered">
        <thead class="" style="background: var(--secondary-color );">
            <tr>
                <th scope="col" style="background:  #17627a; color:white">Photo</th>
                <th scope="col" style="background:  #17627a; color:white">Nom</th>
                <th scope="col" style="background:  #17627a; color:white">Modèle</th>
                <th scope="col" style="background:  #17627a; color:white">Marque</th>
                <th scope="col" style="background:  #17627a; color:white">Année</th>
                <th scope="col" style="background:  #17627a; color:white">Couleur</th>
                <th scope="col" style="background:  #17627a; color:white">Catégorie</th>
                <th scope="col" style="background:  #17627a; color:white">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr class="py-2 px-2">
                    <td class="py-3 px-3" style="height: 70px; width:70px">
                        @if(is_string($car->photo[0] ?? null))
                            <img src="{{ asset($car->photo[0]) }}" alt="" class="rounded-5">
                        @endif
                    </td>
                    <td class="py-4 px-4">{{  $car->carname}}</td>
                    <td class="py-4 px-4">{{ $car->model->name }}</td>
                    <td class="py-4 px-4">{{ $car->model->brand->name }} </td>
                    <td class="py-4 px-4">{{ $car->model->year }}</td>
                    <td class="py-4 px-4">{{ $car->color }}</td>
                    <td class="py-4 px-4">{{$car->model->brand->categorie->name}}</td>
                    <td>
                        <a href="{{route('carSeeMore',['id'=>$car['id']])}}" title="Voir plus" class="btn btn-success"> @include('include.seeIcon')</a>
                        <a href="{{route('carModify',['id'=>$car['id']])}}" title="Modifier" class="btn btn-warning">
                            @include('include.editIcon')</a>
                        <a href="{{route('deleteCar',['id'=>$car['id']])}}" title="Supprimer" class="btn btn-danger"
                            title="Supprimer">@include('include.deleteIcon')</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="boss">
        {{ $cars->links()}}
    </div>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

@endsection
