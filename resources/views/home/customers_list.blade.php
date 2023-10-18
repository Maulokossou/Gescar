@extends('layout.masterhome')
@section('content')

<section>
  @include('message.customerMessage')
</section>
    <div class="button" style="">
        <li>
            <a href="{{ route('seeMore') }}" style=" cursor:pointer">Ajouter un client</a>
        </li>
    </div>

    <table class="table table-bordered" style="margin-top:-5px">
        <thead class="" style="background: var(--secondary-color );">
            <tr>
                <th scope="col" style="background:  #17627a; color:white">Photo</th>
                <th scope="col" style="background:  #17627a; color:white">Nom</th>
                <th scope="col" style="background:  #17627a; color:white">Prenom</th>
                <th scope="col" style="background:  #17627a; color:white">Téléphone</th>
                <th scope="col" style="background:  #17627a; color:white">Adresse</th>
                <th scope="col" style="background:  #17627a; color:white">Cni</th>
                <th scope="col" style="background:  #17627a; color:white">Email</th>
                <th scope="col" style="background:  #17627a; color:white">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr class="py-2 px-2">
                    <td class="py-3 px-3" style="height: 70px; width:70px"><img src="{{asset($item->photo)}}" alt=""
                            class="rounded-5"></td>
                    <td class="py-4 px-4">{{ $item->nom }}</td>
                    <td class="py-4 px-4">{{ $item->prenom }}</td>
                    <td class="py-4 px-4">{{ $item->tel }}</td>
                    <td class="py-4 px-4">{{ $item->adresse }}</td>
                    <td class="py-4 px-4">{{ $item->cni }}</td>
                    <td class="py-4 px-4">{{ $item->email }}</td>
                    <td>
                        <a href="{{route('seeMore',['id'=>$item['id']])}}" title="Voir plus" class="btn btn-success"> @include('include.seeIcon')</a>
                        <a href="{{ route('modifyForm',['id'=>$item['id']]) }}" title="Modifier" class="btn btn-warning">
                            @include('include.editIcon')</a>
                        <a href="{{route('customerDelete',['id'=>$item['id']])}}" title="Supprimer" class="btn btn-danger"
                            title="Supprimer">@include('include.deleteIcon')</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="boss">
        {{ $data->links() }}
    </div>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
@endsection

