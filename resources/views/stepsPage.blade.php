@extends('layout')

@section('title')
Step Creation
@endsection

@section('Style') <!--Charge la page de style-->
<link rel="stylesheet" href="style.css"> <!--Page de style-->
@endsection <!--Charge la page de style-->
{{-- {{route('stepCreation', [$routeName[0]->ID])}} --}}
@section('content')
        <div class="inputSteps text-center">
            <form method="post" name="formSteps" id="formSteps" action="{{route('stepCreation', [$data['routeName'][0]->ID])}}">
                @csrf
                <div id="bcgRouteCreation">
                    <div id="borderRouteCreation">
                        <div>
                            <div>
                                <h1 id="title" class="text-center">
                                    <div>
                                        <div id="routeId">{{$data['routeName'][0]->ID}}</div>
                                        <div id="routeName">Steps for : {{$data['routeName'][0]->NAME}}</div>
                                    </div>
                                </h1>
                            </div>
                        </div>
                    <input class="espace" type="text" placeholder="Step Name" name="inpName" id="inpName" required>

                    <div>
                        <input id="searchInput" class="input-controls" type="text" placeholder="Enter a place, an address, or a monument">
                        <input id="searchInputCoord" class="input-controls" type="text" placeholder="Enter coordinates">
                        <input id="btnValidationCoord" type="button" value="Validation of coordonates" />
                    </div>

                    <div class="map" id="map"></div>

                    <div class="form_area">
                        <input class="espace" type="text" placeholder="Address" name="inpLocation" id="inpLocation" readonly="readonly">
                        <input class="espace" type="text" placeholder="Latitude" name="inpLatitude" id="inpLatitude" readonly="readonly">
                        <input class="espace" type="text" placeholder="Longitude" name="inpLongitude" id="inpLongitude" readonly="readonly">
                        <button id="btnCreateStep">Add Step</button>
                        <button id="btnItinerary"><a href="{{route('itinerary', [$data['routeName'][0]->ID])}}">Next</a></button>
                    </div>
            </form>


            {{-- code event --}}

            <form method="post" name="formEvent" id="formEvent" action="{{route('EventCreation', [$data['routeName'][0]->ID])}}">
                @csrf


                <div class="form_area">


                    <input class="espace" type="text" placeholder="Address" name="inpLocation2" id="inpLocation2" readonly="readonly" required>
                    <input class="espace" type="text" placeholder="Latitude" name="inpLatitude2" id="inpLatitude2" readonly="readonly" required>
                    <input class="espace" type="text" placeholder="Longitude" name="inpLongitude2" id="inpLongitude2" readonly="readonly" required>

                    <input class="espace" type="text" placeholder="Name Event" name="NameEvent" id="NameEvent" required>
                    <input class="espace" type="text" placeholder="Indication" name="IndicationEvent" id="IndicationEvent" required>
                    <input class="espace" type="text" placeholder="Reward" name="Reward" id="Reward" required>

                    <button id="btnCreateEvent">Add Event</button>
                </div>

            </form>


            {{-- code Partanaire --}}


            <form method="post" name="formPartenaire" id="formPartenaire" action="{{route('addPartenaire', [$data['routeName'][0]->ID])}}">
                @csrf


                <div class="form_area">


                    <b>Event: </b>
                    <select>
                            <option id="idEvenement" value=""></option>
                    </select>


                    <b>Partenaire: </b>
                    <select>
                        @foreach ($showPartenaire as $partenaire)
                            <option id="idPartenaire" value="{{$data['showPartenaire']->NOM}}"></option>
                        @endforeach
                    </select>


                    <b>Contrat Choisi: </b>
                    <select>
                            <option id="idContrat" value=""></option>
                    </select>


                    <button id="btnaddPartenaire">Add Partenaire</button>
                </div>

            </form>




        </div>

        {{-- @if ($data['result'] == 1)
        <hr>
        <h1 class="text-center bg-white">Steps</h1>
        <hr>
            <table class="bg-white text-dark">
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Creation Date</th>
                <th>Delete</th>
                @foreach ($data['showStep'] as $step)
                <tr>
                    <td class="text-center">{{$step->ID}}</td>
                    <td class="text-center">{{$step->NAME}}</td>
                    <td class="text-center">{{$step->ADDRESS}}</td>
                    <td class="text-center">{{$step->LONGITUDE}}</td>
                    <td class="text-center">{{$step->LATITUDE}}</td>
                    <td class="text-center">{{$step->CREATIONDATE}}</td>
                    <td class="text-center">
                        <a href="{{route('deleteStep', [$data['routeName'][0]->ID, 'idStep' => $step->ID])}}">
                            <img width="25px" height="25px" src="{{asset('image/trash.png')}}" alt="">
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        @endif --}}

        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiuImeuNuUhv_E4EV6FLhK6kkb8KMYK4Q&libraries=places"></script>
        <script type="text/javascript" src="{{asset('js/map.js')}}"></script>
    </div>
</div>
@endsection
