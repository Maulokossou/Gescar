@extends('layout.masterhome')
@section('content')
    <div>
        <section>
            @include('message.categoryMessage')
        </section>
        <div class="button">
            <li>
                <a href="{{ route('marqueVoiture') }}">Liste des marques</a>
                <a href="{{ route('modeleVoiture') }}">Liste des modèles</a>
                <a href="{{ route('categorieVoiture') }}">Liste des catégories</a>
            </li>
        </div>
        <div class="details">
            <h2>Liste des catégories de voiture:</h2>
            <div class="contenu">
                <table class="table table-bordered">
                    <thead class="" style="background: var(--secondary-color );">
                        <tr>
                            <th scope="col" style="background:  #17627a; color:white">Nom de la catégorie</th>
                            <th scope="col" style="background:  #17627a; color:white">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr class="py-2 px-2">
                                <td class="py-4 px-4">{{ $category->name }}</td>
                                <td>
                                    <a href="{{route('catModify',['id'=>$category['id']])}}" title="Modifier" class="btn btn-warning">
                                        @include('include.editIcon')</a>
                                    <a href="{{route('deleteCategory',['id'=>$category['id']])}}" title="Supprimer" class="btn btn-danger"
                                        title="Supprimer">@include('include.deleteIcon')</a>
                                </td>
                            </tr>
                        @endforeach
                        {{--  <div class="d-flex justify-content-end border-none">
    
                    </div> --}}
                    </tbody>
                </table>

                @if(isset($ids))
               
                <div class="enregistrement">
                    <form action="{{ route('categoryModifyStore',$ids->id) }}" method="post">
                        @csrf
                        <h5>Ajouter une catégorie:</h5>
                        <input type="text" name="name" value ="{{$ids->name}}">
                        <button>Ajouter</button>
                    </form>
                </div>

                @else
                   
                <div class="enregistrement">
                    <form action="{{ route('categoryAdd') }}" method="post">
                        @csrf
                        <label for="">Ajouter une catégorie:</label>
                        <input type="text" name="name" value= "{{old('name')}}">
                        <button>Ajouter</button>
                    </form>
                </div>

                @endif

            </div>
        </div>
    </div>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

@endsection

