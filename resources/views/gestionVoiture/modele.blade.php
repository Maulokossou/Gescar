@extends('layout.masterhome')
@section('content')
    <section>
        @include('message.modelsMessage')
    </section>
    <div class="button">
        <li>
            <a href="{{ route('marqueVoiture') }}">Liste des marques</a>
            <a href="{{ route('modeleVoiture') }}">Liste des modèles</a>
            <a href="{{ route('categorieVoiture') }}">Liste des catégories</a>
        </li>
    </div>
    <div class="details">
        <h2>Liste des modèles de voiture:</h2>
        <div class="contenu">
            <table class="table table-bordered">
                <thead class="" style="background: var(--secondary-color );">
                    <tr>
                        <th scope="col" style="background:  #17627a; color:white">Nom du modèle</th>
                        <th scope="col" style="background:  #17627a; color:white">Année</th>
                        <th scope="col" style="background:  #17627a; color:white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($models as $model)
                   <tr class="py-2 px-2">
                    <td class="py-4 px-4">{{$model->name}}</td>
                    <td class="py-4 px-4">{{$model->year}}</td>
                    <td>
                        <a href="{{route('modelModify',['id'=>$model["id"]])}}" title="Modifier" class="btn btn-warning">
                            @include('include.editIcon')</a>
                        <a href="{{route('deleteModel',['id'=>$model['id']])}}" title="Supprimer" class="btn btn-danger"
                            title="Supprimer">@include('include.deleteIcon')</a>
                    </td>
                </tr>
                   @endforeach
                    
                    <div class="d-flex justify-content-end border-none">
                        {{-- {{ $data->links() }} --}}
                    </div>
                </tbody>
            </table>
            @if(isset($ids))

            <div class="enregistrement">
                <form action="{{ route('modelModifyStore',['id'=>$ids['id']]) }}" method="POST">
                    @csrf
                    <h5>Ajouter un modèle:</h5>
                    <input type="text" name="name" value="{{$ids->name}}">
                    <label for="">Ajouter une année:</label>
                    <input type="text" name="year" value="{{$ids->year}}">
                    <label for="">Sélectionner une marque:</label>
                    <select name="brands_id" id="">
                        @foreach ($brands as $brand)
                            <option @if($brand->id == $ids->brands_id) selected @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    <button>Ajouter</button>
                </form>
            </div>


            @else

            <div class="enregistrement">
                <form action="{{ route('addModelStore') }}" method="POST">
                    @csrf
                    <label for="">Ajouter un modèle:</label>
                    <input type="text" name="name" value="{{old('name')}}">
                    <label for="">Ajouter une année:</label>
                    <input type="text" name="year" value="{{old('year')}}">
                    <label for="">Sélectionner une marque:</label>
                    <select name="brands_id" id="">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    <button>Ajouter</button>
                </form>
            </div>

            @endif
        </div>
    </div>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

@endsection
