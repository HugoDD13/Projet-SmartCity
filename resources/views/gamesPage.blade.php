@extends('layout')

@section('title')
Game Creation
@endsection

@section('content')
<div id="bcgGameCreation">
<form action="{{route('PageGameCreation')}}" method="POST">
    @csrf
    <div id="mainBoxGameCreation" class="text-center">
        <div class="text-center"><h1>Game Creation</h1></div>
        <hr>
        <label for="inputGameName">Description : </label>
        <input type="text" name="inputGameName" id="inputGameName" placeholder="Game Name" oninput="enableButtonCreateTeam(inputGameName, allParcours, btnCreateGame)">

        <br>

        <label for="allParcours">Choose your route : </label>
        <select name="allParcours" id="allParcours" oninput="enableButtonCreateTeam(inputGameName, allParcours, btnCreateGame)">
            @foreach ($data['allRoutes'] as $route)
                <option value="{{ $route->ID }}">{{ $route->NAME }}</option>
            @endforeach
        </select>

        <br>
        <button name="btnCreateTeam" id="btnCreateTeam" disabled>Create Game</button>
    </div>
</form>

<table id="gameHistoryCenter">
    <th>Id</th>
    <th>Description</th>
    <th>Final time</th>
    <th>Final score</th>
    <th>Creation date</th>
    @foreach ($data['allGames'] as $game)
        <tr>
            <td>{{ $game->ID }}</td>
            <td>{{ $game->DESCRIPTION }}</td>
            <td>{{ $game->TEMPSFINAL }}</td>
            <td>{{ $game->SCOREFINAL }}</td>
            <td>{{ $game->DATECREATION }}</td>
        </tr>
    @endforeach

</table>
</div>
@endsection
