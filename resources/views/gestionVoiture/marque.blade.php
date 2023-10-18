@extends('layout.masterhome')
@section('content')
    <section>
        @include('message.brandsMessage')
    </section>
    <div class="button">
        <li>
            <a href="{{ route('marqueVoiture') }}">Liste des marques</a>
            <a href="{{ route('modeleVoiture') }}">Liste des modèles</a>
            <a href="{{ route('categorieVoiture') }}">Liste des catégories</a>
        </li>
    </div>
    <div class="details">
        <h2>Liste des marques de voiture:</h2>
        <div class="contenu">
            <table class="table table-bordered">
                <thead class="" style="background: var(--secondary-color );">
                    <tr>
                        <th scope="col" style="background:  #17627a; color:white">Nom de la marque</th>
                        <th scope="col" style="background:  #17627a; color:white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr class="py-2 px-2">
                            <td class="py-4 px-4">{{ $brand->name }}</td>
                            <td>
                                <a href="{{ route('brandModify', ['id' => $brand['id']]) }}" title="Modifier"
                                    class="btn btn-warning">
                                    @include('include.editIcon')</a>
                                <a href="{{route('deleteBrand',['id'=>$brand['id']])}}" title="Supprimer" class="btn btn-danger"
                                    title="Supprimer">@include('include.deleteIcon')</a>
                            </td>
                        </tr>
                    @endforeach

                    <div class="d-flex justify-content-end border-none">
                        {{-- {{ $data->links() }} --}}
                    </div>
                </tbody>
            </table>
            @if (isset($ids))

            <div class="enregistrement">
                <form action="{{ route('brandModifyStore',['id'=>$ids->id]) }}" method="post">
                    @csrf
                    <label for="">Ajouter une marque:</label>
                    <input type="text" name="name" value="{{$ids->name}}">
                    <label for="">Sélectionner une catégorie:</label>
                    <select name="categories_id" id="">
                        @foreach ($categories as $category)
                            <option @if( $category->id == $ids->categories_id) selected @endif value="{{ $category->id }}"> {{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button>Ajouter</button>
                </form>

            </div>

            @else
                <div class="enregistrement">
                    <form action="{{ route('addBrandStore') }}" method="post">
                        @csrf
                        <label for="">Ajouter une marque:</label>
                        <input type="text" name="name" value="{{old('name')}}">
                        <label for="">Sélectionner une catégorie:</label>
                        <select name="categories_id" id="">
                            @foreach ($categories as $category)
                                <option  value="{{ $category->id }}">{{ $category->name }}</option>
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
