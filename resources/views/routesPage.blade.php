@extends('layout')

@section('title')
    Route Creation
@endsection

@section('Style') <!--Charge la page de style-->
    <link rel="stylesheet" href="style.css"> <!--Page de style-->
@endsection <!--Charge la page de style-->

@section('content')
<div id="bcgRouteCreation">
    <div id="borderRouteCreation">
        <br>
        <div>
            <h1 class="text-center">Routes</h1>
        </div>
        <hr>
    <div>

    <div class="text-center boxRouteCreation bg-white">
        <form action="{{route('RouteCreation')}}" method="POST">
            @csrf
            <h3>New Route</h3>

            <div class="text-center">
                <input type="text" placeholder="Name" name="inpRouteName" id="inpRouteName" required>
            </div>

            <div class="text-center">
                <input type="text" placeholder="Description" name="inpRouteDescription" id="inpRouteDescription" required>
            </div>

            <div class="text-center">
                <label for="inpRouteHandicap">Disabled : </label>
                <input type="checkbox" name="inpRouteHandicap" id="inpRouteHandicap">
            </div>

            <div class="text-center">
                <button class="btn btn-secondary" id="btnCreateRoute" name="btnCreateRoute">Create</button>
            </div>
        </form>
    </div>

    <hr>

    <div class="text-center">
        <table>
            <th>Name</th>
            <th>Description</th>
            <th>Handicap</th>
            <th>Delete</th>
            @foreach ($data['allRoutes'] as $route)
                <tr>
                    <td><a href="{{route('stepPage', [$route->ID])}}">{{$route->NAME}}</a></td>
                    <td>{{$route->DESCRIPTION}}</td>
                    <td>{{$route->HANDICAP}}</td>
                    <td class="text-center">
                        <a href='{{ route('deleteRoute', [$route->ID])}}'>
                            <img width="25px" height="25px" src="{{asset('image/trash.png')}}" alt="">
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
