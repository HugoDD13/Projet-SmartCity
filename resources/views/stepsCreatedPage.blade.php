<link rel="stylesheet" href="{{asset('css/style.css')}}">

<hr>
<h1 class="text-center">Steps</h1>
<hr>
    <table>
        <th>Name</th>
        <th>Address</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Creation Date</th>
        @foreach ($showStep as $step)
        <tr>
            <td class="text-center">{{$step->NAME}}</td>
            <td class="text-center">{{$step->ADDRESS}}</td>
            <td class="text-center">{{$step->LONGITUDE}}</td>
            <td class="text-center">{{$step->LATITUDE}}</td>
            <td class="text-center">{{$step->CREATIONDATE}}</td>
        </tr>
        @endforeach
    </table>
