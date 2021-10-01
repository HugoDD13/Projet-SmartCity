@extends('layout')

@section('title')
Itinerary
@endsection

@section('Style') <!--Charge la page de style-->
<link rel="stylesheet" href="style.css"> <!--Page de style-->
@endsection <!--Charge la page de style-->
<body onload="initialize2({{$data['countStep'][0]->COUNTSTEP-2}})"></body>
@section('content')
        <div class="inputSteps text-center">
            <form method="post" name="formSteps" id="formSteps" action="#">
                @csrf
                <div id="bcgRouteCreation">
                    <div id="borderRouteCreation">
                        <div>
                            <div>
                                <h1 id="title" class="text-center">
                                    Steps for : {{$data['routeName'][0]->NAME}}
                                </h1>
                            </div>
                        </div>
                        <br>
                    <div id="floating-panel">

                        <b>Start: </b>
                        <select id="start">
                            @foreach ($data['showStep'] as $step)
                                <option value="{{$step->LATITUDE}},{{$step->LONGITUDE}}">{{$step->NAME}}</option>
                            @endforeach
                        </select>


                        <?php
                        for ($i=0; $i < ($data['countStep'][0]->COUNTSTEP-2); $i++) {
                        ?>
                        <b>Step: </b>
                        <select id="step{{$i}}">
                            @foreach ($data['showStep'] as $step)
                                <option value="{{$step->LATITUDE}},{{$step->LONGITUDE}}">{{$step->NAME}}</option>
                            @endforeach
                        </select>
                        <?php
                        }
                        ?>


                        <b>End: </b>
                        <select id="end">
                            @foreach ($data['showStep'] as $step)
                                <option value="{{$step->LATITUDE}},{{$step->LONGITUDE}}">{{$step->NAME}}</option>
                            @endforeach
                        </select>

                    </div>
                    <br>

                    {{-- Code event --}}

                    <?php
                    $i=0
                     ?>
                    @foreach ($data['showEvent'] as $event)
                    <b>Indication Event: </b>
                        <input class="espace" type="text" id="event{{$i++}}" value="{{$event->ADDRESS}}" readonly="readonly" hidden>
                        <input class="espace" tyoe="text" id="event{{$i++}}" value="{{$event->INDICATION}}" readonly="readonly">
                    @endforeach

                    <input id="submit" type="button" value="Show envent">


                    <div class="mapItinerary" id="mapItinerary"></div>
            </form>
        </div>

        @if ($data['result'] == 1)
        <hr>
        <h1 class="text-center bg-white">Steps</h1>
        <hr>
            <table class="bg-white text-dark mx-auto">
                <th>Order</th>
                <th>Name</th>
                <th>Id</th>
                @foreach ($data['showStep'] as $step)
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">{{$step->NAME}}</td>
                    <td class="text-center">{{$step->ID}}</td>
                </tr>
                @endforeach
            </table>
        @endif
        <script type="text/javascript" src="{{asset('js/map2.js')}}"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCF_WyifFkWFeOfZXczwh64NFslHnnpz4U&libraries=places&callback=initialize2" defer>
        </script>
    </div>
</div>
@endsection
