@extends('layout')

@section('title')
Connexion
@endsection

@section('content')
<div id="bcgConnexion">
    <form action="{{route ('VerifConnexion') }}" method="POST">
        @csrf
        <div id="mainBoxConnexion" class="text-center bg-white">
            <h1 class="text-center">Connexion</h1>
            <hr>
            <input type="text" class="inpConnexion" name="inputName" id="inputName" placeholder="Username" autocomplete="off" oninput="enableButtonConnexion(inputName, inputPassword, btnConnexion)">
            <input type="password" class="inpConnexion" name="inputPassword" id="inputPassword" placeholder="Password" autocomplete="off" oninput="enableButtonConnexion(inputName, inputPassword, btnConnexion)">
            <button name="btnConnexion" id="btnConnexion" disabled>Connexion</button>
        </div>
    </form>
</div>
@endsection
