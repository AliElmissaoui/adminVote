<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="{{ asset('materialize-css/css/materialize.css') }}">

        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        @livewireStyles
    </head>

    <body>
      <div class="container">
          <div class="row" style="padding-top:10px;">

              <div class="col s12 m10 offset-m1 l8 offset-l2" style="margin-top:10px;">
                {{ $slot }}

              </div>
          </div>
      </div>


    </body>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <script src="{{ asset('materialize-css/js/materialize.js') }}"></script>
    <script src="{{ asset('assets/js/init.js') }}"></script>
    @stack('modals')
    @livewireScripts
</html>
