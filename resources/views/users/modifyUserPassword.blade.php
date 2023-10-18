@extends('layout.master-register')
    <section>
        <div class="container" style="margin-top: 16%; color:white;">
            @section('content')
            @include('message.resetMessage')
            <div class="form">
                <form action="{{route('modifyUserStore')}}" method="post">
                    @csrf
                    <div class="my-3 py-0 px-5">
                        <label for="nom">Email:</label>
                        <input type="email" name="email"  class="form-control"  placeholder="Votre adresse mail">
                    </div>
                    <div class="my-3 py-0 px-5">
                        <button type="submit">Enregistrer:</button>
                       </div>
                </form>
            </div>
        </div>
    </section>
@endsection
<script src="{{asset('js/bootstrap.min.js')}}"></script>