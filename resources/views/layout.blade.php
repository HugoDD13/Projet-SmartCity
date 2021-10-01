<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>

    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center sticky-top">
          <a class="navbar-brand" href="#">
            <img src="{{asset('image/photosmartcity.png')}}" alt="" style="width:120px;">
          </a>
          <a class="navbar-brand" href="">SmartCity 2020</a>
            @if (isset($_SESSION['Login']))
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{route('PageRouteCreation')}}">Routes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('PageGameCreation')}}">Games</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('pageTeamCreation')}}">Teams</a>
              </li>
            </ul>
            @endif
          </nav>

        @yield('content')
        {{--<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center fixed-bottom">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link">© SmartCity2020. Aucun droit réservé.</a>
                </li>
              </ul>
            </nav>--}}

    {{-- Google Maps --}}
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script type="text/javascript" src="{{asset('js/map.js')}}"></script>
    <script src="{{ asset('js/script.js')}}"></script>

    <script type="text/javascript">
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      </script>

    </body>
</html>
