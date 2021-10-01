@extends('layout')

@section('title')
Team Creation
@endsection

@section('Style') <!--Charge la page de style-->
<link rel="stylesheet" href="style.css"> <!--Page de style-->
@endsection <!--Charge la page de style-->

@section('content')
<form action="{{route('teamCreation')}}" method="POST" {% csrf_token %}>
    @csrf
    <div id="mainBoxTeamCreation" class="text-center">
        <div class="text-center"><h1>Team Creation</h1></div>
        <hr>
        <input type="text" name="inputTeamName" id="inputTeamName" placeholder="Team Name" oninput="enableButtonCreateTeam(inputTeamName, inputImage, btnCreateTeam)">
        <br>
        <br>
        <input type="text" name="inputImage" id="inputImage" placeholder="URL Image" oninput="enableButtonCreateTeam(inputTeamName, inputImage, btnCreateTeam)">
        <br>
        <br>
        <button name="btnCreateTeam" id="btnCreateTeam" disabled>Create Team</button>
    </div>
</form>
<hr>

    @if ($data['result'] == 1)
    <div id="createdTeams">
    <h1 class="text-center">Created Teams</h1>
    <table class="mx-auto">
        <tr>
            <th class="text-center">Team Name</th>
            <th class="text-center">Team Image</th>
        </tr>

        @foreach ($data['allTeams'] as $team)
            <tr>
                <td class="text-center"><a href="{{route('selectedTeam')}}">{{$team->NOM}}</a></td>
                <td class="text-center"><img width="100px" height="100px" src="{{$team->IMAGE}}"></td>
            </tr>
        @endforeach
    </table>
    </div>
    @endif

    <form action="{{route('playerCreation')}}" method="POST" {% csrf_token %}>
        @csrf
        <div id="mainBoxPlayerCreation" class="text-center">
            <div class="text-center"><h1>Player Creation</h1></div>
            <hr>
            <input type="text" name="inputPlayerName" id="inputPlayerName" placeholder="Player Name" oninput="enableButtonCreateTeam(inputPlayerName, inputPlayerFirstName, btnCreatePlayer)">
            <br>
            <br>
            <input type="text" name="inputPlayerFirstName" id="inputPlayerFirstName" placeholder="Player FirstName" oninput="enableButtonCreateTeam(inputPlayerName, inputPlayerFirstName, btnCreatePlayer)">
            <br>
            <br>
            <button name="btnCreatePlayer" id="btnCreatePlayer" disabled>Create Player</button>
        </div>
    </form>
    <hr>

    <div id="addPlayersInTeam">
        <h1 class="text-center">All Players</h1>
        <table class="mx-auto">
            <tr>
                <th class="text-center" colspan="3">Team</th>
            </tr>
            @foreach ($data['allPlayers'] as $player)
                <tr>
                    <td class="text-center">{{$player->NOM}}</td>
                    <td class="text-center">{{$player->PRENOM}}</td>
                    <td class="text-center"><img style="width: 20px;" src="../public/image/delete.png"></button></td>
                </tr>
            @endforeach
        </table>
    </div>

    <div id="addPlayersInTeam">
        <h1 class="text-center">Players In Team</h1>
        <table class="mx-auto">
            <tr>
                <th class="text-center">Team</th>
            </tr>
            {{-- @foreach ($Players as $player)
                <tr>
                    <td class="text-center"></td>
                </tr>
            @endforeach --}}

        </table>
    </div>

@endsection
